<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rfi_id')); ?>:</b>
	<?php echo CHtml::encode($data->rfi_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
	<?php echo CHtml::encode($data->filename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploaded_date')); ?>:</b>
	<?php echo CHtml::encode($data->uploaded_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploaded_by')); ?>:</b>
	<?php echo CHtml::encode($data->uploaded_by); ?>
	<br />


</div>