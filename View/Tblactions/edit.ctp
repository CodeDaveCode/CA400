<h2>Edit Post</h2>

<?php

echo $this->Form->create('Tblaction', array('action'=>'edit'));
echo $this->Form->input('Description');
//echo $this->Form->input('ActionRef',array('type'=>'hidden'));
echo $this->Form->end('Edit action');
echo $this->Html->link('Back', array('action'=>'index'));

?>
