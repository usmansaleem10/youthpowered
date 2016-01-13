<?php
Yii::setPathOfAlias('UserProjectModule' , dirname(__FILE__));

class UserProjectModule extends CWebModule {
	public $userprojectTable = '{{project}}';
        public $userprojectResourcesTable = '{{projectresources}}';

	public $adminLayout = 'user.views.layouts.yum';
	public $layout = 'user.views.layouts.yum';

	public $controllerMap=array(
			'userproject'=>array(
				'class'=>'UserProjectModule.controllers.YumUserProjectController'),
			);

	public function init() {
		$this->setImport(array(
					'user.controllers.*',
					'user.models.*',
					'userproject.controllers.*',
					'userproject.models.*',
					));
	}


}
