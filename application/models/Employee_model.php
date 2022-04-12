<?php


defined('BASEPATH') OR exut('No direct script access allowed');

class Employee_model extends CI_Model {

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

            'email'=>$data->email,

            'department_id'=>$data->department_id,

            'password'=>md5(md5($data->password).md5('im').md5('fex').md5('im')),

            'createdAt' => date('Y-m-d')
        );
        $id = 0;

        if(!isset($data->id)){

            $this->db->insert("employee", $field);

            $id = $this->db->insert_id();
        }

        else{

            $this->db->where("id", $id);

            $this->db->update("employee", $field);

        }

    }

    public function lists(){

        $data = $this->db->get("employee");

        return $data->result();

    }

    public function getbyid($id){

        $this->db->where("id", $id);

        $data = $this->db->get("employee");

        return $data->result()[0];

    }

    public function delete($id){

        $this->db->where("id", $id);

        $this->db->delete("employee");

    }

}