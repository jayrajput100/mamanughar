<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\StateModel;
use App\Libraries\Crud;

class State extends BaseController
{
	protected $crud;
  function __construct() {
      $params = [
                  'table'       => 'pack_state', 
                  'table_title' => 'State', 
                  'dev'         => false, 
                  'fields'      => $this->fields_options(), 
                  'base'        => base_url() . '/state', 
                ];
      $this->crud = new Crud($params, service('request'));
  }
  protected function fields_options() {
    $fields = [];
    $fields['state_id']     = ['label' => 'ID'];
    $fields['state_name']   = ['label' => 'State'];
    $fields['note']         = ['label' => 'Note'];
    $fields['country_id']   = ['label' => 'Country', 
                               'relation' => ['table'       => 'pack_country', 
                                              'primary_key' => 'country_id', 
                                              'display'     => ['country_name'], 
                                              'order_by'    => 'country_name', 
                                              'order'       => 'ASC'], 
                                            ];
    return $fields;
  }
	public function add(){ 
		$title['page'] = 'Add State';
		if ($this->request->getMethod() == "post") {
      $StateModel    = new StateModel();
      $data['state_name'] = $this->request->getVar('state_name');
      $data['note']       = $this->request->getVar('note');
      $data['country_id'] = $this->request->getVar('country_id');
      $StateModel->save($data);
      $response = ['msg' => 'State Added Successfully!', 'type' => 'success'];
      echo json_encode($response);
    } else {
      $StateModel = new StateModel();
      $data['country'] = $StateModel->fetch_country();
		  echo view('backend/layout/header',$title);
			echo view('backend/layout/sidebar');
			echo view('backend/state/add',$data);
			echo view('backend/layout/footer');
		}
	}
	public function list(){ 
		$title['page'] = 'List state';
    $page = 1;
    if (isset($_GET['page'])) {
      $page = (int)$_GET['page'];
      $page = max(1, $page);
    }
    $data['title'] = $this->crud->getTableTitle();
    $per_page = 1000000;
    $columns  = ['state_name','country_id','note'];
    $where = null;
    $order = [['state_id', 'ASC']];
    $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
		echo view('backend/layout/header',$title);
		echo view('backend/layout/sidebar');
		echo view('backend/state/index', $data);
		echo view('backend/layout/footer');
	}
  public function view() {
    $title['page'] = 'View State';
    $id = $this->request->getVar('id');
    if ($id != '') {
      $StateModel = new StateModel();
      $data['state']   = $StateModel->fetch_staterecord($id);
      echo view('backend/layout/header', $title);
      echo view('backend/layout/sidebar');
      echo view('backend/state/view', $data);
      echo view('backend/layout/footer');
    } else {
      return redirect()->to(base_url() . '/dashboard');
    }
  }
  public function edit() {
    $title['page'] = 'Edit state';
    $StateModel = new StateModel();
    $id = $this->request->getVar('id');
    
    $data['country'] = $StateModel->fetch_country();
    $data['state']   = $StateModel->fetch_staterecord($id);

    echo view('backend/layout/header', $title);
    echo view('backend/layout/sidebar');
    echo view('backend/state/edit', $data);
    echo view('backend/layout/footer');
  }
  public function update() {
    if ($this->request->getMethod() == "post") {
      $id = $this->request->getVar('state_id');
      $StateModel    = new StateModel();
      $data['state_name'] = $this->request->getVar('state_name');
      $data['note']       = $this->request->getVar('note');
      $data['country_id'] = $this->request->getVar('country_id');
      $StateModel->update($id, $data);
      $response = ['msg' => 'State updated Successfully!', 'type' => 'success'];
      echo json_encode($response);
    }
  }
}
