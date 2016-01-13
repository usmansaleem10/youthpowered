<?php

/**
 * This is the model class for table "projectresources".
 *
 * The followings are the available columns in table 'projectresources':
 * @property integer $activityresource_id
 * @property string $project_id
 * @property string $resource_id
 * @property string $resource_type
 * @property string $role
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property User $resource
 * @property Project $project
 */
class YumUserProjectresources extends YumActiveRecord
{
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yum::module('userproject')->userprojectResourcesTable;
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, resource_id', 'required'),
			array('project_id, resource_id', 'length', 'max'=>10),
			array('resource_type, role', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('activityresource_id, project_id, resource_id, resource_type, role, update_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'resource' => array(self::BELONGS_TO, 'User', 'resource_id'),
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'activityresource_id' => 'Activityresource',
			'project_id' => 'Project',
			'resource_id' => 'Resource',
			'resource_type' => 'Resource Type',
			'role' => 'Role',
			'update_at' => 'Update At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('activityresource_id',$this->activityresource_id);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('resource_id',$this->resource_id,true);
		$criteria->compare('resource_type',$this->resource_type,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
