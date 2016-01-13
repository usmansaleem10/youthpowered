     <section class="container-fluid inner">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 left">
                      <div class="memberlogin nobefore register">
                          <h3 class="text-center">Recovery Account</h3>
<?php 
$this->pageTitle = Yum::t('Password recovery');

$this->breadcrumbs=array(
	Yum::t('Login') => Yum::module()->loginUrl,
	Yum::t('Restore'));
?>
<?php if(Yum::hasFlash()) {
echo '<div class="alert alert-success">';
echo Yum::getFlash(); 
echo '</div>';
} else {
    //echo '<h2>'.Yum::t('Password recovery').'</h2>';
?>
<?php echo CHtml::beginForm('', 'post', array('class'=>'form-group')); ?>
	<?php echo CHtml::errorSummary($form); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email', $htmlOptions=array('class'=>'form-control','placeholder'=>'EMAIL')); ?>
		<?php echo CHtml::error($form,'login_or_email'); ?>
		<?php echo CHtml::submitButton(Yum::t('Restore'), array('class'=>'form-control')); ?>
<?php echo CHtml::endForm(); ?>

<?php } ?>
</div>
                  </div>
              </div>
          </div>
      </section>