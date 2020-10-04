<?php


namespace api\controllers\v2;


use api\resource\v2\Currency;
use yii\data\ActiveDataProvider;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\rest\OptionsAction;
use yii\rest\ViewAction;
use yii\web\HttpException;

class CurrenciesController extends ActiveController
{
    private static $perPage = 20;

    public $modelClass = \api\resource\v2\Currency::class;

    /**
     * Method
     * @return array
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::class,
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
            'authenticator' => [
                'class' => CompositeAuth::class,
                'authMethods' => [
                    HttpBearerAuth::class,
                ],
            ]
            //@TODO: Для реализации постраничного кеша
//            [
//                'class' => PageCache::class,
//                'duration' => CacheHelper::CACHE_TIME_BRANDS_API,
//                'variations' => CacheHelper::getBrandsViaApiVariation(),
//                'enabled' => CacheHelper::isEnabled()
//            ],
        ];
    }

    /**
     *
     * Method
     * @return array
     */
    public function actions(): array
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => [$this, 'prepareDataProvider']
            ],
            'view' => [
                'class' => ViewAction::class,
                'modelClass' => $this->modelClass,
                'findModel' => [$this, 'findModel']
            ],
            'options' => [
                'class' => OptionsAction::class,
            ]
        ];
    }

    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws HttpException
     */
    public function findModel($id)
    {
        $model = \common\models\Currency::findOne(['id' => $id]);
        if (!$model) {
            throw new HttpException(404);
        }
        $model->rate = $model->getRate();
        return $model;
    }

    /**
     *
     * Method
     * @return ActiveDataProvider
     */
    public function prepareDataProvider(): ActiveDataProvider
    {
        $query = Currency::find()->addOrderBy(['name' => 'ASC']);

        $perPage = \Yii::$app->request->get('per_page');
        if (!$perPage) {
            $perPage = static::$perPage;
        }

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $perPage,
                'pageSizeParam' => 'per_page',
                'validatePage' => false,
            ]
        ]);

    }
}