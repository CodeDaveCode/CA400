
<p><?php echo $tblaction['Tblaction']['description'] ?></p>

<br/>

<p>
    <?php echo $this->Html->link('Back', array('action'=>'index')); ?>
    <?php echo $this->Html->link('Edit', array('action'=>'edit', $tblaction['Tblaction']['ref_id'])); ?>
    <?php echo $this->Html->link('Delete', array('action'=>'delete', $tblaction['Tblaction']['ref_id'])); ?>

</p>
