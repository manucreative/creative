<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_slider';
    protected $primaryKey       = 'slider_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sub_header','main_header','short_desc','btn_mssage','slider_img','created_at'];

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

    /**
     * Get All Sliders in the database
     *
     * @param boolean $slider_id
     * @return array of sliders
     */
    public function getSliders($slider_id = false){
        if($slider_id === false){
            return $this->findAll();
        }else{
            return $this->where([$slider_id => 'slider_id'])->first();
        }
    }

    public function insertSliders($data){
        return $this->insert($data);
    }
}
