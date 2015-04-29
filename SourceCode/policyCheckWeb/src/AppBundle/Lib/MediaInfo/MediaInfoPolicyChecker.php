<?php

namespace AppBundle\Lib\MediaInfo;

use AppBundle\Entity\Policy;

class MediaInfoPolicyChecker
{
    private $MIOutput;
    private $policy;
    private $errors = array();

    public function __construct(MediaInfoOutput $MIOutput, Policy $policy)
    {
        $this->MIOutput = $MIOutput;
        $this->policy = $policy;
    }

    public function check()
    {
        foreach ($this->policy->getItems() as $item) {
            if ($this->MIOutput->isTrackExists($item->getType()->getName())) {
                foreach ($this->MIOutput->getTrack($item->getType()->getName()) as $trackId => $track) {
                    if (false === $this->valid($track->get($item->getField()->getName()), $item->getValidator()->getName(), $item->getValue())) {
                        $this->errors[] = 'Error on ' . $item->getType()->getName() . ' track ' . $trackId . ' for field ' . $item->getField()->getName() . ', value is : ' . $track->get($item->getField()->getName());
                    }
                }
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid()
    {
        return (0 == count($this->errors));
    }

    private function valid($testValue, $operator, $operatorValue) {
        switch ($operator) {
            case 'eq':
                $valid = ($operatorValue == $testValue);
                break;
            case 'ne':
                $valid = ($operatorValue != $testValue);
                break;
            case 'gt':
                $valid = ($operatorValue < $testValue);
                break;
            case 'ge':
                $valid = ($operatorValue <= $testValue);
                break;
            case 'lt':
                $valid = ($operatorValue > $testValue);
                break;
            case 'le':
                $valid = ($operatorValue >= $testValue);
                break;
            default:
                $valid = false;
        }

        return $valid;
    }
}
