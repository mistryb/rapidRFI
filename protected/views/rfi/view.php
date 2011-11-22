<?php
$this->breadcrumbs=array(
	'Rfis'=>array('index'),
	$model->id,
);
?>

<h1><?php echo $model->id; ?> : <?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
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

<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'collapsed'=>true,
        'legend'=>'<h1>Timeline</h1>',
        'legendHtmlOptions'=>array('title'=>'Timeline of RFI')
    )); ?>
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
<?php $this->endWidget('ext.coolfieldset.JCollapsibleFieldset'); ?>

<br />

<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'collapsed'=>true,
        'legend'=>'<h1>Attached Documents</h1>',
        'legendHtmlOptions'=>array('title'=>'Timeline of RFI')
    )); ?>

<?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$uploadDataProvider,
                        'itemView' => '_file',
                        )
                );
?>


<?php $this->endWidget('ext.coolfieldset.JCollapsibleFieldset'); ?>
