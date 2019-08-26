<?php

namespace app\models;
use yii\base\Model;
class Day extends Model
{
    public $id;
    public $title;
    public $weekday;
    public $working;
    public $weekend;
    public $activity_id;
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'title' => 'Дата',
            'weekday' => 'День недели',
            'working' => 'Рабочий день',
            'weekend' => 'Выходной',
            'activity_id' => 'id событий',
        ];
    }
    public function getActivity() {}
}