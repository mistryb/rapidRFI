<?php

/**
 * This is the model class for table "tbl_rfi".
 *
 * The followings are the available columns in table 'tbl_rfi':
 * @property integer $id
 * @property integer $assigned_to
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $date_updated
 * @property string $title
 * 
 * The following are available model relations:
 * @property User $assignedTo
 * @property User $createdBy
 * @property User $updatedBy
 * @property Timeline $timeline
 * @property Upload[] $uploads
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
			array('id, created_by, updated_by, date_updated, title', 'required'),
                        array('rfi_id', 'unique'),
			array('rfi_id, assigned_to, created_by, updated_by', 'numerical', 'integerOnly'=>true),			
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rfi_id, assigned_to, created_by, date_updated, title,', 'safe', 'on'=>'search'),
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
                    'assignedTo' => array(self::BELONGS_TO, 'User', 'assigned_to'),
                    'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
                    'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
                    'timeline' => array(self::HAS_ONE, 'Timeline', 'rfi_id'),
                    'uploads' => array(self::HAS_MANY, 'Upload', 'rfi_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Rfi',
			'assigned_to' => 'Assigned To',
			'created_by' => 'Created By',
                        'updated_by' => 'Updated by',			
			'date_updated' => 'Date Updated',
                        'title'=>'Title',
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
		$criteria->compare('assigned_to',$this->assigned_to,true);
		$criteria->compare('created_by',$this->created_by,true);
                $criteria->compare('updated_by',$this->updated_by,true);		
		$criteria->compare('date_updated',$this->date_updated,true);               
                $criteria->compare('title',$this->title,true);
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
                $this->timeline->date_entered=$this->date_updated=new CDbExpression('NOW()');
                $this->created_by=$this->updated_by=Yii::app()->user->id;
            }
            else
            {
                //not a new record, so just set the last updated time and last updated user id
                $this->date_updated=new CDbExpression('NOW()');
                $this->updated_by=Yii::app()->user->id;                                                                         
            }
            return parent::beforeValidate();
        }       
}