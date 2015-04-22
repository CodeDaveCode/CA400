<div class="tblactions form">
    <?php echo $this->Form->create('Tblaction'); ?>
    <fieldset>
        <legend><?php echo __('Edit Tblaction'); ?></legend>
        <?php
        echo $this->Form->input('ActionRef', array('value' => $this->data['Tblaction']['ActionRef']));

        echo $this->Form->input('OrgRef', array('value' => $this->data['Tblaction']['OrgRef']));
        echo $this->Form->input('EnteredByRef', array('value' => $this->data['Tblaction']['EnteredByRef']));
        echo $this->Form->input('DateEntered', array('value' => $this->data['Tblaction']['DateEntered']));
        echo $this->Form->input('DateDue', array('value' => $this->data['Tblaction']['DateDue']));
        echo $this->Form->input('OwnerRef', array('value' => $this->data['Tblaction']['OwnerRef']));
        echo $this->Form->input('Completed', array('value' => $this->data['Tblaction']['Completed']));
        echo $this->Form->input('Description', array('value' => $this->data['Tblaction']['Description']));
        echo $this->Form->input('ClearedByRef', array('value' => $this->data['Tblaction']['ClearedByRef']));
        echo $this->Form->input('IsVisit', array('value' => $this->data['Tblaction']['IsVisit']));

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