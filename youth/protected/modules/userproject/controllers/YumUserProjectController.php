<?php
Yii::import('user.controllers.YumController');
Yii::import('user.models.*');
Yii::import('userproject.models.*');
Yii::import('userdocuments.models.*');

class YumUserProjectController extends YumController 
{
	public function beforeAction($event)
        {
		if (Yii::app()->user->isAdmin())
			$this->layout = Yum::module('userproject')->adminLayout;
		else
			$this->layout = Yum::module('userproject')->layout;
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
				$this->_model = YumUserProject::model()->findByPk($id);
			
			if($this->_model === null)
			throw new CHttpException(404,'The requested project does not exist.');
		}
		return $this->_model;
	}
        
        public function actionIndex()
	{
         
// If the user is not logged in, so we redirect to the actionLogin,
            // which will render the login Form
                if(!empty(Yii::app()->user->_data))
                {
                    //exit('ggg');
                   //$dataProvider=new CActiveDataProvider('YumUserProject');
                   $this->listProjects();
                }
                else
                {
                   $this->redirect(array('//user/auth/login'));
                }
	}
        
        public function actionprojectdetails() {
            
            
             if(!empty(Yii::app()->user->_data))
             {
                    $projectModel = new YumUserProject();
                   // get project id 
                    $id= Yii::app()->request->getParam('project_id');
                    
                    // here define the userdocumentsprojects as relation
                    $projectObj = $projectModel->with('projectresources')->findByPk($id);
                    $projectArr = [];

                    $projectArr['project'] = $projectObj;
                    //get project tasks
                    $projModel = new YumUserProject();
                    $projectTasks =  $projModel->findAll('parent_id=:parent_id', array('parent_id'=> $id));

                    if(!empty($projectTasks))
                        $projectArr['task'] = $projectTasks;
                    else
                        $projectArr['task'] = [];


                    $allUsersModel = new YumUser();
                    $allUsersObjs = $allUsersModel->findAll();


                    $this->render('projectdetails',array(
                                            'projectdetails'=>$projectArr,
                                            'allUsers' => $allUsersObjs,
                                            ));
             }
             else
             {
                  $this->redirect(array('//user/auth/login'));
             }
             
        }
        
        public function listProjects() 
        {
            $userProjectModel = new YumUserProject();
            $allProjects = $userProjectModel->findAll('parent_id is NULL');
            
            if(!empty($allProjects))
            {
                $this->render('index',array(
                                    'projects'=>$allProjects,
                                    ));
                return;
            }
            else 
            {
                $this->render('index',array(
                                    'projects'=>$allProjects,
                                    ));
                //$this->render('index');
            }
            
        }
        private function prepareParams($params)
        {
            $attrArr = [];
            foreach ($params as $key => $value) {
                if((isset($value) && $value !== '' && $value !=='undefined'))
                {            
                    $attrArr[$key] = $value;
                }
            }
            
            return $attrArr;
        }
        function changeDateFormat($date) {
            if ($date != '') {
                $timeString = date("Y-m-d", strtotime($date));
                return $timeString;
            }

            return NULL;
        }
        
        public function actionDeleteProject() 
        {
            $projectID = Yii::app()->request->getPost('project_id');
            if(!isset($projectID))
            {
                echo json_encode(array(
                        "status" => "error",
                        "message" => "Unable to delete Project. POST error",
                        "data" => NULL
                ));
            } 
            $userProjectModel = new YumUserProject(); 
            $userProjectObj = $userProjectModel->deleteByPk($projectID);
            if(!isset($userProjectObj))
            {
                echo json_encode(array(
                        "status" => "success",
                        "message" => "Deletion successful",
                        "data" => NULL
                ));
            }
            else
            {
                echo json_encode(array(
                        "status" => "error",
                        "message" => "Unable to Delete Project.",
                        "data" => NULL
                ));
            }
            
        }
        public function actionUpdateProject() 
        {
            $projectID = Yii::app()->request->getPost('project_id');
            if(!isset($projectID))
            {
                echo json_encode(array(
                        "status" => "error",
                        "message" => "Unable to update Project. POST error",
                        "data" => NULL
                ));
            } 
            $userProjectModel = new YumUserProject(); 
            $userProjectObj = $userProjectModel->findByPk($projectID);
            if(!isset($userProjectObj))
            {
                echo json_encode(array(
                        "status" => "error",
                        "message" => "Unable to update Project. POST error",
                        "data" => NULL
                ));
            }
            
            $projectAttArr = $this->prepareParams($_POST); 
            
            if(isset($projectAttArr['end_date']))
            {
                $projectAttArr['end_date'] = $this->changeDateFormat($projectAttArr['end_date']);
            }
           
            $userProjectObj->attributes = $projectAttArr;
            $result = $userProjectObj->save();
            if($result)
            {
                 echo json_encode(array(
                        "status" => "success",
                        "message" => "User updated successfully",
                        "data" => $userProjectObj->attributes
                ));
            }
            else {
                 echo json_encode(array(
                        "status" => "success",
                        "message" => "Unable to update Project",
                        "data" => $result->attributes
                ));   
            } 
            
            
        }
        public function actionAddProject() 
        {
            
            /*print_r($_POST); exit('test');
            $name = Yii::app()->request->getPost('name');
            $description = Yii::app()->request->getPost('description');
            $typeId = Yii::app()->request->getPost('type_id');
            $parentId = Yii::app()->request->getPost('parent_id');*/
            $userId = unserialize(Yii::app()->request->cookies['user_id']->value);
            $userProjectModel = new YumUserProject();
            $projectAttArr = $this->prepareParams($_POST); 
//array('name'=> $name, 'description'=> $description, 'type_id'=>$typeId, 'parent_id'=>$parentId, 'created_by'=> $userId);
            $projectAttArr['created_by'] = $userId;
            if(isset($projectAttArr['enddate']))
            {
                $projectAttArr['enddate'] = $this->changeDateFormat($projectAttArr['enddate']);
            }
            $userProjectModel->attributes = $projectAttArr;
            $userProjectObj = $userProjectModel->save();
            if($userProjectObj)
            {
                //Assign Resources
                if (isset($projectAttArr['assignToResource'])) {
                    $resourceArr = $projectAttArr['assignToResource'] != '' ? explode(',', $projectAttArr['assignToResource']) : array();
                    if (!empty($resourceArr)) {
                        
                        foreach ($resourceArr as $resource) {
                            $recourceAry = [];
                            
                            $recourceAry['resource_id'] = $resource;
                            $recourceAry['project_id'] = $userProjectModel->project_id;
                           $projectResModel = new YumUserProjectresources();
                           $projectResModel->attributes = $recourceAry;
                           $projectResModel->save();
                        }
                        
                    }
                }
                 echo json_encode(array(
                        "status" => "success",
                        "message" => "User Project successfully",
                        "data" => $userProjectModel->attributes
                ));
            }
            else {
                 echo json_encode(array(
                        "status" => "success",
                        "message" => "Unable to add Project",
                        "data" => $userProjectModel->attributes
                ));   
            } 
            
        }
        
        
        

}
