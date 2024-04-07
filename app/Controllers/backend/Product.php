<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\SupplierModel;
use App\Models\backend\CountryModel;
use App\Models\backend\StateModel;
use App\Models\backend\CityModel;
use App\Models\backend\Third_SubcategoryModel;
use App\Models\backend\ProductModel;
use App\Models\backend\NotificationModel;
use App\Models\backend\ProductImageModel;
use App\Libraries\Crud;
class Product extends BaseController 
{   
	protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_product', 
                    'table_title' => 'Product', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/product', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->sl = new SupplierModel();
        $this->product = new ProductModel();
        $this->th= new Third_SubcategoryModel();
        $this->notification= new NotificationModel();
        $this->product_image= new ProductImageModel();
    }
    public function add()
    {   
    	if($this->request->getMethod() == "post")
    	{ 
    	
	    	
            $data['product_desc'] = $this->request->getVar('product_desc');
            if (isset($_FILES['single_file'])) 
            {
                $target_path = "uploads/product/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['single_file']['name'];
                move_uploaded_file($_FILES['single_file']['tmp_name'], $target_path);
                $data['product_image'] = $target_path;
            }
            
              
  


            $data['category_id'] = $this->request->getVar('category_id');
            $data['is_admin_from'] = 0;
            $data['sub_category_id'] = $this->request->getVar('subcategory_id');
            $data['third_category_id'] = $this->request->getVar('third_subcategory_id');
            $data['supplier_id'] =(session()->get('user_type')=="supplier")?session()->get('id'):'';
            $data['product_status']="Pending";
            $data['ip_address']=$_SERVER['REMOTE_ADDR'];
            $this->product->save($data);
            $id = $this->product->getInsertID();
           
            if($id!='')
            {
               // Add Data in Notification Section
              
               
               $notification_ary=[
                 'is_read'=>0,
                 'supplier_id'=>session()->get('id'),
                 'product_id'=>$id,
                 'from_user_type'=>'supplier',
                 'to_user_id'=>'1',
                 'to_user_type'=>'admin',
                 'description'=>'',
                 'status'=>'Pending',
                 'ip_address'=>$_SERVER['REMOTE_ADDR']

                ]; 
                $this->notification->save($notification_ary);
                $response = ['msg' =>"Product Added Successfully!", 'type' => 'success'];   
                 echo json_encode($response);

            } 
            
       
       } 
        else
        {
        	$title['page'] = 'Add Product';
        	$data['category']    = $this->th->fetch_category();
	    	  echo view('backend/layout/header',$title);
	        echo view('backend/layout/sl_sidebar');
	        echo view('backend/product/add',$data);
	        echo view('backend/layout/footer');
        }	
    }
     public function list() 
     {
        $title['page'] = 'List Product';
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page      = 100000;
        $columns       = [
                          [
                            'label' => 'Product Name',
                            'callback' => 'callback_product_name',  
                          ],
                          [
                            'label' => 'Product Category',
                            'callback' => 'callback_product_category',  
                          ],
                          'product_desc',
                          
                           [
                            'label' => 'Product Status',
                            'callback' => 'callback_product_status',  
                          ]
                        
                          ];
        $where         = ['supplier_id'=>session()->get('id')];
        $order         = [['product_id', 'ASC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sl_sidebar');
        echo view('backend/product/index', $data);
        echo view('backend/layout/footer');
    }
    protected function fields_options() 
    {
        $fields = [];
        $fields['product_id']     = ['label' => 'ID'];
        $fields['product_name']   = ['label' => 'Product Name'];
        $fields['product_desc']   = ['label' => 'Product Description'];
        $fields['category_id']   = ['label' => 'Product Category', 
                                   'relation' => ['table'       => 'pack_category', 
                                                  'primary_key' => 'category_id', 
                                                  'display'     => ['category_name'], 
                                                  'order_by'    => 'category_name', 
                                                  'order'       => 'ASC'], 
                                                ];
         $fields['sub_category_id']   =      ['label' => 'Product Sub Category', 
                                              'relation' => ['table'       => 'pack_sub_category', 
                                                  'primary_key' => 'subcategory_id', 
                                                  'display'     => ['sub_cat_name'], 
                                                  'order_by'    => 'sub_cat_name', 
                                                  'order'       => 'ASC'], 
                                                ];
         $fields['third_category_id']   =      ['label' => 'Product Name', 
                                                   'relation' => ['table'       => 'pack_third_sub_category', 
                                                  'primary_key' => 'third_subcategory_id', 
                                                  'display'     => ['third_subcategory_name'], 
                                                  'order_by'    => 'third_subcategory_name', 
                                                  'order'       => 'ASC'], 
                                                ];                                        
        return $fields;
  }
  public function view()
  {
    $title['page'] = 'View Product';
    $id = $this->request->getVar('id');
    if ($id != '') 
    {
     
      $data['product']   = $this->product->fetch_product($id);
      echo view('backend/layout/header', $title);
      echo view('backend/layout/sl_sidebar');
      echo view('backend/product/view', $data);
      echo view('backend/layout/footer');
    } 
    else 
    {
      return redirect()->to(base_url() . '/dashboard');
    }
  }
  public function edit()
  {         
            $id = $this->request->getVar('id');
            if ($id != '') 
            {
                $title['page'] = 'Update Product';
                $data['category']    = $this->th->fetch_category();
                /*$data['subcategory'] = $this->product->fetch_sub_category(session()->get('subcategory_id'));
                $data['third_cat']  = $this->product->fetch_third_sub_category(session()->get('third_subcategory_id'));*/
                $data['product']   = $this->product->fetch_product($id);
                $data['third_subcategory'] = $this->sl->fetch_third_subcategory();
                
                $data['files']   = $this->product->fetch_images($id);  

                echo view('backend/layout/header',$title);
                echo view('backend/layout/sl_sidebar');
                echo view('backend/product/edit',$data);
                echo view('backend/layout/footer');
            }
                
  }
   public function update() 
   {
        if ($this->request->getMethod() == "post") 
        {
            $id = $this->request->getVar('id');
            
            $data['product_status']='Pending';
            $data['is_admin_from'] = 0;
            $data['product_desc'] = $this->request->getVar('product_desc');
            $file_id = $this->request->getVar('file_id');
            if (isset($_FILES['single_file'])) 
            {
                $target_path = "uploads/product/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['single_file']['name'];
                move_uploaded_file($_FILES['single_file']['tmp_name'], $target_path);
                $data['product_image'] = $target_path;
            }
            if(isset($_FILES['file1'])) 
            {
                $target_path = "uploads/product/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file1']['name'];
                move_uploaded_file($_FILES['file1']['tmp_name'], $target_path);
                $data['product_image'] = $target_path;
             }
            $data['category_id'] = $this->request->getVar('category_id');
            $data['sub_category_id'] = $this->request->getVar('subcategory_id');
            $data['third_category_id'] = $this->request->getVar('third_subcategory_id');
            $result=$this->product->update($id,$data);
            if($result!='')
            {
                // Fetch All IDS
                 $fetch_all_ids=$this->product->fetch_images($id);
                 foreach ($fetch_all_ids as $key => $value) 
                 {
                  $fetch_all_ids[$key]=$value['product_image_id'];
                 }
                // Delete Image 
                if(is_array($file_id))
                { 
                 $diff_result = array_diff($fetch_all_ids, $file_id);
                 if($diff_result)
                 {
                    foreach ($diff_result as $key => $value) 
                    {
                      
                      $this->product_image->delete($value);
                    }
                    // Loop Start 

                 } // Main Loop
                } 
                
            }  
            $response = ['msg' => 'Product updated successfully!', 'type' => 'success'];
            echo json_encode($response);
       
    }

  }


}    