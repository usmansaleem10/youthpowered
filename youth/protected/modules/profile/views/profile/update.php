                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 white mainset">
                        <div>
                            <h4 class="pink_title"><span class="fa fa-user"></span> Edit Profile</h4>
                            <div class=" edit_profile">
<?php 
$this->pageTitle = Yum::t( "Profile");
$this->breadcrumbs=array(
		Yum::t('Edit profile'));
$this->title = Yum::t('Edit profile');
?>                        
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'profile-form',
)); ?>

<?php echo '<ul class="list-group">'; ?>
    <div class="profile_img">
<?php echo $user->getAvatar(); ?>
</div>
<?php
if(Yum::hasModule('avatar')) {
    echo '&nbsp;';
    echo CHtml::link(Yum::t('Edit avatar image'), array('//avatar/avatar/editAvatar'), array('class' => 'btn btn-primary left_button'));
  }
?>                                
                                
                                
<?php echo $form->errorSummary(array($user, $profile)); ?>

<?php if(Yum::module()->loginType & UserModule::LOGIN_BY_USERNAME) { ?>

<?php echo '<li>'.$form->textField($user,'username',array(
			'size'=>20,'maxlength'=>20, 'class'=>'form-control')).'</li>'; ?>
<?php echo $form->error($user,'username'); ?>

<?php } ?>

<?php if(isset($profile) && is_object($profile))
	$this->renderPartial('/profile/_form', array('profile' => $profile, 'form'=>$form)); ?>
	
	<?php
//	if(Yum::module('profile')->enablePrivacySetting)
//    echo CHtml::button(Yum::t('Privacy settings'), array(
//      'submit' => array('/profile/privacy/update'),
//      'class' => 'btn')); ?>

	<?php
//		if(Yum::hasModule('avatar'))
//			echo CHtml::button(Yum::t('Upload avatar Image'), array(
//				'submit' => array('/avatar/avatar/editAvatar'), 'class'=>'btn')); ?>

	<?php echo CHtml::submitButton($user->isNewRecord 
			? Yum::t('Create my profile') 
			: Yum::t('Save profile changes'), array('class'=>'form-control black_button')); ?>
	<?php 
        
        echo '</ul>';
        $this->endWidget(); ?>
                         </div>
                        </div>
                        <div>
                        </div>
                        
                    </div>
              