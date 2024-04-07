<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\SupplierModel;

use App\Models\backend\CountryModel;
use App\Models\backend\StateModel;
use App\Models\backend\CityModel;
use App\Models\backend\ProductModel;
use App\Models\backend\Third_SubcategoryModel;
use App\Models\backend\GalleryModel;
use App\Models\backend\CatalogModel;
use App\Libraries\Crud;
use App\Libraries\Simple;

class Supplier extends BaseController 
{
    protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_supplier', 
                    'table_title' => 'Supplier', 
                    'dev'         => false, 
                    'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/supplier', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->simple=new Simple(); 
        $this->product=new ProductModel(); 
        $this->gallery = new GalleryModel(); 
        $this->catalog = new CatalogModel();     
    }
    protected function fields_options() {
        $fields = [];
        $fields['id']                   = ['label' => 'ID'];
        $fields['supplier_name']        = ['label' => 'Supplier Name'];
        $fields['company_name']         = ['label' => 'Company'];
        $fields['contact_person']       = ['label' => 'Contact Person'];
        $fields['mobile']               = ['label' => 'Mobile'];
        $fields['email']                = ['label' => 'Email'];

        $fields['country_id']           = ['label'    => 'Country', 
                                           'relation' => [ 'table'       => 'pack_country', 
                                                           'primary_key' => 'country_id', 
                                                           'display'     => ['country_name'], 
                                                           'order_by'    => 'country_name', 
                                                           'order' => 'ASC'
                                                         ], 
                                          ];
        $fields['state_id']             = ['label'    => 'State', 
                                           'relation' => [ 'table'       => 'pack_state', 
                                                           'primary_key' => 'state_id', 
                                                           'display'     => ['state_name'], 
                                                           'order_by'    => 'state_name', 'order' => 'ASC'
                                                         ], 
                                          ];
        $fields['city_id']             = ['label'    => 'City', 
                                           'relation' => [ 'table'       => 'pack_city', 
                                                           'primary_key' => 'city_id', 
                                                           'display'     => ['city_name'], 
                                                           'order_by'    => 'city_name', 'order' => 'ASC'
                                                         ], 
                                          ];

        $fields['location']             = ['label' => 'Location'];
        $fields['business_category']    = ['label' => 'Business Category'];

        $fields['category_id']          = [  'label'    => 'Category', 
                                             'relation' => [ 
                                                           'table'       => 'pack_category', 
                                                           'primary_key' => 'category_id', 
                                                           'display'     => ['category_name'], 
                                                           'order_by'    => 'category_name', 
                                                           'order' => 'ASC'
                                                         ], 
                                          ];

        $fields['subcategory_id']       = ['label'    => 'Subcategory', 
                                           'relation' => [ 'table'       => 'pack_sub_category', 
                                                           'primary_key' => 'subcategory_id', 
                                                           'display'     => ['sub_cat_name'], 
                                                           'order_by'    => 'sub_cat_name', 
                                                           'order' => 'ASC'
                                                         ], 
                                          ];
        $fields['third_subcategory_id'] = ['label'    => 'Third sub category', 
                                           'relation' => [ 'table'       => 'pack_third_sub_category', 
                                                           'primary_key' => 'third_subcategory_id', 
                                                           'display'     => ['third_subcategory_name'], 
                                                           'order_by'    => 'third_subcategory_name', 
                                                           'order' => 'ASC'
                                                         ], 
                                          ];                                   
        $fields['supplier_type']        = ['label' => 'Supplier Type'];
        return $fields;
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
    public function add() {
        $title['page'] = 'Add Supplier';
        if ($this->request->getMethod() == "post") 
        {
          $SupplierModel = new SupplierModel();

          $data['supplier_name']        = $this->request->getVar('supplier_name');
          $data['company_name']         = $this->request->getVar('company_name');
          $data['contact_person']       = $this->request->getVar('contact_person');
          $data['mobile']               = $this->request->getVar('mobile');
          $data['email']                = $this->request->getVar('email');

          $data['country_id']           = $this->request->getVar('country_id'); 
          $data['state_id']             = $this->request->getVar('state_id'); 
          $data['city_id']              = $this->request->getVar('city_id'); 
          $data['location']             = $this->request->getVar('location'); 
         
          $data['business_category']    = $this->request->getVar('business_category');
          $data['supplier_type']        = $this->request->getVar('supplier_type');
          $data['website']              = $this->request->getVar('website');
          $data['category_id']          = json_encode($this->request->getVar('category_id'));
          $data['subcategory_id']       = json_encode($this->request->getVar('subcategory_id'));
          $data['third_subcategory_id'] = json_encode($this->request->getVar('third_subcategory_id'));
          
           //Added New Fields By CLient Satisfication     
          $data['alternate_mobile']     = $this->request->getVar('alternate_mobile');
          $data['alternate_email']      = $this->request->getVar('alternate_email');  
          $data['pin_code']             = $this->request->getVar('pin_code');
          $data['phone_no']             = $this->request->getVar('phone_no');    
            
          // Fetch Array Data      
          $category_id=$this->request->getVar('category_id');
          $subcategory_id=$this->request->getVar('subcategory_id');
          $third_subcategory_id=$this->request->getVar('third_subcategory_id');




          // Send Email to create Random Pass word Generate
          $password=$this->simple->password_generate();
          //$message="Your Temporary Password is= ".$password;
          $data['password']= $password;
          $SupplierModel->save($data);
          $id = $SupplierModel->getInsertID(); 
          //$id=1;
          // Fetch Instered ID FOr Product Data
          if($id!='')
          {
           // Create Product Array For Inserting Client Products As Directly 
            foreach ($subcategory_id as $k => $v) 
            {  
               foreach ($v as $key => $value) 
               { 
                  if(isset($third_subcategory_id[$value]) && count($third_subcategory_id[$value])>=1)
                   { 
                     $this->ins_data($id,$k,$value,$third_subcategory_id[$value]);
                    
                   }
                 else 
                 {
                   $product_ary=array(
                       'category_id'=>$k,
                       'sub_category_id'=>$value,
                       'third_category_id'=>'',
                       'supplier_id'=>$id,
                       'product_status'=>'Pending',
                       'date_created'=>date('Y-m-d H:i:s'),
                       'ip_address'=>$_SERVER['REMOTE_ADDR'], 
                       'is_from_admin'=>'1',
                   );
                   $this->product->insert($product_ary);
                 } 

                  
              }
            } 

           
           $pass_data= [
            'site_name'=>'Packagio',
            'userName'=> $data['supplier_name'],
            'password'=> $password
          ]; 
          $message= view('backend/email/temp_pass',$pass_data,['saveData' => true]);
          $email = \Config\Services::email();
          $email->setFrom('info@thepackaginghouse.in', 'Packaging House');
          $email->setTo($data['email']);
          $email->setSubject('For Your Temporary Password');
          $email->setMessage($message);//your message here

                  
          
            if ($email->send(false)) 
            {
                $response = ['msg' => 'Supplier Added Successfully!', 'type' => 'success'];
                echo json_encode($response);
            } 
            else 
            {
                 $email->printDebugger(['headers']);
                 $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                 echo json_encode($response);
                
            }

            /* $response = ['msg' => 'Supplier Added Successfully!', 'type' => 'success'];
             echo json_encode($response);*/
          }  
          //$message = "Please activate the account";
          
         


         
        } 
        else {

          $CountryModel = new CountryModel();
          $StateModel   = new StateModel();
          $CityModel    = new CityModel();
          $Third_SubcategoryModel    = new Third_SubcategoryModel();

          $data['country'] = $CountryModel->fetch_country();
          $data['state']   = $StateModel->fetch_state();
          $data['city']    = $CityModel->fetch_city();
          $data['category']    = $Third_SubcategoryModel->fetch_category();

          $data['business_category'] = $this->Business_Category();
          $data['supplier_type']     = $this->Supplier_Type();

          echo view('backend/layout/header',$title);
          echo view('backend/layout/sidebar');
          echo view('backend/supplier/add',$data);
          echo view('backend/layout/footer');
        }
    }
    public function ins_data($supplier_id,$category_id,$sub_category_id,$third_category_id)
    {
      foreach ($third_category_id as $key => $value) 
      {
          $product_ary=array(
                                 'category_id'=>$category_id,
                                 'sub_category_id'=>$sub_category_id,
                                 'third_category_id'=>$value,
                                 'supplier_id'=>$supplier_id,
                                 'product_status'=>'Pending',
                                 'date_created'=>date('Y-m-d H:i:s'),
                                 'ip_address'=>$_SERVER['REMOTE_ADDR'], 
                                 'is_from_admin'=>'1',
                             );
          $this->product->insert($product_ary);
      }


    }

    public function list() {
        $title['page'] = 'List Supplier';
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            $page = max(1, $page);
        }
        $data['title'] = $this->crud->getTableTitle();
        $per_page      = 10;
        $columns       = ['supplier_name',
                         
                        
                          [
                            'label' => 'Mobile',
                            'callback' => 'callback_mobile',  
                          ],
                          [
                            'label' => 'Email',
                            'callback' => 'callback_email',  
                          ],
                         
                          
                          [
                            'label' => 'Business Category',
                            'callback' => 'callback_business_category',  
                          ],
                         'city_id',
                        
                          'website'];
        $where         = ['status'=>'Verified'];
        $order         = [['id', 'ASC']];
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/supplier/index', $data);
        echo view('backend/layout/footer');
    }
    public function view() {
      $title['page'] = 'View supplier';
      $id = $this->request->getVar('id');
      $SupplierModel    = new SupplierModel();
      if($id != '') {

        $CountryModel = new CountryModel();
        $StateModel   = new StateModel();
        $CityModel    = new CityModel();

        $data['country'] = $CountryModel->fetch_country();
        $data['state']   = $StateModel->fetch_state();
        $data['city']    = $CityModel->fetch_city();

        $data['category']    = $SupplierModel->fetch_category();
        $data['subcategory'] = $SupplierModel->fetch_sub_category();
        $data['third_subcategory'] = $SupplierModel->fetch_third_subcategory();

        $data['business_category'] = $this->Business_Category();
        $data['supplier_type']     = $this->Supplier_Type();

        $data['supplier'] = $SupplierModel->viewsupplier($id);
        $data['gallery'] = $this->gallery->where('supplier_id',$id)->findAll();
        $data['catalog'] = $this->catalog->where('supplier_id',$id)->findAll(); 

        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/supplier/view',$data);
        echo view('backend/layout/footer');
      } else {
        return redirect()->to(base_url() . '/dashboard');
      }
    }
    public function edit() 
    {
        $title['page'] = 'Edit Supplier';
        $SupplierModel = new SupplierModel();
        $id = $this->request->getVar('id');
        $CountryModel = new CountryModel();
        $StateModel   = new StateModel();
        $CityModel    = new CityModel();
        
        $data['country'] = $CountryModel->fetch_country();
        $data['state']   = $StateModel->fetch_state();
        $data['city']    = $CityModel->fetch_city();
        $data['product']  = $this->product->fetch_supplier_product($id);

        $data['category']    = $SupplierModel->fetch_category();
        $data['subcategory'] = $SupplierModel->fetch_sub_category();
        $data['third_subcategory'] = $SupplierModel->fetch_third_subcategory();

        $data['business_category'] = $this->Business_Category();
        $data['supplier_type']     = $this->Supplier_Type();

        $data['supplier'] = $SupplierModel->viewsupplier($id);

        echo view('backend/layout/header', $title);
        echo view('backend/layout/sidebar');
        echo view('backend/supplier/edit', $data);
        echo view('backend/layout/footer');
    }
    public function update() 
    {
        if ($this->request->getMethod() == "post") 
        {
            $id = $this->request->getVar('id');
            $product_id = $this->request->getVar('product_id');
            $SupplierModel = new SupplierModel();
            if (isset($_FILES['file'])) 
            {
                $target_path = "uploads/supplier/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['supplier_image'] = $target_path;
            }
            $data['supplier_name']        = $this->request->getVar('supplier_name');
            //$data['company_name']         = $this->request->getVar('company_name');
            $data['contact_person']       = $this->request->getVar('contact_person');
            $data['mobile']               = $this->request->getVar('mobile');
            $data['email']                = $this->request->getVar('email');

            $data['country_id']           = $this->request->getVar('country_id'); 
            $data['state_id']             = $this->request->getVar('state_id'); 
            $data['city_id']              = $this->request->getVar('city_id'); 
            $data['location']             = $this->request->getVar('location'); 
           
            $data['business_category']    = $this->request->getVar('business_category');
            $data['supplier_type']        = $this->request->getVar('supplier_type');
            $data['website']              = $this->request->getVar('website');

            $data['category_id']          = json_encode($this->request->getVar('category_id'));
            $data['subcategory_id']       = json_encode($this->request->getVar('subcategory_id'));
            $data['third_subcategory_id'] = json_encode($this->request->getVar('third_subcategory_id'));
            // Added 4 New Column 
             // Fetch Array Data      
            $category_id=$this->request->getVar('category_id');
            $subcategory_id=$this->request->getVar('subcategory_id');
            $third_subcategory_id=$this->request->getVar('third_subcategory_id'); 

            $result=$SupplierModel->update($id, $data);
            if($result!='')
            { 
                 // Fetch All IDS
                 $fetch_all_ids=$this->product->fetch_supplier_product($id);
                 foreach ($fetch_all_ids as $key => $value) 
                 {
                  $fetch_all_ids[$key]=$value['product_id'];
                 }
                 // For Deleteing Records
                 $diff_result = array_diff($fetch_all_ids, $product_id);
                 if($diff_result)
                 {
                    foreach ($diff_result as $key => $value) 
                    {
                      
                      $this->product->delete($value);
                    }
                    // Loop Start 

                 }
                 foreach ($category_id as $key => $value) 
                 {
                    // Check this is new Record or old One
                     if(isset($product_id[$key]))
                     {    
                       $product_ary=array(
                       'category_id'=>$value,
                       'sub_category_id'=>$subcategory_id[$key],
                       'third_category_id'=>$third_subcategory_id[$key],
                       'supplier_id'=>$id,
                       'is_from_admin'=>'1',
                       'product_status'=>'Pending',
                       'date_modified'=>date('Y-m-d H:i:s'),
                       'ip_address'=>$_SERVER['REMOTE_ADDR']

                      );
                      $this->product->update($product_id[$key],$product_ary);
                    }
                    else
                    {
                       $product_ary=array(
                       'category_id'=>$value,
                       'sub_category_id'=>$subcategory_id[$key],
                       'third_category_id'=>$third_subcategory_id[$key],
                       'supplier_id'=>$id,
                       'is_from_admin'=>'1',
                       'product_status'=>'Pending',
                       'date_created'=>date('Y-m-d H:i:s'),
                       'ip_address'=>$_SERVER['REMOTE_ADDR']

                      );
                      $this->product->insert($product_ary); 

                    }  
                }

            }  

            $response = ['msg' => 'Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }
    
}
