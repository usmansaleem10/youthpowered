<?php
Yii::import('user.controllers.YumController');
Yii::import('user.models.*');
Yii::import('userdocuments.models.*');
class YumUserdocumentsController extends YumController 
{
	public function beforeAction($event) {
		if (Yii::app()->user->isAdmin())
			$this->layout = Yum::module('userdocuments')->adminLayout;
		else
			$this->layout = Yum::module('userdocuments')->layout;
		return parent::beforeAction($event);
}

//	public function accessRules() {
//		return array(
//				array('allow',  
//					'actions'=>array('index'),
//					'users'=>array('*'),
//					),
////				array('allow', 
////					'actions'=>array(
////						'getOptions', 'create','update', 'browse', 'join', 'leave', 'write'),
////					'users'=>array('@'),
////					),
////				array('allow', 
////					'actions'=>array('admin','delete'),
////					'users'=>array('admin'),
////					),
//				array('deny', 
//					'users'=>array('*'),
//					),
//				);
//	}

	public function loadModel($id = false)
	{
		if($this->_model === null)
		{
			if(is_numeric($id))	
				$this->_model = YumUserdocuments::model()->findByPk($id);
//			else if(is_string($id))	
//				$this->_model = YumUserdocuments::model()->find('comment = :comment', array(
//							':comment' => $id));
			if($this->_model === null)
				throw new CHttpException(404,'The requested Usercomments does not exist.');
		}
		return $this->_model;
	}
        
        public function actionIndex()
	{
            
            // which will render the login Form
                if(!empty(Yii::app()->user->_data))
                {
                    $this->listDocuments();
                    // Move above function here
                }
	}
        
        
        
         public function listDocuments() 
         {
             $model = new YumUserdocuments();
             $allDocuments = $model->findAll();
             
             Yii::import('user.models.*');
             $userModel = new YumUser();
             $allUsers = $userModel->findAll();
             if(!empty($allDocuments))
             {
                 $this->render('index', array('model'=>$model, 'documents'=>$allDocuments, 'allUsers'=> $allUsers));
                 return;
             }
             else
             {
                 $this->render('index', array('model'=>$model, 'documents'=>$allDocuments,  'allUsers'=> $allUsers));
             }
        }
        
        
        
        public function actionuploadDocuments() 
        {
             if(!empty(Yii::app()->user->_data))
             {
                 $userId = Yii::app()->user->_data->id;
             }
            // getting project Id
             
            $projectId= Yii::app()->request->getPost('project_id');
            
            if(isset($_POST['YumUserdocuments']) && isset($_POST['YumUserdocuments']['name'])) 
            {
                $model = new YumUserdocuments();
                $model->attributes = $_POST['YumUserdocuments'];
                $model->name = CUploadedFile::getInstanceByName('YumUserdocuments[name]');
				if($model->name instanceof CUploadedFile) 
                                {
                                      //  $userId =5;
					// Prepend the id of the user to avoid filename conflicts
                                        $fileName = $_FILES['YumUserdocuments']['name']['name'];
                                        $filePath = Yum::module('userdocuments')->documentPath .'/'.  $userId . '_' . $_FILES['YumUserdocuments']['name']['name'];
					$model->name->saveAs($filePath);
					
                                        $attrArr = array(
                                            'name' => $fileName,
                                            'path' => $filePath,
                                            'created_by' => $userId
                                        );
                                        $model->attributes = $attrArr;
                                        if($model->save(false)) 
                                        {
                                            if($projectId)
                                            {
                                                $userProjectDocuments = new YumUserdocumentsprojects();
                                                $attrArrProject = array(
                                                    'project_id' => $projectId,
                                                    'userdocuments_id' => $model['userdocuments_id'],
                                                    'created_by' => $userId
                                                );
                                                $userProjectDocuments->attributes = $attrArrProject;
                                                if($userProjectDocuments->save())
                                                {
                                                    Yum::setFlash(Yum::t('The Document was uploaded successfully'));
                                                    $this->redirect(array('//userproject/userproject/projectdetails?project_id='.$projectId));
                                                }
                                               
                                            }
                                                Yum::setFlash(Yum::t('The Document was uploaded successfully'));
                                                $this->redirect(array('//userdocuments/userdocuments/index'));	
                                        }
				}
                
             }
        }
}
