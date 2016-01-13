<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'yum-message-form',
			'action' => array('//message/message/compose'),
			'enableAjaxValidation'=>true,
			)); ?>
<br>
<br>
<i>
<?php //echo Yum::requiredFieldNote(); 

	echo CHtml::hiddenField('YumMessage[to_user_id]', $to_user_id);
	echo CHtml::hiddenField('YumMessage[answered]', $answer_to);
	echo Yum::t('This message will be sent to {username}', array(
				'{username}' => YumUser::model()->findByPk($to_user_id)->username));
?>
</i>
<br>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model,'message'); ?>
    </div>
</div>

<br>
<?php echo CHtml::submitButton(Yum::t('Reply'), array('class' => 'form-control orange-btn')); ?>


<?php $this->endWidget(); ?>
