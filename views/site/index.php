<?php
/** @var yii\web\View $this */

use yii\grid\ActionColumn;
use yii\grid\GridView;

$this->title = 'Banki shop';
?>
<div class="site-index">
    <div class="body-content">
        <h1>Все картинки</h1>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'name',
                'label' => 'Название',
                'format' => 'raw',
                'value' => function($data){
                    return "<h5><a href='view?id=$data->id'>$data->name</a></h5>";
                }
            ],
            [
                'attribute' => 'datetime',
                'label' => 'Дата',
                'format' => 'raw',
            ],
            [
                'attribute' => 'picture',
                'label' => 'Фото',
                'format' => 'raw',
                'value' => function($data){
                    return "<img width='200' src='/web/img/".$data->name."'>";
                }
            ],
        ],
    ]); ?>
</div>
