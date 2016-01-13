<div class="guestbook">
    <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"> 
            <div class="guestbook-avatar profile_img">
		<?php echo $data->user->getAvatar(true); ?>
            </div>
            <div class="guestbook-footer">
			<?php
				// the owner of the profile as well as the owner of the comment can remove
				if($data->user_id == Yii::app()->user->id
						|| $data->profile_id == Yii::app()->user->id) {
					echo CHtml::Button(Yum::t('Remove comment'), array(
								'confirm' => Yum::t('Are you sure to remove this comment from your profile?'),
								'submit' => array( '//profile/comments/delete', 'id' => $data->id),
                                                                'class' => ' btn btn-primary right_button small-btn'));
				}		
			?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">   
            <div class="guestbook-comment">
		<?php echo CHtml::encode($data->comment); ?>
            </div>
            <div class="guestbook-header">
			<strong><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</strong>
			<?php echo CHtml::link(CHtml::encode($data->user->username), array(
						'//profile/profile/view', 'id' => $data->user_id)); ?>
			|
			<strong><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</strong>
			<?php $locale = CLocale::getInstance(Yii::app()->language);
			echo $locale->getDateFormatter()->formatDateTime($data->createtime, 'medium', 'medium'); ?>
            </div>
        </div>
    </div>
	
</div>
