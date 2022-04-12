<?php

require APPPATH . 'controllers/REST_Controller.php';
require APPPATH . 'controllers/Format.php';

class Api extends REST_Controller {

public function __construct() {

header('Access-Control-Allow-Origin: *');

header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

parent::__construct();

$this->load->database();

$this->load->model("customer_model", "customer");
$this->load->model("employee_model", "employee");
$this->load->model("department_model", "department");

}

    public function savecustomer_post(){

$this->customer->save();

$data["result"] = "success";

$this->response($data, 200);

}

    public function listcustomer_post(){

$data["customers"] = $this->customer->lists();

$this->response($data, 200);

}

    public function deletecustomer_post(){

$json = file_get_contents('php://input');

$product = json_decode($json);

$this->customer->delete($product->id);

$data["result"] = "success";

$this->response($data, 200);

}

    public function getcustomer_post(){

$json = file_get_contents('php://input');

$product = json_decode($json);

$data["customer"] = $this->customer->getbyid($product->id);

$this->response($data, 200);

}

    public function saveempolyee_post(){

        $this->employee->save();

        $data["result"] = "success";

        $this->response($data, 200);

    }

    public function listemployee_post(){

        $data["employees"] = $this->employee->lists();

        $this->response($data, 200);

    }

    public function deleteemployee_post(){

        $json = file_get_contents('php://input');

        $product = json_decode($json);

        $this->employee->delete($product->id);

        $data["result"] = "success";

        $this->response($data, 200);

    }

    public function getemployee_post(){

        $json = file_get_contents('php://input');

        $product = json_decode($json);

        $data["employee"] = $this->employee->getbyid($product->id);

        $this->response($data, 200);

    }

    public function savedepartment_post(){

        $this->department->save();

        $data["result"] = "success";

        $this->response($data, 200);

    }

    public function listdepartment_post(){

        $data["departments"] = $this->department->lists();

        $this->response($data, 200);

    }

    public function deletedepartment_post(){

        $json = file_get_contents('php://input');

        $product = json_decode($json);

        $this->department->delete($product->id);

        $data["result"] = "success";

        $this->response($data, 200);

    }

    public function getdepartment_post(){

        $json = file_get_contents('php://input');

        $product = json_decode($json);

        $data["department"] = $this->department->getbyid($product->id);

        $this->response($data, 200);

    }




}