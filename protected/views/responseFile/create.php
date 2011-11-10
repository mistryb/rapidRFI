<?php
$this->breadcrumbs=array(
	'Response Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ResponseFile', 'url'=>array('index')),
	array('label'=>'Manage ResponseFile', 'url'=>array('admin')),
);
?>

<h1>Create ResponseFile</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>