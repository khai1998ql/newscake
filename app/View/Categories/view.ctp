<div>
	<h1 style="font-size: 25px;color: red;font-weight: 700;display: inline;">Chi tiết danh mục: <span style="color: #00aa00; text-transform: uppercase"><?php echo $category['Category']['name']; ?></span></h1>
	<div style="display: inline;float: right" class=""><?php echo $this->HTML->link('Quay lại',
			array('controller' => 'categories', 'action' => 'index'),
			array('class' => 'btn btn-danger')); ?><br /></div>
	<div style="display: inline;float: right" class=""><?php echo $this->HTML->link('Tạo mới bài viết',
			array('controller' => 'posts', 'action' => 'add', $category['Category']['id']),
			array('class' => 'btn btn-success')); ?><br /></div>
</div>

<table>
	<tr>
		<th>STT</th>
		<th>Tiêu đề</th>
		<th>Trạng thái</th>
		<th>Created</th>
		<th>Updated</th>
		<th>Hành động</th>
	</tr>
	<?php
		$count = 1;
	?>
	<?php foreach ($category['Post'] as $post) : ?>
		<?php
			$className = ($post['status'] == 1) ? 'badge bg-success' : 'badge bg-danger';
			$textName = ($post['status'] == 1) ? 'Public' : 'Hidden';
		?>
		<tr>
			<td><?php echo $count; ?></td>
			<td><?php echo $post['title']; ?></td>
			<td><div class="<?php echo $className; ?>"><?php echo $textName; ?></div></td>
			<td><?php echo $post['created'] ?></td>
			<td><?php echo $post['modified'] ?></td>
			<td>
				<?php echo $this->HTML->link('Xem', array('controller' => 'posts', 'action' => 'view', $post['id']), array('class' => 'btn btn-success')) ?>
				<?php if($post['user_id'] == AuthComponent::user('id')) : ?>
					<?php echo $this->HTML->link('Sửa', array('controller' => 'posts', 'action' => 'edit', $post['id']), array('class' => 'btn btn-danger')) ?>
					<?php echo $this->Form->postLink('Xóa', array('controller' => 'posts', 'action' => 'delete', $post['id'], $category['Category']['id']), array('class' => 'btn btn-dark'),
							array('confirm' => 'Bạn có chắc chắn muốn xóa bài viết này không?')); ?>
				<?php endif; ?>
			</td>
		</tr>
		<?php
			$count++;
		?>
	<?php endforeach; ?>
</table>

