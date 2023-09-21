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

    public function getSliders($slider_id = false){
        if($slider_id === false){
            return $this->findAll();
        }else{
            return $this->where(['slider_id' => $slider_id])->first();
        }
    }

    public function insertSliders($data){
        return $this->insert($data);
    }

    public function updateSliders($slider_id, $data){
        $existingSlider = $this->find($slider_id);
        if (empty($existingSlider)) {
            return false;
        }
                $existingImagePath = ROOTPATH . 'public/backend/media/slider_images/' . $existingSlider['slider_img'];
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
                $affectedRows = $this->update($slider_id, $data);
                if($affectedRows > 0){
                    return true;
                } else {
                    return false;
                }
    }

    public function deleteSliders($ids){
        $existingSliders = $this->whereIn('slider_id', $ids)->findAll();
        if (empty($existingSliders)) {
            return false;
        }
        if ($this->db->table($this->table)->whereIn('slider_id', $ids)->delete()) {
            foreach ($existingSliders as $existingSlider) {
                $existingImagePath = ROOTPATH . 'public/backend/media/slider_images/' . $existingSlider['slider_img'];
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
                $this->delete($existingSlider['slider_id']);
            }
             return true;
         } else {
             return false;
         }
    }
}
