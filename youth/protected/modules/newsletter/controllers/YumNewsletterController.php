<?php

Yii::import('user.controllers.YumController');
Yii::import('user.models.*');

class YumNewsletterController extends YumController
{
//        public $defaultAction = 'join';
//	public $newsletterForm = null;
        
	public function actionIndex()
	{
//            print_r($_POST);
//            exit('ddd');
            //$this->layout = Yum::module('newsletter')->loginLayout; 
            //$this->newsletterForm = new Newslettersubscribers('newsletter');
            //$this->redirect(Yum::module()->loginUrl);
	}
        
        public function actionSubscribeToNewsLetter() {
            $zipcode = $_POST['zipcode'];
            $email = $_POST['email'];
            
            // check if email already exists in the database
            $subscObj = Newslettersubscribers::model()->find('email =:email', array(':email' => $email));
            if($subscObj)
            {
                Yum::setFlash(Yum::t('Email already added in subscriber list'));
                $this->redirect(Yum::module()->loginUrl);
            }   
            
            $newsSubcModel = new Newslettersubscribers();
            $newsSubcModel->setAttribute('zipcode', $zipcode);
            $newsSubcModel->setAttribute('email', $email);
            $newsSubobj = $newsSubcModel->save();
            if($newsSubobj)
            {
                Yum::setFlash(Yum::t('Your email has been added to the subscriber list'));    
            }
            else
            {
                Yum::setFlash(Yum::t('Error: please try again later'));
            }
            
            $this->redirect(Yum::module()->loginUrl);
            
        }
}