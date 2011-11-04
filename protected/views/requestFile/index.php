<?php
$this->breadcrumbs=array(
	'Request Files',
);

$this->menu=array(
	array('label'=>'Create RequestFile', 'url'=>array('create')),
	array('label'=>'Manage RequestFile', 'url'=>array('admin')),
);
?>

<h1>Request Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
