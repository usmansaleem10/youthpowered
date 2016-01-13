<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property string $project_id
 * @property string $parent_id
 * @property string $name
 * @property integer $type_id
 * @property string $description
 * @property string $quicksummary
 * @property integer $status
 * @property integer $state
 * @property string $created_by
 * @property string $total_effort
 * @property string $startdate
 * @property string $enddate
 * @property string $duedate
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property YumUserProject $parent
 * @property YumUserProject[] $projects
 * @property Projectresources[] $projectresources
 * @property Userdocumentsprojects[] $userdocumentsprojects
 */
class YumUserProject extends YumActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yum::module('userproject')->userprojectTable;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('type_id, status, state', 'numerical', 'integerOnly'=>true),
			array('parent_id, created_by, total_effort', 'length', 'max'=>10),
			array('name, description, quicksummary, startdate, enddate, duedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('project_id, parent_id, name, type_id, description, quicksummary, status, state, created_by, total_effort, startdate, enddate, duedate, update_at', 'safe', 'on'=>'search'),
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
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'parent' => array(self::BELONGS_TO, 'YumUserProject', 'parent_id'),
			'projects' => array(self::HAS_MANY, 'YumUserProject', 'parent_id'),
			'projectresources' => array(self::HAS_MANY, 'Projectresources', 'project_id'),
			'userdocumentsprojects' => array(self::HAS_MANY, 'Userdocumentsprojects', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Project',
			'parent_id' => 'Parent',
			'name' => 'Name',
			'type_id' => 'Type',
			'description' => 'Description',
			'quicksummary' => 'Quicksummary',
			'status' => 'Status',
			'state' => 'State',
			'created_by' => 'Created By',
			'total_effort' => 'Total Effort',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'duedate' => 'Duedate',
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

		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('quicksummary',$this->quicksummary,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('state',$this->state);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('total_effort',$this->total_effort,true);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('duedate',$this->duedate,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YumUserProject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
