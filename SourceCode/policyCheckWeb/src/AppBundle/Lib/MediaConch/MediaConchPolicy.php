<?php

namespace AppBundle\Lib\MediaConch;

use Symfony\Component\Process\ProcessBuilder;

class MediaConchPolicy extends MediaConch
{
    public function run($policy, $realPolicyName = false)
    {
        $builder = new ProcessBuilder();
        $process = $builder->setPrefix($this->MediaConch)
            ->add($this->source)
            ->add('--policy=' . $policy)
            ->getProcess();
        $process->run();

        if ($process->isSuccessful()) {
            $this->success = true;
            $this->output = $process->getOutput();
            $this->replacePolicyNameInOuput($policy, $realPolicyName);
        }

        return $this;
    }

    public function isValid()
    {
        return !preg_match('/NOT VALID/', $this->output);
    }

    private function replacePolicyNameInOuput($policy, $realPolicyName)
    {
        if ($realPolicyName) {
            $this->output = str_replace($policy, $realPolicyName, $this->output);
        }
    }
}
