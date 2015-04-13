<h2>Add a Post</h2>

<?php

echo $this->Form->create('Tblaction', array('action'=>'add'));
echo $this->Form->input('Description');
echo $this->Form->end('Create new action');
echo $this->Html->link('Back', array('action'=>'index'));

?>
