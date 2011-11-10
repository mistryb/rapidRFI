<?php
$this->breadcrumbs=array(
	'Response Files'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ResponseFile', 'url'=>array('index')),
	array('label'=>'Create ResponseFile', 'url'=>array('create')),
	array('label'=>'View ResponseFile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ResponseFile', 'url'=>array('admin')),
);
?>

<h1>Update ResponseFile <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>