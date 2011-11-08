<?php
$this->breadcrumbs=array(
	'Request Files'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RequestFile', 'url'=>array('index')),
	array('label'=>'Create RequestFile', 'url'=>array('create')),
	array('label'=>'Update RequestFile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RequestFile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RequestFile', 'url'=>array('admin')),
);
?>

<h1>View RequestFile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rfi_id',
		array(
                    'label'=>'FileName',
                    'type'=> 'raw',
                    'value'=>
                    CHtml::link(CHtml::encode($model->filename), Yii::app()->baseUrl.'/uploads/'.$model->filename)
                ),
		'uploaded_date',
		'uploaded_by',
	),
)); ?>
