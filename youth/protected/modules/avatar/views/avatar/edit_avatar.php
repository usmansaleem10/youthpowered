<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">                        
                            <div class="row white ">                                
                                <div class="pipline_title">
                                    <h1><span class="fa fa fa-gear"></span> &nbsp;Profile</h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php
$this->title = Yum::t('Upload avatar');

$this->breadcrumbs = array(
		Yum::t('Profile') => array('//profile/profile/view'),
		Yum::t('Upload avatar'));

if(Yii::app()->user->isAdmin())
{
	echo '<h2>'; 
        echo Yum::t('Set Avatar for user ' . $model->username); 
        echo '</h2>';
}
else if($model->avatar) 
{
	echo '<h2>';
	echo Yum::t('Your Avatar image');
	echo '</h2>';
	echo $model->getAvatar();
}
else
	echo Yum::t('You do not have set an avatar image yet');

	echo '<br />';

if(Yum::module('avatar')->avatarMaxWidth != 0)
	echo '<p>' . Yum::t('The image should have at least 50px and a maximum of 200px in width and height. Supported filetypes are .jpg, .gif and .png') . '</p>';

	echo CHtml::errorSummary($model);
	echo CHtml::beginForm(array(
				'//avatar/avatar/editAvatar', 'id' => $model->id), 'POST', array(
	'enctype' => 'multipart/form-data'));
	echo '<div class="row">';
	echo CHtml::activeLabelEx($model, 'avatar');
	echo CHtml::activeFileField($model, 'avatar');
	echo CHtml::error($model, 'avatar');
	echo '</div>';
	if(Yum::module('avatar')->enableGravatar) 
        echo CHtml::submitButton(Yum::t('Upload avatar'), array('class' => 'btn btn-primary left_button'));
	echo '<br />'; 
	echo CHtml::link(Yum::t('Use Gravatar'), array(
				'//avatar/avatar/enableGravatar', 'id' => $model->id), array('class' => 'btn btn-primary left_button'));

	echo '&nbsp;';
	echo CHtml::link(Yum::t('Remove Avatar'), array(
				'//avatar/avatar/removeAvatar', 'id' => $model->id), array('class' => 'btn btn-primary left_button'));
        
	echo CHtml::endForm();  

?>

                                       </div>
                    </div>
               