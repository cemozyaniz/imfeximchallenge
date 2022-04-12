<?php


defined('BASEPATH') OR exut('No direct script access allowed');

class Department_model extends CI_Model {

    public function __construct(){

        $this->load->database();

    }

    public function save(){

        $json = file_get_contents('php://input');

        $data = json_decode($json);

        $field = array(

            'name'=>$data->name,

            'createdAt' => date('Y-m-d')
        );
        $id = 0;

        if(!isset($data->id)){

            $this->db->insert("department", $field);

            $id = $this->db->insert_id();
        }

        else{

            $this->db->where("id", $id);

            $this->db->update("department", $field);

        }

    }

    public function lists(){

        $data = $this->db->get("department");

        return $data->result();

    }

    public function getbyid($id){

        $this->db->where("id", $id);

        $data = $this->db->get("department");

        return $data->result()[0];

    }

    public function delete($id){

        $this->db->where("id", $id);

        $this->db->delete("department");

    }

}