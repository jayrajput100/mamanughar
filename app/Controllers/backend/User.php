<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\UserModel;
use App\Libraries\Crud;
use App\Models\backend\UserloginModel;
class User extends BaseController
{
	protected $crud;
  function __construct() {
      $params = [
                  'table'       => 'pack_user', 
                  'table_title' => 'User', 
                  'dev'         => false, 
                  'fields'      => $this->fields_options(), 
                  'base'        => base_url() . '/user', 
                ];
      $this->crud = new Crud($params, service('request'));
      $this->userlogin=new UserloginModel(); 
  }
  protected function fields_options() {
    $fields = [];
    $fields['id']       = ['label' => 'ID'];
    $fields['fname']    = ['label' => 'First Name'];
    $fields['lname']    = ['label' => 'Last Name'];
    $fields['email']    = ['label' => 'Email'];
    $fields['mobile']   = ['label' => 'Mobile'];
    $fields['gender']   = ['label' => 'Gender'];
    $fields['address']  = ['label' => 'Address'];
    return $fields;
  }
	public function add()
  { 
		$title['page'] = 'Add User';
		if ($this->request->getMethod() == "post") {
      $UserModel    = new UserModel();
      $data['fname']    = $this->request->getVar('fname');
      $data['lname']    = $this->request->getVar('lname');
      $data['email']    = $this->request->getVar('email');
      $data['mobile']   = $this->request->getVar('mobile');
      $data['gender']   = $this->request->getVar('gender');
      $data['address']  = $this->request->getVar('address');
      $data['company_name']  = $this->request->getVar('company_name');
     
      $UserModel->save($data);
      $response = ['msg' => 'User Added Successfully!', 'type' => 'success'];
      echo json_encode($response);
    } else {
		  echo view('backend/layout/header',$title);
			echo view('backend/layout/sidebar');
			echo view('backend/user/add');
			echo view('backend/layout/footer');
		}
	}
	public function list(){ 
		$title['page'] = 'List User';
    $page = 1;
    if (isset($_GET['page'])) {
      $page = (int)$_GET['page'];
      $page = max(1, $page);
    }
    $data['title'] = $this->crud->getTableTitle();
    $per_page = 100000;
    $columns  = ['fname','lname',[
                            'label' => 'Mobile',
                            'callback' => 'callback_mobile',  
                          ],
                          [
                            'label' => 'Email',
                            'callback' => 'callback_email',  
                          ],'address'];
    $where = null;
    $order = [['id', 'DESC']];
    $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
		echo view('backend/layout/header',$title);
		echo view('backend/layout/sidebar');
		echo view('backend/user/index', $data);
		echo view('backend/layout/footer');
	}
  public function view() {
    $title['page'] = 'View User';
    $id = $this->request->getVar('id');
    if ($id != '') {
      $UserModel = new UserModel();
      $data['user'] = $UserModel->where('id', $id)->first();
      echo view('backend/layout/header', $title);
      echo view('backend/layout/sidebar');
      echo view('backend/user/view', $data);
      echo view('backend/layout/footer');
    } else {
      return redirect()->to(base_url() . '/dashboard');
    }
  }
  public function edit() {
    $title['page'] = 'Edit User';
    $UserModel = new UserModel();
    $id = $this->request->getVar('id');
    $data['user'] = $UserModel->where('id', $id)->first();
    echo view('backend/layout/header', $title);
    echo view('backend/layout/sidebar');
    echo view('backend/user/edit', $data);
    echo view('backend/layout/footer');
  }
  public function update() {
    if ($this->request->getMethod() == "post") {
      $id = $this->request->getVar('id');
      $UserModel = new UserModel();
      $data['fname']    = $this->request->getVar('fname');
      $data['lname']    = $this->request->getVar('lname');
      $data['email']    = $this->request->getVar('email');
      $data['mobile']   = $this->request->getVar('mobile');
      $data['gender']   = $this->request->getVar('gender');
      $data['address']  = $this->request->getVar('address');
      $data['company_name']  = $this->request->getVar('company_name');
      $UserModel->update($id, $data);
      $response = ['msg' => 'User Successfully Updated !', 'type' => 'success'];
      echo json_encode($response);
    }
  }
  public function live()
  {
     
     $title['page'] = 'Live User Entry';
     $data['user_live']= $this->userlogin->findAll();
     echo view('backend/layout/header', $title);
     echo view('backend/layout/sidebar');
     echo view('backend/user/live', $data);
     echo view('backend/layout/footer');
  
  }
}
