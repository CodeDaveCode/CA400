<div class="panel panel-primary">
    <div class="panel-heading">
            <?php echo $this->Form->create('Position'); ?>

            <div class="profiles form">
                Edit Position
            </div>
        </div>

        <fieldset>
                <div class="panel-body">
                <?php
                echo $this->Form->hidden('id', array('value' => $this->data['Position']['id']));

                echo $this->Form->input('company', array('value' => $this->data['Position']['company']));
                echo $this->Form->input('title', array('value' => $this->data['Position']['title']));
                echo $this->Form->input('description', array('value' => $this->data['Position']['description']));
                echo $this->Form->input('requirements', array('value' => $this->data['Position']['requirements']));
                echo $this->Form->input('closing', array('value' => $this->data['Position']['closing']));
                echo $this->Form->hidden('parent', array('value' => $this->data['Position']['parent']));

                echo $this->Form->submit('Edit Position', array('class' => 'form-submit',  'title' => 'Click here to add the profile') );
                ?>
                </div>
        </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
<a class="btn btn-primary"<?php echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );?></a>

