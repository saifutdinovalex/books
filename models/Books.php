<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property int $author_id
 * @property string $name
 * @property int $year
 * @property int $genre
 * @property int $number_page
 * @property string $picture
 * @property int $active
 * @property int $user_add
 * @property int $date_create
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'name', 'year', 'genre', 'number_page', 'picture'], 'required'],
            [['author_id', 'year', 'genre', 'number_page'], 'integer'],
            [['name', 'picture'], 'string'],
            ['name','trim'],
             ['user_add','default','value'=>function($model, $attribute){
                if(!Yii::$app->user->isGuest){
                    return Yii::$app->user->identity->id;    
                }else{
                    return 0;
                }
                
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
            'author_id' => 'Author ID',
            'name' => 'Name',
            'year' => 'Year',
            'genre' => 'Genre',
            'number_page' => 'Number Page',
            'picture' => 'Picture',
            'active' => 'Active',
            'user_add' => 'User Add',
            'date_create' => 'Date Create',
        ];
    }

    public function getGenreData(){
        return $this->hasOne(Genre::className(),['id'=>'genre']);
    }

    public function getAuthorData(){
        return $this->hasOne(Author::className(),['id'=>'author_id']);
    }

    public function getImageUrl(){
         return Url::to('@web/path/to/logo/' . $this->picture, true);
    }
}
