<?php
$this->breadcrumbs=array(
        'RFIs'=>array('index'),
	'My RFIs',
);

$this->menu=array(
        array(
                'label'=>'All RFIs',
                'url'=>array('index'),            
        ),
        array(
                'label'=>'My RFIs',
                'url'=>array('myrfi'),
        ),
        array(  
                'label'=>'Create Rfi', 
                'url'=>array('create'), 
                'visible'=> Yii::app()->user->checkAccess('RFI Manager'),
            ),
	array(  
                'label'=>'Manage Rfi', 
                'url'=>array('admin'),
                'visible'=> Yii::app()->user->checkAccess('RFI Manager'),
            )
        );
?>
<?php
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

<ul id="legendlist">
    <li style="background-color:#FFFFB5;">Answered</li>
    <li style="background-color:#A5FF8A;">Closed</li>
</ul>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
