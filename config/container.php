<?php

\Yii::$container->set('yii\grid\GridView', [
    'tableOptions' => [
        'class' => 'table table-hover',
    ],
]);

\Yii::$container->set('yii\widgets\DetailView', [
    'options' => [
        'class' => 'table table-hover',
    ],
]);
