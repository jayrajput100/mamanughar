<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\CatalogModel;
use App\Libraries\Crud;
class Catalog extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_catalog', 
                    'table_title' => 'Catalog', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/sl/catalog', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->catalog = new CatalogModel();
    }
    public function add() 
    {
        $title['page'] = 'Add Catalog';
        if ($this->request->getMethod() == "post") 
        {
            
           
            $data['supplier_id']=(session()->get('user_type')=="supplier")?session()->get('id'):'';
            $catalog_count=$this->catalog->where('supplier_id',$data['supplier_id'])->find();
            if(count($catalog_count)<=1)
            {
                    if (isset($_FILES['file'])) {
                        $target_path = "uploads/catalog/";
                        $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                        $data['catalog_path'] = $target_path;
                        $data['catalog_name']=$_FILES['file']['name'];
                        $data['catalog_size']=$_FILES['file']['size'];
                        $data['ip_address']=$_SERVER['REMOTE_ADDR'];
                    }
                    $this->catalog->save($data);
                    $response = ['msg' => 'Catalog Added Successfully!', 'type' => 'success'];
                    echo json_encode($response);
            }
            else
            {
              header('HTTP/1.1 500 Internal Server Error');
              header('Content-type: text/plain');
              $msg = "Your error message here.";
              exit($msg);
            }    
        
           
        } 
        else {
            $data['supplier_id']=(session()->get('user_type')=="supplier")?session()->get('id'):'';
            $data['catalog_count']=$this->catalog->where('supplier_id',$data['supplier_id'])->find();
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sl_sidebar');
            echo view('backend/catalog/add',$data);
            echo view('backend/layout/footer');
        }
    }
    public function fields_options()
    {

        $fields = [];
        $fields['catalog_id']   = ['label' => 'ID'];
        $fields['catalog_name'] = ['label' => 'Catalog Name'];
        return $fields;
    }
    public function list()
    {
        $title['page'] = 'List Catalog';
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 10;
        $columns = [
            'catalog_name',
        [
         'label' => 'Catalog Image',
         'callback' => 'callback_featured_catalog_image',
         'search' => 'catalog_path',
         'search_field_type' => 'text'
        ]
        ];
        $where         = ['supplier_id'=>session()->get('id')];
        $order = [['catalog_id', 'DESC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sl_sidebar');
        echo view('backend/catalog/index', $data);
        echo view('backend/layout/footer');
    }
    public function view() 
     {
        $title['page'] = 'View Catalog';
        $id = $this->request->getVar('id');
      

        if ($id != '') {
            $data['catalog'] = $this->catalog->find($id);
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sl_sidebar');
            echo view('backend/catalog/view',$data);
            echo view('backend/layout/footer');
        } else {
            return redirect()->to(base_url() . '/dashboard');
        }
    }
    public function fetch_files()
    {
      if ($this->request->getMethod() == "post") 
      {
         $supplier_id=(session()->get('user_type')=="supplier")?session()->get('id'):'';
         $catalog=$this->catalog->where('supplier_id',$supplier_id)->findAll();
         if(is_array($catalog))
         {

           echo json_encode($catalog);
         }   

      }   

    }
     public function delete_file()
    {
       if ($this->request->getMethod() == "post") 
       {
          $supplier_id=(session()->get('user_type')=="supplier")?session()->get('id'):'';
          $file_name=$this->request->getVar('name');
          $this->catalog->where('supplier_id',$supplier_id)
                        ->where('catalog_name',$file_name)->delete();
       
          //$target_path ="uploads/gallery/".$file_name;
          //unlink($target_path);              
 
       } 
    }
     public function change_status()
    {
        $catalog_id = $this->request->getVar('catalog_id');
        $catalog_status = $this->request->getVar('status');
        $data['catalog_status']=$catalog_status;
        $this->catalog->update($catalog_id,$data);
        $response = ['msg' => 'Changed Successfully !', 'type' => 'success'];
        echo json_encode($response);


    }
}    