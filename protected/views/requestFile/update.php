<?php
$this->breadcrumbs=array(
	'Request Files'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RequestFile', 'url'=>array('index')),
	array('label'=>'Create RequestFile', 'url'=>array('create')),
	array('label'=>'View RequestFile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RequestFile', 'url'=>array('admin')),
);
?>

<h1>Update RequestFile <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>