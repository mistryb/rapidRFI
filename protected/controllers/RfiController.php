<?php

class RfiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow authenticated users to perform 'index' and 'view' actions
				'actions'=>array('index','view','myrfi'),
				'users'=>array('@'),
			),
			array('allow', // allow Team user to perform 'update' actions
				'actions'=>array('update'),
				'roles'=>array('Team'),
			),
                        array('allow', //allow RFI Managers to Perform 'create' and 'admin' and 'delete' actions
                                'actions' =>array('create', 'admin', 'delete'),
                                'roles' => array('RFI Manager'),
                            ),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{                
                $model=$this->loadModel($id);                               
                
		$this->render('view',array(
			'model'=>$model,                        
		));                               
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{           
             $model=new Rfi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rfi']))
		{
			$model->attributes=$_POST['Rfi'];
                        $model = $this->actionAssign($model);
			if($model->save())
				$this->redirect(array('view','id'=>$model->rfi_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));           	
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{            
               $model=$this->loadModel($id);
               $params=array('rfi'=>$model);
               if(!Yii::app()->user->checkAccess('RFI Manager'))
               {
                   if (!Yii::app()->user->checkAccess('Rfi:Update', $params))
                   {
                      throw new CHttpException(400,'Invalid request. This RFI is not Assigned to You.'); 
                   }
               }               
                  // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rfi']))
		{
			$model->attributes=$_POST['Rfi'];
                        $model= $this->actionAssign($model);
                        $model= $this->actionAnswer($model);
                        $model= $this->actionClose($model);
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->rfi_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));                                                                		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Rfi');                
		$this->render('index',array(
			'dataProvider'=>$dataProvider,                     
		));             
	}
        
        /**
	 * Lists myRFIs Page models.
	 */
	public function actionMyrfi()
	{                
		$dataProvider=new CActiveDataProvider('Rfi', array(
                    'criteria'=>array(
                        'condition'=>'assigned_to='.Yii::app()->user->id, 
                    )
                ));                
		$this->render('myrfi',array(
			'dataProvider'=>$dataProvider,                     
		));             
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rfi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rfi']))
			$model->attributes=$_GET['Rfi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        /**
         * Assigns a user to the RFI
         */
        public function actionAssign($model)
        {            
                if(!isset($model->date_assigned))
                    {
                        if($model->assigned_to)
                        {
                             $model->date_assigned=new CDbExpression('NOW()');
                        }                     
                    }
                    return $model;                        
        }        
        /**
         * Marks the RFI as answered
         */
        public function actionAnswer($model)
        {            
              if(!isset($model->date_answered))
                    {
                       if($model->answered)
                        {
                            $model->date_answered=new CDbExpression('NOW()');
                        } 
                    }                          
            return $model;
        }        
        /**
         *  Marks the RFI as closed         
         */
        public function actionClose($model)
        {
            if(!isset($model->date_closed))
                    {
                       if($model->closed)
                        {
                            $model->date_closed=new CDbExpression('NOW()');
                        } 
                    }
                    return $model;
        }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Rfi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rfi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
