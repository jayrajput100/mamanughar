<?php 
namespace App\Controllers\frontend;
use App\Libraries\Simple;
use App\Models\backend\CountryModel;
use App\Models\backend\StateModel;
use App\Models\backend\CityModel;
use App\Models\frontend\ProfileModel;
use App\Models\backend\UserModel;
use App\Controllers\BaseController;
class MyProfile extends BaseController
{

	public function profile()
  {
		$data['site'] = "Packagio";
		$data['page'] = "My Profile";

		$CountryModel = new CountryModel();
    $StateModel   = new StateModel();
    $CityModel    = new CityModel();
    $ProfileModel = new ProfileModel();


    $user_session=session()->get('user_session');
    if(isset($user_session)){
    	if(is_array($user_session) && count($user_session)>=1){ 
        $user = $ProfileModel->fetch_user($user_session['user_id']);
    		$data['profile'] = $user;
    	}
    }

		$data['country'] = $CountryModel->fetch_country();
    $data['state']   = $StateModel->fetch_state();
    $data['city']    = $CityModel->fetch_city();
		return view('frontend/profile/my-profile',$data);
  }

  public function updateProfile()
  {

    
    $UserModel   = new UserModel();
    $data['site'] = "Packagio";
    $data['page'] = "My Profile";

    $id       = $this->request->getVar('id');
    $user=$UserModel->find($id);
    if($user['email']!=$this->request->getVar('email'))
    {
      $update_data=['is_email_verified'=>'Pending'];
      $UserModel->update($id, $update_data);
    } 
    if($user['mobile']!=$this->request->getVar('mobile'))
    {
      $update_data=['is_mobile_verified'=>'Pending','status'=>'Pending']; 
      $UserModel->update($id, $update_data);
    }  


    $data['fname']        = $this->request->getVar('first_name');
    $data['lname']        = $this->request->getVar('last_name');
    $data['email']        = $this->request->getVar('email');
    $data['mobile']       = $this->request->getVar('mobile');
    $data['gender']       = $this->request->getVar('gender');
    $data['address']      = $this->request->getVar('address');
    $data['company_name'] = $this->request->getVar('company_name');
    //$data['password']     = $this->request->getVar('password_sign');
    $data['country_id']   = $this->request->getVar('country_id');
    $data['state_id']     = $this->request->getVar('state_id');
    $data['city_id']      = $this->request->getVar('city_id');
    $email = $this->request->getVar('email');

   
        if($this->request->getVar('password_sign')!='')
        {
         $data['password']=$this->request->getVar('password_sign'); 
        } 
    
        $UserModel->update($id, $data);
        $response = [
          'msg'  => 'Profile updated!', 
          'type' => 'success'];
        echo json_encode($response);
     
    
  }
  public function sendusermail()
  {
      $user_id=$this->request->getVar('user_id');
      $email_id=$this->request->getVar('email_id');
      $ciphertext =urlencode(base64_encode($user_id));
      $pass_data=[
       'user_id'=>$user_id,
       'link'=>base_url().'/email_user_link/'.$ciphertext
      ];
      $message= view('backend/email/email_user_verify',$pass_data,['saveData' => true]);
      $email = \Config\Services::email();
      $email->setFrom('admin@packagio.in', 'Packagio : Find Your Packaging.');
      $email->setTo($email_id);
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
}