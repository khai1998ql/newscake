<?php
	class PostsController extends AppController {
		public $components = array('Session');

		/**
		 * @param $id
		 */
		public function add($id){
			if($this->request->is('post')){
				$this->Post->create();
				$this->request->data['Post']['category_id'] = $id;
				$this->request->data['Post']['user_id'] = AuthComponent::user('id');
				if($this->Post->save($this->request->data)){
					$this->Session->setFlash('Tạo mới bài đăng thành công!');
					$this->redirect('/categories/view/'.$id);
				}
			}
			$this->set(array('categories' => $this->Post->Category->find('list'), 'id' => $id));
		}

		/**
		 * @param $id
		 * @param $category_id
		 */
		public function delete($id, $category_id){
			$this->Post->id = $id;

			$data = $this->Post->findById($id);
			if($data['Post']['user_id'] == AuthComponent::user('id')){
				if($this->request->is(array('post', 'put'))){
					if($this->Post->delete()){
						$this->Session->setFlash('Xóa bài viết thành công!');
						$this->redirect('/categories/view/'.$category_id);
					}
				}
			}else{
				$this->Session->setFlash('Bạn không có quyền vào trang!');
				$this->redirect('/categories/view/'.$category_id);
			}
		}

		/**
		 * @param $id
		 */
		public function edit($id){
			$data = $this->Post->findById($id);

			if($data['Post']['user_id'] == AuthComponent::user('id')){
				if($this->request->is(array('post', 'put'))){
					$this->Post->id = $id;
					if($this->Post->save($this->request->data)){
						$this->Session->setFlash('Cập nhật bài viết thành công!');
						$this->redirect('/categories/view/'.$data['Post']['category_id']);
					}
				}
				$this->request->data = $data;
				$this->set('post', $data);
			}else{
				$this->Session->setFlash('Bạn không có quyền vào trang!');
				$this->redirect('/categories/view/'.$data['Post']['category_id']);
			}
		}

		/**
		 * @param $id
		 */
		public function view($id){
			$data = $this->Post->findById($id);
			$this->set('post', $data);
		}
	}
