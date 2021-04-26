  
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    function get_all_users(){
        $query = "SELECT concat(first_name,' ',last_name) as full_name,age,gender,country FROM users ";
        // $values = array((int)$row["row"]);
        return $this->db->query($query)->result_array();
    }

    // function get_all_users_with_filter($filter){
    //     $query = "SELECT concat(first_name,' ',last_name) as full_name,age,gender,country FROM users WHERE (gender = ? OR gender = ?) OR country = ? ";
    //     $values = array($filter["gender"]);
    //     return $this->db->query($query)->result_array();
    // }


    //use in number 2 and number 3
    function get_all_users_with_filter($filter){
        $query = "SELECT concat(first_name,' ',last_name) as full_name,age,gender,country FROM users ";

        if(!is_null($filter["gender"]) OR !is_null($filter["country"])){
            $query .="WHERE";
            if(!(is_null($filter['gender']))){
                $gender1 = (isset( $filter['gender'][0]) ? $filter['gender'][0] : NULL);
                $gender2 = (isset($filter['gender'][1]) ? $filter['gender'][1] : NULL);
                $query .= "(";
                $query .= "gender = ? OR gender = ?";
                $query .=") AND";
            }

            if(!(is_null($filter['country']))){
               
                $query .= " country like ?";
               
            }
        }
        
        if(!(is_null($filter['country'])) AND !(is_null($filter['gender']))){
            $values = array((isset($gender1) ? $gender1 : ""),(isset($gender2) ? $gender2 : ""),(isset($filter['country']) ? "%{$filter['country']}%" : "% %"));
        }else if(!(is_null($filter['country']))){
            $values = array((isset($filter['country']) ? "%{$filter['country']}%" : "% %"));
        }else if(!(is_null($filter['gender']))){
            $values = array((isset($gender1) ? $gender1 : ""),(isset($gender2) ? $gender2 : ""));
        }else{
            $values = array();
        }



       
        return $this->db->query($query,$values)->result_array();
    }


    function get_all_users_count($filter){
        $query = "SELECT count(*) as total_count FROM users ";
        // $values = array((int)$row["row"]);

        if(!is_null($filter["gender"]) OR !is_null($filter["country"])){
            $query .="WHERE";
            if(!(is_null($filter['gender']))){
                $gender1 = (isset( $filter['gender'][0]) ? $filter['gender'][0] : NULL);
                $gender2 = (isset($filter['gender'][1]) ? $filter['gender'][1] : NULL);
                $query .= "(";
                $query .= "gender = ? OR gender = ?";
                $query .=") AND";
            }

            if(!(is_null($filter['country']))){
               
                $query .= " country like ?";
               
            }
        }
        
        if(!(is_null($filter['country'])) AND !(is_null($filter['gender']))){
            $values = array((isset($gender1) ? $gender1 : ""),(isset($gender2) ? $gender2 : ""),(isset($filter['country']) ? "%{$filter['country']}%" : "% %"));
        }else if(!(is_null($filter['country']))){
            $values = array((isset($filter['country']) ? "%{$filter['country']}%" : "% %"));
        }else if(!(is_null($filter['gender']))){
            $values = array((isset($gender1) ? $gender1 : ""),(isset($gender2) ? $gender2 : ""));
        }else{
            $values = array();
        }



       
        return $this->db->query($query,$values)->row_array();
        // return $this->db->query($query)->row_array();
    }


    function get_all_countries(){
        return $this->db->query("SELECT country FROM users")->result_array();
    }

    // end number 2


    // use in problem number 1
    function get_all_users_with_limit($row){
        $query = "SELECT concat(first_name,' ',last_name) as full_name,age,gender,country FROM users LIMIT ? ";
        $values = array((int)$row["row"]);
        return $this->db->query($query,$values)->result_array();
    }


    // end of number 1


    // for number 3
    function get_all_users_filter_by_country($data){
        $query = "SELECT concat(first_name,' ',last_name) as full_name,age,gender,country FROM users WHERE country = ?  ";
        $values = array($data["country"]);
        return $this->db->query($query,$values)->result_array();
    }


    function get_all_users_filter_by_gender($data){
        $query = "SELECT concat(first_name,' ',last_name) as full_name,age,gender,country FROM users ";
        
        if(!(is_null($data['gender']))){
            $query .="WHERE";
            $gender1 = (isset( $data['gender'][0]) ? $data['gender'][0] : NULL);
            $gender2 = (isset($data['gender'][1]) ? $data['gender'][1] : NULL);
            $query .= "(";
            $query .= "gender = ? OR gender = ?";
            $query .=") ";
        }

        $values = array((isset($gender1) ? $gender1 : ""),(isset($gender2) ? $gender2 : ""));
        return $this->db->query($query,$values)->result_array();
    }


}