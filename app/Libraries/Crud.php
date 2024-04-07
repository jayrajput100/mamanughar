<?php

namespace App\Libraries;

use App\Libraries\Crud_core;
use App\Libraries\Simple;
use CodeIgniter\HTTP\RequestInterface;

class Crud extends Crud_core
{
    function __construct($params, RequestInterface $request)
    {
        parent::__construct($params, $request);
        $this->simple=new Simple();
    }

    function form()
    {
        return $this->parent_form();
    }
    public function callback_business_category($item)
    {
     $out='';   
     if($item->business_category=="1")
     {
     	  $out = 'Manufacture';
     }
     else if($item->business_category=="2")
     {
          $out = 'Exports/Imports';
     }
     else if($item->business_category=="3")
     {
          $out = 'Services';
     }
     else if($item->business_category=="4")
     {
          $out = 'Trading';
     }
     else if($item->business_category=="5")
     {
          $out = 'Consultation';
     }
     else if($item->business_category=="6")
     {
          $out = 'Organization';
     }
     else
     {
        $out = 'Others'; 
     }   
     
     return $out;   

    }
    public function callback_supplier_type($item)
    {   
        $out='';   
        if($item->supplier_type=="1")
        {
           $out = 'Propritorship';   
        }
        else if($item->supplier_type=="2")
        {
          $out = 'Private Limited';     
        }
        else if($item->supplier_type=="3")
        {
          $out = 'Public Limited';     
        }
        else if($item->supplier_type=="4")
        {
          $out = 'LLP';     
        }
        else if($item->supplier_type=="5")
        {
          $out = 'Govt. Agency/Dept';     
        }
        else
        {
            $out='Others';
        }    
         return $out;  
    }
    public function callback_product_status($item)
    {    
        $out='';   
        if($item->product_status=="Pending")
        {
          $out='<div class="d-flex">
                                                        <div class=" align-self-center d-m-primary  mr-1 data-marker"></div>
                                                        <span class="label label-primary">Approval Pending From Admin</span>
                                                        </div>';
        }
        else if($item->product_status=="Approved")
        {
          $out='<div class="d-flex">
                                                            <div class=" align-self-center d-m-success  mr-1 data-marker"></div>
                                                            <span class="label label-success">Approved</span>
                                                           </div>'; 
        }
        else
        {
          $out='Rejected'; 
        } 
         return $out;     
    }
    public function callback_mobile($item)
    {
        $out='';   
        if($item->is_mobile_verified=="Pending")
        {
          $out='<div class="d-flex">
                                                        <div class=" align-self-center d-m-primary  mr-1 data-marker"></div>
                                                        <span class="label label-primary">'.$item->mobile.'</span>
                                                        </div>';
        }
        else
        {
          $out='<div class="d-flex">
                                                            <div class=" align-self-center d-m-success  mr-1 data-marker"></div>
                                                            <span class="label label-success">'.$item->mobile.'</span>
                                                           </div>'; 
        }  
         return $out;   
    }
     public function callback_email($item)
    {
        $out='';   
        if($item->is_email_verified=="Pending")
        {
          $out='<div class="d-flex">
                                                        <div class=" align-self-center d-m-primary  mr-1 data-marker"></div>
                                                        <span class="label label-primary">'.$item->email.'</span>
                                                        </div>';
        }
        else
        {
          $out='<div class="d-flex">
                                                            <div class=" align-self-center d-m-success  mr-1 data-marker"></div>
                                                            <span class="label label-success">'.$item->email.'</span>
                                                           </div>'; 
        } 
         return $out;    
    }
     public function callback_featured_image($item)
     {
        $src = $item->category_image_path ? base_url().'/'.$item->category_image_path : '';

        return '<a class="product-list-img" href="javascript: void(0);"><img src="'.$src.'" style="width:54px;" class="img-circle"></a>';
    }
    public function callback_featured_sub_image($item)
     {
        $src = $item->sub_cat_image_path ? base_url().'/'.$item->sub_cat_image_path : '';

        return '<a class="product-list-img" href="javascript: void(0);"><img src="'.$src.'" style="width:54px;" class="img-circle"></a>';
    }
    public function callback_featured_third_image($item)
     {
        $src = $item->image_path ? base_url().'/'.$item->image_path : '';

        return '<a class="product-list-img" href="javascript: void(0);"><img src="'.$src.'" style="width:54px;" class="img-circle"></a>';
    }
    public function callback_featured_gallery_image($item)
     {
        $src = $item->gallery_image_path ? base_url().'/'.$item->gallery_image_path : '';

        return '<a class="product-list-img" href="javascript: void(0);"><img src="'.$src.'" style="width:54px;" class="img-circle"></a>';
    } 
    
    public function callback_featured_catalog_image($item)
     {
        $src = $item->catalog_path ? base_url().'/'.$item->catalog_path : '';

        return '<a class="product-list-img" href="javascript: void(0);"><img src="'.$src.'" style="width:54px;" class="img-circle"></a>';
    }
    public function callback_product_name($item)
    {
        if($item->third_category_id!='0')
        {
            return $this->simple->json_decode_str_third_sub_cat($item->third_category_id); 
        }
        else
        {
           return $this->simple->json_decode_str_sub_cat($item->sub_category_id);   
        }    
    }
    public function callback_product_category($item)
    {  
         if($item->third_category_id!='0' && $item->third_category_id!='')
        {
            return $this->simple->json_decode_str_sub_cat($item->sub_category_id);   
        }
        else
         {
           return $item->category_name; 
         }   

    }

}
