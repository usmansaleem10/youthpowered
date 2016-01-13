<?php 
    $session=Yii::app()->session;
    $session->open();

    if(isset($session['username']) && isset($session['user_id']))
    {
         $userName=$session['username'];
         $userId=$session['user_id'];
         $avatar = $session['avatar'];
    }
    
        $baseUrl = Yii::app()->request->baseUrl;
        
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.transitions.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>                
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom_my.js" type="text/javascript"></script> 
		 <script>
            $(function () {
                $("#datepicker").datepicker();
            });</script>
  </head>
  <body>
     <header class="container-fluid">          
            <div class="row">
              <?php if(isset($userId) && $userId)
              {?>  
                <div class="container">
                    <div class="logo col-xs-3 col-sm-1 col-md-2 col-lg-2">
                        <div class="whitecircle">
                            <a href="#"><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"></a>
                        </div>                      
                    </div>
                    <div class="col-xs-9  col-sm-3 col-md-4 col-lg-4 title"> 
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/title.png">
                    </div>

                    <div class="col-xs-12  col-sm-7 col-md-6 col-lg-6 search"> 
                        <div class="col-xs-12  col-sm-5 col-md-5 col-lg-5">
                            <input type="text" placeholder="SEARCH" />
                        </div> 
                        <div class="icons1 col-xs-3 col-sm-2 col-md-2 col-lg-2">
                            <a href="#" ><span class="fa fa-globe"></span> <span class="mark">4</span> </a>
                            <a href="#" ><span class="fa  fa-envelope"></span> <span class="mark">3</span></a>                              
                        </div>
                        <div class="username1 col-xs-7 col-sm-4 col-md-4 col-lg-4">
                            <a href="#" ><span class="fa fa-user"></span> <small> Welcome, </small> <?php echo $userName; ?>  </a>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 setting">
                            <div class="gear_block">
                                <a href="#"><span class="fa fa-gear"></span></a>
                                <ul class="setting_sub">
                                    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('profile/profile/update'); ?>">Edit Profile</a></li>
                                    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('user/user/changepassword'); ?>">Change Password</a></li>
                                    <li><a href="<?php echo Yii::app()->createAbsoluteUrl('user/auth/logout'); ?>">Logout</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>    
                
              <?php } else { ?>   
                
                <div class="row">
                  <div class="logo text-center">
                      <div class="whitecircle col-xs-12 col-sm-2 col-md-2 col-lg-2  col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                          <a href="#"><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"></a>
                      </div>
                  </div> 
              </div>         
              <?php } ?>
            </div>

     </header>
      
      <?php if(isset($userId) && ($userId))
      { 
      ?>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <!--            <span class="sr-only">Toggle navigation</span>-->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--          <a class="navbar-brand" href="#">Bootstrap theme</a>-->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo Yii::app()->createAbsoluteUrl('/userproject/userproject/'); ?>">Home</a></li>
<!--                        <li><a href="#about">About us</a></li>-->
                        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/message/message/index/'); ?>">User Messages</a></li>
                        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usergroup/groups/index/'); ?>">User Groups</a></li>
                        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/usercomments/usercomments/index/'); ?>">Post On A Wall</a></li>
                        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/userdocuments/userdocuments/index/'); ?>">User Documents</a></li> 
                        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/friendship/friendship/index/'); ?>">My Friends</a></li>
                        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/user/user/index/'); ?>">All Users</a></li>

<!--                        <li><a href="#about">Services</a></li>-->
                        
<!--                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>-->
                        <li><a href="#about">Enquiry</a></li>
                        <li><a href="#contact">Contact us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
      <section class="container-fluid inner innerpage">
            <div class="container">
                <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 gray set">
                        <div class="profile_img col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl."/"; ?><?php echo $avatar; ?>">
                        </div>
                        <div class="profile_name col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <div class="row">
                                <h4>Welcome <span><?php if(isset($userName)) {echo $userName;} ?></span></h4>
                                <div class="profile_comment">
                                    <a href="#"><span class="fa fa-envelope-o"></span> </a>
                                    <a href="#"><span class="fa fa-comments-o"></span> </a>
                                </div>
                            </div>

                        </div>
                        <div class="dash_board col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="photos col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                
                                <ul class="list-group pp">
                                    <li><a href="#">JS</a></li>   
                                    <li><a href="#">AK</a></li>   
                                    <li><a href="#">GS</a></li>                                       
                                    <li><a href="#">JS</a></li>   
                                    <li><a href="#">AK</a></li>   
                                    <li><a class="add_people" href="#"><span class="fa  fa-plus"></span></a></li>
                                </ul>
                                
                                <div class="people_add">
                                    <h4>PEOPLE <span class="fa fa-pencil"></span></h4>
                                    <div class="close_button"> <a href="#"><span class="fa fa-close "></span></a></div>
                                    <form class="form-group">
                                        
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 row">
                                            <input type="text" placeholder="Email Address" class="form-control">
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <input type="submit" value="Invite" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <div class="projects_block">
                                    <h4>Projects</h4> 
                                    <h5><a data-target="#myModal3" data-toggle="modal" href="#">Get started with a Project</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="row badges">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>Badges</h3>
                                <div id="owl-demo">

                                    <div class="item">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.png" alt="Owl Image">
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/2.png" alt="Owl Image">
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png" alt="Owl Image">
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/4.png" alt="Owl Image">
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/5.png" alt="Owl Image">
                                    </div>


                                </div>


                            </div>

                            <div class="share_page">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h4 class="light_gray_title"><span class="fa  fa-share"></span> share this page</h4>
                                    <p><span class="fa  fa-user-plus"></span> <a href="#">Add me to your Network</a></p>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contact_img">
                                <h4 class="orange_title">Contact us</h4>
                                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/contact_03.jpg">
                            </div>                            
                        </div>
                    </div>
      <?php } ?>
      <?php echo $content; ?>

       <?php if(isset($userId)) { ?>   
                </div>
            </div>
        </section>
       <?php } ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

        <script>


            $(document).ready(function () {

                $("#owl-demo").owlCarousel({
                    autoPlay: 3000, //Set AutoPlay to 3 seconds
                    items: 4,
                    itemsDesktop: [1199, 3],
                    itemsDesktopSmall: [979, 3]

                });
                $("#owl-demo1").owlCarousel({
                    autoPlay: 3000, //Set AutoPlay to 3 seconds

                    items: 4,
                    itemsDesktop: [1199, 3],
                    itemsDesktopSmall: [979, 3]

                });

            });


        </script>
        
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
          <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
          <a class="add_project_button" href="#"> <span class="fa  fa-plus "></span></a>
                  <h4 class="modal-title" id="myModalLabel">New Project </h4>
                </div>
                <div class="modal-body">
                    <form id="add-project" name="add-project"  method="post" class="form-group" onsubmit="return addProject({form: this, typeId:1})">
                        <table class="table">
                            <tr><td width=25%> <label>Project Name</label> <td><input class="form-control" name="name" type="text" required="" ></td></tr>
                            <tr><td width=25%> <label>Add description</label> <td><textarea  name="description"  class="form-control description" required="" type="text"> </textarea></td></tr>

                        </table>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default modal-close" data-dismiss="modal" >Close</button>
                  <button type="submit" class="btn btn-primary">Add Project</button>
                </div> </form>
              </div>
            </div>
          </div>
          <script>


          function addProject(opts)
          {
              var form = opts.form;
              var typeId = opts.typeId;
              var data = $(form).serialize() + '&type_id='+typeId;
              $.ajax({
                      type: 'POST',
                      url: 'http://localhost/<?php echo Yii::app()->request->baseUrl; ?>/index.php/userproject/userproject/' + 'addProject',
                      dataType: "json",
                      data: data, 
                      success: function (response) {
                          $(".modal-close").trigger('click');
                          window.location.href = 'http://localhost<?php echo Yii::app()->request->baseUrl; ?>/index.php/userproject/userproject/index';
                      }
                  });

                  return false;
          }

          </script>
    
  </body>
</html>