<?php
$this->breadcrumbs=array(
	'Response Files',
);

$this->menu=array(
	array('label'=>'Create ResponseFile', 'url'=>array('create')),
	array('label'=>'Manage ResponseFile', 'url'=>array('admin')),
);
?>

<h1>Response Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
