<?php

?>
<div>
	<h1 style="font-size: 25px;color: red;font-weight: 700;display: inline;">Tạo mới danh mục</h1>
	<div style="display: inline;float: right" class=""><?php echo $this->HTML->link('Quay lại',
			array('controller' => 'categories', 'action' => 'index'),
			array('class' => 'btn btn-danger')); ?><br /></div>
</div>
<?php
	echo $this->Form->create('Category', array('enctype' => 'multipart/form-data'));
	echo $this->Form->input('name');
	echo $this->Form->input('category_path', array('name' => 'data[Category][category_path][]','type' => 'file', 'multiple' => true));

	echo $this->Form->select('status', array(0 => 'Hidden', 1 => 'Public'), array('empty' => false));

?>
<!--	<input type="file" name="file[]" multiple />-->
<?php echo $this->Form->end('Tạo mới'); ?>
