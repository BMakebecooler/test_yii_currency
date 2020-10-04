<?php


namespace console\controllers;

use common\helpers\Strings;
use common\models\Currency;
use http\Exception\RuntimeException;
use SimpleXMLElement;
use yii\console\Controller;
use yii\helpers\Console;

class CurrencyController extends Controller
{
    const TOKEN = 'LOt6b84cnU3aSbb7Bib7P2jFCUCbQiSFsRNGL4XB';

    //@todo очень часто ссылка недоступна
    const SOURCE_PATH = 'http://www.cbr.ru/scripts/XML_daily.asp';
//    const SOURCE_PATH = '/var/www/yii2/myproject.com/storage/XML_daily.asp';


    /**
     * test api currency
     */
    public function actionTestApi()
    {
        $urls = [
            'http://api.yii2-starter-kit.localhost/v2/currencies/',
            'http://api.yii2-starter-kit.localhost/v2/currencies/?page=2',
            'http://api.yii2-starter-kit.localhost/v2/currency/1',
        ];

        $authorization = "Authorization: Bearer " . self::TOKEN;

        foreach ($urls as $url) {
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            var_dump(json_decode($result));
            curl_close($ch);
        }
    }

    /**
     * parse currency from remote source
     */
    public function actionParse()
    {

        $data = file_get_contents(self::SOURCE_PATH);

        if (!Strings::isXMLContentValid($data)) {
            throw new RuntimeException(strtr('Source file not contents valid xml :source', [':source' => self::SOURCE_PATH]));
        }

        try {
            $xml = new SimpleXMLElement($data);
        } catch (\RuntimeException $e) {
            echo $e->getMessage();
            return;
        }

        if (!$xml->Valute) {
            throw new RuntimeException(strtr('Currency data not found in file :source', [':source' => self::SOURCE_PATH]));
        }

        $currentTime = time();

        foreach ($xml->Valute as $currencyNode) {

            $systemId = null;
            foreach ($currencyNode->attributes() as $key => $value) {
                if ($key == 'ID') {
                    $systemId = $value;
                }
            }

            if (!$systemId) {
                continue;
            }

            $currencyModel = Currency::findOne(['char_code' => (string)$currencyNode->CharCode]);
            if (!$currencyModel) {
                $currencyModel = new Currency();
                $currencyModel->system_id = (string)$systemId;
                $currencyModel->char_code = (string)$currencyNode->CharCode;
                $currencyModel->num_code = (string)$currencyNode->NumCode;
                $currencyModel->nominal = (int)$currencyNode->Nominal;
                $currencyModel->name = (string)$currencyNode->Name;
                $currencyModel->rate = Strings::numberFormat($currencyNode->Value);
                $currencyModel->date_added = $currentTime;
                $currencyModel->date_updated = $currentTime;
            } else {
                $currencyModel->nominal = (int)$currencyNode->Nominal;
                $currencyModel->rate = Strings::numberFormat($currencyNode->Value);
                $currencyModel->date_updated = $currentTime;
            }

            if (!$currencyModel->save()) {
                throw new RuntimeException('currencyModel save or update error');
            }
        }

        Currency::deleteAll(['<', 'date_updated', $currentTime]);
        Console::output('Сurrency saved!');

    }
}