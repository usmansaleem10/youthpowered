<?php if(Yum::module('profile')->enableProfileComments ) { ?>
	<div class="leave_comment row">                                
                                <h4><span class="fa fa-commenting-o"></span> Leave a Comment</h4>  

<?php 
$dataProvider = new CActiveDataProvider('YumProfileComment', array(
			'criteria'=>array(
				'condition'=>'profile_id = :profile_id',
				'params' => array(':profile_id' => $model->id),
				'order'=>'createtime DESC')
			)
		);

$this->renderPartial(Yum::module('profile')->profileCommentCreateView, array(
			'comment' => new YumProfileComment,
			'profile' => $model));
?>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>Yum::module('profile')->profileCommentView,
			));  
}
?>
        