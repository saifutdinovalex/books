<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Books;

class BooksSearch extends Books
{
    public function rules()
    {
        
        return [
            [['name','genreData.name','authorData.name'], 'string'],
            ['year','integer'],
           
        ];
    }

    public function attributes()
    {
        
        return array_merge(parent::attributes(), ['authorData.name'],['genreData.name']);
    }


    public function scenarios()
    {
        
        return Model::scenarios();
    }

    public function search($params)
    {
    $query = Books::find()->joinWith(['genreData','authorData']);

      $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        $dataProvider->sort = [
            'attributes'=> [
                'authorData.name'=>
                [
                    'asc' => ['authorData.name' => SORT_ASC],
                    'desc' => ['authorData.name' => SORT_DESC],
                ],
                'genreData.name'=>[
                        'asc' => ['genreData.name' => SORT_ASC],
                        'desc' => ['genreData.name' => SORT_DESC],
                ]
            ]
            
        ];

        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        
        $query->andFilterWhere(['year' => $this->year]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'genreData.name', $this->getAttribute('genreData.name')]);
        $query->andFilterWhere(['like', 'authorData.name', $this->getAttribute('authorData.name')]);
              

        return $dataProvider;
    }
}
