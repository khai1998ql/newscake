<div>
	<h1 style="font-size: 25px;color: red;font-weight: 700;display: inline;">Danh mục tin tức</h1>
	<div style="display: inline;float: right; margin-left: 5px;" class=""><?php echo $this->HTML->link('Logout',
				array('controller' => 'users', 'action' => 'logout'),
				array('class' => 'btn btn-danger')); ?><br /></div>
	<div style="display: inline;float: right; margin-left: 5px;" class=""><?php echo $this->HTML->link('Tạo mới danh mục',
				array('controller' => 'categories', 'action' => 'add'),
				array('class' => 'btn btn-success')); ?><br /></div>
	<div style="display: inline;float: right" class=""><?php echo $this->HTML->link('Xuất Excel',
				array('controller' => 'categories', 'action' => 'index', '?xuat_excel=1'),
				array('class' => 'btn btn-primary')); ?><br /></div>
</div>
<table>
	<tr>
		<th>STT</th>
		<th>Tên danh mục</th>
		<th>Trạng thái</th>
		<th>Created</th>
		<th>Updated</th>
		<th>Hành động</th>
	</tr>
	<?php
		$count = 1;
	?>
	<?php foreach ($categories as $category) : ?>
		<?php
			$className = ($category['Category']['status'] == 1) ? 'badge bg-success' : 'badge bg-danger';
			$textName = ($category['Category']['status'] == 1) ? 'Public' : 'Hidden';
		?>
		<tr>
			<td><?php echo $count; ?></td>
			<td><?php echo $category['Category']['name']; ?></td>
			<td><div class="<?php echo $className; ?>"><?php echo $textName; ?></div></td>
			<td><?php echo $category['Category']['created']; ?></td>
			<td><?php echo $category['Category']['modified']; ?></td>
			<td>
				<?php echo $this->HTML->link('Xem', array('controller' => 'categories', 'action' => 'view', $category['Category']['id']), array('class' => 'btn btn-success')) ?>
				<?php echo $this->HTML->link('Sửa', array('controller' => 'categories', 'action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-danger')) ?>
<!--				<span class="btn btn-danger">Sửa</span>-->
				<?php echo $this->Form->postLink('Xóa', array('controller' => 'categories', 'action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-dark'),
				array('confirm' => 'Bạn có chắc chắn muốn xóa danh mục này không?')); ?>
<!--				<span class="btn btn-dark">Xóa</span>-->
			</td>
		</tr>
		<?php
		$count++;
		?>
	<?php endforeach; ?>
</table>


