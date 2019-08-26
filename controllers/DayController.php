<?php

namespace app\controllers;
use app\models\Day;
use yii\web\Controller;
class DayController extends Controller
{
    public function actionView()
    {
        $model = new Day();
        $model->id = 60;
        $model->title = date("m.d.Y");
        $model->weekday = date("w");
        $model->working = true;
        $model->weekend = false;
        $model->activity_id = [1, 5];
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}