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
                echo $this->Form->hidden('ID', array('value' => $this->data['Position']['ID']));

                echo $this->Form->input('Company', array('value' => $this->data['Position']['Company']));
                echo $this->Form->input('Title', array('value' => $this->data['Position']['Title']));
                echo $this->Form->input('Description', array('value' => $this->data['Position']['Description']));
                echo $this->Form->input('Requirements', array('value' => $this->data['Position']['Requirements']));
                echo $this->Form->input('Closing', array('value' => $this->data['Position']['Closing']));
                echo $this->Form->hidden('Parent', array('value' => $this->data['Position']['Parent']));

                echo $this->Form->submit('Edit Position', array('class' => 'form-submit',  'title' => 'Click here to add the profile') );
                ?>
                </div>
        </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
<a class="btn btn-primary"<?php echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );?></a>

