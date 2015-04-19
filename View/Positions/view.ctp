<p><?php echo $position['Position']['ID'] ?></p>
<p><?php echo $position['Position']['Title'] ?></p>
<p><?php echo $position['Position']['Description'] ?></p>
<p><?php echo $position['Position']['Requirements'] ?></p>
<p><?php echo $position['Position']['Closing'] ?></p>


<?php
echo $this->html->link('Apply',array('controller' => 'Applicants', 'action' => 'add'));
?>