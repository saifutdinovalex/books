<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $name
 * @property int $user_add
 * @property int $date_create
 * @property int $active
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name','trim'],
            [['name'], 'string'],
            [['user_add', 'date_create', 'active'], 'integer'],
            ['user_add','default','value'=>function($model, $attribute){
                return Yii::$app->user->identity->id;
            }],
            ['date_create','default','value'=>function($model, $attribute){
                return time();
            }],
            ['active','default','value'=>1]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'user_add' => 'User Add',
            'date_create' => 'Date Create',
            'active' => 'Active',
        ];
    }
}
