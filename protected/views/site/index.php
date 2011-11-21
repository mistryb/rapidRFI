<?php $this->pageTitle=Yii::app()->name; ?>

<?php
    if(!Yii::app()->user->checkAccess('Authenticated'))
    {
        ?>
        <h1>Welcome to Rapidfire <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
        <p> You may login using the link below:</p>
        <?php echo CHtml::link('Login', array('site/login'));
    }
    else{
        ?>
        <h1>You Are Logged In</h1>
<?php        
    }
?>

