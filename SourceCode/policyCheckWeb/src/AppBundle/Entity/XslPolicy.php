<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

class XslPolicy
{
    /**
     * @Assert\NotBlank()
     */
    protected $title;

    protected $description;

    protected $rules;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rules = new ArrayCollection();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Add rule
     *
     * @param \AppBundle\Entity\XslPolicyRule $rule
     *
     * @return Policy
     */
    public function addRule(\AppBundle\Entity\XslPolicyRule $rule)
    {
        $this->rules->add($rule);

        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\XslPolicyRule $rule
     */
    public function removeRule(\AppBundle\Entity\XslPolicyRule $rule)
    {
        $this->rules->removeElement($rule);
    }

    function __toString() {
        return $this->getTitle();
    }
}
