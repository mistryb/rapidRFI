<?php
$this->breadcrumbs=array(
	'Rfis',
);

$this->menu=array(
	array('label'=>'Create Rfi', 'url'=>array('create')),
	array('label'=>'Manage Rfi', 'url'=>array('admin')),
);
?>

<h1>Rfis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
