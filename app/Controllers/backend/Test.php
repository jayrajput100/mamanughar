<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\TestModel;
use App\Libraries\Crud;
class Test extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_test', 
                    'table_title' => 'Test', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/test', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->test=new TestModel();
    }
     public function add() 
    {
        $title['page'] = 'Add Test';
        if ($this->request->getMethod() == "post") 
        {
          
            $data['test_name'] = $this->request->getVar('test_name');
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            
            $this->test->save($data);
            $response = ['msg' => 'Testing Parameter Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } 
        else 
        {
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sidebar');
            echo view('backend/test/add');
            echo view('backend/layout/footer');
        }
    }
     protected function fields_options() 
     {
        $fields = [];
        $fields['id'] = ['label' => 'ID'];
        $fields['test_name'] = ['label' => 'Testing Parameter Name'];
        
        
        return $fields;
    }
    public function list()
    { 
        $title['page'] = 'List Test';
        $page = 1;
        if (isset($_GET['page'])) 
        {
          $page = (int)$_GET['page'];
          $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 10;
        $columns  = ['test_name'];
        $where = null;
        $order = [['test_id', 'DESC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/test/index', $data);
        echo view('backend/layout/footer');
    }
    public function view()
    {
        $title['page'] = 'View Exhibition';
        $id = $this->request->getVar('id');
        if ($id != '') 
        {
          $id = $this->request->getVar('id');
          $data['test'] = $this->test->where('test_id', $id)->first();
         /* print_r($data);*/
          echo view('backend/layout/header', $title);
          echo view('backend/layout/sidebar');
          echo view('backend/test/view',$data);
          echo view('backend/layout/footer');
        } 
        else 
        {
          return redirect()->to(base_url() . '/dashboard');
        }
    }
    public function edit() 
    {
        $title['page'] = 'Edit Test';
        $id = $this->request->getVar('id');
        $data['test'] = $this->test->where('test_id', $id)->first();
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sidebar');
        echo view('backend/test/edit', $data);
        echo view('backend/layout/footer');
    }
    public function update() 
    {
        if ($this->request->getMethod() == "post") 
        {
            $id = $this->request->getVar('id');
            $data['test_name'] = $this->request->getVar('test_name');
            $this->test->update($id, $data);
            $response = ['msg' => 'Testing Parameter Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }
    public function fetch_test()
    {
         $test=$this->test->findAll();
         echo json_encode($test);
    }

}    