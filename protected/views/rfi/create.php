<?php
$this->breadcrumbs=array(
	'Rfis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rfi', 'url'=>array('index')),
	array('label'=>'Manage Rfi', 'url'=>array('admin')),
);
?>

<h1>Create Rfi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>