<?php

namespace App\Models\frontend;

use CodeIgniter\Model;

class FrontServiceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_services';
    protected $primaryKey       = 'service_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['service_title','service_key','owner','activation_id','service_short_content','service_main_content','service_img','created_at'];

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

    public function getServices($service_id = false){
        if($service_id === false){
            return $this->select('tbl_services.*, activations.activation_name')
            ->join('activations', 'activations.activation_id = tbl_services.activation_id')
            ->orderBy('RAND()')
            ->findAll();
        }else{
            return $this->where(['service_id'=> $service_id])->first();
        }
    }
}