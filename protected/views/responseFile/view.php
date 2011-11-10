<?php
$this->breadcrumbs=array(
	'Response Files'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ResponseFile', 'url'=>array('index')),
	array('label'=>'Create ResponseFile', 'url'=>array('create')),
	array('label'=>'Update ResponseFile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ResponseFile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ResponseFile', 'url'=>array('admin')),
);
?>

<h1>View ResponseFile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rfi_id',
		array(
                    'label'=>'FileName',
                    'type'=> 'raw',
                    'value'=>
                    CHtml::link(CHtml::encode($model->filename), Yii::app()->baseUrl.'/uploads/'.$model->rfi_id."/".$model->filename)
                ),
		'uploaded_date',
		'uploaded_by',
	),
)); ?>
