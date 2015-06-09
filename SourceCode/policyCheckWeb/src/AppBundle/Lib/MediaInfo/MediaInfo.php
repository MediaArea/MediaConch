<?php

namespace AppBundle\Lib\MediaInfo;

class MediaInfo
{
    private $MediaInfo = '/usr/bin/mediainfo';
    private $source;
    private $parseSpeed = 0;
    private $xml;
    private $xmlAsArray = array();
    private $success = false;
    private $parsedOutput;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function setParseSpeed($parseSpeed)
    {
        $this->parseSpeed = $parseSpeed;

        return $this;
    }

    public function analyse()
    {
        $opt = '-f  --Language=raw --Output=XML';
        $opt .= ' --parseSpeed=' . $this->parseSpeed;

        exec($this->MediaInfo . ' ' . $opt . ' ' . escapeshellarg($this->source), $this->xmlAsArray, $result);
        if (0 == $result) {
            $this->success = true;
            $this->xml = '';
            foreach($this->xmlAsArray as $out) {
                $this->xml .= $out . "\n";
            }
        }
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function getOutputXml()
    {
        return $this->xml;
    }

    public function getOutputXmlAsArray()
    {
        return $this->xmlAsArray;
    }

    public function getParsedOutput()
    {
        if(!$this->parsedOutput instanceof MediaInfoOutput) {
            $this->parsedOutput = new MediaInfoOutput($this->xml);
        }

        return $this->parsedOutput;
    }
}
