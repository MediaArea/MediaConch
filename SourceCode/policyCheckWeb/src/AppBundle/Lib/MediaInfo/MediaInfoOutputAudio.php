<?php

namespace AppBundle\Lib\MediaInfo;

class MediaInfoOutputAudio extends MediaInfoOutputTrack
{
    protected $aliasFields = array();

    public function __construct($xml)
    {
        parent::__construct($xml);
    }

    protected function setBitRate_String($key, $value)
    {
        $bitrateString = preg_match('/([0-9\.]+) [a-zA-Z]+/', $value, $matches);
        if(is_array($matches) && isset($matches[1])) {
            $bitrate = $matches[1];
        }
        else {
            $bitrate = null;
        }
        $this->datas[$key] = $bitrate;
    }
}
