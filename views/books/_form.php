<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author_id')->dropdownList(\app\models\Author::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'Select Category']) ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'genre')->dropdownList(\app\models\Genre::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'Select Category']) ?>

    <?= $form->field($model, 'number_page')->textInput() ?>

    <?= $form->field($model, 'picture')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'active')->checkboxList(['Активировать'])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
