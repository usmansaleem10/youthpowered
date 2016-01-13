<?php

/**
 * This is the model class for table "usercommentslikes".
 *
 * The followings are the available columns in table 'usercommentslikes':
 * @property integer $usercommentslikes_id
 * @property integer $usercomments_id
 * @property string $liked_by
 * @property string $created_by
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property Usercomments $usercomments
 * @property User $likedBy
 */
class YumUserCommentslikes extends YumActiveRecord
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
		return Yum::module('usercomments')->usercommentsLikesTable;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usercomments_id', 'required'),
			array('usercomments_id', 'numerical', 'integerOnly'=>true),
			array('liked_by, created_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usercommentslikes_id, usercomments_id, liked_by, created_by, update_at', 'safe', 'on'=>'search'),
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
			'usercomments' => array(self::BELONGS_TO, 'Usercomments', 'usercomments_id'),
			'likedBy' => array(self::BELONGS_TO, 'User', 'liked_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usercommentslikes_id' => 'Usercommentslikes',
			'usercomments_id' => 'Usercomments',
			'liked_by' => 'Liked By',
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

		$criteria->compare('usercommentslikes_id',$this->usercommentslikes_id);
		$criteria->compare('usercomments_id',$this->usercomments_id);
		$criteria->compare('liked_by',$this->liked_by,true);
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
	 * @return Usercommentslikes the static model class
	 */
	
}
