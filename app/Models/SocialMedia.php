<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialMedia extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'social_media';
    protected $primaryKey       = 'social_media_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['owner','facebook','instagram','tweeter','whatsApp','tiktok','youtube','linkedin','telegram','created_at'];

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


    public function getSocialMedia($owner_id = false){
        if($owner_id === false){
            return $this->select('social_media.*, admin.first_name')
            ->join('admin', 'admin.admin_id = social_media.owner')
            ->findAll();
        }else{
            return $this->select('social_media.*, admin.first_name')
            ->join('admin', 'admin.admin_id = social_media.owner')
            ->where(['owner'=> $owner_id])->first();
        }
    }

    public function insertUpdateSocialMedia($socialMediaId, $owner_id, $data) {
        $existingRecord = $this->where(['owner'=> $owner_id])->first();
    
        if($existingRecord !== null) {
            return $this->update($socialMediaId, $data);
        } else {
            $data['owner'] = $owner_id;
            return $this->save($data);
        }
    }
    

}
