<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Entity\Policy;

/**
 * @ORM\Entity
 * @ORM\Table(name="MediaConch_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Policy", mappedBy="user")
     * @Assert\Valid()
     */
    protected $policy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     maxMessage="The firstname is too short.",
     *     maxMessage="The firstname is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     maxMessage="The lastname is too short.",
     *     maxMessage="The lastname is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     maxMessage="The company name is too short.",
     *     maxMessage="The company name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $companyName;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"unsigned":true, "default":1})
     *
     */
    protected $newsletter = true;

    /**
     * @ORM\Column(type="string", length=1, nullable=false)
     *
     */
    protected $professional;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     *
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     *
     */
    protected $language;

    public function __construct()
    {
        parent::__construct();

        /* @ToDo get the user locale to preload the fields for user registration
        $this->language = \Locale::getDefault();
        $this->country = \Locale::getDefault();
        */
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getNewsletter()
    {
        return $this->newsletter;
    }

    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function getProfessional()
    {
        return $this->professional;
    }

    public function setProfessional($professional)
    {
        $this->professional = $professional;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
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

    /**
     * Add policy
     *
     * @param \AppBundle\Entity\Policy $policy
     * @return User
     */
    public function addPolicy(\AppBundle\Entity\Policy $policy)
    {
        $this->policy[] = $policy;

        return $this;
    }

    /**
     * Remove policy
     *
     * @param \AppBundle\Entity\Policy $policy
     */
    public function removePolicy(\AppBundle\Entity\Policy $policy)
    {
        $this->policy->removeElement($policy);
    }

    /**
     * Get policy
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPolicy()
    {
        return $this->policy;
    }
}
