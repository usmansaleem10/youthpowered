
<?php 

if(isset(Yii::app()->request->cookies['username']->value))
{
    $userName = unserialize(Yii::app()->request->cookies['username']->value);
}
if(isset(Yii::app()->request->cookies['user_id']->value))
{
    $userId = unserialize(Yii::app()->request->cookies['user_id']->value);
}
// TODO: will make this image dynamic from user avatar

?> 

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">                        
                        <div class=" white ">                                
                            <div class="pipline_title">
                                <h1><span class="fa fa fa-envelope-o"></span> Status</h1>
                            </div>
                            <div class="row upload">                                
                                <?php echo CHtml::beginForm(array('//usercomments/usercomments/addComment'),$method='post',$htmlOptions=array('class'=>'form-group')); ?>  
                                <textarea name = "comment" class="form-control" placeholder="Type your status here"></textarea>
                                <input type="hidden" name="userId" value="<?php echo $userId;?>" />
                                <input type="hidden" name="parentId" value="" />
                                <input type="hidden" name="created_for" value ="<?php echo Yii::app()->request->getParam('id'); ?>">
                                <input class=" btn btn-primary right_button" type="submit" value="Submit">                              
                                <?php echo CHtml::endForm(); ?> 

                            </div>

                            <div class="wall_feed row">
                                <h1><span class="light fa fa-newspaper-o"></span> Wall Feed</h1>
                                <?php echo $comments;?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
                        <div class="friends row">
                            <h4><span class="fa fa-heart-o"></span> Add Friends</h4>

                        </div>
                        <div  class="friends_block">
                            <div class="row friends_list">
                                <a id="p1" href="#">
                                    <div class="col-xs-4 col-sm-8 col-md-4 col-lg-3 ">
                                        <img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile_img.jpg">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 message_des">
                                        <p><i>Lorem ipsum dolor sit amet, </i></p>
                                    </div>                                
                                </a>
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>

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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
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
                                <div class="add_freind">
                                    <a href="#add_friend">Add Friend</a>
                                </div>
                            </div>
                        </div>

                        <div class="dash_board">
                            <div class="photos">
                                
                                <ul class="list-group pp">
                                    <li><a href="#">JS</a></li>   
                                    <li><a href="#">AK</a></li>   
                                    <li><a href="#">GS</a></li>                                       
                                    <li><a href="#">JS</a></li>   
                                    <li><a href="#">AK</a></li>   
                                    <li><a href="#" class="add_people"><span class="fa  fa-plus"></span></a></li>
                                </ul>
                                
                                <div class="people_add">
                                    <h4>PEOPLE <span class="fa fa-pencil"></span></h4>
                                    <div class="close_button"> <a href="#"><span class="fa fa-close "></span></a></div>
                                    <form class="form-group">
                                        
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 row">
                                            <input class="form-control" type="text" placeholder="Email Address">
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <input class="btn btn-primary" type="submit" value="Invite">
                                        </div>
                                    </form>
                                </div>
                                <div class="projects_block">
                                    <h4>Projects</h4> 
                                    <h5 ><a href="#" data-toggle="modal" data-target="#myModal3">Get started with a Project</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
               


<!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<a class="add_project_button" href="#"> <span class="fa  fa-plus "></span></a>
        <h4 class="modal-title" id="myModalLabel">New Project </h4>
      </div>
      <div class="modal-body">
          <form class="form-group">
              <table class="table">
                  <tr><td width=25%> <label>Project Name</label> <td><input class="form-control" type="text" ></td></tr>
                  <tr><td></td><td><a href='#'>Add description</a></td></tr>
                  <tr><td>Privacy</td><td><form action="">
                              <label><input type="radio" name="sex" value="male"> Lorem Ipsum </label><br>
                              <label><input type="radio" name="sex" value="female"> Lorem Ipsum</label>
</form></td></tr>
              </table>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<script>
    
    function addSubComment(event, form){
        event = event || window.event;
        if (event.keyCode == 13)
        {
            addComment($("#"+form));
            return false;
        }
        return true;
        
    }
    
    function addComment(form)
    {
        var data = $(form).serialize();
        
        $.ajax({
           type: 'POST',
           url: '<?php echo CURRENT_URL ?>/usercomments/usercomments/' + 'addCommentAjax',
           dataType: "json",
           data: data, 
           success: function (response) {
               var childComment = response.data;
               var updatedAt = childComment.update_at;
               if(updatedAt == null)
               {
                    updatedAt = 'Just now';
               }
               var html = '<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 light_bg  col-sm-offset-1 col-md-offset-1 col-lg-offset-1"><div class="profile_img col-xs-3 col-sm-3 col-md-2 col-lg-2 light_padding"><img class="img-responsive " src="images/profile_img.jpg"></div><div class="col-xs-9 col-sm-9 col-md-10 col-lg-10 title_feed"><h4>'+childComment.comment+' </h4><p class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row nomargin"><span class="fa fa-rss"></span> '+updatedAt+'  </p></div><div class="news_like col-xs-12 col-sm-12 col-md-12 col-lg-12"></div></div>';
               $('#wall-child-'+childComment.parent_id).prepend(html);
           }
        });

        return false;

    }
    
    $('.like').click(function(){
         var commentId = this.id;
        $.ajax({
            type: 'POST',
            url:  '<?php echo CURRENT_URL ?>usercomments/usercomments/' + 'likeComment',
            dataType: "json",
            data: {commentId: commentId},
            success: function (res) {
                if(res.status==='success')
                {   
                   $("#likecounter-" + commentId).html(" ("+res.data+") ");
                }
                
            }
        });
    });
    
</script>