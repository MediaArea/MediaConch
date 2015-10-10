<?php

namespace AppBundle\Lib\MediaConch;

use Symfony\Component\Process\ProcessBuilder;

class MediaConchPolicy extends MediaConch
{
    protected $policyType;
    static public $TYPE_XSLT = 'xslt';
    static public $TYPE_SCHEMATRON = 'schematron';

    public function run($policy)
    {
        $builder = new ProcessBuilder();
        $process = $builder->setPrefix($this->MediaConch)
            ->add($this->source);

        switch ($this->policyType) {
            case SELF::$TYPE_XSLT :
                $builder->add('--XSLT=' . $policy);
                break;
            case SELF::$TYPE_SCHEMATRON :
                $builder->add('--policy=' . $policy);
                break;
            default :
                $builder->add('--policy=' . $policy);
                break;
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
                $this->policyType = SELF::$TYPE_XSLT;
                break;
            case 'sch' :
                $this->policyType = SELF::$TYPE_SCHEMATRON;
                break;
            default :
                $this->policyType = SELF::$TYPE_SCHEMATRON;
                break;
        }

        return $this;
    }

    public function isValid()
    {
        switch ($this->policyType) {
            case SELF::$TYPE_XSLT :
                return null; /** @TODO not possible to check status for now */
                break;
            case SELF::$TYPE_SCHEMATRON :
                return !preg_match('/NOT VALID/', $this->output);
                break;
            default :
                return !preg_match('/NOT VALID/', $this->output);
                break;
        }
    }
}
