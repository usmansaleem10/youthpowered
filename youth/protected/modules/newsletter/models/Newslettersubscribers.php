<?php

/**
 * This is the model class for table "newslettersubscribers".
 *
 * The followings are the available columns in table 'newslettersubscribers':
 * @property integer $newslettersubscribers_id
 * @property string $email
 * @property string $zipcode
 * @property string $update_at
 */
class Newslettersubscribers extends YumActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'newslettersubscribers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            if(!isset($this->scenario))
			$this->scenario = 'newsletter';
            
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, zipcode', 'required'),
			array('email, zipcode', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('newslettersubscribers_id, email, zipcode, update_at', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'newslettersubscribers_id' => 'Newslettersubscribers',
			'email' => 'Email',
			'zipcode' => 'Zipcode',
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

		$criteria->compare('newslettersubscribers_id',$this->newslettersubscribers_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Newslettersubscribers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
