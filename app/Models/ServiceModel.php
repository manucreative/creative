<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_services';
    protected $primaryKey       = 'service_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['service_title','service_key','owner','service_short_content','service_main_content','service_img','created_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function insertServices($data){
        return $this->insert($data);
    }

    public function getServices($service_key = false){
        if($service_key === false){
            return $this->findAll();
        }else{
            return $this->where(['service_key'=> $service_key])->first();
        }
    }

    public function updateServices($service_id, $data){
        $existingService = $this->find($service_id);
        if (empty($existingService)) {
            return false;
        }
                $existingImagePath = ROOTPATH . 'public/backend/media/service_images/' . $existingService['service_img'];
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
                $affectedRows = $this->update($service_id, $data);
                if($affectedRows > 0){
                    return true;
                } else {
                    return false;
                }
    }

    public function deleteService($ids){
        $existingServices = $this->whereIn('service_id', $ids)->findAll();
        if (empty($existingServices)) {
            return false;
        }
        if ($this->db->table($this->table)->whereIn('service_id', $ids)->delete()) {
            foreach ($existingServices as $existingService) {
                $existingImagePath = ROOTPATH . 'public/backend/media/service_images/' . $existingService['service_img'];
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
                $this->delete($existingService['service_id']);
            }
             return true;
         } else {
             return false;
         }
    }
}
