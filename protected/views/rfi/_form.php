<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rfi-form',
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
		<?php echo $form->labelEx($model,'assigned_to'); ?>
                <?php echo $form->dropDownList($model,'assigned_to', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('prompt'=>'Select')); ?>
		
		<?php echo $form->error($model,'assigned_to'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'answered'); ?>
		<?php echo $form->checkBox($model,'answered'); ?>
		<?php echo $form->error($model,'answered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'closed'); ?>
		<?php echo $form->checkBox($model,'closed'); ?>
		<?php echo $form->error($model,'closed'); ?>
	</div>        	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->