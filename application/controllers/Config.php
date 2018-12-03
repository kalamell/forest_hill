<?php
class Config extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getposition()
    {
        $rs = $this->db->get('position')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }
    public function getdepartment()
    {
        $rs = $this->db->get('department')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function gettypehome()
    {
        $rs = $this->db->get('type_home')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function gettypeunit()
    {
        $rs = $this->db->get('type_unit')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function getcustomer()
    {
        $rs = $this->db->select('customer.customer_id,CONCAT(name," ", surname) AS full_name')->get('customer')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }



    public function gettypeproject()
    {
        $rs = $this->db->get('type_project')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }


    public function gettypecustomer()
    {
        $rs = $this->db->get('type_customer')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function getunit()
    {
        $rs = $this->db->get('unit')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function getgroups()
    {
        $rs = $this->db->get('groups')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function getcategory()
    {
        $rs = $this->db->get('category')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function gettypebudgets()
    {
        $rs = $this->db->get('type_budgets')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    public function getprovince()
    {
        $rs = $this->db->order_by('province_id', 'asc')->get('province')->result_array();
        $data = $this->_getdata($rs);
        echo json_encode($data);
    }

    private function _getdata($data)
    {
        $items = array();
        foreach($data as $id) {
            array_push($items, $id);
        }
        return $items;
    }
}