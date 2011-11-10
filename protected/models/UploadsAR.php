<?php
/*
 * This class houses the functions that are needed for both
 * ResponseFile and RequestFile Classes
 */
class UploadsAR extends CActiveRecord
{
      /**
        * Prepares create_time, create_user_id, update_time and update_user_
        * id attributes before performing validation.
        */
        public function beforeValidate()
        {   
            if($this->isNewRecord)
            {
            // set the create date, last updated date and the user doing the creating
                $this->date_entered=$this->date_updated=new CDbExpression('NOW()');
                $this->created_by=$this->updated_by=Yii::app()->user->id;
                if($this->assigned_to)
                {
                    $this->date_assigned=new CDbExpression('NOW()');
                }
            }
            else
            {
                //not a new record, so just set the last updated time and last updated user id
                $this->date_updated=new CDbExpression('NOW()');
                $this->updated_by=Yii::app()->user->id;
                if($this->assigned_to)
                {
                    $this->date_assigned=new CDbExpression('NOW()');
                }
            }
            return parent::beforeValidate();
        } 
}
?>
