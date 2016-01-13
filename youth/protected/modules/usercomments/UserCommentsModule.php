<?php
Yii::setPathOfAlias('UsercommentsModule' , dirname(__FILE__));

class UsercommentsModule extends CWebModule {
	public $usercommentsTable = '{{usercomments}}';
	public $usercommentsLikesTable = '{{usercommentslikes}}';

	public $adminLayout = 'user.views.layouts.yum';
	public $layout = 'user.views.layouts.yum';

	public $controllerMap=array(
			'usercomments'=>array(
				'class'=>'UsercommentsModule.controllers.YumUsercommentsController'),
			);

	public function init() {
		$this->setImport(array(
					'user.controllers.*',
					'user.models.*',
					'usercomments.controllers.*',
					'usercomments.models.*',
                                        'usercommentslikes.models.*',
					));
	}


}
