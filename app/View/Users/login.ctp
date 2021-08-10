<div style="display: inline;float: right"><?php echo $this->HTML->link('Đăng ký',
			array('controller' => 'users', 'action' => 'add'),
			array('class' => 'btn btn-success')); ?><br />
</div>
<div style="display: inline;">
	<h1>Log in</h1>
</div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Đăng nhập');
