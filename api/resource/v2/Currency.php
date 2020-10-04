<?php


namespace api\resource\v2;


class Currency extends \common\models\Currency
{
    /**
     * Method
     * @return array
     */
    public function fields(): array
    {
        return [
            'id' => function () {
                return $this->id;
            },
            'name' => function () {
                return $this->getName();
            },
            'rate' => function () {
                return $this->getRate();
            },
        ];
    }
}