<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 13:26
 */

namespace app\controllers;

use app\models\Activity;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionCreate()
    {
        $model = new Activity();
        return $this->render('create', ['model'=>$model]);
    }
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionUpdate($id)
    {
        $model = new Activity();
        $model->id = $id;
        return $this->render('update', ['model'=>$model]);
    }
    public function actionView() {
        $model = new Activity();
        return $this->render('view', ['model'=>$model]);
    }
}

//http://yii2basic.geekbrains:81/user/profile