<?php

namespace AppBundle\Lib\XslPolicy;

use AppBundle\Entity\XslPolicy;
use AppBundle\Entity\XslPolicyRule;

class XslPolicyParser
{
    protected $xsl;
    protected $policy;

    public function __construct()
    {
        $this->policy = new XslPolicy();
    }

    public function loadXsl($xsl)
    {
        if (file_exists($xsl)) {
            $this->xsl = new \DomDocument();
            $this->xsl->load($xsl);
            $this->hydrate();
        }
        else {
            throw new Exception('Policy does\'nt exists');
        }
    }

    public function getPolicy()
    {
        return $this->policy;
    }

    protected function hydrate()
    {
        $this->policy->setTitle($this->getPolicyTitle());
        $this->policy->setDescription($this->getPolicyDescription());

        $policies = $this->xsl->getElementsByTagName('policy');
        foreach ($policies as $policy) {
            $policyRule = new XslPolicyRule();
            $validator = $this->getValidator($policy);
            $policyRule->setValidator($validator);

            $policyRule->setTitle($this->getTitle($policy));
            $policyRule->setField($this->getField($policy));
            $policyRule->setValue($this->getValue($policy));
            $policyRule->setTrackType($this->getTrackType($policy));
            $policyRule->setOccurrence($this->getOccurrence($policy));

            if ('is_true' == $validator) {
                $policyRule->setXpath($policyRule->getValue());
            }
            else {
                $policyRule->makeXpath();
            }

            $this->policy->addRule($policyRule);
        }
    }

    protected function getValidator($element)
    {
        $validator = $element->getElementsByTagNameNS('http://www.w3.org/1999/XSL/Transform', 'call-template');
        if ($validator->item(0) === null) {
            throw new \Exception('No validator found in XSL');
        }
        $validator = $validator->item(0)->getAttribute('name');

        return $validator;
    }

    protected function getTitle($element)
    {
        $attributes = $element->getElementsByTagNameNS('http://www.w3.org/1999/XSL/Transform', 'attribute');
        foreach ($attributes as $attribute) {
            if ('title' == $attribute->getAttribute('name')) {
                return $attribute->nodeValue;
            }
        }

        return null;
    }

    protected function getField($element)
    {
        $attributes = $element->getElementsByTagNameNS('http://www.w3.org/1999/XSL/Transform', 'attribute');
        foreach ($attributes as $attribute) {
            if ('field' == $attribute->getAttribute('name')) {
                return $attribute->nodeValue;
            }
        }

        return null;
    }

    protected function getValue($element)
    {
        $attributes = $element->getElementsByTagNameNS('http://www.w3.org/1999/XSL/Transform', 'attribute');
        foreach ($attributes as $attribute) {
            if ('value' == $attribute->getAttribute('name')) {
                return $attribute->nodeValue;
            }
        }

        return null;
    }

    protected function getTrackType($element)
    {
        $xpath = $element->getElementsByTagNameNS('http://www.w3.org/1999/XSL/Transform', 'for-each');
        if ($xpath->item(0) !== null) {
            $xpath = $xpath->item(0)->getAttribute('select');
            preg_match('/mi:MediaInfo\/mi:track\[@type=\'([A-Za-z]+)\'\]\[(.*)/', $xpath, $matches);
            if (isset($matches[1])) {
                return $matches[1];
            }
        }

        return null;
    }

    protected function getOccurrence($element)
    {
        $xpath = $element->getElementsByTagNameNS('http://www.w3.org/1999/XSL/Transform', 'for-each');
        if ($xpath->item(0) !== null) {
            $xpath = $xpath->item(0)->getAttribute('select');
            preg_match('/mi:MediaInfo\/mi:track\[@type=\'([A-Za-z]+)\'\]\[([\d\*]{1})\](.*)/', $xpath, $matches);
            if (isset($matches[2])) {
                return $matches[2];
            }
        }

        return null;
    }

    protected function getPolicyTitle()
    {
        $title = $this->xsl->getElementsByTagName('title');
        if ($title->item(0) !== null) {
            return $title->item(0)->nodeValue;
        }

        return null;
    }

    protected function getPolicyDescription()
    {
        $description = $this->xsl->getElementsByTagName('description');
        if ($description->item(0) !== null) {
            return $description->item(0)->nodeValue;
        }

        return null;
    }
}
