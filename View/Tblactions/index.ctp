<h2>User Notes</h2>

<table id="table_id" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Owner</th>
        <th>User</th>
        <th>Date</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($tblactions as $tblaction) : ?>
            <tr>
                <td><?php echo $this->Html->link($tblaction['Tblaction']['ref_id'], array('action'=>'view', $tblaction ['Tblaction']['ref_id'], 'Tblaction' ));?></td>
                <td><?php echo $tblaction['Tblaction']['owner_id'] ?></td>
                <td><?php echo $tblaction['Tblaction']['user_id'] ?></td>
                <td><?php echo $tblaction['Tblaction']['date'] ?></td>
                <td><a class="btn btn-primary"<?php echo $this->Html->link('Edit', array('action'=>'edit',$tblaction['Tblaction']['ref_id'])); ?></a></td>
                <td><a class="btn btn-default"<?php echo $this->Html->link('Delete', array('action'=>'delete',$tblaction['Tblaction']['ref_id']), NULL, 'Are you sure you want to delete this action?'); ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<a class="btn btn-primary"<?php echo $this->html->link('Add note',array('action'=>'add' , $tblaction['Tblaction']['user_id'] )); ?></a>
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