<?php
namespace App\Libraries;
use App\Models\backend\CategoryModel;
use App\Models\backend\CityModel;
use App\Models\backend\AdminModel;
use App\Models\backend\SubcategoryModel;
use App\Models\backend\Third_SubcategoryModel;
use App\Models\backend\NotificationModel;
use App\Models\backend\SupplierModel;
use App\Models\backend\TestModel;
use App\Models\backend\ProductModel;
use App\Models\backend\FaqModel;
use App\Models\backend\UserModel;
use App\Models\backend\AdvertismentModel;
use App\Models\backend\ExhibitionModel;

class Simple 
{    
	 function __construct() 
	 {
	   $this->cat = new CategoryModel();
	   $this->sub_cat = new SubcategoryModel();
	   $this->thi_sub_cat= new Third_SubcategoryModel();
	   $this->notification=new NotificationModel();
	   $this->supplier=new SupplierModel();
	   $this->product=new ProductModel();
	   $this->admin=new AdminModel();
	   $this->test=new TestModel();
	   $this->faq = new FaqModel();
       $this->city = new CityModel();
       $this->user = new UserModel();
       $this->adv = new AdvertismentModel();
       $this->exh = new ExhibitionModel();
	   
	 }
	 function fetch_category_id($sub_cat_id)
	{
		 $data=$this->sub_cat->find($sub_cat_id);
	 	 return isset($data)?$data['category_id']:'';
	}
	 function fetch_supplier_details1($supplier_id)
	 {
	 	$supplier_details=$this->supplier->where('id', $supplier_id)->first();
	 	return $supplier_details;
	 }
	 function json_decode_str_cat($id) 
	 {
        $category_name=$this->cat->fetch_category_name($id);
	    return $category_name;
	 }	
	 function json_decode_str_sub_cat($id) 
	 {
        $sub_category_name=$this->sub_cat->fetch_sub_cat_name($id);
	    return $sub_category_name;
	 }
	 function json_decode_str_third_sub_cat($id)
	 {
	    $third_sub_category_name=$this->thi_sub_cat->fetch_third_sub_cat_name($id);
	    return $third_sub_category_name;	
	 }
	 function fetch_admin_data($id)
	 {
        $data=$this->admin->fetch_admin_data($id);
        return $data;
	 }
	 function fetch_test_name($id)
	 {

        $data=$this->test->fetch_test_name($id);
        return $data;
	 }
	 function fetch_supplier_city_name($supplier_id)
	 {
	    $data=$this->faq->fetch_supplier_city_name($supplier_id);
        return $data;	
	 }
	 function fetch_city_name($id)
	 { 
	 	$data=$this->faq->fetch_city_name($id);
        return $data;

	 }
	 function fetch_all_city()
	 {
	 	$data =$this->city->findAll();
	 	
	 	return $data;
	 }
	 function Business_Category()
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
	 function fetch_state_name($id)
	 {
	 	 $data=$this->faq->fetch_state_name($id);
        return $data;
	 }
	 function fetch_subcategory($cat_id)
	 {
	 	$data=$this->thi_sub_cat->getsubcategory1($cat_id);
	 	return $data;
	 }
	 function fetch_third_subcategory($sub_cat)
	 {
	 	 $data=$this->faq->getthirdsubtcategory($sub_cat);
	 	 return $data;

	 }
	 function fetch_supplier_details($supplier_id)
	{
		 $data=$this->faq->fetch_supplier_details($supplier_id);
	 	  return $data;
	} 
	function time_ago($time_ago)
    {
	    $time_ago     = strtotime($time_ago);
	    $cur_time     = time();
	    $time_elapsed = $cur_time - $time_ago;
	    $seconds      = $time_elapsed;
	    $minutes      = round($time_elapsed / 60);
	    $hours        = round($time_elapsed / 3600);
	    $days         = round($time_elapsed / 86400);
	    $weeks        = round($time_elapsed / 604800);
	    $months       = round($time_elapsed / 2600640);
	    $years        = round($time_elapsed / 31207680);
	    // Seconds
	    if ($seconds <= 60) 
	    {
	        return 'Just now';
	    }
	    //Minutes
	    elseif ($minutes <= 60) 
	    {
	        if ($minutes == 1) {
	            return ' 1 minute ago';
	        } else {
	            return $minutes.' minutes ago';
	        }
	    }
	    //Hours
	    elseif ($hours <= 24)
	     {
	        if ($hours == 1) {
	            return ' 1 hour ago';
	        } else {
	            return $hours.' hours ago' ;
	        }
	    }
	    //Days
	    elseif ($days <= 7)
	     {
	        if ($days == 1) {
	            return ' yesterday';
	        } 
	        else 
	        {
	            return $days.' days ago' ;
	        }
	    }
	    //Weeks
	    elseif ($weeks <= 4.3) 
	    {
	        if ($weeks == 1) {
	            return ' week ago';
	        } else {
	            return $weeks.' weeks ago';
	        }
	    }
	    //Months
	    elseif ($months <= 12) 
	    {
	        if ($months == 1) {
	            return ' month ago';
	        } else {
	            return $months.' months ago';
	        }
	    }
	    //Years
	    else {
	        if ($years == 1) 
	        {
	            return ' year ago';
	        } else {
	            return $years.' year ago';
	        }
	    }
    }
    public function fetch_all_notification($to_user_type)
    {    
      $notification=$this->notification->fetch_all_notification($to_user_type);
      return $notification;

    }
    public function fetch_supplier_name($supplier_id)
    {
    	 $supplier=$this->supplier->fetch_supplier_name($supplier_id);
         return $supplier;
    }
    public function fetch_product_name($product_id)
    {
    	 $product=$this->product->fetch_product_name($product_id);
         return $product; 

    }
    function password_generate() 
	{ 
	  $chars=7;	
	  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
	  return substr(str_shuffle($data), 0, $chars);
	}
	public function cnt_supplier()
	{
		$cnt=$this->supplier->cnt_supplier();
		return $cnt;
	}
	public function cnt_product()
	{
		$cnt=$this->supplier->cnt_product();
		return $cnt;
	}
	public function cnt_product_ses($supplier_id)
	{
		$cnt=$this->supplier->cnt_product_ses($supplier_id);
		return $cnt;
	}
	
	public function cnt_user()
	{
		$cnt=$this->supplier->cnt_user();
		return $cnt;
	}
	public function cnt_category()
	{
		$cnt=$this->supplier->cnt_category();
		return $cnt;
	}
	//
    public function cnt_faq()
	{
		$cnt=$this->faq->findAll();
		return count($cnt);
	}
	public function cnt_test()
	{
		$cnt=$this->test->findAll();
		return count($cnt);
	}
	public function cnt_adv()
	{
		$cnt=$this->adv->findAll();
		return count($cnt);
	}
	
	public function cnt_exh()
	{
		$cnt=$this->exh->findAll();
		return count($cnt);
	}





	public function str_rep($string)
	{
		if (strlen($string) > 25) 
		{
		  $trimstring = substr($string, 0, 25). '...</a>';
		} 
		else 
		{
		  $trimstring = $string;
		}
					
		return $trimstring;
	}
	public function str_to_date($str_date)
	{
		 $frm=explode(" ",$str_date);
         $date = date_create_from_format('d/m/Y', $frm[0]);
         $date = $date->format('d M Y');
         return $date;                                       
	}
	public function fetch_three_tier()
	{   

		$three_tier=array();
		$category=$this->cat->orderBy('category_name', 'asc')->findAll();
		// fetch all First Tier Main Category
		foreach ($category as $key => $value) 
		{
			$three_tier[$value['category_id']]['category_id']=$value['category_id'];
			$three_tier[$value['category_id']]['category_name']=$value['category_name'];
			$three_tier[$value['category_id']]['category_image']=$value['category_image_path'];
			// fetch second level category data
			$sub_cat=$this->sub_cat->where('category_id',$value['category_id'])->orderBy('sub_cat_name', 'asc')->findAll();
            foreach ($sub_cat as $k => $v) 
            {
            	
            	$three_tier[$value['category_id']]['subcat'][$k]['sub_cat_id']=$v['subcategory_id'];
            	$three_tier[$value['category_id']]['subcat'][$k]['sub_cat_name']=$v['sub_cat_name'];
            	$three_tier[$value['category_id']]['subcat'][$k]['sub_cat_image']=$v['sub_cat_image_path'];
            	$third_sub_cat=$this->thi_sub_cat->where('subcategory_id',$v['subcategory_id'])->orderBy('third_subcategory_name', 'asc')->findAll();
                /*print_r(sizeof($cnt));*/
                if(sizeof($third_sub_cat)>=1)
                {
                 $three_tier[$value['category_id']]['subcat'][$k]['is_product']=1;
                 //$three_tier[$value['category_id']][$v['subcategory_id']]=$v['subcategory_id']; 
                  foreach ($third_sub_cat as $j => $z) 
                  {
                  	$three_tier[$value['category_id']]['subcat'][$k]['third_cat'][$j]['third_subcategory_id']=$z['third_subcategory_id'];
                  	$three_tier[$value['category_id']]['subcat'][$k]['third_cat'][$j]['third_subcategory_name']=$z['third_subcategory_name'];
                  }
                }
                else
                {
                 $three_tier[$value['category_id']]['subcat'][$k]['is_product']=0; 	
                }	
            }
            //$three_tier[$value['category_name']]['second_level']=$value['category_name'];
		}
		return isset($three_tier)?$three_tier:'';


	}
	public function fetch_three_tier_ins()
	{
		$three_tier=array();
		$three_tier['first']['common'][0]='Testing Courses';
		$three_tier['first']['common'][1]='Educational Courses';
       
        // testing Level 
        $test_list=$this->test->findAll();
        foreach ($test_list as $key => $value) 
        {
           $three_tier['first']['testing'][$value['test_id']]=$value['test_name'];
           //$three_tier['first']['testing']['level_2']='Yes';
        }
		// ins courses
		$three_tier['first']['educational'][0]='Diploma';
		$three_tier['first']['educational'][1]='PG-Diploma';
		$three_tier['first']['educational'][2]='BE';
		$three_tier['first']['educational'][3]='ME';
		$three_tier['first']['educational'][4]='Phd';

        return isset($three_tier)?$three_tier:'';

	}
	public function fetch_business_category_name($business_category_id)
	{
		$out='';   
	     if($business_category_id=="1")
	     {
	     	  $out = 'Manufacture';
	     }
	     else if($business_category_id=="2")
	     {
	          $out = 'Exports/Imports';
	     }
	     else if($business_category_id=="3")
	     {
	          $out = 'Services';
	     }
	     else if($business_category_id=="4")
	     {
	          $out = 'Trading';
	     }
	     else if($business_category_id=="5")
	     {
	          $out = 'Consultation';
	     }
	     else if($business_category_id=="6")
	     {
	          $out = 'Organization';
	     }
	     else
	     {
	        $out = 'Others'; 
	     }   
	     
	     return $out;   
		}
		public function find_cat_id($subcategory_id)
		{
		   $category_id=$this->sub_cat->find_cat_id($subcategory_id);
		   return $category_id;

		}
		public function find_sub_cat_id($id)
		{
		   $sub=$this->thi_sub_cat->find($id);
		   return isset($sub)?$sub['subcategory_id']:'';

		}
		public function institute_type($type)
		{
		  if($type=="Testing")
		  {
            return $this->test->findAll();
		  }
		  else
		  {
            $courses =[
            	'Diploma'=>'Diploma',
            	'BE'=>'BE',
            	'PG-Diploma'=>'PG-Diploma',
            	'Phd'=>'PHD'

            ];
            return $courses;
		  }	
		}
		public function cnt_third_cat($sub_cat_id)
		{
			$data=$this->thi_sub_cat->where('subcategory_id',$sub_cat_id)->findAll();
		    return isset($data)?count($data):'0';
		}
        public function cnt_sub_cat($cat_id)
		{
			$data=$this->sub_cat->where('category_id',$cat_id)->findAll();
		    return isset($data)?count($data):'0';
		}
		function fetch_user_name($user_id)
    	{
    		$data=$this->user->find($user_id);
    	 	return isset($data)?$data:'';
    	} 
    	function getBrowser() 
   {  
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'Linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'Mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'Windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}
public function callback_product_name($third_category_id,$sub_category_id)
    {
    	/*print_r($item); */
        if($third_category_id!='0')
        {
            return $this->json_decode_str_third_sub_cat($third_category_id); 
        }
        else
        {
           return $this->json_decode_str_sub_cat($sub_category_id);   
        }    
    }		
}	