<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\SupplierModel;
use App\Models\backend\CountryModel;
use App\Models\backend\StateModel;
use App\Models\backend\CityModel;
use App\Models\backend\Third_SubcategoryModel;
use App\Libraries\Crud;
use App\Libraries\Simple;
use App\Models\backend\SupplierviewModel;
use App\Models\backend\GalleryModel;
use App\Models\backend\CatalogModel;
use App\Models\backend\EmailLogModel;
use App\Models\backend\ProductModel;

use App\Models\backend\InnovactionModel;
class Sl extends BaseController 
{   
	protected $crud;
    function __construct() 
    {
        $params = [
                    'table'       => 'pack_supplier', 
                    'table_title' => 'Supplier', 
                    'dev'         => false, 
                    //'fields'      => $this->fields_options(), 
                    'base'        => base_url() . '/sl', 
                ];
        $this->crud = new Crud($params, service('request'));
        $this->sl = new SupplierModel();
        $this->simple = new Simple();
        $this->supplierview=new SupplierviewModel();
        $this->gallery = new GalleryModel();
        $this->catalog = new CatalogModel();
        $this->emaillog=new EmailLogModel();
        $this->product=new ProductModel(); 
        $this->innovaction=new InnovactionModel();
    }
    public function login() 
    {
        $title['page'] = 'Supplier Login';
        echo view('backend/supplier/login',$title);
    }
     public function login_code()
    {
    	
        $email = $this->request->getVar('email');
        $pass = $this->request->getVar('pass');
        $supplier = $this->sl->where('email', $email)->first();
        if ($supplier) {
            if (password_verify($pass, $supplier['password'])) 
            {
                $this->setSupplierSession($supplier);
                $result=[
                       'code'=>'4',
                       'msg' =>'Login Successfully !',
                       'url'=>base_url().'/sl/dashboard'
                ];
               echo json_encode($result);
            } else {
                echo json_encode('2');
            }
        } else {
            echo json_encode('0');
        }
    }
    private function setSupplierSession($supplier) 
    {
      $session_supplier = ['id' => $supplier['id'], 'email' => $supplier['email'], 'supplier_name' => $supplier['supplier_name'], 'is_log_in' => true, 'user_type' => 'supplier','category_id'=>json_decode($supplier['category_id'],true),'subcategory_id'=>json_decode($supplier['subcategory_id'],true),'third_subcategory_id'=>json_decode($supplier['third_subcategory_id'],true)];
      session()->set($session_supplier);
       return true;
    }


    // Index Method For Supplier Login
    public function index()
    {
    	  $title['page'] = 'Dashboard';
        $id=(session()->get('user_type')!='admin')?session()->get('id'):'';
        $data['cnt_product']=$this->simple->cnt_product_ses($id);
        $data['cnt_gallery']=$this->gallery->where('supplier_id',$id)->findAll();
        $data['cnt_catalog']=$this->catalog->where('supplier_id',$id)->findAll();
        $data['supplierview']= $this->supplierview->selected_supplierview($id);
        $data['supplier']=$this->sl->find($id);
        $data['emaillog']=$this->emaillog->where('supplier_id',$id)->findAll();
        $data['innovaction']=$this->innovaction->where('supplier_id',$id)->findAll();
        echo view('backend/layout/header',$title);
        echo view('backend/layout/sl_sidebar');
        echo view('backend/supplier/dashboard',$data);
        echo view('backend/layout/footer');
    }
   public function getsubcategory()
   { 
     $data=array();
     if (isset($_POST['id'])) 
     {
        $Third_SubcategoryModel = new Third_SubcategoryModel();
        $subcategory = $Third_SubcategoryModel->getsubcategory($_POST['id']);
        // fetch session data
        $subcategory_id=session()->get('subcategory_id'); 
        if(sizeof($subcategory_id)>0)
        {    
            foreach ($subcategory as $key => $value) 
            {
              
                $data['subcategory'][$key]['subcategory_id']=$value['subcategory_id'];
                $data['subcategory'][$key]['sub_cat_name']=$value['sub_cat_name'];
               
            }
           if(sizeof($data)>0)
           {
             echo json_encode($data);
           }
           else
           {
            echo json_encode(null);   
           } 
             
            
        }
      }
   }
   public function getthirdsubcategory()
   {
      $data=array();
     if (isset($_POST['id'])) 
     {
        $Third_SubcategoryModel = new Third_SubcategoryModel();
        $third_subcategory = $Third_SubcategoryModel->getthirdsubtcategory($_POST['id']);
        // fetch session data
        $third_subcategory_id=session()->get('third_subcategory_id'); 
        if($third_subcategory_id!=null)
        {    
            foreach ($third_subcategory as $key => $value) 
            {
              
                $data['third_subcategory'][$key]['third_subcategory_id']=$value['third_subcategory_id'];
                $data['third_subcategory'][$key]['third_subcategory_name']=$value['third_subcategory_name'];
               
            }
           if(sizeof($data)>0)
           {
             echo json_encode($data);
           }
           else
           {
            echo json_encode(null);   
           } 
             
            
        }
        else
        {
            echo json_encode(null);   
        } 
      }

   }
     public function profile() {
        $title['page'] = 'Edit Profile';
        $SupplierModel = new SupplierModel();
        $id = session()->get('id');
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
        echo view('backend/layout/sl_sidebar');
        echo view('backend/supplier/profile', $data);
        echo view('backend/layout/footer');
    }
    public function update_profile() {
        if ($this->request->getMethod() == "post") {
            $id = $this->request->getVar('id');
            $SupplierModel = new SupplierModel();

            $data['supplier_name']        = $this->request->getVar('supplier_name');
            $data['company_name']         = $this->request->getVar('company_name');
            $data['contact_person']       = $this->request->getVar('contact_person');
            $data['mobile']               = $this->request->getVar('mobile');
            $data['email']                = $this->request->getVar('email');
            $data['supplier_description'] = $this->request->getVar('supplier_description');

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
            

            $SupplierModel->update($id, $data);
            $response = ['msg' => 'Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
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
     public function logout() 
     {
        session()->destroy();
        return redirect()->to(base_url().'/signin');
    }
    public function addinnovaction()
    {  
       $title['page'] = 'Add Innovaction';
       echo view('backend/layout/header', $title);
       echo view('backend/layout/sl_sidebar');     
       echo view('backend/supplier/addinnovaction');
       echo view('backend/layout/footer');
    }
    public function chgpass()
    {   
       if ($this->request->getMethod() == "post") 
       {
        $pass=$this->request->getVar('password');
        $conf_pass=$this->request->getVar('conf_password');
        if($pass!=$conf_pass)
        {
          echo json_encode('3');
        }
        else
        {
          $data=[
                  'password'=>$pass
                ];
          $id=session()->get('id');
          $this->sl->update($id,$data);
          $response = ['msg' => 'Password Successfully Updated !', 'type' => 'success'];
          echo json_encode($response);       

        } 
       }
       else
       { 
        $title['page'] = 'Change Password';
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sl_sidebar');     
        echo view('backend/supplier/chgpass');
        echo view('backend/layout/footer');
      }
    }
    public function upload()
    { 
       $title['page'] = 'Upload Logo';
       $SupplierModel = new SupplierModel();
       if($this->request->getMethod() == "post") 
       {
          $supplier_id = $this->request->getVar('id');
          if (isset($_FILES['file'])) 
          {
            $target_path = "uploads/supplier/";
            $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
            $data['supplier_image'] = $target_path;
            $SupplierModel->update($supplier_id,$data);
           
          }
          $response = ['msg' => 'Profile Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
       } 
       else
       { 
         $id = session()->get('id');
        
         $data['supplier'] = $SupplierModel->viewsupplier($id);
         echo view('backend/layout/header', $title);
         echo view('backend/layout/sl_sidebar');     
         echo view('backend/supplier/uploadlogo',$data);
         echo view('backend/layout/footer');
       }
    }
    public function verify_email()
    {

      $supplier_id=$this->request->getVar('supplier_id');
      $supplier_email=$this->request->getVar('supplier_email');
      $ciphertext =urlencode(base64_encode($supplier_id));
      $pass_data=[
       'supplier_id'=>$supplier_id,
       'link'=>base_url().'/email/'.$ciphertext
      ];
      $message= view('backend/email/email_verify',$pass_data,['saveData' => true]);
      $email = \Config\Services::email();
      $email->setFrom('admin@packagio.in', 'Packagio : Find Your Packaging.');
      $email->setTo($supplier_email);
      $email->setSubject('Email Verification');
      $email->setMessage($message);//your message here
      if ($email->send(false)) 
      {
          $response = ['msg' => 'Mail Sent Successfully !', 'type' => 'success'];
          echo json_encode($response);
           
      } 
      else 
      {
                 $email->printDebugger(['headers']);
                 $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                 echo json_encode($response);
                
      }  
    }
    public function profile_update()
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
            $data['alternate_mobile']     = $this->request->getVar('alternate_mobile');
            $data['email']                = $this->request->getVar('email');
            $data['alternate_email']      = $this->request->getVar('alternate_email');
            $data['country_id']           = $this->request->getVar('country_id'); 
            $data['state_id']             = $this->request->getVar('state_id'); 
            $data['city_id']              = $this->request->getVar('city_id'); 
            $data['location']             = $this->request->getVar('location'); 
            $data['pin_code']             = $this->request->getVar('pin_code'); 
            $data['business_category']    = $this->request->getVar('business_category');
            $data['supplier_type']        = $this->request->getVar('supplier_type');
            $data['supplier_description'] = $this->request->getVar('supplier_description');  
            $data['phone_no']             = $this->request->getVar('phone_no');
            $data['website']              = $this->request->getVar('website');
            
            $supplier=$SupplierModel->find($id);
            if($supplier['email']!=$data['email'])
            {
              $update_data=['is_email_verified'=>'Pending'];
              $SupplierModel->update($id, $update_data);
            } 
            if($supplier['mobile']!= $data['mobile'])
            {
              $update_data=['is_mobile_verified'=>'Pending','status'=>'Pending']; 
              $SupplierModel->update($id, $update_data);
            }  

           
             // Fetch Array Data      
           
            $result=$SupplierModel->update($id, $data);
           

            $response = ['msg' => 'Successfully Updated !', 'type' => 'success'];
            echo json_encode($response);
        }
    }
}	