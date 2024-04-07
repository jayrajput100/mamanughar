<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class GalleryModel extends Model
{
    protected $table          = 'gallery';
    protected $primaryKey     = 'gallery_id';
    protected $allowedFields  = ['gallery_image_name','gallery_image_path','supplier_id','ip_address','date_created','date_modified','admin_note','supplier_id','gallery_image_size','gallery_status','is_read'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
}    