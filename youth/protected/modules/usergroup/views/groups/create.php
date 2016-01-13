
<?php
$this->breadcrumbs=array(
	Yum::t('Usergroups')=>array('index'),
	Yum::t('Create'),
);
?>
                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                      <div class="memberlogin nobefore register">
                        <h3 class="text-center">Create a User group</h3>
<?php
$this->renderPartial('_form', array(
			'model' => $model));

?>                        
                         </div>
                  </div>

