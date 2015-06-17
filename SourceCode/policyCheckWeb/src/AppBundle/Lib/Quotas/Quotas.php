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
            ->setUploads(15)
            ->setUrls(20)
            ->setUser($this->user);

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasUploadsRights()
    {
        return 0 < $this->getQuotasByUser()->getUploads();
    }

    public function hitUploads()
    {
        $userQuotas = $this->getQuotasByUser();
        $userQuotas->setUploads($userQuotas->getUploads() - 1);

        $this->em->persist($userQuotas);
        $this->em->flush();
    }

    public function hasUrlsRights()
    {
        return 0 < $this->getQuotasByUser()->getUrls();
    }

    public function hitUrls()
    {
        $userQuotas = $this->getQuotasByUser();
        $userQuotas->setUrls($userQuotas->getUrls() - 1);

        $this->em->persist($userQuotas);
        $this->em->flush();
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
