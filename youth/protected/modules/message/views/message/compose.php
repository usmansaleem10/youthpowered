 
                    
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">                        
                        <div class=" white ">                                
                            <div class="pipline_title">
                                <h1><span class="fa fa fa-envelope-o"></span> Compose new message</h1>
                            </div>
                            
                    
                    
<?php 
if(!$this->title) 
	$this->title = Yum::t('Compose new message'); 
if($this->breadcrumbs == array())
	$this->breadcrumbs = array(Yum::t('Messages'), Yum::t('Compose'));
?>
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'yum-message-form',
			'action' => array('//message/message/compose'),
			'enableAjaxValidation'=>true,
			'enableClientValidation'=>true,
			)); ?>

<i>
<?php // echo Yum::requiredFieldNote(); 

echo $form->errorSummary($model); 

echo CHtml::hiddenField('YumMessage[answered]', $answer_to);
if($to_user_id) {
	echo CHtml::hiddenField('YumMessage[to_user_id]', $to_user_id);
	echo Yum::t('This message will be sent to {username}', array(
				'{username}' => YumUser::model()->findByPk($to_user_id)->username));
} else {
	echo $form->label($model, 'to_user_id');
	echo $form->dropDownList($model, 'to_user_id', 
			CHtml::listData(Yii::app()->user->data()->getFriends(), 'id', 'username'));
	echo '<div class="hint">'.Yum::t('Only your friends are shown here').'</div>';

}
?>
</i>
<br>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45, 'class'=>'form-control', 'placeholder'=>'Message Title')); ?>
<?php echo $form->error($model,'title'); ?>
</div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Type your message here ...')); ?>
<?php echo $form->error($model,'message'); ?>
        </div>
</div>

<br>
<?php echo CHtml::submitButton($model->isNewRecord 
			? Yum::t('Send') 
			: Yum::t('Save'), array('class'=>'form-control orange-btn'));
?>


<?php $this->endWidget(); ?>

                               
                        </div>
                                
                                
                    
                      </div>
                    </div>
                