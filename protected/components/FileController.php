<?php

class FileController extends Controller
{
    /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'delete', 'admin'),
				'roles'=>array('Team'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        /**
         *
         * @param type $model
         * @param type $attr
         * @param type $path
         * @return type 
         * Upload Multi File action
         */
         public function uploadMultifile($model, $attr, $path)
            {
                if($sfile=CUploadedFile::getInstances($model, $attr))
                {
                    foreach ($sfile as $i=>$file)
                    {        
                        $folder=Yii::app()->basePath.DIRECTORY_SEPARATOR.$path;
                        if(!is_dir($folder.$model->rfi_id))
                        {
                            mkdir($folder.$model->rfi_id);                       
                        }    
                        $savepath=$folder.$model->rfi_id.DIRECTORY_SEPARATOR;
                        $formatName=date("Ymd")."-".$file;
                        $file->saveAs($savepath.$formatName);
                        $ffile[$i]=$formatName;                                           
                    }
                    return($ffile);
                }
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
}
?>
