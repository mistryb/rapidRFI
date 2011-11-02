<?php

/**
 * This is the model class for table "tbl_rfi".
 *
 * The followings are the available columns in table 'tbl_rfi':
 * @property integer $rfi_id
 * @property string $date_entered
 * @property string $date_assigned
 * @property string $date_answered
 * @property string $date_closed
 * @property string $assigned_to
 * @property string $created_by
 * @property string $updated_by
 * @property string $date_created
 * @property string $date_updated
 */
class Rfi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rfi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_rfi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rfi_id', 'required'),
                        array('rfi_id', 'unique'),
			array('rfi_id', 'numerical', 'integerOnly'=>true),
			array('assigned_to', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rfi_id, date_entered, date_assigned, date_answered, date_closed, assigned_to, created_by, date_created, date_updated', 'safe', 'on'=>'search'),
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
			'rfi_id' => 'Rfi',
			'date_entered' => 'Date Entered',
			'date_assigned' => 'Date Assigned',
			'date_answered' => 'Date Answered',
			'date_closed' => 'Date Closed',
			'assigned_to' => 'Assigned To',
			'created_by' => 'Created By',
                        'updated_by' => 'Updated by',
			'date_created' => 'Date Created',
			'date_updated' => 'Date Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('rfi_id',$this->rfi_id);
		$criteria->compare('date_entered',$this->date_entered,true);
		$criteria->compare('date_assigned',$this->date_assigned,true);
		$criteria->compare('date_answered',$this->date_answered,true);
		$criteria->compare('date_closed',$this->date_closed,true);
		$criteria->compare('assigned_to',$this->assigned_to,true);
		$criteria->compare('created_by',$this->created_by,true);
                $criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
        * Prepares create_time, create_user_id, update_time and update_user_
        * id attributes before performing validation.
        */
        public function beforeValidate()
        {   
            if($this->isNewRecord)
            {
            // set the create date, last updated date and the user doing the creating
                $this->date_created=$this->date_updated=new CDbExpression('NOW()');
                $this->created_by=$this->updated_by=Yii::app()->user->name;
                $this->date_entered=$this->date_created;
            }
            else
            {
                //not a new record, so just set the last updated time and last updated user id
                $this->date_updated=new CDbExpression('NOW()');
                $this->updated_by=Yii::app()->user->name;
            }
            return parent::beforeValidate();
        }
}