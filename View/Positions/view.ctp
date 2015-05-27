<?php $ID = $view['Position']['id'] ?>
<?php $TITLE = $view['Position']['title'] ?>
<?php $pID = $view['Position']['parent'] ?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title"><?php echo $view['Position']['title'] ?> - <?php echo $view['Position']['company'] ?></h1>
    </div>

    <div class="panel-body">Description: <?php echo $view['Position']['description'] ?></div>
    <div class="panel-body">Requirements: <?php echo $view['Position']['requirements'] ?></div>
    <div class="panel-body">Closing:  <?php echo $view['Position']['closing'] ?></div>


    <div class="panel-footer clearfix">
        <div class="pull-right">
            <a class="btn btn-primary"<?php echo $this->html->link('View Employer',array('controller' => 'Profiles', 'action' => 'view',$pID, 'Profile'));?></a>
            <a class="btn btn-primary"<?php echo $this->Html->link('Return',array('action'=>'index') );?></a>
        </div>
    </div>
</div>

