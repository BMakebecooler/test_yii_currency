<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "article_attachment".
 *
 * @property int $id
 * @property int $article_id
 * @property string $path
 * @property string|null $base_url
 * @property string|null $type
 * @property int|null $size
 * @property string|null $name
 * @property int|null $created_at
 * @property int|null $order
 *
 * @property Article $article
 */
class ArticleAttachment extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'path'], 'required'],
            [['article_id', 'size', 'created_at', 'order'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'path' => 'Path',
            'base_url' => 'Base Url',
            'type' => 'Type',
            'size' => 'Size',
            'name' => 'Name',
            'created_at' => 'Created At',
            'order' => 'Order',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\ArticleQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\ArticleAttachmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\ArticleAttachmentQuery(get_called_class());
    }
}
