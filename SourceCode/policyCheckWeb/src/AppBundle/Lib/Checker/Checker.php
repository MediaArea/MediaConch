<?php

namespace AppBundle\Lib\Checker;

use AppBundle\Lib\MediaInfo\MediaInfo;
use AppBundle\Lib\MediaInfo\MediaInfoOutput;
use AppBundle\Lib\MediaInfo\MediaInfoPolicyChecker;
use AppBundle\Lib\MediaConch\MediaConchPolicy;
use AppBundle\Lib\MediaConch\MediaConchConformance;
use AppBundle\Lib\MediaConch\MediaConchTrace;
use AppBundle\Lib\MediaConch\MediaConchInfo;
use AppBundle\Entity\XslPolicyFile;

class Checker
{
    protected $source;
    protected $clientSourceName;
    protected $infoEnable = true;
    protected $info;
    protected $infoFormat = array();
    protected $conformanceEnable = true;
    protected $conformance;
    protected $policyEnable = true;
    protected $policy;
    protected $policyItem;
    protected $policyDisplayFile = null;
    protected $traceEnable = false;
    protected $trace;
    protected $traceFormat = array();
    protected $status;

    public function __construct($source)
    {
        $this->setSource($source);
    }

    public function run()
    {
        $this->runInfo()
            ->runTrace()
            ->runConformance()
            ->runPolicy();
    }

    protected function runInfo()
    {
        if ($this->infoEnable && count($this->infoFormat) > 0) {
            foreach ($this->infoFormat as $format) {
                $MediaConch = new MediaConchInfo($this->source);
                $MediaConch->run($format);
                $this->info[$format] = $MediaConch->getSuccess() ? $MediaConch->getOutput() : false;
            }
        }

        return $this;
    }

    protected function runTrace()
    {
        if ($this->traceEnable && count($this->traceFormat) > 0) {
            foreach ($this->traceFormat as $format) {
                $MediaConch = new MediaConchTrace($this->source);
                $MediaConch->run($format);
                $this->trace[$format] = $MediaConch->getSuccess() ? $MediaConch->getOutput() : false;
            }
        }

        return $this;
    }

    protected function runConformance()
    {
        if ($this->conformanceEnable) {
            $MediaConch = new MediaConchConformance($this->source);
            $MediaConch->run();
            $this->conformance = $MediaConch->getSuccess() ? $MediaConch->getOutput() : false;
        }

        return $this;
    }

    protected function runPolicy()
    {
        if ($this->policyEnable) {
            if (is_string($this->policyItem) && file_exists($this->policyItem)) {
                $MediaConchPolicy = new MediaConchPolicy($this->source);
                $MediaConchPolicy->setPolicyType(pathinfo($this->policyItem, PATHINFO_EXTENSION))
                    ->run($this->policyItem, $this->policyDisplayFile);
                if ($MediaConchPolicy->getSuccess()) {
                    $this->setStatus($MediaConchPolicy->isValid());
                    $this->policy = $MediaConchPolicy->getOutput();
                }
            }
            elseif ($this->policyItem instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                $MediaConchPolicy = new MediaConchPolicy($this->source);
                $MediaConchPolicy->setPolicyType($this->policyItem->getClientOriginalExtension())
                    ->run($this->policyItem->getRealPath(), $this->policyDisplayFile);
                if ($MediaConchPolicy->getSuccess()) {
                    $this->setStatus($MediaConchPolicy->isValid());
                    $this->policy = $MediaConchPolicy->getOutput();
                }
            }
            else {
                throw new \Exception('policyItem type unknown');
            }
        }

        return $this;
    }

    protected function setStatus($status)
    {
        if (false !== $this->status) {
            $this->status = $status;
        }

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    protected function setSource($source)
    {
        if ($source instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
            $this->source = $source->getRealPath();
            $this->clientSourceName = $source->getClientOriginalName();
        }
        else {
            $this->source = $source;
        }
    }

    public function getSource()
    {
        if ($this->clientSourceName) {
            return pathinfo($this->clientSourceName, PATHINFO_BASENAME);
        }
        else {
            return pathinfo($this->source, PATHINFO_BASENAME);
        }
    }

    public function enableInfo()
    {
        $this->infoEnable = true;

        return $this;
    }

    public function disableInfo()
    {
        $this->infoEnable = false;

        return $this;
    }

    public function setInfoFormat(array $format)
    {
        $this->infoFormat = $format;

        return $this;
    }

    public function addInfoFormat($format)
    {
        if (!in_array($format, $this->infoFormat)) {
            $this->infoFormat[] = $format;
        }

        return $this;
    }

    public function getInfo($format = null)
    {
        if (isset($this->info['xml'])) {
            $this->info['xml'] = str_replace($this->source, $this->getBasename(), $this->info['xml']);
        }
        if (isset($this->info['jstree'])) {
            $this->info['jstree'] = str_replace($this->source, $this->getBasename(), $this->info['jstree']);
        }

        if (null == $format) {
            return $this->info;
        }
        else {
            if (isset($this->info[$format])) {
                return $this->info[$format];
            }
            else {
                return false;
            }
        }
    }

    public function enableConformance()
    {
        $this->conformanceEnable = true;

        return $this;
    }

    public function disableConformance()
    {
        $this->conformanceEnable = false;

        return $this;
    }

    public function getConformance()
    {
        return str_replace($this->source, $this->getBasename(), $this->conformance);
    }

    public function enablePolicy()
    {
        $this->policyEnable = true;

        return $this;
    }

    public function disablePolicy()
    {
        $this->policyEnable = false;

        return $this;
    }

    public function getPolicy()
    {
        $this->policy = str_replace($this->source, $this->getBasename(), $this->policy);

        if ($this->policyItem instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
            $this->policy = str_replace($this->policyItem->getRealPath(), $this->policyItem->getClientOriginalName(), $this->policy);
        }

        return $this->policy;
    }

    public function getPolicyOutputFormat()
    {
        if (preg_match('/<\\!DOCTYPE.*html/i', $this->policy)) {
            return 'html';
        }
        elseif (preg_match('/<\\?xml/i', $this->policy)) {
            return 'xml';
        }

       return 'txt';
    }

    public function enableTrace()
    {
        $this->traceEnable = true;

        return $this;
    }

    public function disableTrace()
    {
        $this->traceEnable = false;

        return $this;
    }

    public function setTraceFormat(array $format)
    {
        $this->traceFormat = $format;

        return $this;
    }

    public function addTraceFormat($format)
    {
        if (!in_array($format, $this->traceFormat)) {
            $this->traceFormat[] = $format;
        }

        return $this;
    }

    public function getTrace($format = null)
    {
        if (isset($this->trace['xml'])) {
            $this->trace['xml'] = str_replace($this->source, $this->getBasename(), $this->trace['xml']);
        }

        if (null == $format) {
            return $this->trace;
        }
        else {
            if (isset($this->trace[$format])) {
                return $this->trace[$format];
            }
            else {
                return false;
            }
        }
    }

    public function setPolicyItem($policyItem)
    {
        $this->policyItem = $policyItem;

        return $this;
    }

    public function setPolicyDisplayFile($policyDisplayFile)
    {
        $this->policyDisplayFile = $policyDisplayFile;

        return $this;
    }

    public function getFilename()
    {
        if ($this->clientSourceName) {
            return pathinfo($this->clientSourceName, PATHINFO_FILENAME);
        }
        else {
            return pathinfo($this->source, PATHINFO_FILENAME);
        }
    }

    protected function getBasename()
    {
        if ($this->clientSourceName) {
            return pathinfo($this->clientSourceName, PATHINFO_BASENAME);
        }
        else {
            return pathinfo($this->source, PATHINFO_BASENAME);
        }
    }
}
