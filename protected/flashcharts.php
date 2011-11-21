<?php
// General Charts
// Creating an Yii Extension component
$flashChart = Yii::createComponent('application.extensions.yiiopenflashchart.EOFC2');
 
// Minimum usage. You will always need at least this.
$flashChart->begin();
$flashChart->setTitle('RFI Progress','{font-size:15px; padding-bottom:20px;}');

$sqlEntered="SELECT COUNT(*) FROM tbl_rfi";
$data['1']['Status']['status'] = 'Entered';
$data['1']['Status']['count']=Yii::app()->db->createCommand($sqlEntered)->queryScalar();

$sqlAssigned="SELECT COUNT(*) FROM tbl_rfi WHERE assigned_to IS NOT NULL";
$data['2']['Status']['status'] = 'Assigned'; 
$data['2']['Status']['count']=Yii::app()->db->createCommand($sqlAssigned)->queryScalar();

$sqlAnswered="SELECT COUNT(*) FROM tbl_rfi WHERE answered > 0 ";
$data['3']['Status']['status'] = 'Answered';
$data['3']['Status']['count']=Yii::app()->db->createCommand($sqlAnswered)->queryScalar();

$sqlClosed="SELECT COUNT(*) FROM tbl_rfi WHERE closed > 0";
$data['4']['Status']['status'] = 'Closed';
$data['4']['Status']['count']=Yii::app()->db->createCommand($sqlClosed)->queryScalar();

$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Status.count');
$flashChart->setLabelsPath('default.{n}.Status.status');

$flashChart->setLegend('x','Status');
$flashChart->setLegend('y','Number');

$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,100,10)));

$flashChart->renderData('bar');
$flashChart->render(850, 400);  

// User Specific Charts
// Creating an Yii Extension component
$flashChart = Yii::createComponent('application.extensions.yiiopenflashchart.EOFC2');
 
// Minimum usage. You will always need at least this.
$flashChart->begin();
$flashChart->setTitle('My RFIs','{font-size:25px; padding-bottom:20px;}');

$sqlAssigned="SELECT COUNT(*) FROM tbl_rfi WHERE assigned_to=".Yii::app()->user->id;
$data['2']['Status']['status'] = 'Assigned'; 
$data['2']['Status']['count']=Yii::app()->db->createCommand($sqlAssigned)->queryScalar();

$sqlAnswered="SELECT COUNT(*) FROM tbl_rfi WHERE answered > 0 AND assigned_to=".Yii::app()->user->id;
$data['3']['Status']['status'] = 'Answered';
$data['3']['Status']['count']=Yii::app()->db->createCommand($sqlAnswered)->queryScalar();

$sqlClosed="SELECT COUNT(*) FROM tbl_rfi WHERE closed > 0 AND assigned_to=".Yii::app()->user->id;
$data['4']['Status']['status'] = 'Closed';
$data['4']['Status']['count']=Yii::app()->db->createCommand($sqlClosed)->queryScalar();

$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Status.count');
$flashChart->setLabelsPath('default.{n}.Status.status');

$flashChart->setLegend('x','Status');
$flashChart->setLegend('y','Number');

$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,50,10)));

$flashChart->renderData('bar');
$flashChart->render(500, 200);   
?>
