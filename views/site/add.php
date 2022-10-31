<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="formlog">
    <h3 class="zaglog">Добавить картинки</h3><br>
    <?php $form = ActiveForm::begin(); ?>
    <div class="login">

        <?= $form->field($model, 'img[]')->fileInput(['multiple' => true])->label('Фото') ?><br>

    </div>
    <div>
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>