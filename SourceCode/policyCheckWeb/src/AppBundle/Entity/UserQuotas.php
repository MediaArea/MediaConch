<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UserQuotas
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
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
     * Set policies
     *
     * @param integer $policies
     * @return QuotasUser
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
     * @return QuotasUser
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
     * @return QuotasUser
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return UserQuotas
     */
    public function setUser(\AppBundle\Entity\User $user = null)
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
}
