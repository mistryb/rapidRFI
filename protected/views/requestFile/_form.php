<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'request-file-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rfi_id'); ?>
		<?php echo $form->textField($model,'rfi_id'); ?>
		<?php echo $form->error($model,'rfi_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uploaded_date'); ?>
		<?php echo $form->textField($model,'uploaded_date'); ?>
		<?php echo $form->error($model,'uploaded_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uploaded_by'); ?>
		<?php echo $form->textField($model,'uploaded_by'); ?>
		<?php echo $form->error($model,'uploaded_by'); ?>
	</div>
        
        <?php $this->widget('ext.xupload.XUploadWidget', array(
                                'url'=> Yii::app()->createUrl("site/upload"),
                                'model'=> $model,
                                'atttribute'=>'file',
        ));
        ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->