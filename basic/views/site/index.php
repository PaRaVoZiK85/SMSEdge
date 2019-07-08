<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'SMSEdge';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'dateFrom') ?>

                <?= $form->field($model, 'dateTo') ?>

                <?= $form->field($model, 'cntId') ?>

                <?= $form->field($model, 'usrId') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <?php if (null !== $dataProvider){ ?>
            <div class="row">
                <div class="col-lg-12">
                    <?php echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            [
                                'label' => 'Date',
                                'attribute' => 'date',
                                'format' => ['date', 'Y-m-d']
                            ],
                            [
                                'label' => 'Successfully sent',
                                'attribute' => 'success_count'
                            ],
                            [
                                'label' => 'Failed',
                                'attribute' => 'fail_count',
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
