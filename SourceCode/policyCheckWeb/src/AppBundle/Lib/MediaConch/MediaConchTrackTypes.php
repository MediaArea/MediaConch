<?php

namespace AppBundle\Lib\MediaConch;

use Symfony\Component\Process\ProcessBuilder;

class MediaConchTrackTypes extends MediaConch
{
    public function __construct()
    {
    }

    public function run()
    {
        $builder = new ProcessBuilder();
        $process = $builder->setPrefix($this->MediaConch)
            ->add('--MAXML_StreamKinds')
            ->getProcess();

        $process->run();

        /* Comment until MC fix (return 255 instead of 0 for now)
        if ($process->isSuccessful()) {
            $this->success = true;
            $this->output = trim($process->getOutput());
        }
        */
        $this->output = trim($process->getOutput());

        return $this;
    }
}
