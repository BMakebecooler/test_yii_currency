<?php

namespace common\helpers;

use DOMDocument;

class Strings
{
    public static function isXMLContentValid($xmlContent, $version = '1.0', $encoding = 'utf-8')
    {
        if (trim($xmlContent) == '') {
            return false;
        }

        libxml_use_internal_errors(true);

        $doc = new DOMDocument($version, $encoding);
        $doc->loadXML($xmlContent);

        $errors = libxml_get_errors();
        libxml_clear_errors();

        return empty($errors);
    }

    public static function numberFormat($numString)
    {
        $numString = str_replace(',', '.', $numString);
        return (float)$numString;
    }
}