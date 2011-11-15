<div class="view">    
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
       <?php echo CHtml::link(CHtml::encode($data->filename), Yii::app()->baseUrl.'/uploads/'.$data->rfi_id."/".$data->filename); ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('uploaded_by')); ?>:</b>
	<?php echo CHtml::encode($data->uploadedBy->username); ?>
    <br />
    
</div>