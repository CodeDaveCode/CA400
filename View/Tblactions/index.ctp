<h2>Actions</h2>

<table id="table_id" class="display">
    <thead>
    <tr>
        <th>Reference</th>
        <th>Ref</th>
        <th>Description</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($tblactions as $tblaction) : ?>
            <tr>
                <td><?php echo $this->Html->link($tblaction['Tblaction']['ActionRef'], array('action'=>'view', $tblaction ['Tblaction']['ActionRef'] ));?></td>
                <td><?php echo $tblaction['Tblaction']['OrgRef'] ?></td>
                <td><?php echo $tblaction['Tblaction']['Description'] ?></td>
                <td><?php echo $this->Html->link('Edit', array('action'=>'edit',$tblaction['Tblaction']['ActionRef'])); ?></td>
                <td><?php echo $this->Html->link('Delete', array('action'=>'delete',$tblaction['Tblaction']['ActionRef']), NULL, 'Are you sure you want to delete this action?'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<p><?php echo $this->html->link('Add action',array('action'=>'add')); ?></p>
<br>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable(
            {
                bInfo: false,
                paging: false
            });
    } );
</script>