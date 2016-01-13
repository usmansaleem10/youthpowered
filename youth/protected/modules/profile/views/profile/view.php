                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">                        
                            <div class="row white ">                                
                                <div class="pipline_title">
                                    <h1><span class="fa fa fa-gear"></span> &nbsp;Profile</h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php
if(!$profile = $model->profile)
	$profile = new YumProfile;
$this->pageTitle = Yum::t('Profile');
$this->title = CHtml::activeLabel($model,'username');
$this->breadcrumbs = array(Yum::t('Profile'), $model->username);
Yum::renderFlash();
?>
                                    <div class="row">
                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                            <div class="profile_img col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                <?php echo $model->getAvatar(); ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                            <?php $this->renderPartial(Yum::module('profile')->publicFieldsView, array(
                                                'profile' => $model->profile)); 
                                            ?>
                                        </div>
                                    </div>
                                    

<?php
// This module will be on 

if(Yum::hasModule('friendship'))
{
    $this->renderPartial('application.modules.friendship.views.friendship.friends', array(
			'model' => $model));
}

?>
                                    <?php
if(!Yii::app()->user->isGuest && Yii::app()->user->id == $model->id) {
  echo CHtml::link(Yum::t('Edit profile'), array('//profile/profile/update'), array('class' => 'btn btn-primary left_button'));
  if(Yum::hasModule('avatar')) {
    echo '&nbsp;';
    echo CHtml::link(Yum::t('Upload avatar image'), array('//avatar/avatar/editAvatar'), array('class' => 'btn btn-primary right_button'));
  }
}
?>
                       
<?php
if(@Yum::module('message')->messageSystem != 0)
$this->renderPartial('/message/write_a_message', array(
			'model' => $model));


?>
 
<?php
if(Yum::module('profile')->enableProfileComments
		&& Yii::app()->controller->action->id != 'update'
		&& isset($model->profile))
	$this->renderPartial(Yum::module('profile')->profileCommentIndexView, array(
			 'model' => $model->profile));

?>
                                
   </div>
                    </div>
                
     