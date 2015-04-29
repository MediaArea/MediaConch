<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PolicyItem
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="PolicyItemTypes")
     * @Assert\NotBlank()
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="PolicyItemFields")
     * @Assert\NotBlank()
     */
    protected $field;

    /**
     * @ORM\ManyToOne(targetEntity="PolicyItemValidators")
     * @Assert\NotBlank()
     */
    protected $validator;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="Policy", inversedBy="items")
     */
    protected $policy;


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
     * Set type
     *
     * @param string $type
     *
     * @return PolicyItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set field
     *
     * @param string $field
     *
     * @return PolicyItem
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set validator
     *
     * @param string $validator
     *
     * @return PolicyItem
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * Get validator
     *
     * @return string
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return PolicyItem
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set policy
     *
     * @param \AppBundle\Entity\Policy $policy
     *
     * @return PolicyItem
     */
    public function setPolicy(\AppBundle\Entity\Policy $policy = null)
    {
        $this->policy = $policy;

        return $this;
    }

    /**
     * Get policy
     *
     * @return \AppBundle\Entity\Policy
     */
    public function getPolicy()
    {
        return $this->policy;
    }
}
