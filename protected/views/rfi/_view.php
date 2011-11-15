<div class="view">

	<b style="font-size:25px;">
            <?php echo CHtml::encode($data->rfi_id); ?>
        </b>
                
	<b><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->rfi_id)); ?></b>
	<p style="float:right; font-size: 15px;"><?php echo CHtml::encode($data->date_entered); ?></p>
        <br />

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