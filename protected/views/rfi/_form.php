<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rfi-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rfi_id'); ?>
		<?php echo $form->textField($model,'rfi_id'); ?>
		<?php echo $form->error($model,'rfi_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_entered'); ?>
		<?php echo $form->textField($model,'date_entered'); ?>
		<?php echo $form->error($model,'date_entered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_assigned'); ?>
		<?php echo $form->textField($model,'date_assigned'); ?>
		<?php echo $form->error($model,'date_assigned'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_answered'); ?>
		<?php echo $form->textField($model,'date_answered'); ?>
		<?php echo $form->error($model,'date_answered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_closed'); ?>
		<?php echo $form->textField($model,'date_closed'); ?>
		<?php echo $form->error($model,'date_closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assigned_to'); ?>
		<?php echo $form->textField($model,'assigned_to',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'assigned_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_updated'); ?>
		<?php echo $form->textField($model,'date_updated'); ?>
		<?php echo $form->error($model,'date_updated'); ?>
	</div> 
        
        <div class="row">
                <?php echo $form->labelEx($model,'uploaded_file'); ?>
                <?php echo $form->fileField($model,'uploaded_file'); ?>
                <?php echo $form->error($model,'uploaded_file'); ?>
        </div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
        
        
       
</div><!-- form -->