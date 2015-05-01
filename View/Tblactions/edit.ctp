<div class="tblactions form">
    <?php echo $this->Form->create('Tblaction'); ?>
    <fieldset>
        <legend><?php echo __('Edit Tblaction'); ?></legend>
        <?php
        echo $this->Form->hidden('ref_id', array('value' => $this->data['Tblaction']['ref_id']));
        echo $this->Form->hidden('owner_id', array('value' => $this->data['Tblaction']['owner_id']));
        echo $this->Form->hidden('user_id', array('value' => $this->data['Tblaction']['user_id']));
        echo $this->Form->input('date', array('value' => $this->data['Tblaction']['date']));
        echo $this->Form->input('description', array('value' => $this->data['Tblaction']['description']));


        echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') );
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<?php
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );
?>
<br/>
<?php
echo $this->Html->link( "Logout",   array('action'=>'logout') );
?>