<div class="panel panel-primary">
    <div class="panel-heading">
        <?php echo $this->Form->create('Position', array('action'=>'add')); ?>

        <div class="profiles form">
            Add a Position
        </div>
    </div>

    <fieldset>
        <div class="panel-body">
            <?php
            echo $this->Form->input('company',array('default'=>$this->Session->read('Auth.User.username')));
            echo $this->Form->input('title');

            echo $this->Form->input('description');
            echo $this->Form->input('requirements');

            echo $this->Form->input('closing');
            echo $this->Form->hidden('parent',array('default'=>$this->Session->read('Auth.User.id')));

            ?>
    </fieldset>
    <?php echo $this->Form->end('Create new position'); ?>
</div>
<a class="btn btn-primary"<?php echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );?></a>