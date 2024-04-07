<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\ExhibitionModel;
use App\Libraries\Crud;
class Exhibition extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_exhibition', 
                    'table_title' => 'Exhibition', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/exhibition', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->exhibition=new ExhibitionModel();
    }
     public function add() 
    {
        $title['page'] = 'Add Exhibition';
        if ($this->request->getMethod() == "post") 
        {
            $data['exhibition_name'] = $this->request->getVar('exhibition_name');
            $data['exhibition_from_date'] = $this->request->getVar('from_date');
            $data['exhibition_to_date'] = $this->request->getVar('to_date');
            $data['exhibition_description'] = $this->request->getVar('exhibition_description');
            $data['exhibition_venue'] = $this->request->getVar('exhibition_venue');
            $data['exhibition_city'] = $this->request->getVar('exhibition_city');
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            if (isset($_FILES['file'])) 
            {
                $target_path = "uploads/exhibition/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['exhibition_logo'] = $target_path;
            }
            $this->exhibition->save($data);
            $response = ['msg' => 'Exhibition Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } 
        else 
        {
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sidebar');
            echo view('backend/exhibition/add');
            echo view('backend/layout/footer');
        }
    }
     protected function fields_options() 
     {
        $fields = [];
        $fields['id'] = ['label' => 'ID'];
        $fields['exhibition_from_date'] = ['label' => 'From Date'];
        $fields['exhibition_to_date'] = ['label' => 'To Date'];
        $fields['exhibition_name'] = ['label' => 'Exhibition Name'];
        $fields['exhibition_venue'] = ['label' => 'Exhibition venue'];
        
        return $fields;
    }
    public function list()
    { 
        $title['page'] = 'List Exhibition';
        $page = 1;
        if (isset($_GET['page'])) 
        {
          $page = (int)$_GET['page'];
          $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 10;
        $columns  = ['exhibition_name','exhibition_venue','exhibition_from_date','exhibition_to_date','exhibition_description'];
        $where = null;
        $order = [['exhibition_id', 'ASC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/exhibition/index', $data);
        echo view('backend/layout/footer');
    }
    public function view()
    {
        $title['page'] = 'View Exhibition';
        $id = $this->request->getVar('id');
        if ($id != '') 
        {
          $id = $this->request->getVar('id');
          $data['exhibition'] = $this->exhibition->where('exhibition_id', $id)->first();
         /* print_r($data);*/
          echo view('backend/layout/header', $title);
          echo view('backend/layout/sidebar');
          echo view('backend/exhibition/view',$data);
          echo view('backend/layout/footer');
        } 
        else 
        {
          return redirect()->to(base_url() . '/dashboard');
        }
    }
    public function edit() 
    {
        $title['page'] = 'Edit Exhibition';
        $id = $this->request->getVar('id');
        $data['exhibition'] = $this->exhibition->where('exhibition_id', $id)->first();
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sidebar');
        echo view('backend/exhibition/edit', $data);
        echo view('backend/layout/footer');
    }
    public function update() 
    {
        if ($this->request->getMethod() == "post") 
        {
            $id = $this->request->getVar('id');
            $data['exhibition_name'] = $this->request->getVar('exhibition_name');
            $data['exhibition_from_date'] = $this->request->getVar('from_date');
            $data['exhibition_to_date'] = $this->request->getVar('to_date');
            $data['exhibition_description'] = $this->request->getVar('exhibition_description');
            $data['exhibition_venue'] = $this->request->getVar('exhibition_venue');
            $data['exhibition_city'] = $this->request->getVar('exhibition_city');
            if (isset($_FILES['file'])) 
            {
                $target_path = "uploads/innovaction/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['exhibition_logo'] = $target_path;
            }
            $this->exhibition->update($id, $data);
            $response = ['msg' => 'Exhibition Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }

}    