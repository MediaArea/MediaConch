<?php

namespace AppBundle\Lib\MediaConch;

use Symfony\Component\Process\ProcessBuilder;

class MediaConchPolicy extends MediaConch
{
    protected $policyType;
    static public $TYPE_XSLT = 'xslt';
    static public $TYPE_SCHEMATRON = 'schematron';

    public function run($policy, $policyDisplay = null)
    {
        $builder = new ProcessBuilder();
        $builder->setPrefix($this->MediaConch)
            ->add($this->source)
            ->add('--policy=' . $policy);
        if ($policyDisplay) {
            $builder->add('--Display=' . $policyDisplay);
        }

        $process = $builder->getProcess();
        $process->run();

        if ($process->isSuccessful()) {
            $this->success = true;
            $this->output = $process->getOutput();
        }

        return $this;
    }

    public function setPolicyType($fileExtension)
    {
        switch ($fileExtension) {
            case 'xsl' :
            case 'xslt' :
                $this->policyType = MediaConchPolicy::$TYPE_XSLT;
                break;
            case 'sch' :
                $this->policyType = MediaConchPolicy::$TYPE_SCHEMATRON;
                break;
            default :
                $this->policyType = MediaConchPolicy::$TYPE_SCHEMATRON;
                break;
        }

        return $this;
    }

    public function isValid()
    {
        switch ($this->policyType) {
            case MediaConchPolicy::$TYPE_XSLT :
                return !preg_match('/<td>(fail|invalid)<\/td>/', $this->output);
                break;
            case MediaConchPolicy::$TYPE_SCHEMATRON :
                return !preg_match('/NOT VALID/', $this->output);
                break;
            default :
                return !preg_match('/NOT VALID/', $this->output);
                break;
        }
    }
}
