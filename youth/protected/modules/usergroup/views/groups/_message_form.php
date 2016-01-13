<?php
        echo CHtml::beginForm(array('//usergroup/groups/write'));
	echo CHtml::hiddenField('YumUsergroupMessage[group_id]', $group_id);
	//echo CHtml::label(Yum::t('Title'), 'YumUsergroupMessage_title') . '<br />';
	echo CHtml::textField('YumUsergroupMessage[title]', isset($title) ? $title : '', $htmlOptions=array('class'=>'form-control','placeholder'=>'TITLE')) . '<br />';
	//echo CHtml::label(Yum::t('Message'), 'YumUsergroupMessage_message') . '<br />';
	echo CHtml::textArea('YumUsergroupMessage[message]', '', array(
				'cols' => 40, 'rows' => 6,
                                'class'=>'form-control',
                                'placeholder'=>'DESCRIPTION'
				)) . '<br />';
	echo CHtml::submitButton(Yum::t('Write message'), array('class'=>'form-control'));
	echo CHtml::endForm();

