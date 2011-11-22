<div class="view">
  <b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
       <?php echo CHtml::link(CHtml::encode($data->filename), Yii::app()->baseUrl.'/uploads/'.$data->rfi_id."/".$data->filename); ?>
    <br />
</div>
    