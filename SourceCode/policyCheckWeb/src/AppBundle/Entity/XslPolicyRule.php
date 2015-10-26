<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class XslPolicyRule
{
    /**
     * @Assert\NotBlank()
     */
    protected $title;

    protected $xpath;

    protected $value;

    protected $trackType;

    protected $field;

    protected $occurrence = 1;

    /**
     * @Assert\NotBlank()
     */
    protected $validator;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getXpath()
    {
        return 'mi:MediaInfo/mi:track[@type=\'' . $this->getTrackType() . '\'][' . $this->getOccurrence() . ']/mi:' . $this->getField();
    }

    public function setXpath($xpath)
    {
        $this->xpath = $xpath;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getTrackType()
    {
        return $this->trackType;
    }

    public function setTrackType($trackType)
    {
        $this->trackType = $trackType;

        return $this;
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    public function getOccurrence()
    {
        return $this->occurrence;
    }

    public function setOccurrence($occurrence)
    {
        $this->occurrence = $occurrence;

        return $this;
    }

    public function getValidator()
    {
        return $this->validator;
    }

    public function setValidator($validator)
    {
        $this->validator = $validator;

        return $this;
    }

    function __toString() {
        return $this->getTitle();
    }
}
