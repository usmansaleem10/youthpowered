<?php
$this->title = $model->title;
$this->breadcrumbs=array(Yum::t('Messages')=>array('index'),$model->title);
?>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
<div class="white">

<h4> <?php echo Yum::t('Message from') .  ' <em>' . $model->from_user->username . '</em>';

echo ': ' . $model->title; ?> 
</h4>

<?php echo $model->message; ?>




<hr />
<?php
echo CHtml::link(Yum::t('Back to inbox'), array(
			'//message/message/index')) . '<br />';

if(Yii::app()->user->id != $model->from_user_id) 
{
    
    echo CHtml::link(Yum::t('Reply to message'), '', array(
				'onclick' => "$('.reply').toggle(500)"));

	echo '<div class="reply" style="display: none;">';
	$reply = new YumMessage;

	if(substr($model->title, 0, 3) != 'Re:')
		$reply->title = 'Re: ' . $model->title;
	else
		$reply->title = $model->title;

	$this->renderPartial('reply', array(
				'to_user_id' => $model->from_user_id,
				'answer_to' => $model->id,
				'model' => $reply));
	echo '</div>';
}
?>

 </div>
    </div>