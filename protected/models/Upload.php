<?php

/**
 * This is the model class for table "tbl_upload".
 *
 * The followings are the available columns in table 'tbl_upload':
 * @property integer $id
 * @property integer $rfi_id
 * @property string $filename
 * @property string $date_uploaded
 * @property integer $uploaded_by
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Rfi $rfi
 * @property User $uploadedBy
 */
class Upload extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Upload the static model class
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
		return 'tbl_upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rfi_id, type', 'required'),
			array('rfi_id, uploaded_by', 'numerical', 'integerOnly'=>true),
			array('filename, type', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rfi_id, filename, date_uploaded, uploaded_by, type', 'safe', 'on'=>'search'),
                        array('filename', 'file', 
                            'types'=>'docx,doc',
                            'maxSize'=> 1024*1024*10, //10MB
                            'tooLarge'=>'The file is too large',
                            'allowEmpty'=>1,                            
                            )
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
			'rfi' => array(self::BELONGS_TO, 'Rfi', 'rfi_id'),
			'uploadedBy' => array(self::BELONGS_TO, 'User', 'uploaded_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rfi_id' => 'Rfi',
			'filename' => 'Filename',
			'date_uploaded' => 'Date Uploaded',
			'uploaded_by' => 'Uploaded By',
			'type' => 'Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('rfi_id',$this->rfi_id);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('date_uploaded',$this->date_uploaded,true);
		$criteria->compare('uploaded_by',$this->uploaded_by);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function beforeValidate()
        {   
            if($this->isNewRecord)
            {
            // set the create date, last updated date and the user doing the creating                   
                $this->date_uploaded=new CDbExpression('NOW()');
                $this->uploaded_by=Yii::app()->user->id;                
            }                     
            return parent::beforeValidate();
        } 
}