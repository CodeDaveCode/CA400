<h2>Add an Action</h2>

<?php

echo $this->Form->create('Tblaction', array('action'=>'add'));
echo $this->Form->hidden('owner_id',array('default'=>$this->Session->read('Auth.User.username')));
echo $this->Form->hidden('user_id',array('default'=>$userRef));
echo $this->Form->input('description');
echo $this->Form->input('access');
echo $this->Form->end('Create new action');
echo $this->Html->link('Back', array('action'=>'index', $userRef));

?>
