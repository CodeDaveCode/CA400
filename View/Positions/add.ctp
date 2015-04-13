<h2>Add a Position</h2>

<?php

echo $this->Form->create('Position', array('action'=>'add'));
echo $this->Form->input('Title');
echo $this->Form->input('Description');
echo $this->Form->input('Requirements');
echo $this->Form->input('Closing');

echo $this->Form->end('Create new position');
echo $this->Html->link('Back', array('action'=>'index'));

?>
