<?php
Yii::import('user.controllers.YumController');
Yii::import('user.models.*');
Yii::import('usercomments.models.*');


class YumUsercommentsController extends YumController 
{
	public function beforeAction($event) {
		if (Yii::app()->user->isAdmin())
			$this->layout = Yum::module('usercomments')->adminLayout;
		else
			$this->layout = Yum::module('usercomments')->layout;
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
				$this->_model = YumUsercomments::model()->findByPk($id);
			else if(is_string($id))	
				$this->_model = YumUsercomments::model()->find('comment = :comment', array(
							':comment' => $id));
			if($this->_model === null)
				throw new CHttpException(404,'The requested Usercomments does not exist.');
		}
		return $this->_model;
	}
        
        public function actionIndex()
	{
           
            // If the user is not logged in, so we redirect to the actionLogin,
            // which will render the login Form
                if(!empty(Yii::app()->user->_data))
                {
                    $this->renderCommentsList();
                }
     	}
        
        private function renderCommentsList() {
            
            // Fetch Image from Session
                    $avatar = $_SESSION['avatar'];
                    if(isset($avatar))
                    {
                       $img = Yii::app()->request->baseUrl.'/'.$avatar;
                       $imageStatic = '<img class="img-responsive" src="'.$img.'"/>';
                    }
                    $userId = unserialize(Yii::app()->request->cookies['user_id']->value); 
                    $commentModel = new YumUsercomments();
                    //$comentsObj = Yii::app()->db->createCommand("SELECT * FROM usercomments ORDER BY COALESCE(`parent_id`,`usercomments_id`), `parent_id` IS NOT NULL")->queryAll();
                    $createdFor = Yii::app()->request->getParam('id'); 
                    $comentsObj = $commentModel->with('usercommentslikes')->findAll('t.created_for =:created_for', array(':created_for' => $createdFor));
                    if(!empty($comentsObj))
                    {
                        //TODO: needs to replace the query with recursive 
                       $commentArr = [];
                        foreach ($comentsObj as $comment) {
                             
                            
                            if(!isset($comment['parent_id']) && empty($comment['parent_id'])  )
                            {
                                $commentArr[$comment['usercomments_id']]['parent']  = $comment; 
                                
                            }
                            else{
                                if(!isset($commentArr[$comment['parent_id']]['parent']))
                                    $commentArr[$comment['parent_id']]['parent'] = [];
                                
                                // prepare child array
                                $arr = array($comment);
                                if(!isset($commentArr[$comment['parent_id']]['child']))
                                    $commentArr[$comment['parent_id']]['child'] = [];
                                
                                $commentArr[$comment['parent_id']]['child'] = array_merge($arr, $commentArr[$comment['parent_id']]['child']);
                            }                            
                        }
                        $html = '';
                        foreach ($commentArr as $comment) {
                            
                           $likeobj = $comment['parent']->getRelated('usercommentslikes');
                           
                            if(!empty($likeobj))
                            {
                                $likes = count($likeobj); 
                            }
                            
                            
//                            if(isset($comment['parent']) && !empty($comment['parent']))
//                            {
//                                $likes = $comment['parent']['usercommentslikes'];
//                            }
                            // for main parent
                            //
                            $html.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wall_div"><div class="profile_img col-xs-3 col-sm-2 col-md-2 col-lg-2">'.$imageStatic.'</div><div class="col-xs-9 col-sm-10 col-md-10 col-lg-10"><h4>'.$comment['parent']['comment'].' </h4></div><div class="news_like col-xs-12 col-sm-12 col-md-12 col-lg-12 row"><p class="col-xs-12 col-sm-12 col-md-6 col-lg-6 row"><span class="fa fa-rss"></span>'.$comment['parent']['update_at'].' </p><p class="col-xs-12 col-sm-12 col-md-6 col-lg-6 like row" >'
                                    .'<a class="like" href="javascript:void(0);" id="'. $comment['parent']['usercomments_id'].'">Like <span id="likecounter-'.$comment['parent']['usercomments_id'].'"> ('. $likes.')</span></a> <a href="#">Comment</a> <a href="#">Follow</a></p></div></div>';
                            // for comment box
                            $html.='<div id="wall-child-'.$comment['parent']['usercomments_id'].'">';
                            //for child iterate the loop
                            if(isset($comment['child']))
                            {
                                foreach ($comment['child'] as $childComment) {
                                    $html.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 light_bg  col-sm-offset-1 col-md-offset-1 col-lg-offset-1"><div class="profile_img col-xs-3 col-sm-3 col-md-2 col-lg-2 light_padding">'.$imageStatic.'</div><div class="col-xs-9 col-sm-9 col-md-10 col-lg-10 title_feed"><h4>'.$childComment['comment'].' </h4><p class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row nomargin"><span class="fa fa-rss"></span> '.$childComment['update_at'].'  </p></div><div class="news_like col-xs-12 col-sm-12 col-md-12 col-lg-12"></div></div>';
                                }
                            }
                           $html .='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 light_bg col-md-offset-1"><form id="add-comment" name="add-comment"  method="post" class="form-group" onsubmit="return addComment(this)"><br><input type="hidden" name="parentId" value ="'.$comment['parent']['usercomments_id'].'"><input type="hidden" name="created_for" value ="'.$createdFor.'"><input type="hidden" name="userId" value ="'.$userId.'"><textarea class="form-control" name="comment" placeholder="Write a comment..."></textarea><input type="submit" value="Reply" class="btn btn-primary"></form></div></div>';

                        }
                       
                         $this->render('index',array(
                                            'comments'=>$html,
                                            ));
                         
                    }
                    else
                    {
                        $this->render('index',array(
                                            'comments'=>'',
                                            ));
                    }
        }
        
        
        
        /*
        function convertToTree($array)
        {
            $flat = array();
            $tree = array();
            //print_r($array);
            foreach ($array as $child => $parent) {
                if (!isset($flat[$child])) {
                    $flat[$child['usercomments_id']] = array();
                }
                if (!empty($parent)) {
                    $flat[$parent['usercomments_id']][$child] =& $flat[$child['usercomments_id']];
                } else {
                    $tree[$child['usercomments_id']] =& $flat[$child['usercomments_id']];
                }
            }
            echo '<pre>';print_r($tree); exit;
            return $tree;
        }
        */
        
       
        
        public function actionAddComment() 
        {
            /*echo "<pre>";
            print_r($_POST);
            exit;*/
            $comment = Yii::app()->request->getPost('comment');
            $userId = Yii::app()->request->getPost('userId');
            $parentId = Yii::app()->request->getPost('parentId');
            $createdFor = Yii::app()->request->getPost('created_for');
            
           
            if(!isset($parentId))
            {
                $parentId = NULL;
            }
            
            $userComentsModel = new YumUsercomments();
            $commentsArr = array('comment'=> $comment, 'created_for'=>$createdFor, 'created_by'=> $userId,'parent_id'=>$parentId);
            $userComentsModel->attributes = $commentsArr;
            $userCommentobj = $userComentsModel->save();
           
            if($userCommentobj)
            {
                Yum::setFlash(Yum::t('Comment added successfully'));  
                $this->redirect(array('//usercomments/usercomments/index', 'id'=>$createdFor));
            }
            else {
                Yum::setFlash(Yum::t('Unable to add comment'));       
            } 
            if($userId)
            {
                 $this->renderCommentsList();
                 return;
                /*$commentModel = new YumUsercomments();
                $comentsObj = $commentModel->with('usercommentslikes')->findAll('t.created_by =:created_by', array(':created_by' => $userId));
                
                if($comentsObj)
                {
                    $this->render('index',array(
					'comments'=>$comentsObj,
					));
                    
//                   $this->render(Yum::module('usercomments')->index, array(
//					'comments'=>$comentsObj,					
//					));
                    return;
                }*/
            }
            $this->redirect($this->createUrl('//usercomments/usercomments/index'));
        }
        
        
        public function actionAddCommentAjax() 
        {
           
            $comment = Yii::app()->request->getPost('comment');
            $userId = Yii::app()->request->getPost('userId');
            $parentId = Yii::app()->request->getPost('parentId');
            $createdFor = Yii::app()->request->getPost('created_for');
            
           
            if(!isset($parentId))
            {
                $parentId = NULL;
            }
            
            $userComentsModel = new YumUsercomments();
            $commentsArr = array('comment'=> $comment, 'created_for'=>$createdFor, 'created_by'=> $userId,'parent_id'=>$parentId);
            $userComentsModel->attributes = $commentsArr;
            $userCommentobj = $userComentsModel->save();
           
            if($userCommentobj)
            {
                echo json_encode(array(
                "status" => "error",
                "message" => "comment",
                "data" => $userComentsModel->attributes
                ));
                return;         
            }
            
        }
        /*
        public function actionAddCommentAjax() 
        {
            exit('ererer');
            echo "<pre>";
            print_r($_POST);
            exit('12');
            $comment = Yii::app()->request->getPost('comment');
            $userId = Yii::app()->request->getPost('userId');
            $parentId = Yii::app()->request->getPost('parentId');
            
            if(!$parentId)
            {
                $parentId = 0;
            }
            $userComentsModel = new YumUsercomments();
            $commentsArr = array('comment'=> $comment, 'created_by'=> $userId, 'parent_id'=>$parentId);
            $userComentsModel->attributes = $commentsArr;
            $userCommentobj = $userComentsModel->save();
           
            if($userCommentobj)
            {
                echo json_encode(array(
                "status" => "error",
                "message" => "comment",
                "data" => $userComentsModel->attributes
                ));
                return;         
            }
            
        }
        
        function isAjaxRequest() {

            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                if (Yii::app()->request->isAjaxRequest) {

                    return true;
                }
            } else {

                return false;
            }
        }
        */
        
        public function actionLikeComment() {
            
            $userId = unserialize(Yii::app()->request->cookies['user_id']->value); 
            $commentId  = Yii::app()->request->getPost('commentId');
            
            Yii::import('usercomments.models.YumUserCommentslikes');
            
            $commentModelLike = new YumUserCommentslikes();
            $comentsObj = $commentModelLike->find('liked_by =:liked_by AND usercomments_id =:usercomments_id', array(':liked_by' => $userId, ':usercomments_id' => $commentId));
            if($comentsObj)
            {
                echo json_encode(array(
                "status" => "error",
                "message" => "Already exists",
                "data" => "null"
                ));
                return;
                
            }
            else {
                $commentModelLike = new YumUserCommentslikes();
                
                $commentModelLike->setAttribute('liked_by', $userId);
                $commentModelLike->setAttribute('created_by', $userId);
                $commentModelLike->setAttribute('usercomments_id', $commentId);
                
                $result = $commentModelLike->save();
                if($result)
                {     
                    $commentModelLikeMod = new UserCommentslikes();
                    $likeCount = $commentModelLikeMod->findAll('usercomments_id =:usercomments_id',  array(':usercomments_id'=>$commentId));
                    
                    echo json_encode(array(
                        "status" => "success",
                        "message" => "Comment liked successfully",
                        "data" => count($likeCount)
                ));
                    return;
                }
            }
        }        
        public function actionListcomment() {
            //Get user id 
            $userId = unserialize(Yii::app()->request->cookies['user_id']->value); 
            if($userId)
            {
                $commentModel = new Usercomments();
                $comentsObj = $commentModel->with('usercommentslikes')->findAll('t.created_by =:created_by  AND parent_id is NULL', array(':created_by' => $userId));
                if($comentsObj)
                {
                    $this->render('index',array(
					'comments'=>$comentsObj,
					));
                    
                    return;
                }
            }
            $this->redirect($this->createUrl('//usercomments/usercomments/index'));
        }

}
