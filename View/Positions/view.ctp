<?php $ID = $position['Position']['id'] ?>
<?php $TITLE = $position['Position']['title'] ?>
<?php $pID = $position['Position']['parent'] ?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title"><?php echo $position['Position']['title'] ?> - <?php echo $position['Position']['company'] ?></h1>
    </div>

    <div class="panel-body">Description: <?php echo $position['Position']['description'] ?></div>
    <div class="panel-body">Requirements: <?php echo $position['Position']['requirements'] ?></div>
    <div class="panel-body">Closing:  <?php echo $position['Position']['closing'] ?></div>


    <div class="panel-footer clearfix">
        <div class="pull-right">
            <a class="btn btn-primary"<?php echo $this->html->link('Apply',array('controller' => 'Applicants', 'action' => 'add',$ID,$TITLE,$pID));?></a>
            <a class="btn btn-primary"<?php echo $this->html->link('View Employer',array('controller' => 'Profiles', 'action' => 'view',$pID));?></a>
            <a class="btn btn-primary"<?php echo $this->Html->link('Return',array('action'=>'index') );?></a>
        </div>
    </div>
</div>

