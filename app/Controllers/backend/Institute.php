<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\InstituteModel;
use App\Models\backend\TestModel;
use App\Libraries\Crud;
class Institute extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_institute', 
                    'table_title' => 'Institute', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/institute', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->institute=new InstituteModel();
        $this->test=new TestModel();
    }
    public function add() 
    {
        $title['page'] = 'Add Institute';
        if ($this->request->getMethod() == "post") 
        {
          
            $data['institute_type'] = $this->request->getVar('institute_type');
            $data['institute_name'] = $this->request->getVar('institute_name');
            $data['institute_contact_person'] = $this->request->getVar('institute_contact_person');
            $data['institute_mobile'] = $this->request->getVar('institute_mobile');
            $data['institute_email'] = $this->request->getVar('institute_email');
            $data['institute_website'] = $this->request->getVar('institute_website');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/institute/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['institute_image'] = $target_path;
            }
            // New Added 
            $data['ins_phone_no'] = $this->request->getVar('ins_phone_no');
            $data['test_id'] = ($this->request->getVar('test_id')!='')?implode( ",", $this->request->getVar('test_id') ):'';
            $data['ins_course'] =($this->request->getVar('ins_course')!='')?implode(",",$this->request->getVar('ins_course')):''; 

            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            
            $this->institute->save($data);
            $response = ['msg' => 'Institute Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } 
        else 
        {
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sidebar');
            echo view('backend/institute/add');
            echo view('backend/layout/footer');
        }
    }
    protected function fields_options()
    {
        $fields = [];
        $fields['id'] = ['label' => 'ID'];
        $fields['institute_name'] = ['label' => 'Institute Name'];
        $fields['institute_type'] = ['label' => 'Institute Type'];
        $fields['institute_contact_person'] = ['label' => 'contact Person Name'];
        $fields['institute_mobile'] = ['label' => 'Mobile No.'];
        $fields['institute_email'] = ['label' => 'Email ID'];
        return $fields;
    }
     public function list()
    { 
        $title['page'] = 'List Institute';
        $page = 1;
        if (isset($_GET['page'])) 
        {
          $page = (int)$_GET['page'];
          $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 10;
        $columns  = ['institute_name','institute_type','institute_contact_person','institute_mobile','institute_email'];
        $where = null;
        $order = [['institute_id', 'ASC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/institute/index', $data);
        echo view('backend/layout/footer');
    }
    public function view()
    {
        $title['page'] = 'View Institute';
        $id = $this->request->getVar('id');
        if ($id != '') 
        {
          $id = $this->request->getVar('id');
          $data['institute'] = $this->institute->where('institute_id', $id)->first();
         /* print_r($data);*/
          echo view('backend/layout/header', $title);
          echo view('backend/layout/sidebar');
          echo view('backend/institute/view',$data);
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
        $data['institute'] = $this->institute->where('institute_id', $id)->first();
        $data['test']=$this->test->findAll();
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sidebar');
        echo view('backend/institute/edit', $data);
        echo view('backend/layout/footer');
    }
    public function update() 
    {
        if ($this->request->getMethod() == "post") 
        {
            $id = $this->request->getVar('id');
            $data['institute_type'] = $this->request->getVar('institute_type');
            $data['institute_name'] = $this->request->getVar('institute_name');
            $data['institute_contact_person'] = $this->request->getVar('institute_contact_person');
            $data['institute_mobile'] = $this->request->getVar('institute_mobile');
            $data['institute_email'] = $this->request->getVar('institute_email');
            $data['institute_website'] = $this->request->getVar('institute_website');
             // New Added 
            $data['ins_phone_no'] = $this->request->getVar('ins_phone_no');
            $data['test_id'] = ($this->request->getVar('test_id')!='')?$this->request->getVar('test_id'):'';
            $data['ins_course'] =($this->request->getVar('ins_course')!='')?$this->request->getVar('ins_course'):''; 
            $this->institute->update($id, $data);
            $response = ['msg' => 'Institute Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }
}    