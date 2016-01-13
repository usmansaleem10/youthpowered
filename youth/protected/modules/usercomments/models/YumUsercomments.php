<?php

class YumUsercomments extends YumActiveRecord{
	
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

//	public function behaviors() 
//        {
//		        return array();
//	}

	public function tableName()
	{
            //return 'usercomments';
		return Yum::module('usercomments')->usercommentsTable;
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment', 'required'),
			array('parent_id, created_for', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>40),
			array('created_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usercomments_id, comment, update_at, parent_id, created_by, created_for', 'safe', 'on'=>'search'),
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
                        'createdFor' => array(self::BELONGS_TO, 'User', 'created_for'),
			'usercommentslikes' => array(self::HAS_MANY, 'Usercommentslikes', 'usercomments_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usercomments_id' => 'Usercomments',
			'comment' => 'Comment',
			'update_at' => 'Update At',
			'parent_id' => 'Parent',
			'created_by' => 'Created By',
                        'created_for' => 'Created For',
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

		$criteria->compare('usercomments_id',$this->usercomments_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('update_at',$this->update_at,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('created_by',$this->created_by,true);
                $criteria->compare('created_for',$this->created_for);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
