<?php

namespace AppBundle\Lib\MediaConch;

use Symfony\Component\Process\ProcessBuilder;

class MediaConchPolicy extends MediaConch
{
    public function run($policy)
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
        }

        return $this;
    }

    public function isValid()
    {
        return !preg_match('/NOT VALID/', $this->output);
    }
}
