<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Policy", mappedBy="user", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    protected $policy;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\XslPolicyFile", mappedBy="user", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    protected $xslPolicy;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\XslPolicyDisplayFile", mappedBy="user", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    protected $xslPolicyDisplay;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\UserQuotas", mappedBy="user", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    protected $quotas;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\UserQuotasDefault", mappedBy="user", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    protected $quotasDefault;

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
     * @ORM\Column(type="string", length=1, nullable=true)
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

    /**
     * Set quotasDefault
     *
     * @param \AppBundle\Entity\UserQuotasDefault $quotasDefault
     * @return User
     */
    public function setQuotasDefault(\AppBundle\Entity\UserQuotasDefault $quotasDefault = null)
    {
        $this->quotasDefault = $quotasDefault;

        return $this;
    }

    /**
     * Get quotasDefault
     *
     * @return \AppBundle\Entity\UserQuotasDefault
     */
    public function getQuotasDefault()
    {
        return $this->quotasDefault;
    }

    /**
     * Set quotas
     *
     * @param \AppBundle\Entity\UserQuotas $quotas
     * @return User
     */
    public function setQuotas(\AppBundle\Entity\UserQuotas $quotas = null)
    {
        $this->quotas = $quotas;

        return $this;
    }

    /**
     * Get quotas
     *
     * @return \AppBundle\Entity\UserQuotas
     */
    public function getQuotas()
    {
        return $this->quotas;
    }

    /**
     * Add xslPolicy
     *
     * @param \AppBundle\Entity\XslPolicy $xslPolicy
     * @return User
     */
    public function addXslPolicy(\AppBundle\Entity\XslPolicyFile $xslPolicy)
    {
        $this->xslPolicy[] = $xslPolicy;

        return $this;
    }

    /**
     * Remove xslPolicy
     *
     * @param \AppBundle\Entity\XslPolicy $xslPolicy
     */
    public function removeXslPolicy(\AppBundle\Entity\XslPolicyFile $xslPolicy)
    {
        $this->xslPolicy->removeElement($xslPolicy);
    }

    /**
     * Get xslPolicy
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getXslPolicy()
    {
        return $this->xslPolicy;
    }

    /**
     * Add xslPolicyDisplay
     *
     * @param \AppBundle\Entity\XslPolicyDisplayFile $xslPolicyDisplay
     * @return User
     */
    public function addXslPolicyDisplay(\AppBundle\Entity\XslPolicyDisplayFile $xslPolicyDisplay)
    {
        $this->xslPolicyDisplay[] = $xslPolicyDisplay;

        return $this;
    }

    /**
     * Remove xslPolicyDisplay
     *
     * @param \AppBundle\Entity\XslPolicyDisplayFile $xslPolicyDisplay
     */
    public function removeXslPolicyDisplay(\AppBundle\Entity\XslPolicyDisplayFile $xslPolicyDisplay)
    {
        $this->xslPolicyDisplay->removeElement($xslPolicyDisplay);
    }

    /**
     * Get xslPolicyDisplay
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getXslPolicyDisplay()
    {
        return $this->xslPolicyDisplay;
    }
}
