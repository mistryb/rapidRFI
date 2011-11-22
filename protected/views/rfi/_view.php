<div class="view">
    
	<b style="font-size:25px;">
            <?php echo CHtml::encode($data->id); ?>
        </b>
        <p style="float:right; font-size: 15px;">
        <br />
        <?php
        if (isset($data->assigned_to))
            echo CHtml::encode($data->assignedTo->username); 
        ?>
        </p>
                
	<b><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></b>        
        <?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'collapsed'=>true,
        'legend'=>'<h3>More Information</h3>',
        'legendHtmlOptions'=>array('title'=>'Timeline of RFI')
    )); ?>
        
        <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data,
	'attributes'=>array(
		array(
                    'label'=>'Assigned To',
                    'type' =>'raw',
                    'value'=>CHtml::link(CHtml::encode(
                            CHtml::value($data->assignedTo,'username', NULL)
                            ),
                            array('user/view', 'id'=>CHtml::value($data->assignedTo, 'id', null)
                            )),
                ),
                array(
                    'label'=>'Created By',
                    'type' =>'raw',
                    'value'=>CHtml::link(CHtml::encode($data->createdBy->username),
                            array('user/view', 'id'=>$data->createdBy->id)),
                ),
                array(
                    'label'=>'Updated By',
                    'type' =>'raw',
                    'value'=>CHtml::link(CHtml::encode($data->updatedBy->username),
                            array('user/view', 'id'=>$data->updatedBy->id)),
                ),		
		'date_updated',                
	),
        'nullDisplay'=>'Not Set',
)); ?>
        
        <?php $this->endWidget('ext.coolfieldset.JCollapsibleFieldset'); ?>

        <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_entered')); ?>:</b>
	<?php echo CHtml::encode($data->date_entered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_assigned')); ?>:</b>
	<?php echo CHtml::encode($data->date_assigned); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_answered')); ?>:</b>
	<?php echo CHtml::encode($data->date_answered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_closed')); ?>:</b>
	<?php echo CHtml::encode($data->date_closed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assigned_to')); ?>:</b>
	<?php echo CHtml::encode(
                CHtml::value($data->assignedTo, 'username', NULL)
                ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy->username); ?>
	<br />                	
	
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('closed')); ?>:</b>
	<?php echo CHtml::encode($data->closed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />
                 
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->date_updated); ?>
	<br />

	*/ ?>

</div>