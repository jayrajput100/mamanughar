<?php 
namespace App\Models\frontend;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class ProfileModel extends Model{

	public function fetch_user($id = null){   
    $db = \Config\Database::connect();
    $sql="SELECT * FROM pack_user WHERE id='$id'";
    $query=$db ->query($sql);
    $result=$query->getResult('array');
    return isset($result)?$result:'';
  }
}