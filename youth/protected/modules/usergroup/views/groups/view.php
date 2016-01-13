
<?php 

//Yum::register('css/yum.css');
//Yum::register('css/jquery-ui.css');
//Yum::register('js/tooltip.min.js');
?>

                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                      <div class="memberlogin nobefore register">
                        <h3><span class="fa fa-group"></span> User Group Details</h3>

<?php
$this->breadcrumbs=array(
		Yum::t('Usergroups')=>array('index'),
		$model->title,);
?>
    
                        <table class="info-table"> 
                            <tr>
                                <td><h5><b>User Group Title:</b></td><td> <?php echo $model->title; ?></h5></td>
                            </tr>
                            <tr>
                                <td><h5><b>User Group Description:</b></td><td> <?php echo $model->description; ?></h5></td>
                            </tr>
                            
<?php

if($model->owner)
{
       // printf('', );
	printf('<tr><td><h5 class="my-custom-owner"><b>%s:</b></h5></td><td class="text-left">%s</td></tr>',Yum::t('Owner'),CHtml::link($model->owner->username, array(
					'//profile/profile/view', 'id' => $model->owner_id)));
echo "</table>";
printf('<h3 class="row-title"> %s </h3>', Yum::t('Participants'));


$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->getParticipantDataProvider(),
    'itemView'=>'_participant', 
)); 
}
?>
                        
    </div>        
    <div class="memberlogin nobefore register">
<?php
printf('<h3 class="row-title"><span class="fa fa-envelope-o"></span> %s </h3>', Yum::t('Messages'));


$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->getMessageDataProvider(),
    'itemView'=>'_message', 
)); 
?>
<?php echo CHtml::link(Yum::t('Write a message'), '', array(
			'onClick' => "$('#usergroup_message').toggle(500)",
                        'class'=>'btn orange-btn')); 

?>

<div style="display:none;" id="usergroup_message">
<h3> <?php //echo Yum::t('Write a message'); ?> </h3>
<?php $this->renderPartial('_message_form', array('group_id' => $model->id)); ?>
</div>
</div>
                      
                  </div>
             


