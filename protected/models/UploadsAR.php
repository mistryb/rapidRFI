<?php
/*
 * This class houses the functions that are needed for both
 * ResponseFile and RequestFile Classes
 */
class UploadsAR extends CActiveRecord
{
      /**
        * Prepares rfi_id, uploaded_date and uploaded_by
        * attributes before performing validation.
        */
        public function beforeValidate()
        {   
            if($this->isNewRecord)
            {
            // set the create date, last updated date and the user doing the creating                   
                $this->uploaded_date=new CDbExpression('NOW()');
                $this->uploaded_by=Yii::app()->user->id;                
            }                     
            return parent::beforeValidate();
        } 
}
?>
