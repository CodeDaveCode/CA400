<h2>Users</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
    </tr>

    <?php foreach($users as $user) : ?>
        <tr>
            <td><?php echo $this->Html->link($user['User']['id'], array('action'=>'view', $user ['User']['id'] ));?></td>
            <td><?php echo $user['User']['username'] ?></td>
            <td><?php echo $user['User']['email'] ?></td>
            <td><?php echo $user['User']['role'] ?></td>
            <td><?php echo $this->Html->link('Edit', array('action'=>'edit', $user ['User']['id'])); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<p><?php echo $this->html->link('Add user',array('action'=>'add')); ?></p>
<br>

