<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\SubcategoryModel;
use App\Libraries\Crud;
class Subcategory extends BaseController {
    protected $crud;
    function __construct() {
        helper(['dataload']);
        $params = ['table'       =>'pack_sub_category', 
                   'table_title' => 'Sub Category', 
                   'dev'         => false, 
                   'fields'      => $this->fields_options(), 
                   'base'        => base_url() . '/subcategory', ];
        $this->crud = new Crud($params, service('request'));
    }
    public function add() {
        $title['page'] = 'Add sub category';
        if ($this->request->getMethod() == "post") {
            $SubcategoryModel = new SubcategoryModel();
            $data['sub_cat_name'] = $this->request->getVar('sub_cat_name');
            $data['sub_cat_desc'] = $this->request->getVar('sub_cat_desc');
            $data['category_id']  = $this->request->getVar('category_id');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/subcategory/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['sub_cat_image_path'] = $target_path;
            }
            $SubcategoryModel->save($data);
            $response = ['msg' => 'Subcategory Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } else {
            $SubcategoryModel = new SubcategoryModel();
            $data['category'] = $SubcategoryModel->fetch_category();
            echo view('backend/layout/header',$title);
            echo view('backend/layout/sidebar');
            echo view('backend/subcategory/add', $data);
            echo view('backend/layout/footer');
        }
    }
    public function list() {
        $title['page'] = 'List sub category';
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 100;
        $columns = ['sub_cat_name', 'category_id',  [
         'label' => 'Sub Category Image',
         'callback' => 'callback_featured_sub_image',
         'search' => 'sub_cat_image_path',
         'search_field_type' => 'text'
        ]
      ];
        $where = null;
        $order = [['subcategory_id', 'ASC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/subcategory/index', $data);
        echo view('backend/layout/footer');
    }
    protected function fields_options() {
        $fields = [];
        $fields['subcategory_id'] = ['label'    => 'ID'];
        $fields['sub_cat_name']   = ['label'    => 'Subcategory Name'];
        $fields['sub_cat_desc']   = ['label'    => 'Subcategory Description'];
        $fields['category_id']    = ['label'    => 'Category', 
                                     'relation' => ['table'       => 'pack_category', 
                                                    'primary_key' => 'category_id', 
                                                    'display'     => ['category_name'], 
                                                    'order_by'    => 'category_name', 
                                                    'order' => 'ASC'
                                                  ], 
                                    ];
        return $fields;
    }
    public function view() {
        $title['page'] = 'View sub category';
        $id = $this->request->getVar('id');
        if ($id != '') {
            $SubcategoryModel = new SubcategoryModel();
            $data['subcategory'] = $SubcategoryModel->fetch_particular_sub_category($id);
            echo view('backend/layout/header',$title);
            echo view('backend/layout/sidebar');
            echo view('backend/subcategory/view', $data);
            echo view('backend/layout/footer');
        } else {
            return redirect()->to(base_url() . '/dashboard');
        }
    }
    public function edit() {
        $title['page'] = 'Edit sub category';
        $SubcategoryModel = new SubcategoryModel();
        $id = $this->request->getVar('id');
        $data['category']    = $SubcategoryModel->fetch_category();
        $data['subcategory'] = $SubcategoryModel->fetch_particular_sub_category($id);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/subcategory/edit', $data);
        echo view('backend/layout/footer');
    }
    public function update() {
        if ($this->request->getMethod() == "post") {
            $id = $this->request->getVar('subcategory_id');
            $SubcategoryModel = new SubcategoryModel();
            $data['sub_cat_name'] = $this->request->getVar('sub_cat_name');
            $data['sub_cat_desc'] = $this->request->getVar('sub_cat_desc');
            $data['category_id']  = $this->request->getVar('category_id');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/subcategory/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['sub_cat_image_path'] = $target_path;
            }
            $SubcategoryModel->update($id, $data);
            $response = ['msg' => 'Subcategory Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }
}