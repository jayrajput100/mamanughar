<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\InnovactionModel;
use App\Libraries\Crud;
class Innovaction extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_innovaction', 
                    'table_title' => 'Innovaction', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/innovaction', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->innovaction=new InnovactionModel();
    }
     public function add() 
    {
        $title['page'] = 'Add Innovaction';
        if ($this->request->getMethod() == "post") 
        {
          
            $data['innovaction_title'] = $this->request->getVar('innovaction_title');
            $data['innovaction_description'] = $this->request->getVar('innovaction_description');
            
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            if (isset($_FILES['file'])) 
            {
                $target_path = "uploads/innovaction/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['innovaction_image'] = $target_path;
            }
            $user_type=session()->get('user_type');
            if($user_type=='supplier')
            {
                $data['supplier_id']=session()->get('id');
            }    
           
            $this->innovaction->save($data);
            $response = ['msg' => 'Innovaction Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } 
        else 
        {
            $user_type=session()->get('user_type');
            echo view('backend/layout/header',$title);
            if($user_type=='supplier')
            {
             echo view('backend/layout/sl_sidebar');
            }
            else
            {
              echo view('backend/layout/sidebar');   
            }  
            echo view('backend/innovaction/add');
            echo view('backend/layout/footer');
        }
    }
     protected function fields_options() 
     {
        $fields = [];
        $fields['id'] = ['label' => 'ID'];
        $fields['innovaction_title'] = ['label' => 'Title'];
        $fields['innovaction_description'] = ['label' => 'Description'];
        return $fields;
    }
    public function list()
    { 
        $title['page'] = 'List Innovaction';
        $page = 1;
        if (isset($_GET['page'])) 
        {
          $page = (int)$_GET['page'];
          $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 10;
        $columns  = ['innovaction_title','innovaction_description'];
        $user_type=session()->get('user_type');
        if($user_type=='supplier')
        {
        $where = ['supplier_id'=>session()->get('id')];
        }
        else
        {
          $where = null;    
        }    
        $order = [['innovaction_id', 'ASC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        
        
        echo view('backend/layout/header',$title);
        if($user_type=='supplier')
        {
         echo view('backend/layout/sl_sidebar');
        }
        else
        {
          echo view('backend/layout/sidebar');   
        } 
        echo view('backend/innovaction/index', $data);
        echo view('backend/layout/footer');
    }
    public function view()
    {
        $title['page'] = 'View Innovaction';
        $id = $this->request->getVar('id');
        if ($id != '') 
        {
          $id = $this->request->getVar('id');
          $data['innovaction'] = $this->innovaction->where('innovaction_id', $id)->first();
         /* print_r($data);*/
          echo view('backend/layout/header', $title);
          $user_type=session()->get('user_type');
             if($user_type=='supplier')
            {
             echo view('backend/layout/sl_sidebar');
            }
            else
            {
              echo view('backend/layout/sidebar');   
            }
          echo view('backend/innovaction/view',$data);
          echo view('backend/layout/footer');
        } 
        else 
        {
          return redirect()->to(base_url() . '/dashboard');
        }
    }
    public function edit() 
    {
        $title['page'] = 'Edit Innovaction';
        $id = $this->request->getVar('id');
        $user_type=session()->get('user_type');
        $data['innovaction'] = $this->innovaction->where('innovaction_id', $id)->first();
        echo view('backend/layout/header', $title);
       if($user_type=='supplier')
        {
         echo view('backend/layout/sl_sidebar');
        }
        else
        {
          echo view('backend/layout/sidebar');   
        }
        echo view('backend/innovaction/edit', $data);
        echo view('backend/layout/footer');
    }
    public function update() 
    {
        if ($this->request->getMethod() == "post") 
        {
            $id = $this->request->getVar('id');
            $data['innovaction_title'] = $this->request->getVar('innovaction_title');
            $data['innovaction_description'] = $this->request->getVar('innovaction_description');
            if (isset($_FILES['file'])) 
            {
                $target_path = "uploads/innovaction/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['innovaction_image'] = $target_path;
            }
            $user_type=session()->get('user_type');
            if($user_type=='supplier')
            {
                $data['supplier_id']=session()->get('id');
            } 
            $this->innovaction->update($id, $data);
            $response = ['msg' => 'Innovaction Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }

}    