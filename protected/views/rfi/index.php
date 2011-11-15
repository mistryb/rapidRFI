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
<ul id="legendlist">
    <li style="background-color:#FFBBBB;">Unassigned</li>
    <li style="background-color:#B8E2EF;">Assigned</li>
    <li style="background-color:#FFFFB5;">Answered</li>
    <li style="background-color:#A5FF8A;">Closed</li>
</ul>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
