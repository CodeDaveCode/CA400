<h2><?php echo $tblaction['Tblaction']['ActionRef'] ?></h2>

<p><?php echo $tblaction['Tblaction']['Description'] ?></p>

<br/>

<p>
    <?php echo $this->Html->link('Back', array('action'=>'index')); ?>
    <?php echo $this->Html->link('Edit', array('action'=>'edit', $tblaction['Tblaction']['ActionRef'])); ?>
    <?php echo $this->Html->link('Delete', array('action'=>'delete', $tblaction['Tblaction']['ActionRef'])); ?>

</p>
