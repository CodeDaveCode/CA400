<!-- app/View/Users/add.ctp -->
<div class="users form">

    <?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo ('Add Student'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('password_confirm',
            array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
        echo $this->Form->input('role',
            array('default'=>'student', 'type'=>'hidden'));


        echo $this->Form->submit('Add User',
            array('class' => 'form-submit',  'title' => 'Click here to add the user') );
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<?php
/*if($this->Session->check('Auth.User')){
    echo $this->Html->link( "Return to Index",   array('action'=>'index') );
    echo "<br>";
    echo $this->Html->link( "Logout",   array('action'=>'logout') );
}else{
    echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') );
}
*/?><!--

-->


