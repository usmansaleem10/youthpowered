<section class="container-fluid inner">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 left">
                      <div class="memberlogin nobefore register">
                        <h3 class="text-center">SignUp / Registration</h3>
                        
<?php $this->breadcrumbs = array(Yum::t('Registration')); ?>

                     
<?php //echo "<pre>"; print_r($_POST); exit; ?>
                       
<?php $activeform = $this->beginWidget('CActiveForm', array(
  'id'=>'registration-form',
  'enableAjaxValidation'=>true,
  'enableClientValidation'=>true,
  'focus'=>array($form,'username'),
));
?>

<?php //echo Yum::requiredFieldNote(); ?>
<?php echo CHtml::errorSummary(array($form, $profile)); ?>

<?php if(!Yum::module('registration')->registration_by_email) { ?>
<?php
echo $activeform->textField($form,'username', $htmlOptions=array('class'=>'form-control','placeholder'=>'USER NAME'));
?> 
<?php } ?>
<?php
echo $activeform->textField($profile,'email',$htmlOptions=array('class'=>'form-control','placeholder'=>'EMAIL ID'));
?> 
<?php echo $activeform->dropDownList($form, 'type_id', CHtml::listData($usertypes->findAll(), 'usertype_id', 'title'), array('class' => 'form-control'));
?>
      
  <?php
echo $activeform->textField($profile,'firstname',$htmlOptions=array('class'=>'form-control','placeholder'=>'FIRST NAME'));
?><?php
echo $activeform->textField($profile,'lastname',$htmlOptions=array('class'=>'form-control','placeholder'=>'LAST NAME'));
?>
<?php echo $activeform->passwordField($form,'password',$htmlOptions=array('class'=>'form-control','placeholder'=>'PASSWORD')); ?>
<?php echo $activeform->passwordField($form,'verifyPassword',$htmlOptions=array('class'=>'form-control','placeholder'=>'VERIFY PASSWORD')); 
?>
                  
                        
                        
                        
<?php if(extension_loaded('gd')
&& !Yum::module()->debug
&& Yum::module('registration')->enableCaptcha): ?>

    <?php //echo CHtml::activeLabelEx($form,'verifyCode'); ?>
    <?php $this->widget('CCaptcha'); ?>
    <?php echo CHtml::activeTextField($form,'verifyCode',$htmlOptions=array('class'=>'form-control','placeholder'=>'Verify Code')); ?>
    <p class="hint">
    <?php echo Yum::t('Please enter the letters as they are shown in the image above.'); ?>
    <br/><?php echo Yum::t('Letters are not case-sensitive.'); ?></p>
  <?php endif; ?>
    <?php echo CHtml::submitButton(Yum::t('Registration'), array('class'=>'form-control')); ?>
<?php $this->endWidget(); ?>
       </div>
                  </div>
                  
              </div>
          </div>
      </section>
