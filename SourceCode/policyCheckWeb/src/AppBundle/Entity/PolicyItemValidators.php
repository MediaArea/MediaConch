<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PolicyItemValidatorsRepository")
 */
class PolicyItemValidators
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="PolicyItemFields")
     * @Assert\NotBlank()
     */
    protected $field;

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
     * Set name
     *
     * @param string $name
     *
     * @return PolicyItemValidators
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    function __toString() {
        return $this->getName();
    }

    /**
     * Set field
     *
     * @param \AppBundle\Entity\PolicyItemFields $field
     *
     * @return PolicyItemValidators
     */
    public function setField(\AppBundle\Entity\PolicyItemFields $field = null)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return \AppBundle\Entity\PolicyItemFields
     */
    public function getField()
    {
        return $this->field;
    }
}
