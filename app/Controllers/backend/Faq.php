<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\FaqModel;
use App\Libraries\Crud;
class Faq extends BaseController{
	protected $crud;
  function __construct() {
    helper(['dataload']);
    $params = ['table'       => 'pack_faq', 
               'table_title' => 'FAQ', 
               'dev'         => false, 
               'fields'      => $this->fields_options(), 
               'base'        => base_url() . '/faq', 
              ];
    $this->crud = new Crud($params, service('request'));
  }
	public function add(){ 
		$title['page'] = 'Add FAQ';
		$FaqModel = new FaqModel();
		if ($this->request->getMethod() == "post") {
      $data['question']             = $this->request->getVar('question');
      $data['answer']               = $this->request->getVar('answer');
      $data['category_id']          = $this->request->getVar('category_id');
      $data['subcategory_id']       = $this->request->getVar('subcategory_id');
      $data['third_subcategory_id'] = $this->request->getVar('third_subcategory_id');
      $data['description']          = $this->request->getVar('description');
      if (isset($_FILES['file'])) {
        $target_path = "uploads/third_subcategory/";
        $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $data['image_path'] = $target_path;
      }
      $FaqModel->save($data);
      $response = ['msg' => 'FAQ Added Successfully!', 'type' => 'success'];
      echo json_encode($response);
    } else {
      $data['category'] = $FaqModel->fetch_category();
			echo view('backend/layout/header',$title);
			echo view('backend/layout/sidebar');
			echo view('backend/faq/add',$data);
			echo view('backend/layout/footer');
		}
	}
	protected function fields_options() {
    $fields = [];
    $fields['faq_id']       = ['label' => 'ID'];
    $fields['question']     = ['label' => 'Question'];
    $fields['answer']       = ['label' => 'Answer'];
       
    $fields['category_id']        =  ['label'    => 'Category', 
                                      'relation' => [ 'table'       => 'pack_category', 
                                                      'primary_key' => 'category_id', 
                                                      'display'     => ['category_name'], 
                                                      'order_by'    => 'category_name', 'order' => 'ASC'
                                                    ], 
                              ];
    $fields['subcategory_id']     =   ['label'    => 'Sub Category', 
                                       'relation' => [ 'table'       => 'pack_sub_category', 
                                                       'primary_key' => 'subcategory_id', 
                                                       'display'     => ['sub_cat_name'], 
                                                       'order_by'    => 'sub_cat_name', 'order' => 'ASC'
                                                      ], 
                                    ]; 
    $fields['third_subcategory_id']  = ['label'    => 'Third Subcategory', 
                                        'relation' => [ 'table'       => 'pack_third_sub_category', 
                                                         'primary_key' => 'third_subcategory_id', 
                                                         'display'     => ['third_subcategory_name'], 
                                                         'order_by'    => 'third_subcategory_name', 'order' => 'ASC'
                                                      ], 
                                             ];                          
        return $fields;
    }
	public function list() {
    $title['page'] = 'List FAQ';
    $page = 1;
    if (isset($_GET['page'])) {
      $page = (int)$_GET['page'];
      $page = max(1, $page);
    }
    $data['title'] = $this->crud->getTableTitle();
    $per_page = 10;
    $columns  = ['question','answer','category_id','subcategory_id','third_subcategory_id'];
    $where    = null;
    $order    = [['faq_id', 'ASC']];
    $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
    echo view('backend/layout/header',$title);
		echo view('backend/layout/sidebar');
		echo view('backend/faq/index',$data);
		echo view('backend/layout/footer');
  }
	public function getthirdsubcategory()
  {
    $id=$this->request->getVar('id'); 
    if(isset($id)) 
    { 
      $FaqModel = new FaqModel();
      $i=0;
      foreach ($id as $key => $value) 
      {
        $data['third_subcategory'][$i++] = $FaqModel->getthirdsubtcategory($value);
      }
      
        echo json_encode($data);
    
      
    }
  }
  public function view() {
    $title['page'] = 'View FAQ';
    $id = $this->request->getVar('id');
    if($id != '') {
      $FaqModel    = new FaqModel();
      $data['faq'] = $FaqModel->viewthirdcategory($id);
      echo view('backend/layout/header',$title);
      echo view('backend/layout/sidebar');
      echo view('backend/faq/view',$data);
      echo view('backend/layout/footer');
    } else {
      return redirect()->to(base_url() . '/dashboard');
    }
  }
  public function edit() {
    $title['page'] = 'Edit Third Subcategory';
    $id = $this->request->getVar('id');
    $FaqModel    = new FaqModel();

    $data['category']    = $FaqModel->fetch_category();
    $data['subcategory'] = $FaqModel->fetch_subcategory();
    $data['third_subcategory'] = $FaqModel->fetch_thirdsubcategory($id);
    $data['faq'] = $FaqModel->viewthirdcategory($id);
    echo view('backend/layout/header',$title);
    echo view('backend/layout/sidebar');
    echo view('backend/faq/edit',$data);
    echo view('backend/layout/footer');
  }
  public function update(){ 
    $title['page'] = 'Add FAQ';
    $FaqModel = new FaqModel();
    if ($this->request->getMethod() == "post") {
      $id = $this->request->getVar('faq_id');
      $data['question']         = $this->request->getVar('question');
      $data['answer']           = $this->request->getVar('answer');
      $data['cate_id']          = $this->request->getVar('category_id');
      $data['sub_cate_id']      = $this->request->getVar('subcategory_id');
      $data['third_subcat_id']  = $this->request->getVar('third_subcategory_id');
      $data['description']      = $this->request->getVar('description');
      if (isset($_FILES['file'])) {
        $target_path = "uploads/third_subcategory/";
        $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $data['image_path'] = $target_path;
      }
      $FaqModel->update($id, $data);
      $response = ['msg' => 'FAQ updated Successfully!', 'type' => 'success'];
      echo json_encode($response);
    } else {
      $data['category'] = $FaqModel->fetch_category();
      echo view('backend/layout/header',$title);
      echo view('backend/layout/sidebar');
      echo view('backend/faq/add',$data);
      echo view('backend/layout/footer');
    }
  }
}



