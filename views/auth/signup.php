<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\form\SignUpForm */
/* @var $form ActiveForm */
?>
<div class="auth-signup">
    <div class="col-md-6 col-md-offset-3 order_form">
        <div class="row">
            <h2 class="title text-center"><?= 'Регистрация' ?></h2>
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- auth-signup -->
