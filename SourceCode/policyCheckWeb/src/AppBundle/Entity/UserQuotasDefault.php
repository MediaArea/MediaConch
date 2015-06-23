<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UserQuotasDefault
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", inversedBy="quotasDefault")
     */
    protected $user;

    /**
     * @ORM\Column(type="integer")
     */
    protected $policies;

    /**
     * @ORM\Column(type="integer")
     */
    protected $uploads;

    /**
     * @ORM\Column(type="integer")
     */
    protected $urls;

    /**
     * @ORM\Column(type="integer")
     */
    protected $policyChecks;


    /**
     * Set policies
     *
     * @param integer $policies
     * @return UserQuotasDefault
     */
    public function setPolicies($policies)
    {
        $this->policies = $policies;

        return $this;
    }

    /**
     * Get policies
     *
     * @return integer 
     */
    public function getPolicies()
    {
        return $this->policies;
    }

    /**
     * Set uploads
     *
     * @param integer $uploads
     * @return UserQuotasDefault
     */
    public function setUploads($uploads)
    {
        $this->uploads = $uploads;

        return $this;
    }

    /**
     * Get uploads
     *
     * @return integer 
     */
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * Set urls
     *
     * @param integer $urls
     * @return UserQuotasDefault
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * Get urls
     *
     * @return integer 
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * Set policyChecks
     *
     * @param integer $policyChecks
     * @return UserQuotasDefault
     */
    public function setPolicyChecks($policyChecks)
    {
        $this->policyChecks = $policyChecks;

        return $this;
    }

    /**
     * Get policyChecks
     *
     * @return integer 
     */
    public function getPolicyChecks()
    {
        return $this->policyChecks;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return UserQuotasDefault
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
