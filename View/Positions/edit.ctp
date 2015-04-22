

<div class="profiles form">
    <?php echo $this->Form->create('Position'); ?>
    <fieldset>
        <legend><?php echo __('Edit Position'); ?></legend>
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
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<?php
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );
?>
