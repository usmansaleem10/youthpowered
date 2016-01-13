<?php
Yii::setPathOfAlias('UserDocumentsModule' , dirname(__FILE__));

class UserDocumentsModule extends CWebModule
{
    
    
        public $userdocumentsTable = '{{userdocuments}}';
	public $userprojectdocumentsTable = '{{userdocumentsprojects}}';

	public $adminLayout = 'user.views.layouts.yum';
	public $layout = 'user.views.layouts.yum';
	public $documentPath = 'uploads';

	public $controllerMap=array(
			'userdocuments'=>array(
				'class'=>'UserDocumentsModule.controllers.YumUserdocumentsController'),
			);

	public function init() {
		$this->setImport(array(
					'user.controllers.*',
					'user.models.*',
					'userdocuments.controllers.*',
					'userdocuments.models.*',
                                        'userdocumentsprojects.models.*',
					));
	}

//	public function beforeControllerAction($controller, $action)
//	{
//		if(parent::beforeControllerAction($controller, $action))
//		{
//			// this method is called before any module controller action is performed
//			// you may place customized code here
//			return true;
//		}
//		else
//			return false;
//	}
}
