
                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                      <div class="memberlogin nobefore register">
                          <h3 class="text-center">Change Password</h3>

<?php 
$this->pageTitle = Yum::t("change password");
//echo '<h1>'. Yum::t('change password') .'</h1>';

$this->breadcrumbs = array(
	Yum::t("Change password"));

if(isset($expired) && $expired)
	$this->renderPartial('password_expired');
?>


<?php echo CHtml::beginForm('', 'post', array('class'=>'form-group')); ?>
	<?php //echo Yum::requiredFieldNote(); ?>
	<?php echo CHtml::errorSummary($form); ?>

	<?php if(!Yii::app()->user->isGuest) 
        {
           echo CHtml::activePasswordField($form,'currentPassword',$htmlOptions=array('class'=>'form-control','placeholder'=>'CURRENT PASSWORD'));
	} 
        ?>

<?php $this->renderPartial(
		'user.views.user.passwordfields', array(
			'form'=>$form)); ?>

	<?php echo CHtml::submitButton(Yum::t("Change Password"), array('class' => 'form-control')); ?>

<?php echo CHtml::endForm(); ?>

                          </div>
                  </div>
              
