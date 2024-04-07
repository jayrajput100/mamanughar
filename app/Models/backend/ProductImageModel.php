<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class ProductImageModel extends Model
{
    protected $table          = 'product_image';
    protected $primaryKey     = 'product_image_id';
    protected $allowedFields  = ['product_id','product_image_name','product_image_url','ip_address'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
}    