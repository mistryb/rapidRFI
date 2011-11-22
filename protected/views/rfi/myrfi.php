<?php
$this->breadcrumbs=array(
        'RFIs'=>array('index'),
	'My RFIs',
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
<div id="legend">
   <ul id="legendlist">
    <li style="background-color:#FFFFB5;">Open</li>
    <li style="background-color:#FFFFB5;">Unassigned</li>
    <li style="background-color:#A5FF8A;">Unanswered</li>
    </ul>    
</div>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
