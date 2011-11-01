<?php
$this->breadcrumbs=array(
	'Rfis'=>array('index'),
	$model->rfi_id=>array('view','id'=>$model->rfi_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rfi', 'url'=>array('index')),
	array('label'=>'Create Rfi', 'url'=>array('create')),
	array('label'=>'View Rfi', 'url'=>array('view', 'id'=>$model->rfi_id)),
	array('label'=>'Manage Rfi', 'url'=>array('admin')),
);
?>

<h1>Update Rfi <?php echo $model->rfi_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>