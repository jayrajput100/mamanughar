<?php 
namespace App\Models\backend;

use CodeIgniter\Model;

class SupplierviewModel extends Model
{
    protected $table = 'supplier_view';
    protected $primaryKey = 'supplier_view_id';
    protected $allowedFields = ['supplier_id','user_id', 'user_name','user_email','user_mobile','user_address','date_created','ip_address'];
    protected $returnType     = 'array';
    public function selected_supplierview($supplier_id)
    {
    	    $db = \Config\Database::connect();
		    $sql="SELECT distinct user_id,user_email,user_name,user_mobile FROM pack_supplier_view where supplier_id='$supplier_id' limit 5";
		    $query  = $db ->query($sql);
		    $result = $query->getResult('array');
		    return isset($result)?$result:'';
    }
}    