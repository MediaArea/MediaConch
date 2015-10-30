<?php

namespace AppBundle\Lib\XslPolicy;

use AppBundle\Lib\MediaConch\MediaConchTrackTypes;
use AppBundle\Lib\MediaConch\MediaConchTrackTypeFields;

class XslPolicyFormFields
{
    public static function getValidators()
    {
        return array(
                'is_equal' => 'Is equal (==)',
                'is_not_equal' => 'Is not equal (!=)',
                'is_less_than' => 'Is less than (<)',
                'is_less_or_equal_than' => 'Is less or equal than (<=)',
                'is_greater_than' => 'Is greater than (>)',
                'is_greater_or_equal_than' => 'Is greater or equal than (>=)',
                'exists' => 'Exists',
                'does_not_exist' => 'Does not exist',
                'contains_string' => 'Contains string',
                );
    }

    public static function getTrackTypes()
    {
        $mcTrackTypes = new MediaConchTrackTypes();
        $mcTrackTypes->run();
        $mcTrackTypes = explode(',', $mcTrackTypes->getOutput());
        $trackTypes = array();

        foreach ($mcTrackTypes as $type) {
            $trackTypes[$type] = $type;
        }

        return $trackTypes;
    }

    public static function getFields($trackType, $xslField = null)
    {
        $fields = array();

        if ('' != $trackType) {
            $mcFields = new MediaConchTrackTypeFields();
            $mcFields->run($trackType);
            $mcFields = explode(',', $mcFields->getOutput());

            foreach ($mcFields as $field) {
                $fields[$field] = $field;
            }
        }

        if ($xslField != null) {
            if (!in_array($xslField, $fields)) {
                $fields[$xslField] = $xslField;
            }
        }

        return $fields;
    }
}
