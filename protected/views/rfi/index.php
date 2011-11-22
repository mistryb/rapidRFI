<?php
$this->breadcrumbs=array(
	'Rfis',
);

$this->menu=array(
        array(
                'label'=>'All RFIs',
                'url'=>array('index'),            
        ),
        array(
                'label'=>'My RFIs',
                'url'=>array('myrfi'),
        ),
        array(  
                'label'=>'Create Rfi', 
                'url'=>array('create'), 
                'visible'=> Yii::app()->user->checkAccess('RFI Manager'),
            ),
	array(  
                'label'=>'Manage Rfi', 
                'url'=>array('admin'),
                'visible'=> Yii::app()->user->checkAccess('RFI Manager'),
            )
        );
?>

<h1>All RFIs</h1>
<div id="legend">
    <ul id="legendlist">
        <li style="background-color:#FFBBBB;">Open</li>
        <li style="background-color:#B8E2EF;">Unassigned</li>
        <li style="background-color:#FFFFB5;">Unanswered</li>
    </ul>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
