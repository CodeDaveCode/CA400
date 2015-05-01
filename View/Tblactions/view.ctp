<div class="panel panel-primary">
    <div class="panel-heading">

        <h1 class="panel-title">User Profile - <?php echo $tblaction['Tblaction']['user_id']?> - Note: <?php echo $tblaction['Tblaction']['ref_id'] ?></h1>
    </div>
    <div class="panel-body"><?php echo $tblaction['Tblaction']['description'] ?></div>


    <div class="panel-footer clearfix">


        <div class="pull-right">
            <a class="btn btn-primary" <?php echo $this->Html->link('Edit', array('action'=>'edit', $tblaction['Tblaction']['ref_id'])); ?></a>
            <a class="btn btn-default" <?php echo $this->Html->link('Back', array('action'=>'index')); ?></a>        </div>
    </div>
</div>
<br/>


