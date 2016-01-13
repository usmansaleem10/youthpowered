<?php echo CHtml::activePasswordField($form,'password',$htmlOptions=array('class'=>'form-control','placeholder'=>'NEW PASSWORD')); ?>

<?php if(Yum::module()->displayPasswordStrength) { ?>
<div id="password-strength"></div>
<?php } ?>

<?php echo CHtml::activePasswordField($form,'verifyPassword',$htmlOptions=array('class'=>'form-control','placeholder'=>'CONFIRM PASSWORD')); ?>