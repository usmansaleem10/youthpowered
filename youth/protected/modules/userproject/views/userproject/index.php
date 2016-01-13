
                    
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 white mainset current">
                        

                        <div>
						<div class="row">
						<?php 
							$counter = 0;
							if(!empty($projects)){
								foreach ($projects as $project) {
									if($counter == 4){
										$counter = 0;
										echo "</div><div class='row'>";
									}
									$counter++;
						?>	
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <div class="project_box">
                                    <h2><a href="<?php echo Yii::app()->createAbsoluteUrl('userproject/userproject/projectdetails'); ?>?project_id=<?php echo $project['project_id']; ?>"><?php echo $project['name']; ?></a></h2>
                                    <div class="pink">
                                        <a class="plus_button" href="#"><span class="fa fa-plus"></span> </a>
                                        <a href="#"><span class="fa fa-check"></span> </a>                                    
                                    </div>
                                    <div class="subsmall">
                                        <h3>Dynamic</h3>
                                        <p>Link</p>
                                        <p>Link to PDF</p>
                                        <form class="form-group col-md-12">
                                            <textarea class="form-control" placeholder="Message"></textarea>
                                            <div>

                                                <label class="hide_input"><input  type="file"><span class="fa fa-paperclip"></span></label>

                                                <input class="send" type="submit" value="Submit">
                                                </form>
                                            </div>
                                    </div>
                                    <div class="project-status">
                                        <a href="#"><span class="fa  fa-check"></span></a>
                                    </div>
                                </div>
                            </div>
						<?php 
								}
							}
						?>
						</div>

                        </div>
                    </div>
                

