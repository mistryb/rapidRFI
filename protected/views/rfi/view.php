<?php
$this->breadcrumbs=array(
	'Rfis'=>array('index'),
	$model->rfi_id,
);

$this->menu=array(
	array('label'=>'My RFIs', 'url'=>array('myrfi')),
	array(  'label'=>'Create Rfi', 
                'url'=>array('create'), 
                'visible'=> Yii::app()->user->checkAccess('RFI Manager')),
	array(  'label'=>'Update Rfi', 
                'url'=>array(
                    'update', 
                    'id'=>$model->rfi_id
                        ), 
                'visible'=> Yii::app()->user->checkAccess('Rfi:Update', array('rfi'=>$model)),
            ),
	array(  'label'=>'Delete Rfi', 
                'url'=>'#',
                'visible'=> Yii::app()->user->checkAccess('RFI Manager'),
                'linkOptions'=>array(
                        'submit'=>array(
                            'delete',
                            'id'=>$model->rfi_id),
                            'confirm'=>'Are you sure you want to delete this item?'
                    )
            ),
	array(  'label'=>'Manage Rfi', 
                'url'=>array('admin'),
                'visible'=> Yii::app()->user->checkAccess('RFI Manager')
        ),
        array(  'label'=>'Attach a Request File', 
                'url'=>array(
                    'requestfile/create',
                    'id'=>$model->rfi_id,
                        ),                
        ),
        array(  'label'=>'Attach a Response File', 
                'url'=>array(
                    'responsefile/create',
                    'id'=>$model->rfi_id,
                    ),               
        ),
);
?>

<h1>View Rfi #<?php echo $model->rfi_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rfi_id',
		'date_entered',
		'date_assigned',
		'date_answered',
		'date_closed',
		array(
                    'label'=>'Assigned To',
                    'type' =>'raw',
                    'value'=>CHtml::link(CHtml::encode(
                            CHtml::value($model->assignedTo,'username', NULL)
                            ),
                            array('user/view', 'id'=>CHtml::value($model->assignedTo, 'id', null)
                            )),
                ),
                array(
                    'label'=>'Answered',
                    'type'=>'boolean',
                    'value'=>$model->answered,
                ),
                array(
                    'label'=>'Closed',
                    'type'=>'boolean',
                    'value'=>$model->closed,
                ),
                array(
                    'label'=>'Created By',
                    'type' =>'raw',
                    'value'=>CHtml::link(CHtml::encode($model->createdBy->username),
                            array('user/view', 'id'=>$model->createdBy->id)),
                ),
                array(
                    'label'=>'Updated By',
                    'type' =>'raw',
                    'value'=>CHtml::link(CHtml::encode($model->updatedBy->username),
                            array('user/view', 'id'=>$model->updatedBy->id)),
                ),		
		'date_updated',                
	),
        'nullDisplay'=>'Not Set',
)); ?>

</br>
<h1>Request Files for Rfi #<?php echo $model->rfi_id; ?></h1>
<?php $this->widget( 'zii.widgets.CListView', array(
        'dataProvider' => $requestDataProvider,       
        'itemView' => '_file',
    ));
?>
<h1>Response Files for Rfi #<?php echo $model->rfi_id; ?></h1>
<?php $this->widget( 'zii.widgets.CListView', array(
        'dataProvider' => $responseDataProvider,       
        'itemView' => '_file',
    ));
?>


