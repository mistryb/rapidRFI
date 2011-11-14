<?php echo CHtml::beginForm(); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'username'); ?>
        <br/>
        <?php echo CHtml::activeTextField($form,'username') ?>
        <?php echo CHtml::error($form,'username'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'password'); ?>
        <br/>
        <?php echo CHtml::activePasswordField($form,'password') ?>
        <?php echo CHtml::error($form,'password'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeCheckBox($form,'rememberMe'); ?>
        <?php echo CHtml::label('Remember me next time',CHtml::getActiveId($form,'rememberMe')); ?>
    </div>

    <div class="row">
        <?php echo CHtml::submitButton('Login'); ?>        
    </div>

<?php echo CHtml::endForm(); ?>