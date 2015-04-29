<?php

namespace AppBundle\Lib\MediaInfo;

abstract class MediaInfoOutputTrack
{
    protected $xml;
    protected $datas;

    public function __construct($xml)
    {
        $this->xml = $xml;
        $this->hydrate();
    }

    private function hydrate()
    {
        foreach($this->xml as $node => $value) {
            $this->set($node, $value->__tostring());
        }
    }

    private function set($field, $value)
    {
        $field = $this->getField($field);
        $method = 'set' . ucfirst($field);
        if (method_exists($this, $method)) {
            $this->$method($field, $value);
        }
        else {
            $this->datas[$field] = $value;
        }
    }

    public function get($field)
    {
        $field = $this->getField($field);
        if (isset($this->datas[$field])) {
            return $this->datas[$field];
        }

        return false;
    }

    /**
     * Get field name with alias
     *
     * @param string $field Field name in the XML
     *
     * @return string       Field name with alias
     */
    private function getField($field)
    {
        if (isset($this->aliasFields[$field])) {
            return $this->aliasFields[$field];
        }

        return $field;
    }
}
