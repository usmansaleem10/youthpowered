<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">                        
                        <div class=" white ">                                
                            <div class="pipline_title">
                                <h1><span class="fa fa-group"></span> All Users</h1>
                            </div>
<?php
$this->title = Yum::t('Users');
$this->breadcrumbs=array(Yum::t("Users"));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$dataProvider,
			'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),
				array("//profile/profile/view","id"=>$data->id))',
			),
		array(
			'name' => 'createtime',
			'value' => 'date(UserModule::$dateFormat,$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => 'date(UserModule::$dateFormat,$data->lastvisit)',
		),
                array(
			'name' => 'post on a wall',
                        'type'=>'raw',
                   
			'value' => 'CHtml::link("post on a wall",
				array("//usercomments/usercomments/index","id"=>$data->id))',
		),            
	),
)); ?>
</div>
</div>
