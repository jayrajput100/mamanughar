<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\Third_SubcategoryModel;
use App\Models\backend\SubcategoryModel;
use App\Libraries\Crud;
class Third_Subcategory extends BaseController {
    protected $crud;
    function __construct() {
        helper(['dataload']);
        $params = ['table'       => 'pack_third_sub_category', 
                   'table_title' => 'Third Subcategory', 
                   'dev'         => false, 
                   'fields'      => $this->fields_options(), 
                   'base'        => base_url() . '/third_subcategory', 
                  ];
        $this->crud = new Crud($params, service('request'));
    }
    public function add() {
        $title['page'] = 'Add Third Subcategory';
        if ($this->request->getMethod() == "post") {
            $Third_SubcategoryModel = new Third_SubcategoryModel();
            $data['third_subcategory_name'] = $this->request->getVar('third_subcategory_name');
            $data['category_id']            = $this->request->getVar('category_id');
            $data['subcategory_id']         = $this->request->getVar('subcategory_id');
            $data['description']            = $this->request->getVar('description');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/third_subcategory/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['image_path'] = $target_path;
            }
            $Third_SubcategoryModel->save($data);
            $response = ['msg' => 'Third Subcategory Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } else {
            $SubcategoryModel = new SubcategoryModel();
            $data['category'] = $SubcategoryModel->fetch_category();
            echo view('backend/layout/header',$title);
            echo view('backend/layout/sidebar');
            echo view('backend/third_subcategory/add',$data);
            echo view('backend/layout/footer');
        }
    }
    public function list() 
    {
        $title['page'] = 'List Third Subcategory';
        $page = 1;
        if (isset($_GET['page'])) {
          $page = (int)$_GET['page'];
          $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page      = 10000;
        $columns       = ['third_subcategory_name','subcategory_id','category_id',
        [
         'label' => 'Third Sub Category Image',
         'callback' => 'callback_featured_third_image',
         'search' => 'image_path',
         'search_field_type' => 'text'
        ]


        ];
        $where         = null;
        $order         = [['third_subcategory_id', 'ASC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/third_subcategory/index', $data);
        echo view('backend/layout/footer');
    }
    protected function fields_options() {
        $fields = [];
        $fields['third_subcategory_id']  = ['label' => 'ID'];
        $fields['third_subcategory_name']= ['label' => 'Third Subcategory'];
       
        $fields['category_id']           = ['label'   => 'Category', 
                                           'relation' => [ 'table'       => 'pack_category', 
                                                           'primary_key' => 'category_id', 
                                                           'display'     => ['category_name'], 
                                                           'order_by'    => 'category_name', 
                                                           'order'        => 'ASC'
                                                          ], 
                                          ];
        $fields['subcategory_id']        = ['label'    => 'Subcategory', 
                                            'relation' => [ 'table'       => 'pack_sub_category', 
                                                            'primary_key' => 'subcategory_id', 
                                                            'display'     => ['sub_cat_name'], 
                                                            'order_by'    => 'sub_cat_name', 
                                                            'order'       => 'ASC'
                                                          ], 
                                           ];                          
        return $fields;
    }
    public function view() {
      $title['page'] = 'View Third Subcategory';
      $id = $this->request->getVar('id');
      if ($id != '') {
        $Third_SubcategoryModel    = new Third_SubcategoryModel();
        $data['third_subcategory'] = $Third_SubcategoryModel->viewthirdcategory($id);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/third_subcategory/view',$data);
        echo view('backend/layout/footer');
      } else {
        return redirect()->to(base_url() . '/dashboard');
      }
    }
    public function edit() {
        $title['page'] = 'Edit Third Subcategory';
        $id = $this->request->getVar('id');
        $Third_SubcategoryModel    = new Third_SubcategoryModel();
        $data['category']               = $Third_SubcategoryModel->fetch_category();
        $data['subcategory']            = $Third_SubcategoryModel->fetch_subcategory();
        $data['third_subcategory']      = $Third_SubcategoryModel->viewthirdcategory($id);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/third_subcategory/edit',$data);
        echo view('backend/layout/footer');
    }
    public function update() {
        if ($this->request->getMethod() == "post") {
            $id = $this->request->getVar('third_subcategory_id');
            $Third_SubcategoryModel = new Third_SubcategoryModel();
             $data['third_subcategory_name'] = $this->request->getVar('third_subcategory_name');
            $data['category_id']             = $this->request->getVar('category_id');
            $data['subcategory_id']          = $this->request->getVar('subcategory_id');
            $data['description']             = $this->request->getVar('description');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/third_subcategory/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['image_path'] = $target_path;
            }
            $Third_SubcategoryModel->update($id, $data);
            $response = ['msg' => 'Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }
    public function getcategory(){
      if (isset($_POST['id'])) {
        $Third_SubcategoryModel = new Third_SubcategoryModel();
        $data['category'] = $Third_SubcategoryModel->getcategory($_POST['id']);
        echo json_encode($data);
      }
    }
    public function getsubcategory()
    {
      if (isset($_POST['id'])) 
      { 
        $id=$this->request->getVar('id'); 
        $Third_SubcategoryModel = new Third_SubcategoryModel();
        $i=0;
        foreach ($id as $key => $value) 
        {
          $data['subcategory'][$i++] = $Third_SubcategoryModel->getsubcategory($value);
          
        }
         echo json_encode($data);    
        
      }
    }
    
    public function getsubcategory1()
    {
       if (isset($_POST['id'])) 
      { 
        $id=$this->request->getVar('id'); 
        $Third_SubcategoryModel = new Third_SubcategoryModel();
        $i=0;
        
          $data['subcategory'] = $Third_SubcategoryModel->getsubcategory($id);
          
      
         echo json_encode($data);    
        
      }
    }
}