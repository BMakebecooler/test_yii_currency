<?php


namespace common\models;


class Currency extends generated\models\Currency
{
    public function getRate()
    {
        //@todo использовать nominal для конвертации
        return 'for ' . $this->nominal . ' ' . $this->char_code . ' ' . $this->rate . ' RUB';
    }

    public function getName()
    {
        //@todo использовать nominal для преобразования
        return $this->name;
    }
}