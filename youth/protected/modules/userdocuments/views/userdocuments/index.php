                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">                        
                        <div class=" white ">                                
                            <div class="pipline_title">
                                <h1><span class="fa fa fa-envelope-o"></span> Upload Documents</h1>
                            </div>
                            <div class="upload row">
                                <h4><span class="fa fa-newspaper-o"></span> Upload Files</h4>                           
<?php
 
        echo CHtml::beginForm(array('//userdocuments/userdocuments/uploaddocuments'), 'POST', array(
	'enctype' => 'multipart/form-data'), $htmlOptions=array('class'=>'form-group'));
	echo CHtml::activeFileField($model, 'name', $htmlOptions=array('class'=>'form-control'));
	echo CHtml::submitButton(Yum::t('submit'), array('class'=>'btn btn-primary right_button', 'id' =>'upload-documents'));
	echo CHtml::endForm();
?>
        <h6>DOCS, VIDEOS, JPG  & OTHER</h6>
                            </div>
                            
                            <h3>Document Listing</h3>
                            
                            <?php //echo $html; ?>

                    
                            
                            
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row icon_box">
<?php
        $allDocuments = $documents;
        $html = '';
        foreach ($allDocuments as $doc) 
        { 
             $path = Yii::app()->request->baseUrl.'/'.$doc['path'];
             $name = $doc['name'];
           //  $html .= '<tr><td><a href='.$path.'>'.$name.'</a></td></tr>';  
            ?>
                                            
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img-cent">
                <a href="<?php echo $path; ?>"><img class="img-responsive" src="/youthpowered/youth/images/whitedoc.png">
                    <p><?php echo $name; ?></p>
                </a>
          </div>                                                               
<?php            
        } 
?>                           
                                            
                                            
                                            
<!--                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img-cent">
                                                <a href="#"><img class="img-responsive" src="/youthpowered/youth/images/whitedoc.png">
                                                    <p>This is dummy name</p>
                                                </a>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img-cent">
                                                <a href="#"><img class="img-responsive" src="/youthpowered/youth/images/whitedoc.png">
                                                    <p>This is dummy name</p>
                                                </a>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img-cent">
                                                <a href="#"><img class="img-responsive" src="/youthpowered/youth/images/whitedoc.png">
                                                    <p>This is dummy name</p>
                                                </a>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img-cent">
                                                <a href="#"><img class="img-responsive" src="/youthpowered/youth/images/whitedoc.png">
                                                    <p>This is dummy name</p>
                                                </a>
                                            </div>-->
                                            
                                        </div>
                                    </div>
                            
                            
                            
                            
<!--                            <div class="leave_comment row">                                
                                <h4><span class="fa fa-commenting-o"></span> Leave a Comment</h4>
                                <form class="form-group">
                                    <textarea class="form-control" placeholder="Type a Message here..."></textarea>
                                    <input class=" btn btn-primary right_button" type="submit" value="Submit"> 
                                </form>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
                        <div class="friends row">
                            <h4><span class="fa fa-heart-o"></span> Add Friends</h4>
                        </div>
                        <div  class="friends_block">
                        
                       <?php if(!empty($allUsers))
                       {                                foreach ($allUsers as $user) {?>     
                            <div class="row friends_list">
                                <a id="p1" href="#">
                                    <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                        <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $user['avatar']; ?>">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                        <p><i><?php echo $user['username']; ?></i></p>
                                    </div>
                                </a>
                            </div>
                       <?php }} ?>
<!--                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>
                        </div>
                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>
                        </div>
                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>
                        </div>
                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>-->
<!--                        </div>
                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>-->
<!--                        </div>
                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>
                        </div>-->
<!--                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>
                        </div>-->
<!--                        <div class="row friends_list">
                            <a id="p1" href="#">
                                <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                    <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                    <p><i>Lorem ipsum dolor sit amet, </i></p>
                                </div>
                            </a>
                        </div>-->
                    </div>
                    </div>
              

<script>
    
 
//$('#upload-documents').click(function() 
//{
//  uploadDocuments({form:'upload-user-documents-form'});
//});
// 
// 
//function uploadDocuments(opts)
//{
//    var form = opts.form;
//    var data = $('#'+form).serialize();
//    $.ajax({
//            type: 'POST',
//            url: 'http://localhost/youthpowered/youth/index.php/userdocuments/userdocuments/uploadDocuments',
//            dataType: "json",
//            data: data, 
//            success: function (response) {
////                var html = prepareHtml(response.data);
////                $('.current').prepend(html);
//            }
//        });
//        
//        return false;
//}
//
////function prepareHtml(response)
////{
////    return '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><div class="project_box"><h2><a href="http://localhost/<?php echo Yii::app()->request->baseUrl; ?>/index.php/userproject/userproject/projectdetails?project_id='+response.project_id+'">'+response.name+'</a></h2><div class="pink"><a class="plus_button" href="#"><span class="fa fa-plus"></span> </a><a href="#"><span class="fa fa-check"></span></a></div><div class="subsmall"><h3>Resources</h3><p>Link</p><p>Link to PDF</p><form class="form-group col-md-12"><textarea class="form-control" placeholder="Message"></textarea><div><label class="hide_input"><input  type="file"><span class="fa fa-paperclip"></span></label><input class="send" type="submit" value="Submit"></form></div></div></div></div>';
    


</script>