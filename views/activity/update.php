<?php
/* @var $this yii/web/View */
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<h1>Activity/create</h1>

<?php $form = ActiveForm::begin();
$form->action = Url::to(['activity/submit']);
if (!empty($id) || (isset($id))) : "ID: " . $id;
endif;
?>

<?php
$form->field($model, 'title')->label('Название события');
$form->field($model, 'startDay')->label('Дата начала');
$form->field($model, 'endDay')->label('Дата конца');
$form->field($model, 'body')->textarea(['rows'=> 4])->label('Описание события');
$form->field($model, 'cycle')->checkbox(['Повторение события']);
$form->field($model, 'main')->checkbox(['Главное события']);
if (!empty($id) || (isset($id))) : Html::hiddenInput('id', $id)
    else:
        Html::hiddenInput('dayId', $dayId);
    endif;
Html::submitButton('Отправить', ['class' => 'btn-success']);
ActiveForm::end(); ?>

