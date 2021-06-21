<?php

class Login_model extends CI_Model
{

    public function auth_check($username, $password)
    {
        $this->db->where('username', $username);
        $query1 = $this->db->get('user_table');
        if ($query1->row()) {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get('user_table');
            if ($query->row()) {
                return $query->row();
            } else {
                return 'Wrong Password';
            }
        } else {
            return 'Wrong Login ID';
        }

    }

    
}
