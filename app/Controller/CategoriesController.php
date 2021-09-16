<?php
	class CategoriesController extends AppController {
		public $components = array('Session');
		public $helpers = array('PhpExcel');
		public function index(){
			$data = $this->Category->find('all');
			$this->set('categories', $data);
			if(isset($this->request->query['xuat_excel']) && $this->request->query['xuat_excel']){
				// Xứ lý xuất excel
				$this->layout = null;
				$this->render('excel_report');
			}
		}

		/**
		 *
		 */
		public function add(){
//			debug(WWW_ROOT . 'files/');die;
			if($this->request->is('post')){
//				debug($this->request);die;
				$this->Category->create();
				$fileName = $this->request->data['Category']['category_path']['name'];
				$uploadPath =  'files/';
				$uploadFile = WWW_ROOT . $uploadPath . $fileName;
				if(move_uploaded_file($this->request->data['Category']['category_path']['tmp_name'],$uploadFile)){
					$this->request->data['Category']['user_id'] = AuthComponent::user('id');
					$this->request->data['Category']['category_path'] = $uploadPath . $fileName;
					if($this->Category->save($this->request->data)){
						$this->Session->setFlash('Tạo mới danh mục thành công!');
						$this->redirect('index');
					}else{
						$this->Session->setFlash('Error');
					}
				}

			}
		}

		/**
		 * @param $id
		 */
		public function edit($id){

			$data = $this->Category->findById($id);
			if($data['Category']['user_id'] == AuthComponent::user('id')){
				if($this->request->is(array('post', 'put'))){
					$this->Category->id = $id;
					if($this->Category->save($this->request->data)){
						$this->Session->setFlash('Thay đổi dữ liệu thành công!');
						$this->redirect('index');
					}
				}
				$this->request->data = $data;
			}else{
				$this->Session->setFlash('Bạn không có quyền vào trang!');
				$this->redirect('index');
			}

		}

		/**
		 * @param $id
		 */
		public function delete($id){
			$this->Category->id = $id;
			$data = $this->Category->findById($id);
			if($data['Category']['user_id'] == AuthComponent::user('id')){
				if($this->request->is(array('post', 'put'))){
					if($this->Category->delete()){
						$this->Session->setFlash('Danh mục đã được xóa!');
						$this->redirect('index');
					}
				}
			}else{
				$this->Session->setFlash('Bạn không có quyền vào trang!');
				$this->redirect('index');
			}

		}

		/**
		 * @param $id
		 */
		public function view($id){
			$data = $this->Category->findById($id);
			$this->set('category', $data);
		}
		public function download($id){
			$this->layout = null;
			$data = $this->Category->findById($id);
			$this->set('data', $data);
		}
	}
