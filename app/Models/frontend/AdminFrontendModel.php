<?php

namespace App\Models\frontend;

use CodeIgniter\Model;

class AdminFrontendModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'admin_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['first_name','middle_name','last_name','email_address','password','telephone','role ',
    'avatar','created_at','user_name','basic_details','contact_details','education','expertise_areas','skills','personal_title',
    'sub_title','professional_profile','experience','reference'];

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
    * Basic Details
    *
    * @param [type] $user_name
    * @return array|null
    */
    public function getBasicDetails($user_name){
        // Select the 'basic_details' column from the 'admins' table
        $basic_details = $this->db->table($this->table)
                        ->select('basic_details')
                        ->where(['user_name' => $user_name])
                        ->get()->getRowArray();
        if($basic_details){
        $basicData = json_decode($basic_details['basic_details'], true);
        return $basicData;
        }else{
            return null;
        }
    }
    public function getContactDetails($user_name){
        // Select the 'basic_details' column from the 'admins' table
    $contact_details = $this->db->table($this->table)
                        ->select('contact_details')
                        ->where(['user_name' => $user_name])
                        ->get()->getRowArray();
        if($contact_details){
            $contactsData = json_decode($contact_details['contact_details'], true);
            return $contactsData;
            }else{
                return null;
            }

    }

    public function getEducation($user_name){
        // Select the 'education' column from the 'admins' table
    $education = $this->db->table($this->table)
                        ->select('education')
                        ->where(['user_name' => $user_name])
                        ->get()->getRowArray();
            if($education){
                $educationData = json_decode($education['education'], true);
                return $educationData;
                }else{
                    return null;
                }
    }

    public function getExpertiseAreas($user_name){
        // Select the 'areas of expertise' column from the 'admins' table
    $expertise_areas = $this->db->table($this->table)
                        ->select('expertise_areas')
                        ->where(['user_name' => $user_name])
                        ->get()->getRowArray();
            if($expertise_areas){
                $expertiseData = json_decode($expertise_areas['expertise_areas'], true);
                return $expertiseData;
                }else{
                    return null;
                }

    }

    public function getSkills($user_name){
        // Select the 'Skills' column from the 'admins' table
    $skills = $this->db->table($this->table)
                        ->select('skills')
                        ->where(['user_name' => $user_name])
                        ->get()->getRowArray();
            if($skills){
                $skillsData = json_decode($skills['skills'], true);
                return $skillsData;
                }else{
                    return null;
                }

    }

    public function getExperience($user_name){
        // Select the 'experience' column from the 'admins' table
    $experience = $this->db->table($this->table)
                        ->select('experience')
                        ->where(['user_name' => $user_name])
                        ->get()->getRowArray();
            if($experience){
                $experienceData = json_decode($experience['experience'], true);
                return $experienceData;
                }else{
                    return null;
                }

    }

    public function getReference($user_name){
        // Select the 'areas of expertise' column from the 'admins' table
    $reference = $this->db->table($this->table)
                    ->select('reference')
                    ->where(['user_name' => $user_name])
                    ->get()->getRowArray();
        if($reference){
            $referenceData = json_decode($reference['reference'], true);
            return $referenceData;
            }else{
                return null;
            }

    }

    public function getAdminDataByUserName($user_name = false){
        if($user_name === false){
            return $this->select('admin.*, activations.activation_name')
            ->join('activations', 'activations.activation_id = admin.activation_id')
            ->findAll();
        }
        return $this->where(['user_name' => $user_name])->first();
    }
}