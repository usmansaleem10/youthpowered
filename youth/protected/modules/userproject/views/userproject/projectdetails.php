<?php
$projectDetails = $projectdetails['task'];
$html = '';
foreach ($projectDetails as $task) {
    $html .= '<tr><td >TASK-'.$task['project_id'].'</td> <td ><a href="#" data-toggle="modal" data-target="#myModal_1" >'.$task['name'].'</a></td><td>'.substr($task['description'],0,30).'</td><td>'.$task['enddate'].'</td></tr>';
} 
$projectId = $projectdetails['project']['project_id'];
if(!empty($projectdetails))
{
    // Get Project Name and Description in detail page
    $projectName = $projectdetails['project']['name'];
    $projectDescription = $projectdetails['project']['description'];
}
?>

                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 white mainset current">

                        <div>
                            <h4 class="pink_title ">Current Project</h4>
                            <h5 class="gray_title">Project Map</h5>
                            <h3 class="project"><?php echo $projectName ?></h3>
                            <p><?php echo $projectDescription ?></p> 
                        </div>

                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 
                            <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
                                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Home</a></li> 
                                <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Profile</a></li> 
                                <li role="presentation" class=""><a href="#upload" role="tab" id="upload-tab" data-toggle="tab" aria-controls="upload" aria-expanded="true">Uploaded Documents</a></li>                                 
                            </ul>
                            
                            <div id="myTabContent" class="tab-content"> 
                                <div role="tabpanel" class="tab-pane fade  active in" id="home" aria-labelledby="home-tab"> 
								
                                <div class="task"> 
                            <div class="add_task col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <a href="#">Add Task</a>
                            </div>
                            <div class="view_task col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <a href="#">Completion Date</a>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  task_list1">
                                <table id="tbl-task" class="table table_style ">
                                    <th><tr><td >Task ID</td><td >Name</td> <td >Description</td><td>Completion Date</td></tr></th>
                                    <?php echo $html ?>
                                </table>
                            </div>

                        </div>   
                                    <div class="sd-tasks ">
                                        <form id="add-project" name="add-project"  method="post" class="form-group" onsubmit="return addTask({form: this, typeId:2})">
                                        <div class="clbutton">
                                            <a href="#"><span class="fa fa-close"></span></a>
                                        </div>
                                        <div class="new-task-addform">
                                           
                                                <div class="name">
                                                    
                                                    
                                                    <ol class="list-group list-main">
                                                    <p class="nowrap"><span class="round-circle nameauto">JS</span> Jagdeep singh </p></li>
                                                    
                                                            <li><label class="lb-date"><span class="fa fa-calendar"></span><input name="enddate" type="text" id="datepicker"></label></li>
                                                    <li class="custom-circle"><a href="#"><span class="circle vset fa  fa-heart "></span></a>
<!--                                                            <a href="#"><span class="circle vset fa  fa-envelope"></span></a>
                                                            <a href="#"><label><span class="circle vset fa  fa-paperclip"></span>
                                                            <input class="hide" type="file"  ></label></a></li>-->
                                                        
                                                        
                                                    </ol>
                                                    <table class="table nolink1">
                                                           
                                                    <tr>
                                                        <td colspan="3">
                                                            <form class="form-group sdform">
                                                                <ul class="list-group">
<!--                                                                    <li><input class="form-control"  type="text" placeholder="No Project"></li>-->
                                                                    <input class="form-control" type="text" name="name" placeholder="New Task" height="100">
                                                                    <textarea class="form-control" rows="3" name="description" placeholder="Description"></textarea>
                                                                    
                                                                </ul>
                                                            </form>
                                                        </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="3">
<!--                                                                <form class="form-group fmcomment">-->
                                                                    <ul class="list-group">
                                                                        <textarea class="form-control" name ="quicksummary"  placeholder="Write a Comment"></textarea></li>
                                                                        <br>
                                                                        <a href="#" class="sub_add">JS</a> <a href="#" class="sub_add more_fr"><span class="fa fa-plus"></span></a>                      
																		</ul>
                                
                                                                    
																	<div class="add_fr_box">
                                        <a href="#"><span class="fa fa-close"></span></a>
                                        <select class="form-control" name="assignToResource">
                                            <option value="" selected="">Add Resource Name</option>    
  <?php    
  
    if(!empty($allUsers))
    {
        foreach($allUsers as $row)
        {
            /*** create the options ***/
            echo '<option value="'.$row['id'].'"';
            echo '>'. $row['username'] . '</option>'."\n";
        }
    }
        
        ?>                                  
             </select>                           
                                        
                                        
                                        
<!--                                        <input class="form-control" name="assignToResource" type="text" placeholder="Add Friend Name">-->
                                    </div>
<!--                                                                </form>-->
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Task</button>                        </div>
                                            
                                        </div>
                                        </form>
                                    </div>                                
                                    
                                </div> 
                                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab"> <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p> </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="upload" aria-labelledby="dropdown1-tab"> 
                                    <div class="upload row">
                                    <h4><span class="fa fa-newspaper-o"></span> Upload Files</h4>                           
<!--                                    <form method="POST" action="/youthpowerproduct/youth/index.php/userdocuments/userdocuments/uploaddocuments" enctype="multipart/form-data">
                                        <input type="hidden" name="YumUserdocuments[name]" value="" id="ytYumUserdocuments_name">project_id
                                        <input type="hidden" name="project_id" value="<?php // echo $_GET['project_id']; ?>" id="ytYumUserdocuments_name">
                                        <input type="file" id="YumUserdocuments_name" name="YumUserdocuments[name]" class="form-control">
                                        <input type="submit" value="submit" name="yt0" id="upload-documents" class="btn btn-primary right_button">
                                    </form>        -->

<?php
        Yii::import('userdocuments.controllers.YumUserdocumentsController');
        Yii::import('userdocuments.models.YumUserdocuments');
        Yii::import('userdocuments.models.YumUserdocumentsprojects');
        
        $userDocumentmodel = new YumUserdocuments();
        
        echo CHtml::beginForm(array('//userdocuments/userdocuments/uploaddocuments'), 'POST', array(
	'enctype' => 'multipart/form-data'), $htmlOptions=array('class'=>'form-group'));
	echo CHtml::activeFileField($userDocumentmodel, 'name', $htmlOptions=array('class'=>'form-control'));
        echo CHTML::hiddenField('project_id',$_GET['project_id']);
	echo CHtml::submitButton(Yum::t('submit'), array('class'=>'btn btn-primary right_button', 'id' =>'upload-documents'));
	echo CHtml::endForm();
?>
                                        <h6>DOCS, VIDEOS, JPG  &amp; OTHER</h6>
                                    </div>
                                </div> 
                               
                                <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab"> <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p> </div> 
                            
                            </div> </div>

                    </div>
                

       
        <!-- Button trigger modal -->
        <!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Launch demo modal
        </button>-->

       
         
<script>

function addTask(opts)
{
    
    var form = opts.form;
    var data = $(form).serialize() + '&type_id='+2 + '&parent_id='+getParameterByName('project_id');
    $.ajax({
            type: 'POST',
            url: '<?php echo CURRENT_URL ?>/userproject/userproject/' + 'addProject',
            dataType: "json",
            data: data, 
            success: function (response) {
                var html = prepareHtml(response.data);
                $('#tbl-task > tbody:last-child').append(html);
                $( ".fa-close" ).trigger( "click" );
            }
        });
        
        return false;
}

function prepareHtml(response)
{
    return '<tr><td >TASK-'+response['project_id']+'</td> <td ><a href="#" data-toggle="modal" data-target="#myModal_1" >'+response['name']+'</a></td><td>'+(response['description'])+'</td><td>'+response['enddate']+'</td></tr>';
    
}
    
    
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>    