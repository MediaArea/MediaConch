<?php

namespace AppBundle\Lib\MediaConch;

class MediaConch
{
    protected $MediaConch = '/usr/bin/mediaconch';
    protected $source;
    protected $success = false;
    protected $output;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function getSuccess()
    {
        return $this->success;
    }
}
