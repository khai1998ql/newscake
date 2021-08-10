<div class="container">
	<div>
		<h1 style="font-size: 25px;color: red;font-weight: 700;display: inline;">Chi tiết tin tức</h1>
		<div style="display: inline;float: right" class=""><?php echo $this->HTML->link('Quay lại',
				array('controller' => 'categories', 'action' => 'view', $post['Post']['category_id']),
				array('class' => 'btn btn-danger')); ?><br /></div>
	</div>
	<div class="row" style="margin-top: 40px">
		<div class="card text-dark bg-light mb-3" style="width: 100%;">
			<div class="card-header"><?php echo $post['Post']['title']; ?></div>
			<div class="card-body">
				<h5 class="card-title">Danh mục: <?php echo $post['Category']['name']; ?></h5>
				<p class="card-text"><?php echo $post['Post']['body']; ?></p>
			</div>
		</div>
	</div>
</div>
