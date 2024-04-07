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
class Search extends BaseController
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
     $pager = \Config\Services::pager();
  }
  public function search_data()
  {
     $uri = service('uri');
     $search_query = $uri->getSegment(2);
     // divide string into type and value
     $str=explode("_",$search_query);
     $search_type=$str[0];
     $search_value=$str[1]; 
   
    if(isset($search_type) &&  isset($search_value))
    {
       /**/
    
       $data['site'] = "Packagio";
       $data['page'] = "Search ";
      // set the data in session 
      $ses_data=session()->get('search_data'); 
      // get the session data
       if($search_type=="subcat")
       {
           
           if($_GET)
           {
             $category_id=$this->simple->find_cat_id($search_value);
             $data['category_id']=$category_id;
             $data['subcategory_id']= $search_value;
             $data['sub_cat']= $this->subcategory->search_step_sub_cat($category_id,"cat");
             $search_ary=[
                'search_query'=>$search_query,
                'search_type'=>$search_type,
                'search_value'=>$this->simple->json_decode_str_sub_cat($search_value),
                
               ];
               session()->set('search_data',$search_ary);
             $data['supplier']= $this->supplier->old_system_supplier($category_id,$search_value); 
           }
           else
           {
             $category_id=$this->simple->find_cat_id($search_value);
             $data['category_id']=$category_id;
             $data['subcategory_id']= $search_value;    
             $data['sub_cat']= $this->subcategory->search_step_sub_cat($category_id,"cat");
             $search_ary=[
                'search_query'=>$search_query,
                'search_type'=>$search_type,
                'search_value'=>$this->simple->json_decode_str_sub_cat($search_value),
                
               ];
              session()->set('search_data',$search_ary);
             $data['supplier']= $this->supplier->old_system_supplier($category_id,$search_value);

           }
           //print_r($data['supplier']);
           return view('frontend/home/next_step_supplier',$data);   
      }
      else if($search_type=="thirdsubcat")
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
          //print_r($search_ary);
         
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
          //print_r($category_id);
              //print_r($search_ary);
        }  
        
         return view('frontend/home/next_step_third_supplier',$data);
      }  



    }
    else
    {
       return redirect()->to(base_url().'/');

    }  
  }

}   