<?php
Yii::setPathOfAlias('newsletter' , dirname(__FILE__));

class NewsletterModule extends CWebModule
{
    
    public $version = '0.9-git-wip';
  public $debug = false;

  //layout related control vars
  public $baseLayout = 'application.views.layouts.main';
  public $layout = 'user.views.layouts.yum';
  public $loginLayout = 'user.views.layouts.login';
  public $adminLayout = 'user.views.layouts.yum';
  public $enableBootstrap = true;

  public $enableLogging = true;
  public $enableOnlineStatus = true;

  // Cost for Password generation. See CPasswordHelper::hashPassword() for
  // details.
  public $passwordHashCost = 13;

  // enable pStrength jquery widget
  public $enablepStrength = true;
  public $displayPasswordStrength = true;

  public $passwordGeneratorOptions = array(
    'length' => 8,
    'capitals' => 1,
    'numerals' => 1,
    'symbols' => 1,
  );
    
    
    
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'newsletter.models.*',
			'newsletter.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
        
  public $controllerMap=array(
    'newsletter'=>array(
      'class'=>'newsletter.controllers.YumNewsletterController'),
  );
}
