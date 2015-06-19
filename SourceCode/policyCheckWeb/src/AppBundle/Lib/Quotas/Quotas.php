<?php

namespace AppBundle\Lib\Quotas;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityManager;

use AppBundle\Entity\User;
use AppBundle\Entity\UserQuotas;

class Quotas
{
    protected $user;
    protected $em;
    protected $defaultQuotas;
    protected $date;
    protected $datePeriod;

    public function __construct(TokenStorageInterface $tokenStorage, EntityManager $em)
    {
        $this->user = $this->getUser($tokenStorage);
        $this->em = $em;
        $this->defaultQuotas = array('period' => 3600,
            'policies' => 10,
            'uploads' => 10,
            'urls' => 10,
            'policyChecks' => 100,
        );
        $this->date = new \DateTime();
        // Clone DateTime object as add/sub method modify the object itself
        $this->datePeriod = clone $this->date;
        $this->datePeriod->sub(new \DateInterval('PT' . $this->defaultQuotas['period'] . 'S'));
    }

    public function setQuotasForNewUser()
    {
        $userQuotas = new UserQuotas();
        $userQuotas->setPolicies($this->defaultQuotas['policies'])
            ->setUploads($this->defaultQuotas['uploads'])
            ->setUploadsTimestamp($this->datePeriod)
            ->setUrls($this->defaultQuotas['urls'])
            ->setUrlsTimestamp($this->datePeriod)
            ->setPolicyChecks($this->defaultQuotas['policyChecks'])
            ->setPolicyChecksTimestamp($this->datePeriod)
            ->setUser($this->user);

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function getQuotasWithExpireDate()
    {
        $userQuotas = $this->getQuotasByUser();
        $userQuotas->getUploadsTimestamp()->add(new \DateInterval('PT' . $this->defaultQuotas['period'] . 'S'));
        $userQuotas->getUrlsTimestamp()->add(new \DateInterval('PT' . $this->defaultQuotas['period'] . 'S'));
        $userQuotas->getPolicyChecksTimestamp()->add(new \DateInterval('PT' . $this->defaultQuotas['period'] . 'S'));

        return $userQuotas;
    }

    public function hasUploadsRights()
    {
        $userQuotas = $this->getQuotasByUser();
        if ($userQuotas->getUploadsTimestamp() < $this->datePeriod) {
            return true;
        }
        else {
            return 0 < $userQuotas->getUploads();
        }
    }

    public function hitUploads($uploads = 1)
    {
        $userQuotas = $this->getQuotasByUser();
        if ($userQuotas->getUploadsTimestamp() < $this->datePeriod) {
            $userQuotas->setUploads($this->defaultQuotas['uploads'] - $uploads)->setUploadsTimestamp($this->date);
        }
        else {
            $userQuotas->decreaseUploads($uploads);
        }

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasUrlsRights()
    {
        $userQuotas = $this->getQuotasByUser();
        if ($userQuotas->getUrlsTimestamp() < $this->datePeriod) {
            return true;
        }
        else {
            return 0 < $userQuotas->getUrls();
        }
    }

    public function hitUrls($urls = 1)
    {
        $userQuotas = $this->getQuotasByUser();
        if ($userQuotas->getUrlsTimestamp() < $this->datePeriod) {
            $userQuotas->setUrls($this->defaultQuotas['urls'] - $urls)->setUrlsTimestamp($this->date);
        }
        else {
            $userQuotas->decreaseUrls($urls);
        }

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasPolicyChecksRights()
    {
        $userQuotas = $this->getQuotasByUser();
        if ($userQuotas->getPolicyChecksTimestamp() < $this->datePeriod) {
            return true;
        }
        else {
            return 0 < $userQuotas->getPolicyChecks();
        }
    }

    public function hitPolicyChecks($policyChecks = 1)
    {
        $userQuotas = $this->getQuotasByUser();
        if ($userQuotas->getPolicyChecksTimestamp() < $this->datePeriod) {
            $userQuotas->setPolicyChecks($this->defaultQuotas['policyChecks'] - $policyChecks)->setPolicyChecksTimestamp($this->date);
        }
        else {
            $userQuotas->decreasePolicyChecks($policyChecks);
        }

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasPolicyCreationRights()
    {
        $userQuotas = $this->getQuotasByUser();

        $policies = $this->em
            ->getRepository('AppBundle:Policy')
            ->createQueryBuilder('p')
                ->select('COUNT(p)')
                ->where('p.user = :user')
                ->setParameter('user', $this->user)
            ->getQuery()
            ->getSingleScalarResult();

        return $policies < $this->getQuotasByUser()->getPolicies();
    }

    private function getUser($tokenStorage)
    {
        $token = $tokenStorage->getToken();

        if ($token !== null && $token->getUser() instanceof User) {
            return $token->getUser();
        }
        else {
            throw new \Exception('Invalid User');
        }
    }

    private function getQuotasByUser()
    {
        return $this->em
            ->getRepository('AppBundle:UserQuotas')
            ->findOneByUser($this->user);
    }
}
