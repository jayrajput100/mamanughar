<?php 
namespace App\Controllers\frontend;
use App\Libraries\Simple;
use App\Models\frontend\CategoryModel;
use App\Controllers\BaseController;
use App\Models\backend\SubcategoryModel;
use App\Models\backend\Third_SubcategoryModel;
class Category extends BaseController
{	

  function __construct() {
    $this->simple=new Simple();
    $this->sub_cat = new SubcategoryModel();
    $this->thi_sub_cat= new Third_SubcategoryModel();
  }  
	function super_unique($array)
    {
		$result = array_map("unserialize", array_unique(array_map("serialize", $array)));
		foreach ($result as $key => $value){
		  if ( is_array($value)){
		    $result[$key] = super_unique($value);
		  }
		}
		return $result;
  }


  public function getAllCategories(){
    $this->category = new CategoryModel();
    $category = $this->category->getCategoriesData();
    return $category;
  }

  public function getAllSubCategories(){
    $this->subcategory = new CategoryModel();
    $category = $this->subcategory->getSubCategoriesData();
    return $category;
  }

  public function getAllThirdSubCategories(){
    $this->subcategory = new CategoryModel();
    $category = $this->subcategory->getThirdSubCategoriesData();
    return $category;
  }

 /* public function allcategory(){
    $data['site'] = "Packagio";
    $data['page'] = "All Category"; 
    $data['categories'] = $this->getAllCategories();
    $data['subcategories'] = $this->getAllSubCategories();
    return view('frontend/category/allcategory',$data);
  }*/
  public function allcategory(){
    $data['site'] = "Packagio";
    $data['page'] = "All Category"; 
    //$data['categories'] = $this->getAllCategories();
    $data['categories']=$this->simple->fetch_three_tier();
    $data['fetch_three_tier']=$this->simple->fetch_three_tier();
    $data['subcategories'] = $this->getAllSubCategories();
    return view('frontend/category/allcategory',$data);
  } 

  public function loadCategory() {

    $this->category = new CategoryModel();
    $category = $this->category->getCategoriesData();


    $productPerPage = 9;  
    $totalRecord  = strtolower(trim(str_replace("/","",$_POST['totalRecord'])));
    $start = ceil($totalRecord * $productPerPage);    

    $sql= "SELECT * FROM pack_product WHERE qty != 0"; 
    if(isset($_POST['category']) && $_POST['category']!=""){      
      $sql.=" AND category_id IN ('".implode("','",$_POST['category'])."')";
    }

    /*if(isset($_POST['brand']) && $_POST['brand']!=""){      
      $sql.=" AND brand IN ('".implode("','",$_POST['brand'])."')";
    }
    if(isset($_POST['material']) && $_POST['material']!="") {     
      $sql.=" AND material IN ('".implode("','",$_POST['material'])."')";
    }   
    if(isset($_POST['size']) && $_POST['size']!="") {     
      $sql.=" AND size IN (".implode(',',$_POST['size']).")";
    }*/
    
    if(isset($_POST['sorting']) && $_POST['sorting']!="") {
      $sorting = implode("','",$_POST['sorting']);
            
      if($sorting == 'newest' || $sorting == '') {
        $sql.=" ORDER BY product_id DESC";
      } else if($sorting == 'low') {
        $sql.=" ORDER BY price ASC";
      } else if($sorting == 'high') {
        $sql.=" ORDER BY price DESC";
      }
    } else {
      $sql.=" ORDER BY product_id DESC";
    }   
    $sql.=" LIMIT $start, $productPerPage";   
    $products = $this->getData($sql);
    $rowcount = $this->getNumRows($sql);


    $productHTML = '';
    if(isset($products) && count($products)) {      
            foreach ($products as $key => $product) {       
                $productHTML .= '<article class="col-md-4 col-sm-6">';
                $productHTML .= '<div class="thumbnail product">';
                $productHTML .= '<figure>';
                $productHTML .= '<a href="#"><img src="images/'.$product['image'].'" alt="'.$product['product_name'].'" /></a>';
                $productHTML .= '</figure>';
                $productHTML .= '<div class="caption">';
                $productHTML .= '<a href="" class="product-name">'.$product['product_name'].'</a>';
                $productHTML .= '<div class="price">$'.$product['price'].'</div>';
                $productHTML .= '<h6>Brand : '.$product['brand'].'</h6>';
                $productHTML .= '<h6>Material : '.$product['material'].'</h6>';
                $productHTML .= '<h6>Size : '.$product['size'].'</h6>';
                $productHTML .= '</div>';
                $productHTML .= '</div>';
                $productHTML .= '</article>';       
      }
    }
    return  $productHTML; 
  } 


	public function allsubcategory(){
		$CategoryModel= new CategoryModel();
		$data['site'] = "Packagio";
		$data['page'] = "All Category";

		$data['categorydata'] = $CategoryModel->fetch_allcategoryData();
		
		if(isset($data['categorydata'])){
    	if(is_array($data['categorydata']) && count($data['categorydata']) >= 1){
    		foreach ($data['categorydata'] as $key_c => $value_c) {
    			$category[$key_c]['category_id']    = $value_c['category_id'];
    			$category[$key_c]['category_name']  = $value_c['category_name'];
    			$category[$key_c]['category_image'] = $value_c['category_image_path'];
    			$category[$key_c]['category_desc']  = $value_c['category_desc'];
    			$category[$key_c]['date_created']   = $value_c['date_created'];

    			$subcategory= $CategoryModel->fetch_subcategoryData($value_c['category_id']);

    			if(isset($subcategory)){
			    	if(is_array($subcategory) && count($subcategory) >= 1){
			    		foreach ($subcategory as $key_s => $value_s) {
				    		$category[$key_c]['categorydata'][$key_s]['category_id']    = $value_s['category_id'];
				    		$category[$key_c]['categorydata'][$key_s]['subcategory_id'] = $value_s['subcategory_id'];
				    		$category[$key_c]['categorydata'][$key_s]['sub_cat_name']   = $value_s['sub_cat_name'];
				    		$category[$key_c]['categorydata'][$key_s]['sub_cat_desc']   = $value_s['sub_cat_desc'];
				    		$category[$key_c]['categorydata'][$key_s]['subcat_image']   = $value_s['sub_cat_image_path'];
			    		}
    				}
    			}
    		}
    	}
    }

    if(isset($category)){
			if(is_array($category) && count($category) >= 1){
    		$data['category'] = $category;
    	}
    }
    
		return view('frontend/category/all-category',$data);
	}

	public function CategoryWise()
    {
		$CategoryModel    = new CategoryModel();
		$data['site'] = "Packagio";
		$data['page'] = "Sub Category";

    $uri = service('uri');
    $category_id = $uri->getSegment(3); //echo $segment3;


    if($category_id != ''){
    	$data['subcategorydata']  = $CategoryModel->fetch_subcategoryData($category_id);
    	if(isset($data['subcategorydata'])){
    		if(is_array($data['subcategorydata']) && count($data['subcategorydata']) >= 1){
    			$subcategory['category_id']    = $data['subcategorydata'][0]['category_id'];
    			$subcategory['category_name']  = $data['subcategorydata'][0]['category_name'];
    			$subcategory['category_desc']  = $data['subcategorydata'][0]['category_desc'];
    			$subcategory['category_image'] = $data['subcategorydata'][0]['category_image_path'];

    			foreach ($data['subcategorydata'] as $key => $value) {
    				$subcategory['subcategory'][$key]['subcategory_id']  = $value['subcategory_id'];
    				$subcategory['subcategory'][$key]['sub_cat_name']    = $value['sub_cat_name'];
    				$subcategory['subcategory'][$key]['sub_cat_desc']    = $value['sub_cat_desc'];
    				$subcategory['subcategory'][$key]['subcat_image']    = $value['sub_cat_image_path'];
    			}
    		}
    	}
    	if(isset($data['subcategorydata'])){
    		if(is_array($data['subcategorydata']) && count($data['subcategorydata']) >= 1){
    			$data['subcategory'] = $subcategory;
    		}
    	}

      return view('frontend/category/category-wise',$data);
    }else{
      return redirect()->to(base_url().'/');
    }
	}
  
  public function all_particular_category()
   {
     $data['site'] = "Packagio";
     $data['page'] = "All Category";
     $uri = service('uri');
     $category_id = $uri->getSegment(2); //echo $segment3; 
     //print_r($category_id);
     if($category_id!='')
     {
       $data['subcategory']=$this->sub_cat->where('category_id',$category_id)->findAll();  
       //print_r($data);
     }   
     
     return view('frontend/category/all_particular_category',$data);

   }
   public function particular_third_sub_cat()
   {
     $data['site'] = "Packagio";
     $data['page'] = "All Product";
     $uri = service('uri');
     $sub_category_id = $uri->getSegment(2); //echo $segment3; 
     //print_r($category_id);
     if($sub_category_id!='')
     {
       $data['third_subcategory']= $this->thi_sub_cat->where('subcategory_id',$sub_category_id)->orderBy('third_subcategory_name','ASC')->findAll();  
       //print_r($data);
     }   
     
     return view('frontend/category/particular_third_sub_cat',$data);

   }
   public function view_sub_category()
   {
     $data['site'] = "Packagio";
     $data['page'] = "All Product";
     $uri = service('uri');
     $sub_category_id = $uri->getSegment(2); //echo $segment3; 
     //print_r($category_id);
     if($sub_category_id!='')
     {
        /*print_r($sub_category_id);*/
        $data['subcategory']=$this->sub_cat->find($sub_category_id);
        //print_r($data);
        return view('frontend/category/view_sub_category',$data);
     }   
   }
   public function view_third_sub_category()
   {
     $data['site'] = "Packagio";
     $data['page'] = "All Product";
     $uri = service('uri');
     $third_sub_category_id = $uri->getSegment(2); //echo $segment3; 
     //print_r($category_id);
     if($third_sub_category_id!='')
     {
        /*print_r($sub_category_id);*/
        $data['third_sub_category']=$this->thi_sub_cat->find($third_sub_category_id);
        //print_r($data);
        return view('frontend/category/view_third_sub_category',$data);
     }   
   }
   

  
}
