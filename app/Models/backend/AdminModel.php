<?php 
namespace App\Models\backend;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['admin_name', 'admin_email','admin_password','admin_mobile','admin_image_path'];
    protected $returnType     = 'array';
    /*protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';*/
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    protected function hashPassword(array $data)
    {
      if (! isset($data['data']['admin_password'])) 
      {
      return $data;
      }
      $data['data']['admin_password'] = password_hash($data['data']['admin_password'], PASSWORD_DEFAULT);
      // unset($data['data']['admin_password']);
      return $data;
    }
    public function fetch_admin_data($id)
    {   
        $db = \Config\Database::connect();
        $sql="select * from pack_admin where id='$id'";
        $query=$db ->query($sql);
        return $query->getResult('array');
    }
    public function listgalleryimage()
    {
        $db = \Config\Database::connect();
        $sql="select g.*,s.supplier_name from pack_gallery as g left join pack_supplier as s on s.id= g.supplier_id where gallery_status='Pending' and is_read=0 ";
        $query=$db ->query($sql);
        return $query->getResult('array'); 
    }
    
    public function listcatalog()
    {
        $db = \Config\Database::connect();
        $sql="select g.*,s.supplier_name from pack_catalog as g left join pack_supplier as s on s.id= g.supplier_id where catalog_status='Pending' and is_read=0 ";
        $query=$db ->query($sql);
        return $query->getResult('array'); 
    }
}