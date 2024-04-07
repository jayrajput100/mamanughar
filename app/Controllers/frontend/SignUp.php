<?php 
namespace App\Controllers\frontend;
use App\Libraries\Simple;
use App\Models\frontend\HomeModel;
use App\Controllers\BaseController;
use App\Models\backend\CountryModel;
use App\Models\backend\StateModel;
use App\Models\backend\CityModel;
use App\Models\backend\UserModel;
use App\Models\backend\Third_SubcategoryModel;
use App\Models\backend\SupplierModel;
use App\Models\backend\ProductModel;
use App\Models\backend\UserloginModel;
use App\Models\backend\EmailLogModel;

class SignUp extends BaseController
{   
	function __construct() 
	{ 
		 $this->product=new ProductModel();    
		 $this->simple=new Simple();
		 $this->userlogin=new UserloginModel(); 
     $this->user=new UserModel(); 
     $this->emaillog=new EmailLogModel();
	} 
	public function signup()
	{
		$HomeModel    = new HomeModel();
		$data['site'] = "Packagio";
		$data['page'] = "Sign Up";
		$CountryModel = new CountryModel();
    $StateModel   = new StateModel();
    $CityModel    = new CityModel();
		$data['country'] = $CountryModel->fetch_country();
    $data['state']   = $StateModel->fetch_state();
    $data['city']    = $CityModel->fetch_city();
		return view('frontend/signup/signup',$data);
	}
	/*public function dosignup()
	{     
        $UserModel    = new UserModel();
		$email=$this->request->getVar('email');
        $cnt_value=$UserModel->where('email',$email)->findAll();
        $password=$this->request->getVar('password_sign');
        $conf_password=$this->request->getVar('conf_password_sign'); 
        if($password!=$conf_password)
        {
           $response = ['msg' => 'Password and Confirm Password does not match !', 'type' => 'error'];
           echo json_encode($response);  
        }
        else if(is_array($cnt_value) && count($cnt_value)>=1)
        {
          $response = ['msg' => 'Your Email ID  already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
        }  
        else
        {  

        
        $data['fname']    = $this->request->getVar('first_name');
	      $data['lname']    = $this->request->getVar('last_name');
	      $data['email']    = $this->request->getVar('email');
	      $data['mobile']   = $this->request->getVar('mobile');
	      $data['gender']   = $this->request->getVar('gender');
	      $data['address']  = $this->request->getVar('address');
	      $data['company_name']  = $this->request->getVar('company_name');
	      $data['password']   = $this->request->getVar('password_sign');
	      $data['country_id']  = $this->request->getVar('country_id');
	      $data['state_id']  = $this->request->getVar('state_id');
	      $data['city_id']  = $this->request->getVar('city_id');
	      $otp=substr(str_shuffle("01234561289"), 0, 4);
	      $data['otp']=$otp;
	      $data['otp_datetime']=date('Y-m-d H:i:s');
	      $UserModel->save($data);
        $id = $UserModel->getInsertID();
          if($id!='')
          {
	          	  $pass_data= [
			            'site_name'=>'Packagio',
			            'userName'=> $data['fname'].' '.$data['lname'],
			            'otp'=> $otp
			          ]; 
			          $session_otp['user_id'] =$id;
	              $session_otp['user_name']=$data['fname'].' '.$data['lname'];
	              $session_otp['user_email']=$data['email'];
	              $session_otp['user_mobile']=$data['mobile'];
	              $session_otp['user_otp']=$data['otp'];
	              $session_otp['user_opt_datetime']= $data['otp_datetime']; 
                 
	              session()->set('uz',$session_otp);
		            $message= view('backend/email/otp',$pass_data,['saveData' => true]);
                $email = \Config\Services::email();
                $email->setFrom('admin@packagio.in', 'Packagio');
                $email->setTo($data['email']);
                $email->setSubject('For Your OTP');
                $email->setMessage($message); //your message here
                  
                if ($email->send(false)) 
                { 
                   
                  $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
                  $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['user_mobile'],
                            "extra1"=>$session_otp['user_otp'],
                            "firstName"=>$data['fname'].' '.$data['lname']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);
                    $res=json_decode($res,true);
                    if($res['status']=="Success")
                    {
                       $response = ['code'=>4,'msg' => 'SignUp Successfully !', 'type' => 'success','url'=>base_url().'/otp'];
                       echo json_encode($response);  
                    }
                    else
                    {
                     $response = ['msg' => $res['status'], 'type' => 'error'];
                     echo json_encode($response);     

                    }
                }
                else 
                {
                     $email->printDebugger(['headers']);
                     $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                     echo json_encode($response);
                    
                }       
	               
	           
	          }	
        }    
         
	}*/
	public function dosignup()
	{     
        $SupplierModel    = new SupplierModel();
        $UserModel    = new UserModel();

	     	$email=$this->request->getVar('email');
        $mobile=$this->request->getVar('mobile');
        
        $cnt_user_email=$UserModel->where('email',$email)->findAll();
        $cnt_supplier_email=$SupplierModel->where('email',$email)->findAll();
        
        $cnt_user_mobile=$UserModel->where('mobile',$mobile)->findAll();
        $cnt_supplier_mobile=$SupplierModel->where('mobile',$mobile)->findAll();


        $password=$this->request->getVar('password_sign');
        $conf_password=$this->request->getVar('conf_password_sign'); 
        if($password!=$conf_password)
        {
           $response = ['msg' => 'Password and Confirm Password does not match !', 'type' => 'error'];
           echo json_encode($response);  
        }
        else if(is_array($cnt_user_email) && count($cnt_user_email)>=1)
        {
          $response = ['msg' => 'Your Email ID  already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
        }
        else if(is_array($cnt_supplier_email) && count($cnt_supplier_email)>=1)
        {
          $response = ['msg' => 'Your Email ID  already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
        }
        else if(is_array($cnt_user_mobile) && count($cnt_user_mobile)>=1)
        {
          $response = ['msg' => 'Your Mobile Number already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
        }
        else if(is_array($cnt_supplier_mobile) && count($cnt_supplier_mobile)>=1)
        {
          $response = ['msg' => 'Your Mobile Number already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
        }  
        else
        {  

        
        $data['fname']    = $this->request->getVar('first_name');
	      $data['lname']    = $this->request->getVar('last_name');
	      $data['email']    = $this->request->getVar('email');
	      $data['mobile']   = $this->request->getVar('mobile');
	      $data['gender']   = $this->request->getVar('gender');
	      $data['address']  = $this->request->getVar('address');
	      $data['company_name']  = $this->request->getVar('company_name');
	      $data['password']   = $this->request->getVar('password_sign');
	      $data['country_id']  = $this->request->getVar('country_id');
	      $data['state_id']  = $this->request->getVar('state_id');
	      $data['city_id']  = $this->request->getVar('city_id');
        
        $data['status']  = "Pending";
        $data['is_mobile_verified']  = "Pending";
        $data['is_email_verified']  = "Pending";

	      $otp=substr(str_shuffle("01234561289"), 0, 4);
	      $data['otp']=$otp;
	      $data['otp_datetime']=date('Y-m-d H:i:s');
	      $UserModel->save($data);
        $id = $UserModel->getInsertID();
          if($id!='')
          {
	          	  $pass_data= [
			            'site_name'=>'Packagio',
			            'userName'=> $data['fname'].' '.$data['lname'],
			            'otp'=> $otp
			          ]; 
			          $session_otp['user_id'] =$id;
	              $session_otp['user_name']=$data['fname'].' '.$data['lname'];
	              $session_otp['user_email']=$data['email'];
	              $session_otp['user_mobile']=$data['mobile'];
	              $session_otp['user_otp']=$data['otp'];
	              $session_otp['user_opt_datetime']= $data['otp_datetime']; 
                 
	              session()->set('uz',$session_otp);
		           /* $message= view('backend/email/otp',$pass_data,['saveData' => true]);
                $email = \Config\Services::email();
                $email->setFrom('admin@packagio.in', 'Packagio');
                $email->setTo($data['email']);
                $email->setSubject('For Your OTP');
                $email->setMessage($message); //your message here
                  
                if ($email->send(false)) 
                { */
                   
                  $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
                  $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['user_mobile'],
                            "extra1"=>$session_otp['user_otp'],
                            "firstName"=>$data['fname'].' '.$data['lname']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);
                          $res=json_decode($res,true);
                          if($res['status']=="Success")
                          {
                             $response = ['code'=>4,'msg' => 'SignUp Successfully !', 'type' => 'success','url'=>base_url().'/otp'];
                             echo json_encode($response);  
                          }
                          else
                          {
                           $response = ['msg' => $res['status'], 'type' => 'error'];
                           echo json_encode($response);     

                          }
               /* }
                else 
                {
                     $email->printDebugger(['headers']);
                     $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                     echo json_encode($response);
                    
                }  */     
	               
	           
	          }	
        }    
         
	}
	public function otp()
	{
		
		$data['site'] = "Packagio";
		$data['page'] = "OTP";
		$data['previous_url']=previous_url();
        return view('frontend/signup/otp',$data);
	}
	public function verifyotp()
	{ 
	  // fetch the otp data enterted in the textbox	
	  $otp=$this->request->getvar('otp');
	  $UserModel    = new UserModel();
	  $session_uz=session()->get('uz');
	  if($otp!='')
	  {
	  	  if($otp==$session_uz['user_otp'])
	  	  {
	  	  	 // fetch current time and session time both compare
	  	  	 $date_time=date('d-m-Y H:i:s');
	  	  	 $seconds = strtotime($date_time) - strtotime($session_uz['user_opt_datetime']);
	  	  	 $days    = floor($seconds / 86400);
             $hours   = floor(($seconds - ($days * 86400)) / 3600);
             $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
             if($minutes<=10) // in 10 minutes comparison
             {   
                $user_data['status']  = "Verified";
                $user_data['is_mobile_verified']  = "Verified";
                $UserModel->update($session_uz['user_id'], $user_data);      
                $p_url=$this->request->getvar('p_url');
                if($p_url=="signin")
                {
                    $user_ses=$UserModel->find($session_uz['user_id']);
                    $this->setUserSession($user_ses);
                    
                    $response='1';
                      
                }
                else
                {
                  $user_ses=$UserModel->find($session_uz['user_id']);
                  $this->email_user_link($user_ses);
                  $response = ['code'=>'4','msg' => 'OTP Successfully Verified !', 'type' => 'success','url'=>base_url().'/signin'];  
                }  

             }
             else
             {
             	$response = ['msg' =>'OTP was expired,please resend OTP Again !', 'type' => 'error']; 
             }	

	  	  }
	  	  else
	  	  {
	  	  	// OTP Wrong
             $response = ['msg' =>'OTP is wrong !', 'type' => 'error']; 
	  	  }	
        echo json_encode($response); 
	  } 

	}
	public function resend_otp()
	{   
		$UserModel    = new UserModel();
		$otp=substr(str_shuffle("01234561289"), 0, 4);
		$data=session()->get('uz');
    $user_id=$data['user_id'];
		$pass_data= [
			            'site_name'=>'Packagio',
			            'userName'=> $data['user_name'],
			            'otp'=> $otp
			          ];
    			      $otp_time=date('Y-m-d H:i:s'); 
    			      $session_otp['user_id'] =$data['user_id'];
	              $session_otp['user_name']=$data['user_name'];
	              $session_otp['user_email']=$data['user_email'];
	              $session_otp['user_mobile']=$data['user_mobile'];
	              $session_otp['user_otp']=$otp;
	              $session_otp['user_opt_datetime']= $otp_time;
                  
  	            session()->set('uz',$session_otp);
  		          
                $message= view('backend/email/otp',$pass_data,['saveData' => true]);
  		          $email = \Config\Services::email();
  		          $email->setFrom('admin@packagio.in', 'Packagio');
  		          $email->setTo($data['user_email']);
  		          $email->setSubject('For Your OTP');
  		          $email->setMessage($message);//your message here
                  
	            if ($email->send(false)) 
	            {  
                
                    $user_data['otp']=$otp;
                    $user_data['otp_datetime']=$otp_time; 
                    $UserModel->update($user_id, $user_data);       

                    $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
     
                    $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['user_mobile'],
                            "extra1"=>$session_otp['user_otp'],
                            "firstName"=>$session_otp['user_name']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);             
	                  $res=json_decode($res,true);
                    if($res['status']=="Success")
                    {
                      $response = ['msg' => "OTP Send Successfully !", 'type' => 'success'];
                      echo json_encode($response);  
                    }
                    else
                    {
                     $response = ['msg' => $res['status'], 'type' => 'error'];
                     echo json_encode($response);     

                    } 
            }
            else 
              {
                   $email->printDebugger(['headers']);
                   $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                   echo json_encode($response);
                  
              }        
	           
	}
	public function dologin()
	{
		    $UserModel = new UserModel();
        $SupplierModel = new SupplierModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $user = $UserModel->where('email', $email)->first();
        $supplier = $SupplierModel->where('email', $email)->first();

        if($user) 
        {
            if (password_verify($password, $user['password'])) 
            {
                
               // verified user listed here
               if($user['is_mobile_verified']=='Verified')
               {
                 $this->setUserSession($user);
                 $pass_data=session()->get('pass_data');
                 if(isset($pass_data) && is_array($pass_data) && count($pass_data)>=1)
                 {
                  //supplier/view_supplier/
                    $response=['code'=>'4','url'=>base_url().'/supplier/view_supplier/'.$pass_data['supplier_id'],'msg'=>'Login Successfully !'];
                   echo json_encode($response);
                 }
                 else
                 {
                   echo json_encode('1');
                 }  

               }
               // Pending Mobile Verification User
               else
               {
                    // Sent to User Otp Verification Portion
                    $otp=substr(str_shuffle("01234561289"), 0, 4); 
                    $session_otp['user_id'] =$user['id'];
                    $session_otp['user_name']=$user['fname'].' '.$user['lname'];
                    $session_otp['user_email']=$user['email'];
                    $session_otp['user_mobile']=$user['mobile'];
                    $session_otp['user_otp']=$otp;
                    $session_otp['user_opt_datetime']= date('Y-m-d H:i:s'); 
                    

                    session()->set('uz',$session_otp);
                    $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
                    $data_sms =  [
                              "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                              "mailerID"=>"12",
                              "mobile"=>$user['mobile'],
                              "extra1"=>$session_otp['user_otp'],
                              "firstName"=>$session_otp['user_name']
                            ];
   
                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);
                          $res=json_decode($res,true);
                          if($res['status']=="Success")
                          {
                             $user_data['otp']  = $otp;
                             $user_data['otp_datetime']= date('Y-m-d H:i:s');
                             $user_data['status']  = "Pending";
                             $user_data['is_mobile_verified']  = "Pending";
                             $UserModel->update($session_otp['user_id'], $user_data);  
                             $response = ['code'=>4,'msg'=>'Redirect to OTP Verification Section !', 'type' => 'success','url'=>base_url().'/otp'];
                              echo json_encode($response);  
                          }
                          else
                          {
                            $response = ['msg' => $res['status'], 'type' => 'error'];
                            echo json_encode($response);     

                          }

               } 


                  
               
            } 
            else 
            {
                echo json_encode('2');
            }
        }
        else if($supplier)
        {
          if(password_verify($password, $supplier['password'])) 
          {
              
              if($supplier['is_mobile_verified']=="Verified" || $supplier['status']=="Verified")
              {  
                 $this->setSupplierSession($supplier);
                 $result=[
                       'code'=>'4',
                       'msg' =>'Login Successfully !',
                       'url'=>base_url().'/signin'
                 ];
                 echo json_encode($result);  
              }
              else
              {
                 // Pending Supplier Verification
                    $otp=substr(str_shuffle("01234561289"), 0, 4);
                    $otp_time=date('Y-m-d H:i:s');
                    $data['otp']=$otp;
                    $data['otp_datetime']=date('Y-m-d H:i:s');
                    $session_otp['supplier_id'] =$supplier['id'];
                    $session_otp['supplier_name']=$supplier['supplier_name'];
                    $session_otp['supplier_email']=$supplier['email'] ;
                    $session_otp['supplier_mobile']=$supplier['mobile'];
                    $session_otp['supplier_otp']=$otp;
                    $session_otp['supplier_opt_datetime']= $otp_time;
                    session()->set('sl',$session_otp);
                    $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
                    $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['supplier_mobile'],
                            "extra1"=>$session_otp['supplier_otp'],
                            "firstName"=>$session_otp['supplier_name']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);             
                          $res=json_decode($res,true);
                          if($res['status']=="Success")
                          {  
                             $supplier_data['otp']  = $otp;
                             $supplier_data['otp_datetime']= date('Y-m-d H:i:s');
                             $supplier_data['status']  = "Pending";
                             $supplier_data['is_mobile_verified']  = "Pending";
                             $SupplierModel->update($session_otp['supplier_id'], $supplier_data); 
                             $response = ['msg' => 'Redirect to OTP Verification Section !', 'type' => 'success','code'=>4,'url'=>base_url().'/supplierotp'];
                             echo json_encode($response);
                          }
                          else
                          {
                            $response = ['msg' => $res['status'], 'type' => 'error'];
                            echo json_encode($response);     

                          }  

              }  

          }
          else 
          {
                echo json_encode('2');
          }  
        }  
        else 
        {
            echo json_encode('0');
        }
	}

	private function setUserSession($user) 
    {
        $session_user = [
        	               'user_id' => $user['id'], 
        	               'user_email' => $user['email'],
        	               'user_name' => $user['fname'].' '.$user['lname'],
        	               'is_log_in' => true,
        	               'user_mobile'=>$user['mobile'],
        	               'user_type' => 'user'
        	             ];
        session()->set('user_session',$session_user);
        
        $ua=$this->simple->getBrowser(); 
        $user_login=[
                         'user_id'=>$user['id'],
                         "log_in_date_time"  => Date('Y-m-d h:i:s'),
                         "log_out_date_time" => '',
                         "browser_name"      => $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'],
                         "device_id"         => $_SERVER['HTTP_USER_AGENT'] . "\n\n",
                         "ip_address"        => $_SERVER['REMOTE_ADDR'],

                       ];   
        $this->userlogin->save($user_login);
        return true;
      
    }
    private function setSupplierSession($supplier)
    {
        
       $session_supplier = ['id' => $supplier['id'], 'email' => $supplier['email'], 'supplier_name' => $supplier['supplier_name'], 'is_log_in' => true, 'user_type' => 'supplier','category_id'=>json_decode($supplier['category_id'],true),'subcategory_id'=>json_decode($supplier['subcategory_id'],true),'third_subcategory_id'=>json_decode($supplier['third_subcategory_id'],true)];
       session()->set($session_supplier);
      

       return true;
   
    }
    // Supplier Sign Up 
    public function suppliersignup()
	{
		$HomeModel    = new HomeModel();
		$data['site'] = "Packagio";
		$data['page'] = "Sign Up";
		$CountryModel = new CountryModel();
        $StateModel   = new StateModel();
        $CityModel    = new CityModel();
        $Third_SubcategoryModel=new Third_SubcategoryModel();

		$data['country'] = $CountryModel->fetch_country();
        $data['state']   = $StateModel->fetch_state();
        $data['city']    = $CityModel->fetch_city();
        $data['category']    = $Third_SubcategoryModel->fetch_category();
        $data['business_category'] = $this->Business_Category();
        $data['supplier_type']     = $this->Supplier_Type();
		return view('frontend/signup/suppliersignup',$data);
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
        '12'=>'Others'

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
    public function dosuppliersignup()
    {
      
          $SupplierModel = new SupplierModel();
          $email=$this->request->getVar('email');
          $password=$this->request->getVar('password');
          $mobile=$this->request->getVar('mobile');
          $conf_password=$this->request->getVar('conf_password');
          $cnt_value=$SupplierModel->where('email',$email)->findAll();
          $cnt_mobile_value=$SupplierModel->where('mobile',$mobile)->findAll();
          $cnt_user_tbl_value_email=$this->user->where('email',$email)->findAll();
          $cnt_user_tbl_value_mobile=$this->user->where('mobile',$mobile)->findAll();
          if($password!=$conf_password)
          {
           $response = ['msg' => 'Password and Confirm Password does not match !', 'type' => 'error'];
           echo json_encode($response);  
         }
         else if(is_array($cnt_value) && count($cnt_value)>=1)
         {
           $response = ['msg' => 'Your Email ID  already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
         }
         else if(is_array($cnt_user_tbl_value_email) && count($cnt_user_tbl_value_email)>=1)
         {
           $response = ['msg' => 'Your Email ID  already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
         }
         else if(is_array($cnt_mobile_value) && count($cnt_mobile_value)>=1)
         {
           $response = ['msg' => 'Your Mobile Number is   already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
         }

         else if(is_array($cnt_user_tbl_value_mobile) && count($cnt_user_tbl_value_mobile)>=1)
         {
           $response = ['msg' => 'Your Mobile Number is   already registered in the system !', 'type' => 'error'];
           echo json_encode($response);
         }
         else
         { 

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
          $data['status']="Pending";
          $data['is_mobile_verified']='Pending';
          $data['is_email_verified']='Pending';  
          // Fetch Array Data      
          $category_id=$this->request->getVar('category_id');
          $subcategory_id=$this->request->getVar('subcategory_id');
          $third_subcategory_id=$this->request->getVar('third_subcategory_id');
          if (isset($_FILES['file'])) 
            {
                $target_path = "uploads/supplier/";
                $target_path = $target_path . md5(uniqid()) . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                $data['supplier_image'] = $target_path;
            }  



          // Send Email to create Random Pass word Generate
          
          //$message="Your Temporary Password is= ".$password;
          $data['password']= $password;
          $otp=substr(str_shuffle("01234561289"), 0, 4);
          $otp_time=date('Y-m-d H:i:s');
	        $data['otp']=$otp;
	        $data['otp_datetime']=date('Y-m-d H:i:s');
          $SupplierModel->save($data);
          $id = $SupplierModel->getInsertID(); 
          //$id=1;
          // Fetch Instered ID FOr Product Data
          if($id!='')
          {
           // Create Product Array For Inserting Client Products As Directly 
           
            foreach (array_unique($subcategory_id) as $k => $v) 
            {  
                
                  if(isset($third_subcategory_id[$v]) && count($third_subcategory_id[$v])>=1)
                   { 
                      $this->ins_data($id,$k,$v,array_unique($third_subcategory_id[$v]));
                     //print_r(array_unique($third_subcategory_id[$v]));  
                   }
                 else 
                 {  

                   $product_ary=array(
                         'category_id'=>$this->simple->fetch_category_id($v),
                         'sub_category_id'=>$v,
                         'third_category_id'=>'',
                         'supplier_id'=>$id,
                         'product_status'=>'Pending',
                         'date_created'=>date('Y-m-d H:i:s'),
                         'ip_address'=>$_SERVER['REMOTE_ADDR'], 
                         'is_from_admin'=>'1',
                     );
                     $this->product->insert($product_ary);
                   /* print_r($product_ary); */
                 } 

                  
              
            } 

           
             $pass_data= [
              'site_name'=>'Packagio',
              'userName'=> $data['supplier_name'],
              'otp'=> $otp
            ]; 
             $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
                $session_otp['supplier_id'] =$id;
                $session_otp['supplier_name']=$data['supplier_name'];
                $session_otp['supplier_email']=$data['email'] ;
                $session_otp['supplier_mobile']=$data['mobile'];
                $session_otp['supplier_otp']=$otp;
                $session_otp['supplier_opt_datetime']= $otp_time;
                   
                session()->set('sl',$session_otp);
                /*$message= view('backend/email/otp',$pass_data,['saveData' => true]);
                $email = \Config\Services::email();
                $email->setFrom('admin@packagio.in', 'Packagio');
                $email->setTo($data['email']);
                $email->setSubject('For Your OTP');
                $email->setMessage($message);//your message here
 
                  
          
            if ($email->send(false)) 
            {  */

                $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['supplier_mobile'],
                            "extra1"=>$session_otp['supplier_otp'],
                            "firstName"=>$session_otp['supplier_name']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);             
                          $res=json_decode($res,true);
                          if($res['status']=="Success")
                          {
                            $response = ['msg' => 'SignUp Successfully!', 'type' => 'success','code'=>4,'url'=>base_url().'/supplierotp'];
                            echo json_encode($response);
                          }
                          else
                          {
                           $response = ['msg' => $res['status'], 'type' => 'error'];
                           echo json_encode($response);     

                          }
               /* }
                else 
                {
                     $email->printDebugger(['headers']);
                     $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                     echo json_encode($response);
                    
                }    */  
          
          } 
        }

    }
    public function ins_data($supplier_id,$category_id,$sub_category_id,$third_category_id)
    {
      foreach ($third_category_id as $key => $value) 
      {
          $product_ary=array(
                                 'category_id'=>$this->simple->fetch_category_id($sub_category_id),
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
    public function supplierotp()
    {
    	$data['site'] = "Packagio";
		$data['page'] = "OTP";
		$data['previous_url']=previous_url();
        return view('frontend/signup/supplierotp',$data);
    }
    public function verifysupplierotp()
    {
    	// fetch the otp data enterted in the textbox	
	  $otp=$this->request->getvar('otp');
	  $SupplierModel    = new SupplierModel();
	  $session_sl=session()->get('sl');
	  if($otp!='')
	  {
	  	  if($otp==$session_sl['supplier_otp'])
	  	  {
	  	  	 // fetch current time and session time both compare
	  	  	 $date_time=date('d-m-Y H:i:s');
	  	  	 $seconds = strtotime($date_time) - strtotime($session_sl['supplier_opt_datetime']);
	  	  	 $days    = floor($seconds / 86400);
             $hours   = floor(($seconds - ($days * 86400)) / 3600);
             $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
             if($minutes<=10) // in 10 minutes comparison
             {   
               $supplier_data['status']='Verified';
               $supplier_data['is_mobile_verified']='Verified';
               $SupplierModel->update($session_sl['supplier_id'], $supplier_data);
               $p_url=$this->request->getvar('p_url');
               $sl_ses=$SupplierModel->find($session_sl['supplier_id']);
               $this->setSupplierSession($sl_ses);
               $this->email_link($sl_ses);
                if($p_url=="signin")
                {
                    
                   
                   /* echo json_encode('1');*/
                   $response=[
                       'code'=>'4',
                       'msg' =>'OTP Successfully Verified !',
                       'url'=>base_url().'/signin'
                   ];
                 }
                 else
                 {
                   $response = ['code'=>'4','msg' => 'OTP Successfully Verified !', 'type' => 'success','url'=>base_url().'/signin'];
 
                     
                 }

             }
             else
             {
             	$response = ['msg' =>'OTP was expired,please resend OTP Again !', 'type' => 'error']; 
             }	

	  	  }
	  	  else
	  	  {
	  	  	// OTP Wrong
             $response = ['msg' =>'OTP is wrong !', 'type' => 'error']; 
	  	  }	
        echo json_encode($response); 
	   } 
    }
    public function resend_supplier_otp()
    {
    
    $SupplierModel    = new SupplierModel();
		$otp=substr(str_shuffle("01234561289"), 0, 4);
		$data=session()->get('sl');
		$pass_data= [
			            'site_name'=>'Packagio',
			            'userName'=> $data['supplier_name'],
			            'otp'=> $otp
			          ];
			      $otp_time=date('Y-m-d H:i:s'); 
			      $session_otp['supplier_id'] =$data['supplier_id'];
	              $session_otp['supplier_name']=$data['supplier_name'];
	              $session_otp['supplier_email']=$data['supplier_email'] ;
	              $session_otp['supplier_mobile']=$data['supplier_mobile'];
	              $session_otp['supplier_otp']=$otp;
	              $session_otp['supplier_opt_datetime']= $otp_time;
                  
	              session()->set('sl',$session_otp);
                $message= view('backend/email/otp',$pass_data,['saveData' => true]);
              $email = \Config\Services::email();
              $email->setFrom('info@thepackaginghouse.in', 'Packaging House');
              $email->setTo($data['supplier_email']);
              $email->setSubject('For Your OTP');
              $email->setMessage($message);//your message here
                  
              if ($email->send(false)) 
              { 
		               $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
                     $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['supplier_mobile'],
                            "extra1"=>$session_otp['supplier_otp'],
                            "firstName"=>$session_otp['supplier_name']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);             
                          $res=json_decode($res,true);  
                          $supplier_data['otp']=$otp;
                          $supplier_data['otp_datetime']=$otp_time; 
                          $SupplierModel->update($data['supplier_id'], $supplier_data);   
                           if($res['status']=="Success")
                          {
                             $response = ['msg' => 'OTP Send Successfully !', 'type' => 'success'];
                             echo json_encode($response);
                          }
                          else
                          {
                           $response = ['msg' => $res['status'], 'type' => 'error'];
                           echo json_encode($response);     

                          }                      
      	                 
	            } 
	            else 
	            {
	                 $email->printDebugger(['headers']);
	                 $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
	                 echo json_encode($response);
	                
	            }
    }
    public function logout()
    {
        $user=session()->get('user_session');
        $this->userlogin->where('user_id',$user['user_id'])->delete();    
        session()->remove('user_session');
        return redirect()->to('signin');
    }
   public function signin()
    {
      
      $HomeModel    = new HomeModel();
      $data['site'] = "Packagio";
      $data['page'] = "Sign Up";
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
                return view('frontend/signup/signin',$data);
            }  
        }
        else
        {
          return view('frontend/signup/signin',$data);
        }  

      }  

      //

    }
    public function send_txn_sms()
    {
      $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
     
      $data = '{"apiKey":"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                "mailerID":"12",
                "mobile":"9122123129182",
                "extra1":"1234",
                "firstName":"Jay Rajput"
                }'; 
              $ch = curl_init($url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
              $res1 = curl_exec($ch);
             
              curl_close($ch);
    }
    public function emailtosupplier()
    {
      $user_session=session()->get('user_session');
      $search_data=session()->get('search_data');
      $email_subject=$this->request->getVar('subject');
      $email_message=$this->request->getVar('message');
      $supplier_email=$this->request->getVar('supplier_email');
      $supplier_name=$this->request->getVar('supplier_name');  
      $user_data=$this->user->find($user_session['user_id']);
      $supplier_id=$this->request->getVar('supplier_id');
      if($user_session['user_email']!='Pending')
      {
              $pass_data=[
                'supplier_name'=>$supplier_name,
                'supplier_email'=>$supplier_email,
                'category_name'=>$search_data['search_value'],
                'message'=>$email_message,
                'subject'=>$email_subject,
                'user_name'=>$user_session['user_name'],
                'user_email'=>$user_session['user_email'],
                'user_mobile'=>$user_session['user_mobile'],
                'user_company'=>$user_data['company_name'],
                'user_address'=>$user_data['address']
        
              ];
              $message= view('backend/email/direct_supplier',$pass_data,['saveData' => true]);
              $email = \Config\Services::email();
              $email->setFrom('admin@packagio.in', 'Packagio : Find Your Packaging.');
              $email->setTo($supplier_email);
              $email->setSubject($email_subject);
              $email->setMessage($message);//your message here
              if ($email->send(false)) 
              { 
                     $email_log=[
                      'user_id'=> $user_session['user_id'],
                      'supplier_id'=>$supplier_id,
                      'email_log_subject'=>$email_subject,
                      'email_log_message'=>$email_message,
                      'category_name'=>$search_data['search_value'],
                      'ip_address'=>$_SERVER['REMOTE_ADDR']
                     ];
                     $this->emaillog->save($email_log);
                     $response = ['msg' =>'Mail Sent Successfully !<br>Supplier Will Contact You Soon !', 'type' => 'success','code'=>'5'];
                     echo json_encode($response);
         
              } 
              else 
              {
                         $email->printDebugger(['headers']);
                         $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                         echo json_encode($response);
                        
              }
        }
        else
        {
            $response = ['msg' =>'Your Email ID  is not Verified Yet,Please Verify First !', 'type' => 'error'];
            echo json_encode($response);
        }
    }
    public function forgot()
    {
        $HomeModel    = new HomeModel();
        $data['site'] = "Packagio";
        $data['page'] = "Forgot Password";
        return view('frontend/signup/forgot',$data);
    }
    public function forgotemail()
    {
       $email=$this->request->getVar('email');
       $user=$this->user->where('email',$email)->first();
       if(is_array($user) && count($user)>=1)
       {   
            $session_otp['user_id'] =$user['id'];
            $session_otp['user_name']=$user['fname'].' '.$user['lname'];
            $session_otp['user_email']=$user['email'];
            $session_otp['user_mobile']=$user['mobile'];
            session()->set('uz',$session_otp); 
            $response = ['code'=>4,'msg' => 'Email Verified Successfully !', 'type' => 'success','url'=>base_url().'/newpass'];
            echo json_encode($response);
         
       }
       else
       {
           $response = ['msg' =>'No User Found !Please Register .', 'type' => 'error'];
           echo json_encode($response);
       }   
    }
    public function newpass()
    {
        $HomeModel    = new HomeModel();
        $data['site'] = "Packagio";
        $data['page'] = "New Password";
        return view('frontend/signup/newpass',$data);
    }
    public function updatepass()
    {
      $user_id=$this->request->getvar('user_id');
      $password=$this->request->getVar('password_sign');
      $conf_password=$this->request->getVar('conf_password'); 
      if($password!=$conf_password)
      {
           $response = ['msg' => 'Password and Confirm Password does not match !', 'type' => 'error'];
           echo json_encode($response);  
      }
      else
      {
         $data=[
                  'password'=>$password
               ];
         $this->user->update($user_id,$data);
         $response = ['msg' => 'Password Successfully Updated !', 'type' => 'success','code'=>'4','url'=>base_url().'/signin'];
         echo json_encode($response);       
      }  
    }
   /* public function sl_signin()
    {
      
      $HomeModel    = new HomeModel();
      $data['site'] = "Packagio";
      $data['page'] = "Supplier Sign In";
      return view('frontend/signup/sl_login',$data);

    }*/
    public function sendmail()
    {
      $name_contact=$this->request->getvar('name_contact');
      $email_contact=$this->request->getVar('email_contact');
      $message_contact=$this->request->getVar('message_contact');
      $pass_data=[
       'name'=>$name_contact,
       'email'=>$email_contact,
       'msg'=>$message_contact
      ];
      $message= view('backend/email/contact',$pass_data,['saveData' => true]);
      $email = \Config\Services::email();
      $email->setFrom('admin@packagio.in', 'Packagio : Find Your Packaging.');
      $email->setTo('admin@packagio.in');
      $email->setSubject('Contact US');
      $email->setMessage($message);//your message here
      if ($email->send(false)) 
      {
           $response = ['msg' =>'Mail Sent Successfully !,Admin Contact You Soon !', 'type' => 'success'];
           echo json_encode($response);
 
      } 
      else 
      {
                 $email->printDebugger(['headers']);
                 $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                 echo json_encode($response);
                
      }
    }
    private function email_link($ses_supplier)
    { 
     
      $ciphertext =urlencode(base64_encode($ses_supplier['id']));
      $pass_data=[
       'supplier_id'=>$ses_supplier['id'],
       'link'=>base_url().'/email/'.$ciphertext
      ];
      $message= view('backend/email/email_verify',$pass_data,['saveData' => true]);
      $email = \Config\Services::email();
      $email->setFrom('admin@packagio.in', 'Packagio : Find Your Packaging.');
      $email->setTo($ses_supplier['email']);
      $email->setSubject('Email Verification');
      $email->setMessage($message);//your message here
      if ($email->send(false)) 
      {
          
             return 1;
      } 
      else 
      {
                 $email->printDebugger(['headers']);
                 $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                 echo json_encode($response);
                
      }  

    }
    private function email_user_link($user_session)
    {
      $ciphertext =urlencode(base64_encode($user_session['id']));
      $pass_data=[
       'user_id'=>$user_session['id'],
       'link'=>base_url().'/email_user_link/'.$ciphertext
      ];
      $message= view('backend/email/email_user_verify',$pass_data,['saveData' => true]);
      $email = \Config\Services::email();
      $email->setFrom('admin@packagio.in', 'Packagio : Find Your Packaging.');
      $email->setTo($user_session['email']);
      $email->setSubject('Email Verification');
      $email->setMessage($message);//your message here
      if ($email->send(false)) 
      {
          
             return 1;
      } 
      else 
      {
                 $email->printDebugger(['headers']);
                 $response = ['msg' => $email->printDebugger(['headers']), 'type' => 'error'];
                 echo json_encode($response);
                
      }  
    }
    public function email_verify()
    {
      $data['site'] = "Packagio";
      $data['page'] = "Email Verify";
      $config         = new \Config\Encryption();
      $config->key    = 'aBigsecret_ofAtleast32Characters';
      $config->driver = 'OpenSSL';
      $encrypter = \Config\Services::encrypter($config);
      $uri = service('uri');

      $ciphertext = $uri->getSegment(2);
    
      $supplier_id=base64_decode(urldecode($ciphertext));
      if($supplier_id!='')
      {
         $SupplierModel    = new SupplierModel();
         $supplier_data=[
          'is_email_verified' =>'Verified' 
         ];
         $SupplierModel->update($supplier_id, $supplier_data);  
         $response = ['msg' => 'Your Email Successfully Verified !', 'type' => 'success','code'=>'4','url'=>base_url().'/signin'];
         //echo json_encode($response); 
         return view('frontend/signup/email_verify',$response);       
         //return redirect()->to(base_url('/signin'));   
      }  
      
    }
     public function email_user_verify()
    {
      $data['site'] = "Packagio";
      $data['page'] = "Email Verify";
      $config         = new \Config\Encryption();
      $config->key    = 'aBigsecret_ofAtleast32Characters';
      $config->driver = 'OpenSSL';
      $encrypter = \Config\Services::encrypter($config);
      $uri = service('uri');

      $ciphertext = $uri->getSegment(2);
    
      $user_id=base64_decode(urldecode($ciphertext));
      if($user_id!='')
      {
      
         $user_data=[
          'is_email_verified' =>'Verified' 
         ];
         $this->user->update($user_id, $user_data);  
         $response = ['msg' => 'Your Email Successfully Verified !', 'type' => 'success','code'=>'4','url'=>base_url().'/signin'];
         //echo json_encode($response); 
         return view('frontend/signup/email_verify',$response);       
         //return redirect()->to(base_url('/signin'));   
      }  
      
    } 

    public function resend_sms()
    {   
        $UserModel    = new UserModel();
        $otp=substr(str_shuffle("01234561289"), 0, 4);
        $data=session()->get('uz');
        $user_id=$data['user_id'];
        $otp_time=date('Y-m-d H:i:s'); 
        $user_mobile=$this->request->getVar('user_mobile');
        $session_otp['user_id'] =$data['user_id'];
        $session_otp['user_name']=$data['user_name'];
        $session_otp['user_email']=$data['user_email'];
        $session_otp['user_mobile']=$user_mobile;
        $session_otp['user_otp']=$otp;
        $session_otp['user_opt_datetime']= $otp_time;
                  
        session()->set('uz',$session_otp);
        $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
        $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['user_mobile'],
                            "extra1"=>$session_otp['user_otp'],
                            "firstName"=>$session_otp['user_name']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);             
                          $res=json_decode($res,true);  
                          $user_data['otp']=$otp;
                          $user_data['otp_datetime']=$otp_time; 
                          $UserModel->update($data['user_id'], $user_data);   
                           if($res['status']=="Success")
                          {
                             $response = ['msg' => 'OTP Send Successfully !', 'type' => 'success'];
                             echo json_encode($response);
                          }
                          else
                          {
                           $response = ['msg' => $res['status'], 'type' => 'error'];
                           echo json_encode($response);     

                          }  
    }
    public function resend_sms_supplier()
    {
        $SupplierModel    = new SupplierModel();
        $otp=substr(str_shuffle("01234561289"), 0, 4);
        $data=session()->get('sl');
        $supplier_mobile=$this->request->getVar('supplier_mobile');
        $pass_data= [
                      'site_name'=>'Packagio',
                      'userName'=> $data['supplier_name'],
                      'otp'=> $otp
                    ];
        $otp_time=date('Y-m-d H:i:s'); 
        $session_otp['supplier_id'] =$data['supplier_id'];
        $session_otp['supplier_name']=$data['supplier_name'];
        $session_otp['supplier_email']=$data['supplier_email'] ;
        $session_otp['supplier_mobile']=$supplier_mobile;
        $session_otp['supplier_otp']=$otp;
        $session_otp['supplier_opt_datetime']= $otp_time;
        session()->set('sl',$session_otp);
        $url = 'https://api2.juvlon.com/v4/sendTransactionalSMS';
        $data_sms =  [
                            "apiKey"=>"ODU1NjYjIyMyMDIwLTEwLTA5IDExOjI0OjQ3",
                            "mailerID"=>"12",
                            "mobile"=>$session_otp['supplier_mobile'],
                            "extra1"=>$session_otp['supplier_otp'],
                            "firstName"=>$session_otp['supplier_name']
                          ];

                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_sms));
                          $res = curl_exec($ch);
                          curl_close($ch);             
                          $res=json_decode($res,true);  
                          $supplier_data['otp']=$otp;
                          $supplier_data['otp_datetime']=$otp_time; 
                          $SupplierModel->update($data['supplier_id'], $supplier_data);   
                           if($res['status']=="Success")
                          {
                             $response = ['msg' => 'OTP Send Successfully !', 'type' => 'success'];
                             echo json_encode($response);
                          }
                          else
                          {
                           $response = ['msg' => $res['status'], 'type' => 'error'];
                           echo json_encode($response);     

                          }
    }


}
