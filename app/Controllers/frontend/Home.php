<?php 
namespace App\Controllers\frontend;
use App\Libraries\Simple;
use App\Models\frontend\HomeModel;
use App\Models\backend\SupplierModel;
use App\Models\frontend\CategoryModel;
use App\Models\backend\SubcategoryModel;
use App\Models\backend\Third_SubcategoryModel;
use App\Controllers\BaseController;
use App\Models\backend\ExhibitionModel;
use App\Models\backend\AdvertismentModel;
use App\Models\backend\InstituteModel;
use App\Models\backend\ProductModel;
use App\Models\backend\FaqModel;
use App\Models\backend\GalleryModel;
use App\Models\backend\CatalogModel;
use App\Models\backend\SupplierviewModel;
class Home extends BaseController
{ 
  function __construct() 
  {
     $this->simple=new Simple();
     $this->supplier=new SupplierModel();
     $this->exhibition=new ExhibitionModel();
     $this->subcategory=new SubcategoryModel();
     $this->third=new Third_SubcategoryModel();
     $this->product=new ProductModel();
     $this->advertisment = new AdvertismentModel();
     $this->institute=new InstituteModel();
     $this->faq=new FaqModel();
     $this->gallery=new GalleryModel();
     $this->catalog=new CatalogModel();
     $this->supplierview=new SupplierviewModel();
  }  
	public function home(){
		$HomeModel    = new HomeModel();
		$data['site'] = "Packagio";
		$data['page'] = "Home";
		$data['categorydata']   = $HomeModel->fetch_categorydata();
    $data['exhibition']   = $HomeModel->fetch_exhibition();
    $data['upcoming_exhibition']   = $HomeModel->upcoming_exhibition();
    //print_r($data['upcoming_exhibition']);
    $data['advertisment']   = $HomeModel->fetch_advertisment();
		$data['categorywiseproduct'] =  $this->getcategorywiseproduct();
		return view('frontend/dashboard/dashboard',$data);
	  //print_r($data['exhibition']);
  }

	public function getcategorywiseproduct()
  {
		$CategoryModel    = new CategoryModel();
    $data['categorydata']  = $CategoryModel->fetch_allcategoryData();
    if(isset($data['categorydata'])){
      if(is_array($data['categorydata']) && count($data['categorydata']) >= 1){
        foreach ($data['categorydata'] as $key_c => $value_c) {
          $category[$key_c]['category_id']    = $value_c['category_id'];
          $category[$key_c]['category_name']  = $value_c['category_name'];
          $category[$key_c]['category_image'] = $value_c['category_image_path'];
          $category[$key_c]['category_desc']  = $value_c['category_desc'];
          $category[$key_c]['date_created']   = $value_c['date_created'];

          $subcategory = $CategoryModel->fetch_subcategoryData($value_c['category_id']);

          if(isset($subcategory)){
            if(is_array($subcategory) && count($subcategory) >= 1){
              foreach ($subcategory as $key_s => $value_s) {
                $category[$key_c]['subcategory'][$key_s]['category_id']    = $value_s['category_id'];
                $category[$key_c]['subcategory'][$key_s]['subcategory_id'] = $value_s['subcategory_id'];
                $category[$key_c]['subcategory'][$key_s]['sub_cat_name']   = $value_s['sub_cat_name'];
                $category[$key_c]['subcategory'][$key_s]['sub_cat_desc']   = $value_s['sub_cat_desc'];
                $category[$key_c]['subcategory'][$key_s]['subcat_image']   = $value_s['sub_cat_image_path'];

                $thirdsubcategory = $CategoryModel->fetch_thirdsubcategoryData($value_s['subcategory_id']);
                if(isset($thirdsubcategory)){
            			if(is_array($thirdsubcategory) && count($thirdsubcategory) >= 1){
            				foreach ($thirdsubcategory as $key_tsb => $value_tsb) {
            					$category[$key_c]['subcategory'][$key_s]['thirdsubcategory'][$key_tsb]['third_subcategory_id']   = $value_tsb['third_subcategory_id'];
            					$category[$key_c]['subcategory'][$key_s]['thirdsubcategory'][$key_tsb]['third_subcategory_name'] = $value_tsb['third_subcategory_name'];
            					$category[$key_c]['subcategory'][$key_s]['thirdsubcategory'][$key_tsb]['description']            = $value_tsb['description'];
            					$category[$key_c]['subcategory'][$key_s]['thirdsubcategory'][$key_tsb]['image_path']             = $value_tsb['image_path'];

            					$productdata = $CategoryModel->fetch_productcategorywiseData($value_tsb['third_subcategory_id']);

            					

            					if(isset($productdata)){
			            			if(is_array($productdata) && count($productdata) >= 1){
			            				foreach ($productdata as $key_p => $value_p) {
			            					$category[$key_c]['subcategory'][$key_s]['thirdsubcategory'][$key_tsb]['product'][$key_p]['product_id'] = $value_p['product_id'];
			            					$category[$key_c]['subcategory'][$key_s]['thirdsubcategory'][$key_tsb]['product'][$key_p]['product_name']  = $value_p['product_id'];


			            				}
			            			}
			            		}
            				}
            			}
            		}
              }
            }
          }
        }
      }
    }

    if(isset($category)){
      if(is_array($category) && count($category) >= 1){
      	return $category;
        //$data['categorywiseproduct'] = $category;
      }
    }
  }

  // VIEW Exhobotion
  public function view_exhibition()
  {  
     $data['site'] = "Packagio";
     $data['page'] = "View Exhibition";
     $uri = service('uri');
     $exhibition_id = $uri->getSegment(3); //echo $segment3;
     //print_r($exhibition_id);
     if($exhibition_id!='')
     {
         $data['exhibition']=$this->exhibition->where('exhibition_id', $exhibition_id)->first();
         $exhibition_status_ong=$this->exhibition->fetch_exhibition_status($exhibition_id);
         //
         if(count($exhibition_status_ong)>=1)
         {
           $status="Ongoing";  

         }
         else
         {
           $status="Upcoming"; 
         }
         $data['status']=$status;
         return view('frontend/exhibition/view_exhibition',$data);
     } 
  }
  public function view_advertisment()
  {
     $data['site'] = "Packagio";
     $data['page'] = "View Advertisment";
     $uri = service('uri');
     $add_id = $uri->getSegment(3); //echo $segment3;
     //print_r($exhibition_id);
     if($add_id!='')
     {
         $data['advertisment']=$this->advertisment->where('add_id', $add_id)->first();
         return view('frontend/advertisment/view_advertisment',$data);
     }
  }

  public function get_autocomplete()
  {
     if (isset($_GET['query'])) 
     {      
            $HomeModel    = new HomeModel();  
            $result = $HomeModel->search_category($_GET['query']);
            $result2 = $HomeModel->search_sub_category($_GET['query']);
            $result3 = $HomeModel->search_third_sub_category($_GET['query']);
            $result4 = $HomeModel->search_supplier($_GET['query']); 
            $result5 = $HomeModel->search_test($_GET['query']);
            $result6 = $HomeModel->search_institute($_GET['query']);               
            if (count($result) > 0) 
            {
              foreach ($result as $row)
              {    
                  $k='cat'.','.$row['category_id'];
                  $arr_result[$k] = $row['category_name'];
              }    
            }
            if(count($result2)>0)
             {
              foreach ($result2 as $row)
              {   
                  $k='sub_cat'.','.$row['subcategory_id'];
                  $arr_result[$k] = $row['sub_cat_name'];
              }
             }
             if(count($result3)>0)
             {
                foreach ($result3 as $row)
                { 
                  $k='third_cat'.','.$row['third_subcategory_id'];
                  $arr_result[$k] = $row['third_subcategory_name'];
                }
             }
             if(count($result4)>0)
             {
                foreach ($result4 as $row)
                 {
                    $k='supplier'.','.$row['id'];
                    $arr_result[$k] = $row['supplier_name'];
                 }
             }
             if(count($result5)>0)
             {
                foreach ($result5 as $row)
                { 
                  $k='test'.','.$row['test_id'];
                  $arr_result[$k] = $row['test_name'];
                } 
             }
             if(count($result6)>0)
             {
                foreach ($result6 as $row)
                 { 
                  $k='institute'.','.$row['institute_id'];
                  $arr_result[$k] = $row['institute_name'];
                 }
             }
            
            if(count($arr_result)>=1 && isset($arr_result))
            {     
               echo json_encode(
                    array(
                        'query' =>$_GET['query'],
                        'suggestions' => $arr_result
                    )
                );
            }
            else
            {
               echo json_encode(
                    array(
                        'query' =>$_GET['query'],
                        'suggestions' => null
                    )
                );

            }  
         
    }
  }
  public function search_result()
  {
    $HomeModel    = new HomeModel();
    $pager = \Config\Services::pager();
    if($_POST)
     { 
      $search_query=$this->request->getvar('search_query');
      $search_type=$this->request->getvar('search_type');
      $search_city=$this->request->getvar('city_id');
      $search_value=$this->request->getvar('search_value');
      $search_ary=[
        'search_query'=>$search_query,
        'search_type'=>$search_type,
        'search_value'=>$search_value,
        'search_city'=>$search_city
       ];
       session()->set('search_data',$search_ary);
       }
       $data['site'] = "Packagio";
       $data['page'] = "Search ";
       $ses_data=session()->get('search_data'); 
       if($ses_data['search_type']=="cat")
       {
        
         if($_GET)
         {
          
           $data['sub_cat']= $this->subcategory->search_step_sub_cat($ses_data['search_value'],$ses_data['search_type']); 
         }
         else
         {
           $data['sub_cat']= $this->subcategory->search_step_sub_cat($search_value,$search_type); 
         }
         $data['pager']= $this->subcategory->pager; 
         return view('frontend/home/search_value',$data); 
       }
       else if($ses_data['search_type']=="sub_cat")
       {
           if($_GET)
           {
            
             $data['third_sub_cat']= $this->third->search_step_third_sub_cat($ses_data['search_value'],$ses_data['search_type']); 
              $data['pager']= $this->third->pager; 
            //return view('frontend/home/search_value',$data); 
           }
           else
           {
             $data['third_sub_cat']= $this->third->search_step_third_sub_cat($search_value,$search_type); 
             $data['pager']= $this->third->pager; 
             //return view('frontend/home/search_value',$data);
           }
          
           //print_r($data['third_sub_cat']);
           if(count($data['third_sub_cat'])==0)
           { 
             
             // find cat 
             $category_id=$this->simple->find_cat_id($search_value);
             $data['subcategory_id']= $search_value;
             $data['category_id']= $category_id;
             $data['sub_cat']= $this->subcategory->search_step_sub_cat($category_id,"cat");
             //print_r($category_id);
             $data['supplier']= $this->supplier->old_system_supplier($category_id,$search_value); 
             //print_r($data); 
             return view('frontend/home/next_step_supplier',$data);   
           }
           else
           {
             return view('frontend/home/search_value',$data);
           } 
         //
       }
       elseif ($ses_data['search_type']=="supplier") 
       {
         // find the data in supplier
         $SupplierModel=new SupplierModel();
         if($_GET)
          {
            
            $data['supplier']= $SupplierModel->search_step_supplier($ses_data['search_value'],$ses_data['search_type']); 

          }
          else
          {
            $data['supplier']= $SupplierModel->search_step_supplier($search_value,$search_type); 
          } 
         //$data['supplier']= $SupplierModel->search_step_supplier($search_value,$search_type); 
          $data['pager']= $SupplierModel->pager; 
         //print_r($data);
        return view('frontend/home/search_value',$data);
          
       }
       elseif ($ses_data['search_type']=="test") 
       {
         $InstituteModel=new InstituteModel(); 
         if($_GET)
         {
           $data['institute']= $InstituteModel->search_step_institute($ses_data['search_value'],$ses_data['search_type']);
         }
         else
         {
           $data['institute']= $InstituteModel->search_step_institute($search_value,$search_type);
         }  
          return view('frontend/home/institute_view2',$data);
       }
       elseif ($ses_data['search_type']=="third_cat") 
       {  
        if($_GET)
        {    
          $sub_category_id=$this->simple->find_sub_cat_id($search_value);
          $category_id=$this->simple->find_cat_id($sub_category_id);
          $data['category_id']=$category_id;
          $data['subcategory_id']= $sub_category_id;
          $data['third_category_id']= $search_value;
          $data['third_sub_cat']= $this->third->search_step_third_sub_cat($sub_category_id,"sub_cat");
          $data['supplier']= $this->supplier->old_system_supplier_by_third($category_id,$sub_category_id,$search_value);
          
          $search_ary=[
                'search_query'=>$search_query,
                'search_type'=>$search_type,
                'search_value'=>$this->simple->json_decode_str_third_sub_cat($search_value),
                
               ];
              session()->set('search_data',$search_ary);
         }
         else
         {
            $sub_category_id=$this->simple->find_sub_cat_id($search_value);
            $category_id=$this->simple->find_cat_id($sub_category_id);
            $data['category_id']=$category_id;
            $data['subcategory_id']= $sub_category_id;
            $data['third_category_id']= $search_value;
             $data['third_sub_cat']= $this->third->search_step_third_sub_cat($sub_category_id,"sub_cat");
            $data['supplier']= $this->supplier->old_system_supplier_by_third($category_id,$sub_category_id,$search_value);
            $search_ary=[
                  'search_query'=>$search_query,
                  'search_type'=>$search_type,
                  'search_value'=>$this->simple->json_decode_str_third_sub_cat($search_value),
                  
                 ];
                session()->set('search_data',$search_ary);
         } 
          return view('frontend/home/next_step_third_supplier',$data);
       } 
      else
      {
         //find the data in institute
         $InstituteModel=new InstituteModel();
         if($_GET)
         {
            
             $data['institute']= $InstituteModel->search_step_institute($ses_data['search_value'],$ses_data['search_type']);
           }
           else
           {
              $data['institute']= $InstituteModel->search_step_institute($search_value,$search_type);
           } 
        
           $data['pager']= $InstituteModel->pager; 
           return view('frontend/home/next_step_institute',$data);
           //print_r($data['institute']);
         //print_r($search_type);
     } 
      
   
  }

  public function view_product()
  {
      $data['site'] = "Packagio";
      $data['page'] = "View product ";
      $HomeModel    = new HomeModel();
      $uri = service('uri');
      $product_id = $uri->getSegment(3); //echo $segment3;
      if($product_id!='')
      {
        $data['product']=$HomeModel->fetch_product($product_id);
        //$data['supplier']=$HomeModel->fetch_supplier($product_id);
        $data['product_image']=$HomeModel->fetch_product_images($product_id);
        return view('frontend/home/view_product',$data); 
      }  
    //print_r($product_id);
  }
  public function view_supplier()
  {   
     // session()->remove('pass_data'); 
      $data['site'] = "Packagio";
      $data['page'] = "View Supplier ";
      $HomeModel    = new HomeModel();
      $uri = service('uri');
      $supplier_id = $uri->getSegment(3); //echo $segment3;
      if($supplier_id!='')
      {
        $data['supplier']=$this->simple->fetch_supplier_details($supplier_id);
        $data['gallery']=$HomeModel->fetch_gallery_images($supplier_id);
        $data['catalog']=$this->catalog->where('supplier_id',$supplier_id)->where('catalog_status','Approved')->findAll();
        $data['product']=$this->product->where('supplier_id',$supplier_id)->where('product_status','Approved')->findAll(); 
        $ses_data=session()->get('user_session'); 
        $supplier_view=[
         'supplier_id'=>$supplier_id,
         'user_id'=>$ses_data['user_id'],
         'user_email'=>$ses_data['user_email'],
         'user_name'=>$ses_data['user_name'],
         'user_mobile'=>$ses_data['user_mobile'],
         'ip_address'=>$_SERVER['REMOTE_ADDR']    
        ]; 
        $this->supplierview->save($supplier_view);   
        return view('frontend/home/view_supplier',$data); 
      } 
  }
  public function view_institute()
  {
      $data['site'] = "Packagio";
      $data['page'] = "View institute ";
      $HomeModel    = new HomeModel();
      $uri = service('uri');
      $institute_id = $uri->getSegment(3); //echo $segment3;
      if($institute_id!='')
      {
        $data['institute']=$HomeModel->fetch_institute($institute_id);
        
        return view('frontend/home/view_institute',$data); 
      } 
  }

  // New Next Step Supplier
  public function next_step_supplier()
  {
    
    $data['site'] = "Packagio";
    $data['page'] = "View Supplier";
    $uri = service('uri');
    $HomeModel    = new HomeModel();
    $subcategory_id = $uri->getSegment(2);
    $explode_string=explode("_",$subcategory_id);
    $data['supplier']=$this->supplier->old_system_supplier($explode_string[1],$explode_string[0]);
    $data['sub_cat']= $this->subcategory->search_step_sub_cat($explode_string[1],"cat");
    $data['subcategory_id']= $explode_string[0];
    $data['category_id']= $explode_string[1];
    return view('frontend/home/next_step_supplier',$data);
  }
  public function next_step_third_supplier()
  {
    $data['site'] = "Packagio";
    $data['page'] = "View Supplier";
    $uri = service('uri');
    $HomeModel    = new HomeModel();
    $subcategory_id = $uri->getSegment(2);
    $explode_string=explode("_",$subcategory_id);
    
    $data['supplier']=$this->supplier->old_system_supplier_by_third($explode_string[2],$explode_string[1],$explode_string[0]);
   
    $data['third_sub_cat']= $this->third->search_step_third_sub_cat($explode_string[1],"sub_cat");
    $data['third_category_id']=$explode_string[0]; 
    $data['subcategory_id']= $explode_string[1];
    $data['category_id']= $explode_string[2];
    //print_r($data);
    return view('frontend/home/next_step_third_supplier',$data); 
  }
  public function filter_code()
  {
   $category_id=$this->request->getvar('category_id');
   $first_filter_value=$this->request->getvar('first_filter_value');
   $second_filter_value=$this->request->getvar('second_filter_value');
   $third_filter_value=$this->request->getvar('third_filter_value');
   
   $pager = \Config\Services::pager();
   
   //echo json_encode($second_filter_value);
   $data['supplier']=$this->supplier->filter_supplier($first_filter_value,$second_filter_value,$third_filter_value,$category_id);
   $data['pager'] = $this->supplier->pager;
   echo view('frontend/home/supplier_view', $data);
  }
  public function filter_third_sub_cat()
  {
   $category_id=$this->request->getvar('category_id');
   $subcategory_id=$this->request->getvar('subcategory_id');
   $first_filter_value=$this->request->getvar('first_filter_value');
   $second_filter_value=$this->request->getvar('second_filter_value');
   $third_filter_value=$this->request->getvar('third_filter_value');
   
   $pager = \Config\Services::pager();
   
   //echo json_encode($second_filter_value);
   $data['supplier']=$this->supplier->filter_third_sub_cat_supplier($first_filter_value,$second_filter_value,$third_filter_value,$subcategory_id,$category_id);
   $data['pager'] = $this->supplier->pager;
   echo view('frontend/home/supplier_third_view', $data); 
    
  }
  public function filter_institute()
  {
     $first_filter_value=$this->request->getvar('first_filter_value');
     $second_filter_value=$this->request->getvar('second_filter_value');
     $institute_type=$this->request->getvar('institute_type');
     $pager = \Config\Services::pager();
     
     $data['institute']=$this->institute->filter_institute($first_filter_value,$second_filter_value,$institute_type);
     $data['pager'] = $this->institute->pager;
     //var_dump($data); 
     echo view('frontend/home/institute_view', $data); 

  }
  public function test()
  {  
     $data['site'] = "Packagio";
     $data['page'] = "View Institute"; 
     $uri = service('uri');
     $test_id = (array)$uri->getSegment(2);
     $test_id1 = $uri->getSegment(2);
     if($test_id!='')
     {
       $first_filter_value='asc';
       $institute_type='Testing';
       $data['institute']=$this->institute->filter_institute($first_filter_value,$test_id,$institute_type);
       $data['pager'] = $this->institute->pager;
        $data['test_id']=$test_id1;

       //print_r($data);
      
       echo view('frontend/home/institute_view2', $data); 
     } 
  }
  public function educational()
  {  
     $data['site'] = "Packagio";
     $data['page'] = "View Institute"; 
     $uri = service('uri');
     $educational_id = (array)$uri->getSegment(2);
     $educational_id1 = $uri->getSegment(2);
     if($educational_id!='')
     {
       $first_filter_value='asc';
       $institute_type='Education';
       $data['institute']=$this->institute->filter_institute($first_filter_value,$educational_id,$institute_type);
       $data['pager'] = $this->institute->pager;
       $data['educational_id']=$educational_id[0];
      //print_r($data);
      
       echo view('frontend/home/institute_view2', $data); 
     } 
  }
  public function faq()
  {
     $data['site'] = "Packagio";
     $data['page'] = "FAQ";
     $data['faq']=$this->faq->findfaq();
     $data['pager'] = $this->faq->pager;
     echo view('frontend/home/faq', $data);  
     //print_r($data['faq']);

  }
  public function all_exhibition()
  {
     $HomeModel    = new HomeModel();
     $data['site'] = "Packagio";
     $data['page'] = "All Exhibition";
     $data['exhibition']   = $HomeModel->fetch_exhibition1();
     $data['upcoming_exhibition']   = $HomeModel->upcoming_exhibition1();
     $data['expired_exhibition']   = $HomeModel->expired_exhibition();
     //echo "<pre>"; print_r($data['upcoming_exhibition']);
     echo view('frontend/exhibition/all_exhibition', $data);  
  }
  public function all_advertisement()
  {
     $HomeModel    = new HomeModel();
     $data['site'] = "Packagio";
     $data['page'] = "All Advertisment";
     $data['advertisment']   = $HomeModel->fetch_advertisment1();
     
     //print_r($data);
     echo view('frontend/advertisment/all_advertisement', $data);  
  }
  public function about()
  {
     $HomeModel    = new HomeModel();
     $data['site'] = "Packagio – find your packaging";
     $data['page'] = "About us";
     echo view('frontend/home/about', $data);
  }
  public function contact()
  {
     $HomeModel    = new HomeModel();
     $data['site'] = "Packagio – find your packaging";
     $data['page'] = "Contact us";
     echo view('frontend/home/contact', $data);  
  }
}
