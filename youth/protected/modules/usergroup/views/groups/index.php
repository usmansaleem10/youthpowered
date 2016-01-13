
                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <div class="white">
                            <h3><span class="fa fa-group"></span> All User groups</h3>
<?php
$this->breadcrumbs = array(
		Yum::t('Usergroups'),
		Yum::t('Browse'),
		);

$this->title = Yum::t('Usergroups'); ?>

                        <?php echo CHtml::link(Yum::t('Create new Usergroup'), array(
			'//usergroup/groups/create'), array('class'=>' btn btn-primary'));
?>
                        
<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			)); ?>

<?php echo CHtml::link(Yum::t('Create new Usergroup'), array(
			'//usergroup/groups/create'), array('class'=>' btn btn-primary'));
?>
                        </div>            
                  </div>
             