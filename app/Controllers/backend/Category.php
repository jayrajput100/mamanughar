<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\CategoryModel;
use App\Libraries\Crud;
class Category extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_category', 
                    'table_title' => 'Category', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/category', 
                ];
        $this->crud = new Crud($params, service('request'));
    }
    public function add() 
    {
        $title['page'] = 'Add category';
        if ($this->request->getMethod() == "post") {
            $CategoryModel = new CategoryModel();
            $data['category_name'] = $this->request->getVar('category_name');
            $data['category_desc'] = $this->request->getVar('category_desc');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/category/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['category_image_path'] = $target_path;
            }
            $CategoryModel->save($data);
            $response = ['msg' => 'Category Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } else {
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sidebar');
            echo view('backend/category/add');
            echo view('backend/layout/footer');
        }
    }
    
    public function list() 
    {
        $title['page'] = 'List Category';
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page = 10;
        $columns = ['category_name',
        [
         'label' => 'Category Image',
         'callback' => 'callback_featured_image',
         'search' => 'category_image_path',
         'search_field_type' => 'text'
        ], 'category_desc'];
        $where = null;
        $order = [['category_id', 'DESC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sidebar');
        echo view('backend/category/index', $data);
        echo view('backend/layout/footer');
    }
    protected function fields_options() {
        $fields = [];
        $fields['category_id']   = ['label' => 'ID'];
        $fields['category_name'] = ['label' => 'Category Name'];
        $fields['category_desc'] = ['label' => 'Category Description'];
        return $fields;
    }
    public function view() {
        $title['page'] = 'View Category';
        $id = $this->request->getVar('id');
        $CategoryModel = new CategoryModel();

        if ($id != '') {
            $data['category'] = $CategoryModel->fetch_category($id);
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sidebar');
            echo view('backend/category/view',$data);
            echo view('backend/layout/footer');
        } else {
            return redirect()->to(base_url() . '/dashboard');
        }
    }
    public function edit() {
        $title['page'] = 'Edit Category';
        $CategoryModel = new CategoryModel();
        $id = $this->request->getVar('id');

        if ($id != '') {
          $data['category'] = $CategoryModel->fetch_category($id);
          echo view('backend/layout/header', $title);
          echo view('backend/layout/sidebar');
          echo view('backend/category/edit', $data);
          echo view('backend/layout/footer');
        } else {
          return redirect()->to(base_url() . '/dashboard');
        }
    }
    public function update() {
        if ($this->request->getMethod() == "post") {
            $id = $this->request->getVar('category_id');
            $CategoryModel = new CategoryModel();
            $data['category_name'] = $this->request->getVar('category_name');
            $data['category_desc'] = $this->request->getVar('category_desc');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/category/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['category_image_path'] = $target_path;
            }
            $CategoryModel->update($id, $data);
            $response = ['msg' => 'Category updated successfully!', 'type' => 'success'];
            echo json_encode($response);
        }
    }
    public function popadd() {

      
        $title['page'] = 'Add category';
        if ($this->request->getMethod() == "post") {
            $CategoryModel = new CategoryModel();
            $data['category_name'] = $this->request->getVar('category_name');
            $data['category_desc'] = $this->request->getVar('category_desc');
            if (isset($_FILES['file'])) {
                $target_path = "uploads/category/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['category_image_path'] = $target_path;
            }
            $CategoryModel->save($data);
            $response = ['msg' => 'Category Added Successfully!', 'type' => 'success'];
            echo json_encode($response);
        } else {
            echo view('backend/layout/header', $title);
            echo view('backend/layout/sidebar');
            echo view('backend/category/add');
            echo view('backend/layout/footer');
        }
    }
    public function fetch_category()
    {   
        $CategoryModel = new CategoryModel();
        $data= $CategoryModel->findAll();
        echo json_encode($data);
    }
}