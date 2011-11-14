<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'request-file-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' =>array(
            'enctype'=>'mutipart/form-data',
        )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>	             	
        
        <div class="row" style="display:none">
		<?php echo $form->labelEx($model,'rfi_id'); ?>
		<?php echo $form->textField($model,'rfi_id'); ?>
		<?php echo $form->error($model,'rfi_id'); ?>
	</div>
        
        <div class="row">
        <?php echo $form->labelEx($model,'filename'); ?>
        <?php  $this->widget('CMultiFileUpload',
            array(  'model'=>$model,
                    'attribute' => 'filename',
                    'accept'=> 'doc|docx|pdf|txt',
                    'denied'=>'Only doc,docx,pdf and txt are allowed', 
                    'max'=>1,
                    'remove'=>'[x]',
                    'duplicate'=>'Already Selected',                          
                ));?>
        <?php echo $form->error($model,'filename'); ?>      
        </div>               	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->