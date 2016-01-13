<?php
//print_r($model); exit;
$form = new CForm(array(
  'elements'=>array(
    'username'=>array(
      'type'=>'text',
      'maxlength'=>32,
    ),
    'password'=>array(
      'type'=>'password',
      'maxlength'=>32,
    ),
    'rememberMe'=>array(
      'type'=>'checkbox',
    )
  ),

  'buttons'=>array(
    'login'=>array(
      'type'=>'submit',
      'label'=>'Login',
    ),
  ),
), $model);

?>
<section class="container-fluid inner">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 ">
                      <div class="memberlogin">
                          <h3 class="text-center">Member Login<?php $this->pageTitle = Yum::t('Member Login');?></h3>

<?php

$this->title = Yum::t('Login');
$this->breadcrumbs=array(Yum::t('Login'));

echo CHtml::beginForm(array('//user/auth/login'));
if(isset($_GET['action']))
  echo CHtml::hiddenField('returnUrl', urldecode($_GET['action']));
?>
<?php if($model->hasErrors()) { ?>
<div class="alert">
	<?php echo CHtml::errorSummary($model); ?>
</div>
<?php } ?>
<?php
  if(Yum::module()->loginType & UserModule::LOGIN_BY_USERNAME)
if(Yum::module()->loginType & UserModule::LOGIN_BY_EMAIL)
  //printf ('<label for="YumUserLogin_username">%s <span class="required">*</span></label>', Yum::t('E-Mail address')); 
?>   
    <?php echo CHtml::activeTextField($model,'username', $htmlOptions=array('class'=>'form-control','placeholder'=>'USERNAME')) ?>
    <?php echo CHtml::activePasswordField($model,'password',$htmlOptions=array('class'=>'form-control','placeholder'=>'PASSWORD')); ?>
    
                          
                          
<?php if ($model->scenario == 'captcha' && CCaptcha::checkRequirements()) { ?>
    <?php echo CHtml::activeLabel($model, 'verifyCode'); ?>
    <?php $this->widget('CCaptcha'); ?>
    <?php echo CHtml::activeTextField($model, 'verifyCode'); ?>

    <?php echo CHtml::error($model, 'verifyCode'); ?>
<?php } ?>
     
<?php if(Yum::module()->loginType & UserModule::LOGIN_BY_HYBRIDAUTH 
&& Yum::module()->hybridAuthProviders) { ?>
  <div class="span6 hybridauth">
<?php echo Yum::t('You can also login by') . ': <br />'; 
foreach(Yum::module()->hybridAuthProviders as $provider) 
  echo CHtml::link(
    CHtml::image(
      Yii::app()->getAssetManager()->publish(
        Yii::getPathOfAlias(
          'user.assets.images').'/'.strtolower($provider).'.png'),
      $provider) . $provider, $this->createUrl(
        '//user/auth/login', array('hybridauth' => $provider)), array(
          'class' => 'social')) . '<br />'; 
?>


<?php } ?>                          
                          
                          
        
    <?php echo CHtml::submitButton(Yum::t('Login'), array('class' => 'form-control')); 
     
if(Yum::hasModule('registration') && Yum::module('registration')->enableRegistration)
  if(Yum::hasModule('registration') 
  && Yum::module('registration')->enableRecovery) 
  echo CHtml::link(Yum::t("Forgot Password ?"),
    Yum::module('registration')->recoveryUrl);  
  echo CHtml::link(Yum::t("Register"),
    Yum::module('registration')->registrationUrl);
if(Yum::hasModule('registration') 
  && Yum::module('registration')->enableRegistration
  && Yum::module('registration')->enableRecovery)

?>
<?php echo CHtml::endForm(); ?>
    </div>
     </div>
                  <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 ">
                      <div class="news">
                          <h5>Subscribe to our</h5>
                          <h2>Newsletter</h2>
                          <p>To be updated with all the latest trends and products</p>
                            <?php echo CHtml::beginForm(array('//newsletter/newsletter/subscribeToNewsLetter'),$method='post',$htmlOptions=array('class'=>'form-group')); ?>  
                          <input class="form-control" name="email" type="text" required="" placeholder="E-mail">
                          <input class="form-control" name="zipcode" type="text" required="" placeholder="Zip Code">
                              <input class="form-control" type="submit" value="Join">                              
                          <?php echo CHtml::endForm(); ?>      

                      </div>
                  </div>
                  </div>
              </div>
          </div>
</section>
            