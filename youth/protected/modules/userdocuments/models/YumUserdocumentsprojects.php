<?php

/**
 * This is the model class for table "userdocumentsprojects".
 *
 * The followings are the available columns in table 'userdocumentsprojects':
 * @property integer $userdocumentproject_id
 * @property integer $userdocuments_id
 * @property string $project_id
 * @property string $created_by
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property Project $project
 * @property Userdocuments $userdocuments
 * @property User $createdBy
 */
class YumUserdocumentsprojects extends YumActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yum::module('userdocuments')->userprojectdocumentsTable;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userdocuments_id', 'required'),
			array('userdocuments_id', 'numerical', 'integerOnly'=>true),
			array('project_id', 'length', 'max'=>11),
			array('created_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userdocumentproject_id, userdocuments_id, project_id, created_by, update_at', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
			'userdocuments' => array(self::BELONGS_TO, 'Userdocuments', 'userdocuments_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userdocumentproject_id' => 'Userdocumentproject',
			'userdocuments_id' => 'Userdocuments',
			'project_id' => 'Project',
			'created_by' => 'Created By',
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

		$criteria->compare('userdocumentproject_id',$this->userdocumentproject_id);
		$criteria->compare('userdocuments_id',$this->userdocuments_id);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YumUserdocumentsprojects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
