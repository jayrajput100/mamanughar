<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\CountryModel;
use App\Libraries\Crud;

class Country extends BaseController
{
	protected $crud;
  function __construct() {
      $params = [
                  'table'       => 'pack_country', 
                  'table_title' => 'Country', 
                  'dev'         => false, 
                  'fields'      => $this->fields_options(), 
                  'base'        => base_url() . '/country', 
                ];
      $this->crud = new Crud($params, service('request'));
  }
  protected function fields_options() {
    $fields = [];
    $fields['country_id']   = ['label' => 'ID'];
    $fields['country_name'] = ['label' => 'Country Name'];
    $fields['note']         = ['label' => 'Note'];
    return $fields;
  }
	public function add(){ 
		$title['page'] = 'Add Country';
		if ($this->request->getMethod() == "post") {
      $CountryModel    = new CountryModel();
      $data['country_name'] = $this->request->getVar('country_name');
      $data['note']         = $this->request->getVar('note');
      $CountryModel->save($data);
      $response = ['msg' => 'Country Added Successfully!', 'type' => 'success'];
      echo json_encode($response);
    } else {
		  echo view('backend/layout/header',$title);
			echo view('backend/layout/sidebar');
			echo view('backend/country/add');
			echo view('backend/layout/footer');
		}
	}
	public function list(){ 
		$title['page'] = 'List Country';
    $page = 1;
    if (isset($_GET['page'])) {
      $page = (int)$_GET['page'];
      $page = max(1, $page);
    }
    $data['title'] = $this->crud->getTableTitle();
    $per_page = 10;
    $columns  = ['country_name','note'];
    $where = null;
    $order = [['country_id', 'ASC']];
    $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
		echo view('backend/layout/header',$title);
		echo view('backend/layout/sidebar');
		echo view('backend/country/index', $data);
		echo view('backend/layout/footer');
	}
  public function view() {
    $title['page'] = 'View Country';
    $id = $this->request->getVar('id');
    if ($id != '') {
      $CountryModel = new CountryModel();
      $data['country'] = $CountryModel->where('country_id', $id)->first();
      echo view('backend/layout/header', $title);
      echo view('backend/layout/sidebar');
      echo view('backend/country/view', $data);
      echo view('backend/layout/footer');
    } else {
      return redirect()->to(base_url() . '/dashboard');
    }
  }
  public function edit() {
    $title['page'] = 'Edit Country';
    $CountryModel = new CountryModel();
    $id = $this->request->getVar('id');
    $data['country'] = $CountryModel->where('country_id', $id)->first();
    echo view('backend/layout/header', $title);
    echo view('backend/layout/sidebar');
    echo view('backend/country/edit', $data);
    echo view('backend/layout/footer');
  }
  public function update() {
    if ($this->request->getMethod() == "post") {
      $id = $this->request->getVar('country_id');
      $CountryModel    = new CountryModel();
      $data['country_name'] = $this->request->getVar('country_name');
      $data['note']         = $this->request->getVar('note');
      $CountryModel->update($id, $data);
      $response = ['msg' => 'Country updated Successfully!', 'type' => 'success'];
      echo json_encode($response);
    }
  }
}
