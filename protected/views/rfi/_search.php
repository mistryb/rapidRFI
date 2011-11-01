<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rfi_id'); ?>
		<?php echo $form->textField($model,'rfi_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_entered'); ?>
		<?php echo $form->textField($model,'date_entered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_assigned'); ?>
		<?php echo $form->textField($model,'date_assigned'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_answered'); ?>
		<?php echo $form->textField($model,'date_answered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_closed'); ?>
		<?php echo $form->textField($model,'date_closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assigned_to'); ?>
		<?php echo $form->textField($model,'assigned_to',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_updated'); ?>
		<?php echo $form->textField($model,'date_updated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->