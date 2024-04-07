<?php 
namespace App\Controllers\backend;
use App\Libraries\Crud;
use App\Models\backend\AdvertismentModel;
use App\Models\backend\SupplierModel;
use App\Controllers\BaseController;
class Advertisment extends BaseController{
	protected $crud;
  function __construct() {
    helper(['dataload']);
    $params = ['table'       => 'pack_advertisment', 
               'table_title' => 'Advertisment', 
               'dev'         => false, 
               'fields'      => $this->fields_options(), 
               'base'        => base_url() . '/advertisment', 
              ];
    $this->crud = new Crud($params, service('request'));
    $this->sl = new SupplierModel();
  }
  protected function fields_options() {
    $fields = [];
    $fields['add_id']      = ['label' => 'ID'];
    $fields['title']       = ['label' => 'Title'];
    $fields['start_date']  = ['label' => 'Date'];
    $fields['end_date']    = ['label' => 'Date'];
    $fields['description'] = ['label' => 'Description'];
    return $fields;
  }
	public function add()
  { 
		 $title['page'] = 'Add advertisment';
		 $AdvertismentModel = new AdvertismentModel();
		 if ($this->request->getMethod() == "post") 
     {
      $data['supplier_id']  = $this->request->getVar('supplier_id');
      $data['title']        = $this->request->getVar('title');
      $data['start_date']   = $this->request->getVar('from_date');
      $data['end_date']     = $this->request->getVar('to_date');
      $data['description']  = $this->request->getVar('description');
     	
      
	 

      if (isset($_FILES['file'])) {
        $target_path = "uploads/advertisment/";
        $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $data['add_image'] = $target_path;
      }
      $AdvertismentModel->save($data);
      $response = ['msg' => 'Advertisment Added Successfully!', 'type' => 'success'];
      echo json_encode($response);
    } 
    else 
    {
      $data['supplier']=$this->sl->fetch_supplier();
			echo view('backend/layout/header',$title);
			echo view('backend/layout/sidebar');
			echo view('backend/advertisment/add',$data);
			echo view('backend/layout/footer');
		}
	}
	public function list(){ 
		$title['page'] = 'List Advertisment';
    $page = 1;
    if (isset($_GET['page'])) {
      $page = (int)$_GET['page'];
      $page = max(1, $page);
    }
    $data['title'] = $this->crud->getTableTitle();
    $per_page = 10;
    $columns = ['title','start_date','end_date','description'];
    $where = null;
    $order = [['add_id', 'ASC']];
    $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
		echo view('backend/layout/header',$title);
		echo view('backend/layout/sidebar');
		echo view('backend/advertisment/index',$data);
		echo view('backend/layout/footer');
	}
	public function view() {
      $title['page'] = 'View Advertisment';
      $id = $this->request->getVar('id');
      if ($id != '') {
        $AdvertismentModel = new AdvertismentModel();
        $data['advertisment'] = $AdvertismentModel->viewadvertisment($id);
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sidebar');
        echo view('backend/advertisment/view', $data);
        echo view('backend/layout/footer');
      } else {
  	    return redirect()->to(base_url() . '/dashboard');
      }
  }
  public function edit() {
    $title['page'] = 'Update Advertisment';
    $id = $this->request->getVar('id');
    if ($id != '') {
      $AdvertismentModel = new AdvertismentModel();
      $data['advertisment'] = $AdvertismentModel->viewadvertisment($id);
      $data['supplier']=$this->sl->fetch_supplier();
      echo view('backend/layout/header', $title);
      echo view('backend/layout/sidebar');
      echo view('backend/advertisment/edit', $data);
      echo view('backend/layout/footer');
    } else {
  	  return redirect()->to(base_url() . '/dashboard');
    }
  }
  public function update() {
    $title['page'] = 'Add advertisment';
		$AdvertismentModel = new AdvertismentModel();
		$id = $this->request->getVar('add_id');
		if ($this->request->getMethod() == "post") {
      $data['title']        = $this->request->getVar('title');
      $data['supplier_id']  = $this->request->getVar('supplier_id');
      $data['start_date']   = $this->request->getVar('from_date');
      $data['end_date']     = $this->request->getVar('to_date');
      $data['description']  = $this->request->getVar('description');
     	
     
	 

      if (isset($_FILES['file'])) {
        $target_path = "uploads/advertisment/";
        $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $data['add_image'] = $target_path;
      }
      $AdvertismentModel->update($id, $data);
      $response = ['msg' => 'Advertisment update Successfully!', 'type' => 'success'];
      echo json_encode($response);
    }
  }
}
