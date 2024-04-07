<?php 
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\backend\AdminModel;
use App\Models\backend\CrudModel;
use App\Models\backend\ProductModel;
use App\Models\backend\Third_SubcategoryModel;
use App\Libraries\Simple;
use App\Models\backend\GalleryModel;
class Admin extends BaseController 
{
    public function __construct()
    {
         $this->product = new ProductModel();
         $this->simple = new Simple();
         $this->gallery = new GalleryModel();
         $this->admin=new AdminModel();
    }
    public function index() 
    {
        $title['page'] = 'Dashboard';
        $data['cnt_supplier']=$this->simple->cnt_supplier();
        $data['cnt_product']=$this->simple->cnt_product();
        $data['cnt_user']=$this->simple->cnt_user();
        $data['cnt_category']=$this->simple->cnt_category();
        $data['product']= $this->product->listproduct();
        $data['gallery']= $this->admin->listgalleryimage();
        $data['catalog']= $this->admin->listcatalog();
        // 4 New
        $data['cnt_faq']=$this->simple->cnt_faq();
        $data['cnt_test']=$this->simple->cnt_test();
        $data['cnt_adv']=$this->simple->cnt_adv();
        $data['cnt_exh']=$this->simple->cnt_exh(); 


        echo view('backend/layout/header',$title);
        echo view('backend/layout/sidebar');
        echo view('backend/admin/index',$data);
        echo view('backend/layout/footer');
    }
    public function login() 
    {
        $title['page'] = 'Login';
        $session=session()->get('user_session');
        //print_r($session);
        if(isset($session) && count($session)>2)
        {
          return redirect()->to(base_url('/home'));   
        }
        else
        {
          $session=session()->get();
          if(isset($session) && count($session)>2)
          {
              
              if(isset($session['user_type'])=="supplier")
              { 
                
                return redirect()->to(base_url('/sl/dashboard'));
              }
              else if(isset($session['user_type'])=="admin")
              {
                return redirect()->to(base_url('/dashboard'));   
              }
              else
              {
                   echo view('backend/admin/login',$title);
              }  
          }
          else
          {
            echo view('backend/admin/login',$title);
          }  

        }
         
      }
    public function login_code() 
    {
        $adminModel = new AdminModel();
        $email = $this->request->getVar('email');
        $pass = $this->request->getVar('pass');
        $admin = $adminModel->where('admin_email', $email)->first();
        if ($admin) 
        {
            if (password_verify($pass, $admin['admin_password'])) 
            {
                $this->setAdminSession($admin);
                echo json_encode('1');
            } else {
                echo json_encode('2');
            }
        } 
        else 
        {
            echo json_encode('0');
        }
    }
    private function setAdminSession($admin) 
    {
        $session_admin = ['id' => $admin['id'], 'admin_email' => $admin['admin_email'], 'admin_name' => $admin['admin_name'], 'is_log_in' => true, 'user_type' => 'admin'];
        session()->set($session_admin);
        return true;
    }
    public function profile() {
        $title['page'] = 'Profile';
        $id = session()->get('id');
        $user_type = session()->get('user_type');
        if ($user_type == "admin" && $id != '') 
        {
            $data = [];
            $adminModel = new AdminModel();
            $data['profile'] = $adminModel->fetch_admin_data($id);
            echo view('backend/layout/header',$title);
            echo view('backend/layout/sidebar');
            echo view('backend/admin/profile', $data);
            echo view('backend/layout/footer');
        }
    }
    public function logout() 
    {
        session()->destroy();
        return redirect()->to(base_url().'/admin');
    }
    public function update_profile() {
        $adminModel = new AdminModel();
        $admin_id = $this->request->getVar('id');
        $data['admin_name'] = $this->request->getVar('admin_name');
        $data['admin_email'] = $this->request->getVar('admin_email');
        $data['admin_mobile'] = $this->request->getVar('admin_mobile');
        if (isset($_FILES['file'])) {
            $target_path = "uploads/profile/";
            $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
            $data['admin_image_path'] = $target_path;
        }
        $adminModel->update($admin_id, $data);
        $response = ['msg' => 'Profile Successfully Updated !', 'type' => 'success'];
        echo json_encode($response);
    }
    public function delete() {
        $this->db = db_connect();
        $this->model = new CrudModel($this->db);
        $table_name = $this->request->getVar('table_name');
        $id = $this->request->getVar('id');
        $column = $this->request->getVar('column');
        $this->model->deleteRow($table_name, $id, $column);
        $response = ['msg' => 'Deleted Successfully !', 'type' => 'success'];
        echo json_encode($response);
    }
    /*public function save_data(){
    $adminModel = new AdminModel();
    $data = [
     'admin_name' => 'Packagio Super Admin',
     'admin_email'    => 'admin@gmail.com',
        'admin_password'=>'admin'
       ];
        $adminModel->save($data);
    }*/
    public function viewproduct()
    {   
        $title['page'] = 'View Product';
        $uri = service('uri');
        $id = $uri->getSegment(3);
        //echo $segment3;
        if ($id != '') 
        {
         
          $data['product']   = $this->product->fetch_product($id);
          echo view('backend/layout/header', $title);
          echo view('backend/layout/sidebar');
          echo view('backend/admin/viewproduct', $data);
          echo view('backend/layout/footer');
        } 
        else 
        {
          return redirect()->to(base_url() . '/dashboard');
        }

        
    }
    public function listproduct()
    { 
       
       $title['page'] = 'List Product';
       $data['product']= $this->product->listproduct();
       echo view('backend/layout/header', $title);
       echo view('backend/layout/sidebar');
       echo view('backend/admin/listproduct', $data);
       echo view('backend/layout/footer');   
    
    }
    public function change_status()
    {
        $product_id = $this->request->getVar('product_id');
        $product_status = $this->request->getVar('status');
        $data['product_status']=$product_status;
        $this->product->update($product_id,$data);
        $response = ['msg' => 'Changed Successfully !', 'type' => 'success'];
        echo json_encode($response);


    }
    public function testmail()
    {  
       $data = array(

       'userName'=> 'Anil Kumar Panigrahi',
       'site_name'=>'Packagio',
       'password'=>'XYZ'

         ); 
         $message = view('backend/email/temp_pass',$data,['saveData' => true]);
         $email = \Config\Services::email();
         $email->setFrom('info@manzanotech.com', 'Jay Rajput');
         $email->setTo('rajputjay100@gmail.com');
         $email->setSubject('');
         $email->setMessage($message);//your message here
         //$email->attach(base_url().'/theme/assets/img/logo1.png', "inline");
              
      
        if ($email->send(false)) 
        {
            echo 'Email successfully sent';
        } 
        else 
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
    public function getthirdsubcategory()
    {
         $data=array();
         if (isset($_POST['id'])) 
         {
             $Third_SubcategoryModel = new Third_SubcategoryModel();
             $third_subcategory = $Third_SubcategoryModel->getthirdsubtcategory($_POST['id']);
             echo json_encode($third_subcategory);
         }   

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
                  'admin_password'=>$pass
                ];
          $id=(session()->get('user_type')=="admin")?session()->get('id'):'';
          $adminModel = new AdminModel();
          $adminModel->update($id,$data);
          $response = ['msg' => 'Password Successfully Updated !', 'type' => 'success'];
          echo json_encode($response);       

        } 
       }
       else
       { 
        $title['page'] = 'Change Password';
        echo view('backend/layout/header', $title);
        echo view('backend/layout/sidebar');     
        echo view('backend/admin/chgpass');
        echo view('backend/layout/footer');
      }
    }

}