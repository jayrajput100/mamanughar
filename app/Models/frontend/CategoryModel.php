<?php 
namespace App\Models\frontend;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class CategoryModel extends Model
{

  public function fetch_allcategoryData(){   
    $db = \Config\Database::connect();
    $sql="SELECT * FROM pack_category ORDER BY category_name DESC";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }

  public function getCategoriesData(){   
    $db  = \Config\Database::connect();
    $sql = "SELECT * FROM pack_category ORDER BY category_name DESC";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }

  public function getSubCategoriesData(){   
    $db  = \Config\Database::connect();
    $sql =  "SELECT subcategory_id,category_id,sub_cat_name FROM pack_sub_category ORDER BY sub_cat_name DESC";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }

  public function getThirdSubCategoriesData(){   
    $db  = \Config\Database::connect();
    $sql =  "SELECT third_subcategory_id, third_subcategory_name, category_id, subcategory_id  FROM pack_third_sub_category ORDER BY third_subcategory_name DESC";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }


  /*public function loadProduct(){
    
  }*/

  /*public function fetch_allsubcategoryData(){   
    $db = \Config\Database::connect();
    $sql="SELECT *  
          FROM pack_category AS C 
          LEFT JOIN pack_sub_category AS SBC 
          ON SBC.category_id = C.category_id";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }*/

	public function fetch_subcategoryData($category_id = ""){   
    $db = \Config\Database::connect();
    $sql="SELECT *  
    			FROM pack_category AS C 
          LEFT JOIN pack_sub_category AS SBC 
          ON SBC.category_id = C.category_id WHERE SBC.category_id = '$category_id' order by SBC.sub_cat_name";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }
  public function fetch_thirdsubcategoryData($subcategory_id = ""){   
    $db = \Config\Database::connect();
    $sql="SELECT *  
          FROM pack_category AS C 
          LEFT JOIN pack_sub_category AS SBC ON SBC.category_id = C.category_id 
          LEFT JOIN pack_third_sub_category AS TSBC ON TSBC.subcategory_id = SBC.subcategory_id  
          WHERE TSBC.subcategory_id = '$subcategory_id'";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }
  public function fetch_productcategorywiseData($third_category_id = ""){   
    $db = \Config\Database::connect();
    $sql="SELECT *  
          FROM pack_category AS C 
          LEFT JOIN pack_sub_category AS SBC ON SBC.category_id = C.category_id 
          LEFT JOIN pack_third_sub_category AS TSBC ON TSBC.subcategory_id = SBC.subcategory_id
          LEFT JOIN pack_product AS P ON P.third_category_id = TSBC.third_subcategory_id   
          WHERE P.third_category_id = '$third_category_id'";
    $query  = $db ->query($sql);
    $result = $query->getResult('array');
    return isset($result)?$result:'';
  }
}
