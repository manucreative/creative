<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_settings';
    protected $primaryKey       = 'settings_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['features'];

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

    public function getAllFeatures(){
        // Select the 'features' column from the 'tbl_setting' table
    $featuresData = $this->db->table($this->table)->select('features')->get()->getResultArray();

    // Convert the data to JSON
    $jsonFeatures = json_encode($featuresData);

    return $jsonFeatures;
    }

    public function updateFeatures($settings_id, $featuresData) {
        $data = [
            'features' => json_encode($featuresData)
        ];
    
        return $this->update($settings_id, $data);
    }

    public function updateProfileDisplay($settings_id, $newUserName){
        return $this->db->table($this->table)
                ->where('settings_id', $settings_id)
                ->set('display_profile', $newUserName)
                ->update();
    }

    public function getUserProfiler(){
        return $this->db->table($this->table)
                        ->select('display_profile')
                        ->get()
                        ->getResultArray();
    }
}
