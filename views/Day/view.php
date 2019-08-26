<?php

/** @var \app\models\Day $model */
var_dump($model->attributes);
foreach ($model as $attribute => $value){
    if(!is_array($value))
        echo $model->getAttributeLabel($attribute). ": " .$value. "</br>";
    else
        echo $model->getAttributeLabel($attribute). ": " .implode(', ', $value). "</br>";
};
