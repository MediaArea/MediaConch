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

    public function __construct(TokenStorageInterface $tokenStorage, EntityManager $em)
    {
        $this->user = $this->getUser($tokenStorage);
        $this->em = $em;
    }

    public function setQuotasForNewUser()
    {
        $userQuotas = new UserQuotas();
        $userQuotas->setPolicies(10)
            ->setUploads(10)
            ->setUrls(10)
            ->setPolicyChecks(100)
            ->setUser($this->user);

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasUploadsRights()
    {
        return 0 < $this->getQuotasByUser()->getUploads();
    }

    public function hitUploads($uploads = 1)
    {
        $userQuotas = $this->getQuotasByUser();
        $userQuotas->decreaseUploads($uploads);

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasUrlsRights()
    {
        return 0 < $this->getQuotasByUser()->getUrls();
    }

    public function hitUrls($urls = 1)
    {
        $userQuotas = $this->getQuotasByUser();
        $userQuotas->decreaseUrls($urls);

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasPolicyChecksRights()
    {
        return 0 < $this->getQuotasByUser()->getPolicyChecks();
    }

    public function hitPolicyChecks($policyChecks = 1)
    {
        $userQuotas = $this->getQuotasByUser();
        $userQuotas->decreasePolicyChecks($policyChecks);

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
