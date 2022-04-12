<?php


defined('BASEPATH') OR exut('No direct script access allowed');

class Customer_model extends CI_Model {

    public function __construct(){

        $this->load->database();

    }

    public function save(){

        $json = file_get_contents('php://input');

        $data = json_decode($json);

        $field = array(

            'name'=>$data->name,

            'last_name'=>$data->last_name,

            'username'=>$data->username,

            'password'=>md5(md5($data->password).md5('im').md5('fex').md5('im')),

            'isActive' => 1,

            'createdAt' => date('Y-m-d')
        );
        $id = 0;

        if(!isset($data->id)){

            $this->db->insert("customer", $field);

            $id = $this->db->insert_id();
        }

        else{

            $this->db->where("id", $id);

            $this->db->update("customer", $field);

        }

    }

    public function lists(){

        $data = $this->db->get("customer");

        return $data->result();

    }

    public function getbyid($id){

        $this->db->where("id", $id);

        $data = $this->db->get("customer");

        return $data->result()[0];

    }

    public function delete($id){

        $this->db->where("id", $id);

        $this->db->delete("customer");

    }

}