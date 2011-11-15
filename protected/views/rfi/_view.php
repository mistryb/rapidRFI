<div class="view" style="background-color: 
     <?php
     if(isset($data->assigned_to))
     {
      if($data->answered>0)
      {
          if($data->closed>0)
          {
              echo "#A5FF8A";//GREEN:Closed             
          }
          else {
              echo "#FFFFB5";//YELLOW:Answered
          }
      }
      else
      {
          echo "#B8E2EF";//BLUE:Assigned
      }      
     }
     else
     {
        echo "#FFBBBB";//RED:unassigned
     }     
     ?>">
    
	<b style="font-size:25px;">
            <?php echo CHtml::encode($data->rfi_id); ?>
        </b>
        <p style="float:right; font-size: 15px;"><?php echo CHtml::encode($data->date_entered); ?>
        <br />
        <?php
        if (isset($data->assigned_to))
            echo CHtml::encode($data->assignedTo->username); 
        ?>
        </p>
                
	<b><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->rfi_id)); ?></b>     

        <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_entered')); ?>:</b>
	<?php echo CHtml::encode($data->date_entered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_assigned')); ?>:</b>
	<?php echo CHtml::encode($data->date_assigned); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_answered')); ?>:</b>
	<?php echo CHtml::encode($data->date_answered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_closed')); ?>:</b>
	<?php echo CHtml::encode($data->date_closed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assigned_to')); ?>:</b>
	<?php echo CHtml::encode(
                CHtml::value($data->assignedTo, 'username', NULL)
                ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy->username); ?>
	<br />                	
	
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('closed')); ?>:</b>
	<?php echo CHtml::encode($data->closed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />
                 
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->date_updated); ?>
	<br />

	*/ ?>

</div>