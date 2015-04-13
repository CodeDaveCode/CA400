<h2>Actions</h2>

<table>
    <tr>
        <th>Reference</th>
        <th>Description</th>
    </tr>

    <?php foreach($tblactions as $tblaction) : ?>
        <tr>
            <td><?php echo $this->Html->link($tblaction['Tblaction']['ActionRef'], array('action'=>'view', $tblaction ['Tblaction']['ActionRef'] ));?></td>
            <td><?php echo $tblaction['Tblaction']['Description'] ?></td>
            <td><?php echo $this->Html->link('Edit', array('action'=>'edit',$tblaction['Tblaction']['ActionRef'])); ?></td>
            <td><?php echo $this->Html->link('Delete', array('action'=>'delete',$tblaction['Tblaction']['ActionRef']), NULL, 'Are you sure you want to delete this action?'); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<p><?php echo $this->html->link('Add action',array('action'=>'add')); ?></p>
<br>
