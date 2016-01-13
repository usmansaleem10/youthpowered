<?php

/**
 * This is the model class for table "userdocuments".
 *
 * The followings are the available columns in table 'userdocuments':
 * @property integer $userdocuments_id
 * @property string $name
 * @property string $path
 * @property string $update_at
 * @property string $created_by
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property Userdocumentsprojects[] $userdocumentsprojects
 */
class YumUserdocuments extends YumActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $document;
	
        public function tableName()
	{
		 return Yum::module('userdocuments')->userdocumentsTable;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('document', 'file', 'types'=>'pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif,mp4', 'safe' => false),
			array('name', 'length', 'max'=>40),
			array('path', 'length', 'max'=>100),
			array('created_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userdocuments_id, name, path, update_at, created_by', 'safe', 'on'=>'search'),
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
			'userdocumentsprojects' => array(self::HAS_MANY, 'Userdocumentsprojects', 'userdocuments_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userdocuments_id' => 'Userdocuments',
			'name' => 'Name',
			'path' => 'Path',
			'update_at' => 'Update At',
			'created_by' => 'Created By',
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

		$criteria->compare('userdocuments_id',$this->userdocuments_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('update_at',$this->update_at,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YumUserdocuments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
