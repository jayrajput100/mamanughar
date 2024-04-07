<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\CityModel;
use App\Libraries\Crud;

class City extends BaseController
{
	protected $crud;
  function __construct() {
      $params = [
                  'table'       => 'pack_city', 
                  'table_title' => 'City', 
                  'dev'         => false, 
                  'fields'      => $this->fields_options(), 
                  'base'        => base_url() . '/city', 
                ];
      $this->crud = new Crud($params, service('request'));
  }
  protected function fields_options() {
    $fields = [];
    $fields['city_id']      = ['label' => 'ID'];
    $fields['city_name']    = ['label' => 'City'];
    $fields['note']         = ['label' => 'Note'];
    $fields['country_id']   = ['label' => 'Country', 
                               'relation' => ['table'       => 'pack_country', 
                                              'primary_key' => 'country_id', 
                                              'display'     => ['country_name'], 
                                              'order_by'    => 'country_name', 
                                              'order'       => 'ASC'], 
                                            ];
    $fields['state_id']     = ['label' => 'State', 
                               'relation' => ['table'       => 'pack_state', 
                                              'primary_key' => 'state_id', 
                                              'display'     => ['state_name'], 
                                              'order_by'    => 'state_name', 
                                              'order'       => 'ASC'], 
                                            ];
    return $fields;
  }
	public function add(){ 
		$title['page'] = 'Add City';
		if ($this->request->getMethod() == "post") {
      $CityModel    = new CityModel();
      $data['city_name']  = $this->request->getVar('city_name');
      $data['note']       = $this->request->getVar('note');
      $data['country_id'] = $this->request->getVar('country_id');
      $data['state_id']   = $this->request->getVar('state_id');
      $CityModel->save($data);
      $response = ['msg' => 'City Added Successfully!', 'type' => 'success'];
      echo json_encode($response);
    } else {
      $CityModel = new CityModel();
      $data['country'] = $CityModel->fetch_country();
      $data['state']   = $CityModel->fetch_state();
		  echo view('backend/layout/header',$title);
			echo view('backend/layout/sidebar');
			echo view('backend/City/add',$data);
			echo view('backend/layout/footer');
		}
	}
	public function list(){ 
		$title['page'] = 'List City';
    $page = 1;
    if (isset($_GET['page'])) {
      $page = (int)$_GET['page'];
      $page = max(1, $page);
    }
    $data['title'] = $this->crud->getTableTitle();
    $per_page = 100000;
    $columns  = ['city_name','state_id','country_id','note'];
    $where    = null;
    $order    = [['city_name', 'ASC']];
    $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
		echo view('backend/layout/header',$title);
		echo view('backend/layout/sidebar');
		echo view('backend/city/index', $data);
		echo view('backend/layout/footer');
	}
  public function view() {
    $title['page'] = 'View City';
    $id = $this->request->getVar('id');
    if ($id != '') {
      $CityModel = new CityModel();
      $data['city']   = $CityModel->fetch_cityrecord($id);
      echo view('backend/layout/header', $title);
      echo view('backend/layout/sidebar');
      echo view('backend/city/view', $data);
      echo view('backend/layout/footer');
    } else {
      return redirect()->to(base_url() . '/dashboard');
    }
  }
  public function edit() {
    $title['page'] = 'Edit City';
    $CityModel = new CityModel();
    $id = $this->request->getVar('id');
    
    $data['country'] = $CityModel->fetch_country();
    $data['state']   = $CityModel->fetch_state();
    $data['city']    = $CityModel->fetch_cityrecord($id);
    echo view('backend/layout/header', $title);
    echo view('backend/layout/sidebar');
    echo view('backend/city/edit', $data);
    echo view('backend/layout/footer');
  }
  public function update() {
    if ($this->request->getMethod() == "post") {
      $id = $this->request->getVar('city_id');
      $CityModel    = new CityModel();
      $data['city_name']  = $this->request->getVar('city_name');
      $data['note']       = $this->request->getVar('note');
      $data['country_id'] = $this->request->getVar('country_id');
      $data['state_id']   = $this->request->getVar('state_id');
      $CityModel->update($id, $data);
      $response = ['msg' => 'City updated Successfully!', 'type' => 'success'];
      echo json_encode($response);
    }
  }
  public function getstate(){
    if (isset($_POST['id'])) {
      $CityModel = new CityModel();
      $data['state'] = $CityModel->getstate($_POST['id']);
      echo json_encode($data);
    }
  }
  public function getcity(){
    if (isset($_POST['id'])) {
      $CityModel = new CityModel();
      $data['city'] = $CityModel->getcity($_POST['id']);
      echo json_encode($data);
    }
  }
}
