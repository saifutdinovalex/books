<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property int $user_add
 * @property int $date_create
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            ['name','trim'],
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
            'active' => 'Active',
            'user_add' => 'User Add',
            'date_create' => 'Date Create',
        ];
    }
}
