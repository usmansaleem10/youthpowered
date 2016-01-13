<?php
$this->title = Yum::t('My inbox');
Yii::import('user.models.*');
$this->breadcrumbs=array(
		Yum::t('Messages')=>array('index'),
		Yum::t('My inbox'));

echo Yum::renderFlash();

// Findall Messages
$messageObj = $model->findAll();



//$this->widget('zii.widgets.grid.CGridView', array(
//			'id'=>'yum-message-grid',
//			'dataProvider' => $model->search(),
//			'columns'=>array(
//				array(
//					'type' => 'raw',
//					'name' => Yum::t('From'),
//					'value' => 'CHtml::link($data->from_user->username, array(
//							"//profile/profile/view",
//							"id" => $data->from_user_id)
//						)'
//					),
//				array(
//					'type' => 'raw',
//					'name' => Yum::t('title'),
//					'value' => 'CHtml::link($data->getTitle(), array("view", "id" => $data->id))',
//					),
//				array(
//					'name' => 'timestamp',
//					'value' => '$data->getDate()',
//					),
//				array(
//					'class'=>'CButtonColumn',
//					'template' => '{view}{delete}',
//					),
//				),
//				)); ?>




                   
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">                        
                            <div class="row white ">                                
                                <div class="pipline_title">
                                    <h1><span class="fa fa fa-envelope-o"></span> Message</h1>
<!--                                    <h4><a href="<?php //echo Yii::app()->createAbsoluteUrl('/message/message/compose/'); ?>">Compose a new Message</a></h4>-->
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pipline">
                          <?php if(!empty($messageObj))
                                {
                                    foreach($messageObj as $obj)
                                    { 
                                        $messageId = $obj->id;
                                        $fromUserId = $obj->from_user_id;
                                        
                                        $condition = 'id = :id';
                                        $userData = YumUser::model()->find($condition, array(':id' => $fromUserId));
                                        $avatar = $userData['avatar'];
                                       // echo $avatar;
                                        ?>
                                    <div class="row">
                                        <a id="p<?php echo $messageId; ?>" href="#">
                                            <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                                <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $avatar; ?>">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                                <p><i><?php echo $obj['title']; //echo CHtml::link($obj->getTitle(), array("view", "id" => $obj->id)); ?></i></p>
                                            </div>
                                        </a>
                                    </div>   
                             
<?php  }
                                }
 else {
        echo Yum::t('No Messages Record Found');
 }
                         ?>
                                     </div>
                       
                             <?php if(!empty($messageObj))
                                {
                                    foreach($messageObj as $obj)
                                    { 
                                        $messageId = $obj->id;
                                        ?>    
                                
                                 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 message_user " id="p_<?php echo $messageId; ?>">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pipline gray_bg">
                                        <p class="msg_received"><?php echo $obj['title']; ?><span class="fa  fa-arrow-circle-o-down"></span><?php echo CHtml::link('Reply', array("view", "id" => $obj->id)); ?></p>
                                        <p class="msg_send"><?php echo $obj['message']; ?><span class="fa  fa-arrow-circle-o-up"></span></p>
                                    </div>
                                </div>
                                
                                <?php                           
                                
                                    }
                                }
                         ?>
                        </div>
                    </div>
             