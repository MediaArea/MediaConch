<?php

namespace AppBundle\Lib\XslPolicy;

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
                'is_true' => 'Is true',
                );
    }

    public static function getTrackTypes()
    {
        return array(
                'General' => 'General',
                'Video' => 'Video',
                'Audio' => 'Audio',
                );
    }

    public static function getFields($type, $xslField)
    {
        switch ($type) {
            case 'General':
                $fields = array(
                    'ID' => 'ID',
                    'UniqueID' => 'UniqueID',
                    'CompleteName' => 'CompleteName',
                    'CompleteName_Last' => 'CompleteName_Last',
                    'Format' => 'Format',
                    'Format_Commercial_IfAny' => 'Format_Commercial_IfAny',
                    'Format_Version' => 'Format_Version',
                    'Format_Profile' => 'Format_Profile',
                    'Format_Compression' => 'Format_Compression',
                    'Format_Settings' => 'Format_Settings',
                    'CodecID' => 'CodecID',
                    'Interleaved' => 'Interleaved',
                    'FileSize' => 'FileSize',
                    'Duration' => 'Duration',
                    'Duration_Start' => 'Duration_Start',
                    'Duration_End' => 'Duration_End',
                    'OverallBitRate_Mode' => 'OverallBitRate_Mode',
                    'OverallBitRate' => 'OverallBitRate',
                    'OverallBitRate_Minimum' => 'OverallBitRate_Minimum',
                    'OverallBitRate_Nominal' => 'OverallBitRate_Nominal',
                    'OverallBitRate_Maximum' => 'OverallBitRate_Maximum',
                    'FrameRate' => 'FrameRate',
                    'FrameCount' => 'FrameCount',
                    );
            break;

            case 'Video':
                $fields = array(
                    'ID' => 'ID',
                    'UniqueID' => 'UniqueID',
                    'Format' => 'Format',
                    'Format_Commercial_IfAny' => 'Format_Commercial_IfAny',
                    'Format_Version' => 'Format_Version',
                    'Format_Profile' => 'Format_Profile',
                    'MuxingMode' => 'MuxingMode',
                    'CodecID' => 'CodecID',
                    'Duration' => 'Duration',
                    'BitRate_Mode' => 'BitRate_Mode',
                    'BitRate' => 'BitRate',
                    'Width' => 'Width',
                    'Height' => 'Height',
                    'PixelAspectRatio' => 'PixelAspectRatio',
                    'DisplayAspectRatio' => 'DisplayAspectRatio',
                    'FrameRate_Mode' => 'FrameRate_Mode',
                    'FrameRate' => 'FrameRate',
                    'FrameCount' => 'FrameCount',
                    'BitDepth' => 'BitDepth',
                    'ScanType' => 'ScanType',
                    'ScanOrder' => 'ScanOrder',
                    'Compression_Mode' => 'Compression_Mode',
                    'TimeStamp_FirstFrame' => 'TimeStamp_FirstFrame',
                    'StreamSize' => 'StreamSize',
                    );
            break;

            case 'Audio':
                $fields = array(
                    'ID' => 'ID',
                    'UniqueID' => 'UniqueID',
                    'Format' => 'Format',
                    'MuxingMode' => 'MuxingMode',
                    'CodecID' => 'CodecID',
                    'Duration' => 'Duration',
                    'BitRate_Mode' => 'BitRate_Mode',
                    'BitRate' => 'BitRate',
                    'Channel(s)' => 'Channel(s)',
                    'ChannelPositions' => 'ChannelPositions',
                    'FrameRate' => 'FrameRate',
                    'BitDepth' => 'BitDepth',
                    'Compression_Mode' => 'Compression_Mode',
                    'StreamSize' => 'StreamSize',
                    'Language' => 'Language',
                    );
            break;

            default:
                $fields = array();
        }

        if (!in_array($xslField, $fields)) {
            $fields[$xslField] = $xslField;
        }

        return $fields;
    }
}
