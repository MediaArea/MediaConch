<?php

namespace AppBundle\Lib\MediaInfo;

class MediaInfo
{
    private $MediaInfo = '/usr/bin/mediainfo';
    private $source;
    private $parseSpeed = 0;
    private $xml;
    private $success = false;
    private $parsedOutput;
    private $trace;

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
        $opt = '-f  --Language=raw --Output=MAXML';
        $opt .= ' --parseSpeed=' . $this->parseSpeed;

        exec($this->MediaInfo . ' ' . $opt . ' ' . escapeshellarg($this->source), $xmlAsArray, $result);
        if (0 == $result) {
            $this->success = true;
            $this->xml = '';
            foreach($xmlAsArray as $out) {
                $this->xml .= $out . "\n";
            }
        }

        return $this;
    }

    public function trace()
    {
        $opt = '--Details=1';

        exec($this->MediaInfo . ' ' . $opt . ' ' . escapeshellarg($this->source), $traceAsArray, $result);
        if (0 == $result) {
            $this->trace = '';
            foreach($traceAsArray as $out) {
                $this->trace .= $out . "\n";
            }
        }

        return $this;
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function getOutputXml()
    {
        return $this->xml;
    }

    public function getTrace()
    {
        return $this->trace;
    }

    public function getParsedOutput()
    {
        if(!$this->parsedOutput instanceof MediaInfoOutput) {
            $this->parsedOutput = new MediaInfoOutput($this->xml);
        }

        return $this->parsedOutput;
    }
}
