<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Libraries\Crud;
class Demo extends BaseController
{
	protected $crud;
	function __construct()
	{
		$params = [
			'table' => 'users',
			'dev' => false,
			'fields' => $this->fields_options(),
			'form_title_add' => 'Add User',
			'form_title_update' => 'Edit User',
			'form_submit' => 'Add',
			'table_title' => 'Users',
			'form_submit_update' => 'Update',
			'base' => 'backend/demo',

		];

		$this->crud = new Crud($params, service('request'));
	}
	public function list()
	{    
		
		$page = 1;
		if (isset($_GET['page'])) {
			$page = (int) $_GET['page'];
			$page = max(1, $page);
		}

		$data['title'] = $this->crud->getTableTitle();

		$per_page = 10;
		$columns = ['u_id', 'u_firstname', 'u_lastname', 'u_email', 'u_status'];
		$where = null;
		$order = [
			['u_id', 'ASC']
		];
		$data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
	
		 //var_dump($data);
		 echo view('backend/layout/header');
		 echo view('backend/layout/sidebar');
		 echo view('backend/demo/index',$data);
		 echo view('backend/layout/footer');
	}
	protected function fields_options()
	{
		$fields = [];
		$fields['u_id'] = ['label' => 'ID'];
		$fields['u_firstname'] = ['label' => 'First Name'];
		$fields['u_lastname'] = ['label' =>'Last Name'];
		$fields['u_email'] = ['label' =>'Email'];
		$fields['u_password'] = ['label' => 'Password'];
		
		$fields['u_status'] = ['label' =>'Status'];
		$fields['u_created_at'] = ['label' => 'Created at'];

		return $fields;
	}
	function add()
	{
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();
		
		if(is_array($form) && isset($form['redirect']))
		 return redirect()->to($form['redirect']);
		 echo view('backend/layout/header');
		 echo view('backend/layout/sidebar');
		 echo view('backend/demo/add', $data);
		 echo view('backend/layout/footer');
	}

	
	

	

}
