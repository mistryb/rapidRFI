<?php
$this->breadcrumbs=array(
	'Rfis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rfi', 'url'=>array('index')),
	array(  'label'=>'Manage Rfi', 
                'url'=>array('admin'),
                'visible'=> Yii::app()->user->checkAccess('RFI Manager'),
            ),
);
?>

<h1>Create Rfi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>