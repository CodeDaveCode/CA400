<?php $ID = $position['Position']['ID'] ?>
<?php $TITLE = $position['Position']['Title'] ?>
<?php $pID = $position['Position']['Parent'] ?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title"><?php echo $position['Position']['Title'] ?> - <?php echo $position['Position']['Company'] ?></h1>
    </div>

    <div class="panel-body">Description: <?php echo $position['Position']['Description'] ?></div>
    <div class="panel-body">Requirements: <?php echo $position['Position']['Requirements'] ?></div>
    <div class="panel-body">Closing:  <?php echo $position['Position']['Closing'] ?></div>


    <div class="panel-footer clearfix">
        <div class="pull-right">
            <a class="btn btn-primary"<?php echo $this->html->link('Apply',array('controller' => 'Applicants', 'action' => 'add',$ID,$TITLE,$pID));?></a>
            <a class="btn btn-primary"<?php echo $this->html->link('View Employer',array('controller' => 'Profiles', 'action' => 'view',$pID));?></a>
            <a class="btn btn-default"<?php echo $this->Html->link('Return',array('action'=>'index') );?></a>
        </div>
    </div>
</div>

