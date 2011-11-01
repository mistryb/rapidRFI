<?php
$this->breadcrumbs=array(
	'Rfis'=>array('index'),
	$model->rfi_id,
);

$this->menu=array(
	array('label'=>'List Rfi', 'url'=>array('index')),
	array('label'=>'Create Rfi', 'url'=>array('create')),
	array('label'=>'Update Rfi', 'url'=>array('update', 'id'=>$model->rfi_id)),
	array('label'=>'Delete Rfi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rfi_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rfi', 'url'=>array('admin')),
);
?>

<h1>View Rfi #<?php echo $model->rfi_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rfi_id',
		'date_entered',
		'date_assigned',
		'date_answered',
		'date_closed',
		'assigned_to',
		'created_by',
		'date_created',
		'date_updated',
	),
)); ?>
