<h2>Positions</h2>

<table>
    <tr>
        <th>Reference</th>
        <th>Position</th>
    </tr>

    <?php foreach($positions as $position) : ?>
        <tr>
            <td><?php echo $this->Html->link($position['Position']['ID'], array('action'=>'view', $position ['Position']['ID'] ));?></td>
            <td><?php echo $position['Position']['Title'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<p><?php echo $this->html->link('Add position',array('action'=>'add')); ?></p>
<br>
<p><?php echo $this->Html->link( "Logout",   array('action'=>'logout') );?></p>
