<div>
	<h1 style="font-size: 25px;color: red;font-weight: 700;display: inline;">Chỉnh sửa tin tức</h1>
	<div style="display: inline;float: right" class=""><?php echo $this->HTML->link('Quay lại',
			array('controller' => 'categories', 'action' => 'index'),
			array('class' => 'btn btn-danger')); ?><br /></div>
</div>
<?php
echo $this->Form->create('Category');
echo $this->Form->input('name');
echo $this->Form->select('status', array(0 => 'Hidden', 1 => 'Public'), array('empty' => false));
echo $this->Form->end('Thay đổi');
?>
