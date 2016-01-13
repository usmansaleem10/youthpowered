<?php echo Yum::t('Fields with <span class="required">*</span> are required.');?>

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'usergroup-form',
	'enableAjaxValidation'=>true,
	)); 
	echo $form->errorSummary($model);
?>

<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'USER GROUP TITLE')); ?>
<?php echo $form->error($model,'title'); ?>

<?php echo $form->labelEx($model,'description'); ?>
<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class'=>'form-control','placeholder'=>'USER GROUP DESCRIPTION')); ?>
<?php echo $form->error($model,'description'); ?>

<?php
echo CHtml::Button(Yum::t('Cancel'), array('class'=>'form-control'),  array(
			'submit' => array('groups/index')), array('class'=>'form-control')); 
echo CHtml::submitButton($model->isNewRecord ? Yum::t('Create') : Yum::t('Save'), array('class'=>'form-control')); 
$this->endWidget(); ?>

