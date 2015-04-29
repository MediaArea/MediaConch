<?php

namespace AppBundle\Lib\MediaInfo;

class MediaInfoOutputMenu extends MediaInfoOutputTrack
{
    protected $aliasFields = array();

    public function __construct($xml)
    {
        parent::__construct($xml);
    }
}
