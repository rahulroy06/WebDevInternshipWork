<?php
    class Db{
        private $db;
        function __construct(){
            $this->db = new mysqli("localhost","root","","task_9");
        }
        public function view_user($user){
            return $this->db->query("Select * from users where user_type = '".$user."' and status = 'approved' ");
        }
        public function view_pending($user){
            return $this->db->query("Select * from users where user_type = '".$user."' and status = 'pending' ");
        }
        public function pending_edit(){
            return $this->db->query("Select * from custom_edit where status = 'pending' ");
        }
        public function collect_info($user_id){
            return $this->db->query("Select * from custom_edit where user_id = '".$user_id."' ");
        }
        public function view_modertor($user){
            return $this->db->query("Select * from users where user_type = '".$user."'");
        }
        public function user_data($id){
            return $this->db->query("Select * from users where id = '".$id."'");
        }
        public function userlogin($username,$pass){
            return $this->db->query("Select * from users where username = '".$username."' AND pass = '".$pass."'");
        }
        public function view(){
            return $this->db->query("Select * from users");
        }
        public function edit_view($id){
            return $this->db->query("Select * from users where id = '".$id."'");
        }
        public function update($full_name,$username,$pass,$id){
            return $this->db->query("Update users set full_name = '".$full_name."',username = '".$username."', pass = '".$pass."' where id = '".$id."' ");
        }
        public function delete($id){
            return $this->db->query("Delete from users where id = '".$id."' ");
        }
        public function delete_edit_request($id){
            return $this->db->query("Delete from custom_edit where id = '".$id."' ");
        }
        public function insert($full_name,$user_type,$username,$pass,$status){          
            return $this->db->query("insert into  users (full_name,user_type,username,pass,status) VALUES ('".$full_name."','".$user_type."','".$username."','".$pass."','".$status."')");
        }
        public function add_custom($user_id,$full_name,$user_type,$username,$pass,$status){          
            return $this->db->query("insert into  custom_edit (user_id,full_name,user_type,username,pass,status) VALUES ('".$user_id."','".$full_name."','".$user_type."','".$username."','".$pass."','".$status."')");
        }
        public function approve($id){
            return $this->db->query("Update users set status = 'approved' where id = '".$id."'");
        }
    }
?>
