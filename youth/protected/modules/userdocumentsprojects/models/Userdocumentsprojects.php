<?php

/**
 * This is the model class for table "userdocumentsprojects".
 *
 * The followings are the available columns in table 'userdocumentsprojects':
 * @property integer $userdocumentsproject_id
 * @property integer $userdocument_id
 * @property integer $userproject_id
 * @property string $created_by
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property User $createdBy
 */
class Userdocumentsprojects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'userdocumentsprojects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userdocument_id, update_at', 'required'),
			array('userdocument_id, userproject_id', 'numerical', 'integerOnly'=>true),
			array('created_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userdocumentsproject_id, userdocument_id, userproject_id, created_by, update_at', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userdocumentsproject_id' => 'Userdocumentsproject',
			'userdocument_id' => 'Userdocument',
			'userproject_id' => 'Userproject',
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

		$criteria->compare('userdocumentsproject_id',$this->userdocumentsproject_id);
		$criteria->compare('userdocument_id',$this->userdocument_id);
		$criteria->compare('userproject_id',$this->userproject_id);
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
	 * @return Userdocumentsprojects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
