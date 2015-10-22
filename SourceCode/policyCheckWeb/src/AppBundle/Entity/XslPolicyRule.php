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
    }

    public function getXpath()
    {
        return $this->xpath;
    }

    public function setXpath($xpath)
    {
        $this->xpath = $xpath;
    }

    public function makeXpath()
    {
        $this->xpath = 'ma:MediaInfo/ma:track[@type=\'' . $this->getTrackType() . '\'][' . $this->getOccurrence() . ']/ma:' . $this->getField();
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getTrackType()
    {
        return $this->trackType;
    }

    public function setTrackType($trackType)
    {
        $this->trackType = $trackType;
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($field)
    {
        $this->field = $field;
    }

    public function getOccurrence()
    {
        return $this->occurrence;
    }

    public function setOccurrence($occurrence)
    {
        $this->occurrence = $occurrence;
    }

    public function getValidator()
    {
        return $this->validator;
    }

    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    function __toString() {
        return $this->getTitle();
    }
}
