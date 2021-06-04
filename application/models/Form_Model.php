<?php

class Form_Model extends CI_Model
{
    //State select start
    public function fetch_client()
    {
        $this->db->where('client_status', 1);
        $query = $this->db->get('client');
        return $query->result();
    }
    //State select end

    public function fetch_edit_form($client_id)
    {
        $this->db->where('client_id', $client_id);
        $this->db->where('form_status', 2);
        $query = $this->db->get('form');
        return $query->result();
    }

    public function fetch_client_details($client_id)
    {
        $this->db->where('client_id', $client_id);
        $query = $this->db->get('client');
        return $query->result();
    }


    public function fetch_form_attribute($form_id)
    {
        $query = $this->db->get("  `form_structure` s INNER JOIN form_elements e ON e.form_element_id=s.form_element_id 
        INNER JOIN form_elements_attribute a ON a.form_elements_attribute_id=s.form_elements_attribute_id 
        WHERE form_id='$form_id' ");
        return $query->result();
    }

    public function fetch_form_data($form_id)
    {
        $query = $this->db->get(" `form` f INNER JOIN client c ON c.client_id=f.client_id WHERE form_id='$form_id' AND form_status=2 ");
        return $query->result();
    }

    function ctz_add_cookies_to_data_from_contact_form($data)
    {
        $data['utm_source']   = empty($_COOKIE['utm_source'])   ? '' : $_COOKIE['utm_source'];
        $data['utm_medium']   = empty($_COOKIE['utm_medium'])   ? '' : $_COOKIE['utm_medium'];
        $data['utm_term']     = empty($_COOKIE['utm_term'])     ? '' : $_COOKIE['utm_term'];
        $data['utm_content']  = empty($_COOKIE['utm_content'])  ? '' : $_COOKIE['utm_content'];
        $data['utm_campaign'] = empty($_COOKIE['utm_campaign']) ? '' : $_COOKIE['utm_campaign'];

        $data['page_referrer'] = empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'];

        return $data;
    }

    public function fetch_api($form_id)
    {
        // $form_html="";
        $query = $this->db->query(" SELECT * FROM `form` WHERE form_id= '$form_id' ");
        foreach ($query->result() as $row) {
            $form_id = $row->form_id;
            $form_name = $row->form_name;
            $form_html_2 = $row->form_html;

            $formStart = '<form id="' . $form_id . '" method="POST" action="' . base_url() . 'form_submission/">';
            $form_id_pass = '<input type="text" value="' . $form_id . '" name="form_id_pass" hidden>';
            $form_ip_address = '<input type="text" name="form_ip_address" id="form_ip_address" value="' . $_SERVER['REMOTE_ADDR'] . '" hidden>';
            // $form_ip_address .= '<input type="text" name="page_referrer" id="page_referrer" value="' . $_SERVER['HTTP_REFERER'] . '" disabled><br><br>';
            $form_ip_address .= '<input type="text" name="utm_source" id="utm_source" value="Direct" hidden>';
         
            
            $formEnd = "</form>";

            $form_html = $formStart . $form_id_pass . $form_ip_address . $form_html_2 . $formEnd;
        }
        // print_r($this->db->last_query());

        $newData = array(
            'form_id' => $form_id,
            'form_name' => $form_name,
            'form_html' => $form_html
        );

        echo json_encode($newData);
        // return $query->result();
    }

    public function fetch_submission_with_group($form_id)
    {
        $query = $this->db->query("SELECT form_label  FROM form_entry WHERE form_id='$form_id' GROUP BY form_label ");
        return $query->result();
    }

    public function fetch_submission($form_id)
    {
        $query = $this->db->query("SELECT * FROM form_entry WHERE form_id='$form_id' ");
        return $query->result();
    }




    public function fetch_submission_details($form_id)
    {
        // $query = $this->db->get(" form WHERE form_id='$form_id' ");

        $query_form = $this->db->query(" SELECT * FROM `form` WHERE form_id= '$form_id' ");
        foreach ($query_form->result() as $row) {
            $parent_id = $row->parent_id;

            // $query_form_1 = $this->db->query(" SELECT form_id FROM `form` WHERE parent_id= '$parent_id' ");
            // foreach ($query_form_1->result() as $row) {
            //     $form_id = $row->form_id;
            //     $form_name = $row->form_name;

            $query_form_2 = $this->db->query(" SELECT f.parent_id,s.form_id,f.form_name,COUNT(*) AS count FROM `form_submission` s INNER JOIN form f ON s.form_id=f.form_id GROUP BY s.form_id HAVING f.parent_id='$parent_id' ");
            foreach ($query_form_2->result() as $row) {
                $form_id = $row->form_id;
                $form_name = $row->form_name;
                $count = $row->count;
            }
            // }
        }
        return $query_form_2->result();
    }
}
