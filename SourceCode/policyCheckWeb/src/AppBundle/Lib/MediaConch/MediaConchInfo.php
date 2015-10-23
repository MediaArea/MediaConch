<?php

namespace AppBundle\Lib\MediaConch;

use Symfony\Component\Process\ProcessBuilder;

class MediaConchInfo extends MediaConch
{
    public function run($format)
    {
        $builder = new ProcessBuilder();
        $builder->setPrefix($this->MediaConch)
            ->add($this->source)
            ->add('-ti')
            ->add('--parseSpeed=0');

        switch ($format) {
            case 'jstree' :
                $builder->add('-fj');
                break;
            case 'xml' :
                $builder->add('-fx');
                break;
            default :
                $builder->add('-fx');
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
}

