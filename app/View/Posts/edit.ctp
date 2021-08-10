<?php
//	debug($post);
?>
<div>
	<h1 style="font-size: 25px;color: red;font-weight: 700;display: inline;">Tạo mới tin tức</h1>
	<div style="display: inline;float: right" class=""><?php echo $this->HTML->link('Quay lại',
			array('controller' => 'categories', 'action' => 'view', $post['Post']['category_id']),
			array('class' => 'btn btn-danger')); ?><br /></div>
</div>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body');
echo $this->Form->select('status', array(0 => 'Hidden', 1 => 'Public'), array('empty' => false));
echo $this->Form->end('Tạo mới');
?>
