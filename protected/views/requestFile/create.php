<?php
$this->breadcrumbs=array(
	'Request Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RequestFile', 'url'=>array('index')),
	array('label'=>'Manage RequestFile', 'url'=>array('admin')),
);
?>
<h1>Create RequestFile</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>