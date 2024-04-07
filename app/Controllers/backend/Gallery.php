<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\GalleryModel;
use App\Libraries\Crud;
use App\Models\backend\SupplierModel;
use App\Models\backend\CatalogModel;
use App\Models\backend\CountryModel;
use App\Models\backend\StateModel;
use App\Models\backend\CityModel;
class Gallery extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_gallery', 
                    'table_title' => 'Gallery Image', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/sl/gallery', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->gallery = new GalleryModel();
        $this->catalog = new CatalogModel(); 
    }
    public function add() 
    {
        $title['page'] = 'Add gallery image';
        if ($this->request->getMethod() == "post") 
        {
            
           
            $data['ip_address']=$_SERVER['REMOTE_ADDR'];
            $data['supplier_id']=(session()->get('user_type')=="supplier")?session()->get('id'):'';
            $gallery_count=$this->gallery->where('supplier_id',$data['supplier_id'])->find();
           if(count($gallery_count)<10)
            { 

                if (isset($_FILES['file'])) 
                {
                    $target_path = "uploads/gallery/";
                    $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                    $data['gallery_image_path'] = $target_path;
                    $data['gallery_image_name']=$_FILES['file']['name'];
                    $data['gallery_image_size']=$_FILES['file']['size'];
                    $data['gallery_status']="Pending";
                }
                $this->gallery->save($data);
                $session = \Config\Services::session();
                $session->setFlashdata('msg', 'Gallery Added Successfully!');
                return redirect()->to(base_url('sl/gallery/add'));
              
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
            
             $data['gallery_count']=$this->gallery->where('supplier_id',$data['supplier_id'])->find();
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sl_sidebar');
            echo view('backend/gallery/add',$data);
            echo view('backend/layout/footer');
        }
    }
    public function fields_options()
    {

        $fields = [];
        $fields['gallery_id']   = ['label' => 'ID'];
        $fields['gallery_image_name'] = ['label' => 'Gallery Image Name'];
        return $fields;
    }
    public function list()
    {
        $title['page'] = 'List Gallery';
        $supplier_id=(session()->get('user_type')=="supplier")?session()->get('id'):'';
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 10;
        $columns = ['gallery_image_name',
        [
         'label' => 'Gallery Image',
         'callback' => 'callback_featured_gallery_image',
         'search' => 'gallery_image_path',
         'search_field_type' => 'text'
        ]
        ];
         $where         = ['supplier_id'=>session()->get('id')];
        $order = [['gallery_id', 'DESC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sl_sidebar');
        echo view('backend/gallery/index', $data);
        echo view('backend/layout/footer');
    }
     public function view() 
     {
        $title['page'] = 'View Gallery Image';
        $id = $this->request->getVar('id');
      

        if ($id != '') {
            $data['gallery'] = $this->gallery->find($id);
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sl_sidebar');
            echo view('backend/gallery/view',$data);
            echo view('backend/layout/footer');
        } else {
            return redirect()->to(base_url() . '/dashboard');
        }
    }
     public function fetch_images()
    {
      if ($this->request->getMethod() == "post") 
      {
         $supplier_id=(session()->get('user_type')=="supplier")?session()->get('id'):'';
         $gallery=$this->gallery->where('supplier_id',$supplier_id)->findAll();
         if(is_array($gallery))
         {

           echo json_encode($gallery);
         }   

      }   

    }
    public function delete_file()
    {
       if ($this->request->getMethod() == "post") 
       {
          $supplier_id=(session()->get('user_type')=="supplier")?session()->get('id'):'';
          $file_name=$this->request->getVar('name');
          $this->gallery->where('supplier_id',$supplier_id)
                        ->where('gallery_image_name',$file_name)->delete();
       
          //$target_path ="uploads/gallery/".$file_name;
          //unlink($target_path);              
 
       } 
    }
    public function change_status()
    {
        $gallery_id = $this->request->getVar('gallery_id');
        $gallery_status = $this->request->getVar('status');
        $data['gallery_status']=$gallery_status;
        $this->gallery->update($gallery_id,$data);
        $response = ['msg' => 'Changed Successfully !', 'type' => 'success'];
        echo json_encode($response);


    }
    public function viewsupplier()
    {
        $title['page'] = 'View supplier';
        $uri = service('uri');
        $id = $uri->getSegment(3);
        $SupplierModel    = new SupplierModel();
        $CountryModel = new CountryModel();
        $StateModel   = new StateModel();
        $CityModel    = new CityModel();
        if ($id != '') 
        {
           $data=['is_read'=>1];
           $this->gallery->update($id,$data);
           $supplier=$this->gallery->find($id);
           $supplier_id=$supplier['supplier_id'];
           $data1['supplier'] = $SupplierModel->viewsupplier($supplier_id);
           $data1['gallery'] = $this->gallery->where('supplier_id',$supplier_id)->findAll();
           $data1['catalog'] = $this->catalog->where('supplier_id',$supplier_id)->findAll(); 


           $data1['country'] = $CountryModel->fetch_country();
           $data1['state']   = $StateModel->fetch_state();
           $data1['city']    = $CityModel->fetch_city();

           $data1['category']    = $SupplierModel->fetch_category();
           $data1['subcategory'] = $SupplierModel->fetch_sub_category();
           $data1['third_subcategory'] = $SupplierModel->fetch_third_subcategory();

           $data1['business_category'] = $this->Business_Category();
           $data1['supplier_type']     = $this->Supplier_Type();
           echo view('backend/layout/header',$title);
           echo view('backend/layout/sidebar');
           echo view('backend/supplier/view',$data1);
           echo view('backend/layout/footer'); 

        } 
         
    }
     public function Business_Category()
    {
      $business_category = array(
        '1'=> 'Manufacture',
        '2'=> 'Exports/Imports',
        '3'=>'Services',
        '4'=>'Trading',
        '5'=>'Consultation',
        '6'=>'Organization',
        '7'=>'Others'

      );
      return $business_category;
    }
    public function Supplier_Type()
    {
       $supplier_type = array(
        '1'=> 'Propritorship',
        '2'=> 'Private Limited',
        '3'=>'Public Limited',
        '4'=>'LLP',
        '5'=>'Govt. Agency/Dept',
        '6'=>'Others'

      );
      return $supplier_type;
    }
    public function viewsuppliercatalog()
    {
        $title['page'] = 'View supplier';
        $uri = service('uri');
        $id = $uri->getSegment(3);
        $SupplierModel    = new SupplierModel();
        $CountryModel = new CountryModel();
        $StateModel   = new StateModel();
        $CityModel    = new CityModel();
        if ($id != '') 
        {
           $data=['is_read'=>1];
           $this->catalog->update($id,$data);
           $supplier=$this->catalog->find($id);
           $supplier_id=$supplier['supplier_id'];
           $data1['supplier'] = $SupplierModel->viewsupplier($supplier_id);
           $data1['gallery'] = $this->gallery->where('supplier_id',$supplier_id)->findAll();
           $data1['catalog'] = $this->catalog->where('supplier_id',$supplier_id)->findAll(); 


           $data1['country'] = $CountryModel->fetch_country();
           $data1['state']   = $StateModel->fetch_state();
           $data1['city']    = $CityModel->fetch_city();

           $data1['category']    = $SupplierModel->fetch_category();
           $data1['subcategory'] = $SupplierModel->fetch_sub_category();
           $data1['third_subcategory'] = $SupplierModel->fetch_third_subcategory();

           $data1['business_category'] = $this->Business_Category();
           $data1['supplier_type']     = $this->Supplier_Type();
           echo view('backend/layout/header',$title);
           echo view('backend/layout/sidebar');
           echo view('backend/supplier/view',$data1);
           echo view('backend/layout/footer'); 

        } 
         
    }

}