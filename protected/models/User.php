<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $discipline
 * @property string $date_created
 * @property string $date_updated
 */
class User extends CActiveRecord
{
    public $password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, first_name, last_name, email, discipline', 'required'),
                        array('username, email', 'unique'),
                        array('password', 'compare'),
                        array('password_repeat', 'safe'),
			array('username, password, first_name, last_name, discipline', 'length', 'max'=>256),
			array('email', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, first_name, last_name, email, discipline, date_created, date_updated', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'discipline' => 'Discipline',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('discipline',$this->discipline,true);
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
            // set the create date, last updated date 
                $this->date_created=$this->date_updated=new CDbExpression('NOW()');
            }
            else
            {
                //not a new record, so just set the last updated time
                $this->date_updated=new CDbExpression('NOW()');
            }
            return parent::beforeValidate();
        }
            /**
            * perform one-way encryption on the password before we store it in
            * the database
            */
            protected function afterValidate()
            {
                parent::afterValidate();
                $this->password = $this->encrypt($this->password);
            }
            public function encrypt($value)
            {
                return md5($value);
            }
        
}