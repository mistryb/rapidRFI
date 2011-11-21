<?php
$this->breadcrumbs=array(
	'Rfis'=>array('index'),
	$model->id,
);
?>

<h1>View Rfi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                'title',                
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
<br/>
<h1>Time Line for Rfi #<?php echo $model->id; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model->timeline,
                        'attributes'=>array(
                            'rfi_id',
                            'date_entered',
                            'date_assigned',
                            'date_answered',
                            'date_closed',
                            'date_responded',
                        ),
                        'nullDisplay'=>'Not Set',
                        )
                );
?>
