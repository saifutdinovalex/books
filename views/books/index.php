<?php
use yii\grid\GridView;

use yii\helpers\Html;

if(!\Yii::$app->user->isGuest){
       echo Html::beginTag('p');

            
            echo Html::a('Create', ['create'], [
                'class' => 'btn btn-success',
            ]);
        echo Html::endTag('p');

 }
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'=>$filterModel,
    'columns' => [
    	['class' => 'yii\grid\SerialColumn'],
    	[
            'attribute' => 'name',
            'format' => 'text'
        ],
        
        [
        	'attribute'=>'authorData.name',
        	'label'=>'Author Name',
        	
    	],
        [
        	'attribute'=>'genreData.name',
    		'label'=>'Genre name',
    		
    	],
        'year',
        
        [
        	'attribute'=>'picture',
        	'format' => 'image',
			'value'=>function($filterModel) { return $filterModel->imageurl; },
		],

    	['class' => 'yii\grid\ActionColumn',
	    	'visibleButtons'=>[
	    		'update' => !\Yii::$app->user->isGuest,
	    		'delete' => !\Yii::$app->user->isGuest,
	    	],
    	],
    ]
]);

?>
