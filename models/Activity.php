<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 13:38
 */

namespace app\models;

use yii\base\Model;


class Activity extends Model
{
    public $id;
    public $title;
    public $body;
    public $start_date;
    public $end_date;
    public $author_id;
    public $cycle;
    public $main;
    public $repeat_action;
    public $block_action;

    public function attributeLabels()
    {
        return [
            'id'=>'id',
            'title'=>'Название',
            'body'=>'Описание события',
            'start_date'=>'Дата начала',
            'end_date'=>'Дата окончания',
            'author_id'=>'id автора',
            'cycle'=>'повторяется',
            'main'=>'главное',
        ];

    }
    public function beforeSave($insert) {
        if(empty($this->end_date)){
            $this->end_date = $this->start_date;
        }
        return parent::beforeSave($insert);
    }

}