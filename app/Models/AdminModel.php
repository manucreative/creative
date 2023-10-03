<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'admin_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['first_name','middle_name','last_name','session_key','email_address','password','telephone','role',
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

    public function loginAdmin($email, $password) {
        // Check if the email exists in the database
        $admin = $this->select('admin.*, tbl_roles.role_name')
            ->join('tbl_roles', 'tbl_roles.role_id = admin.role')
            ->where('email_address', $email)
            ->first();
    
        if ($admin && password_verify($password, $admin['password'])) {
            $adminData = [
                'admin_id' => $admin['admin_id'],
                'email_address' => $admin['email_address'],
                'first_name' => $admin['first_name'],
                'middle_name' => $admin['middle_name'],
                'last_name' => $admin['last_name'],
                'telephone' => $admin['telephone'],
                'user_name' => $admin['user_name'],
                'session_key'=> $admin['session_key'],
                'avatar' => $admin['avatar'],
                'role' => $admin['role_name'],
                'logged_in' => true,
            ];
            return $adminData;
        } else {
            return false; // Invalid credentials
        }
    }

    public function isEmailUnique($email)
        {
    return $this->where(['email_address'=> $email])->countAllResults() === 0;
        }
        public function isUserNameUnique($user_name)
        {
    return $this->where(['user_name' => $user_name])->countAllResults() === 0;
        }

    public function getAdmins($admin_id = false){
        if($admin_id === false){
            return $this->select('admin.*, tbl_roles.role_name')
            ->join('tbl_roles', 'tbl_roles.role_id = admin.role')
            ->findAll();
        }else{
            return $this->where(['admin_id' => $admin_id])->first();
        }
    }

    public function getAdminsUserName(){
        return $this->db->table($this->table)
                        ->select('user_name')
                        ->get()
                        ->getResultArray();
    }

    public function insertAdmins($data){
        return $this->insert($data);
    }

    
    public function delete_admin_by_ids($ids) {
        $existingAdmins = $this->whereIn('admin_id', $ids)->findAll();
        if (empty($existingAdmins)) {
            return false;
        }
        if ($this->db->table($this->table)->whereIn('admin_id', $ids)->delete()) {
            foreach ($existingAdmins as $existingAdmin) {
                $existingImagePath = ROOTPATH . 'public/pub/media/admin_images/' . $existingAdmin['admin_img'];
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
                $this->delete($existingAdmin['admin_id']);
            }
             return true;
         } else {
             return false;
         }
    }

    public function updateAdminProfile($admin_id, $adminDirectData, $basic_details, $contact_details, $education, 
                                        $expertise_areas, $skills, $experience, $reference) {
        $data = [
            'basic_details' => json_encode($basic_details),
            'contact_details' => json_encode($contact_details),
            'education' => json_encode($education),
            'expertise_areas'=> json_encode($expertise_areas),
            'skills' => json_encode($skills),
            'experience' => json_encode($experience),
            'reference' => json_encode($reference)
        ];
        $packagedData = array_merge($adminDirectData, $data);
        return $this->update($admin_id, $packagedData);
    }

   /**
    * Basic Details
    *
    * @param [type] $admin_id
    * @return array|null
    */
    public function getBasicDetails($admin_id){
        // Select the 'basic_details' column from the 'admins' table
        $basic_details = $this->db->table($this->table)
                        ->select('basic_details')
                        ->where(['admin_id' => $admin_id])
                        ->get()->getRowArray();
        if($basic_details){
        $basicData = json_decode($basic_details['basic_details'], true);
        return $basicData;
        }else{
            return null;
        }
    }
    public function getContactDetails($admin_id){
        // Select the 'basic_details' column from the 'admins' table
    $contact_details = $this->db->table($this->table)
                        ->select('contact_details')
                        ->where(['admin_id' => $admin_id])
                        ->get()->getRowArray();
        if($contact_details){
            $contactsData = json_decode($contact_details['contact_details'], true);
            return $contactsData;
            }else{
                return null;
            }

    }

    public function getEducation($admin_id){
        // Select the 'education' column from the 'admins' table
    $education = $this->db->table($this->table)
                        ->select('education')
                        ->where(['admin_id' => $admin_id])
                        ->get()->getRowArray();
            if($education){
                $educationData = json_decode($education['education'], true);
                return $educationData;
                }else{
                    return null;
                }
    }

    public function getExpertiseAreas($admin_id){
        // Select the 'areas of expertise' column from the 'admins' table
    $expertise_areas = $this->db->table($this->table)
                        ->select('expertise_areas')
                        ->where(['admin_id' => $admin_id])
                        ->get()->getRowArray();
            if($expertise_areas){
                $expertiseData = json_decode($expertise_areas['expertise_areas'], true);
                return $expertiseData;
                }else{
                    return null;
                }

    }

    public function getSkills($admin_id){
        // Select the 'Skills' column from the 'admins' table
    $skills = $this->db->table($this->table)
                        ->select('skills')
                        ->where(['admin_id' => $admin_id])
                        ->get()->getRowArray();
            if($skills){
                $skillsData = json_decode($skills['skills'], true);
                return $skillsData;
                }else{
                    return null;
                }

    }

    public function getExperience($admin_id){
        // Select the 'experience' column from the 'admins' table
    $experience = $this->db->table($this->table)
                        ->select('experience')
                        ->where(['admin_id' => $admin_id])
                        ->get()->getRowArray();
            if($experience){
                $experienceData = json_decode($experience['experience'], true);
                return $experienceData;
                }else{
                    return null;
                }

    }

    public function getReference($admin_id){
        // Select the 'areas of expertise' column from the 'admins' table
    $reference = $this->db->table($this->table)
                    ->select('reference')
                    ->where(['admin_id' => $admin_id])
                    ->get()->getRowArray();
        if($reference){
            $referenceData = json_decode($reference['reference'], true);
            return $referenceData;
            }else{
                return null;
            }

    }


}
