<?php
class Customer extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('customer/index');
    }

    public function getdata()
    {
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'customer_id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $offset = ($page-1)*$rows;
        $data['total'] = $this->db->count_all_results('customer');
        $data['rs'] = $this->db->select('*,CONCAT(customer.name," ", customer.surname) AS full_name')
            ->join('type_customer', 'customer.type_customer_id = type_customer.type_customer_id')
            ->order_by($sort, $order)->limit($offset, $rows)->get('customer')->result_array();

        $this->_getdata($data);
    }

    public function delete()
    {
        $this->db->where('customer_id', $this->input->post('customer_id'))->delete('customer');
        echo json_encode(array( 'success' => true) );
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'surname',
                'label' => 'Surname',
                'rules' => 'required'
            ),
            array(
                'field' => 'type_customer_id',
                'label' => 'ประเภท',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $this->db->insert('customer', array(
                'name' => $this->input->post('name'),
                'surname' => $this->input->post('surname'),
                'type_customer_id' => $this->input->post('type_customer_id'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
            ));
        }
        echo json_encode(array('success' => true));
    }

    public function do_edit()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'surname',
                'label' => 'Surname',
                'rules' => 'required'
            ),
            array(
                'field' => 'type_customer_id',
                'label' => 'ประเภท',
                'rules' => 'required'
            ),
           
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $this->db->where('customer_id', $this->input->post('customer_id'))->update('customer', array(
                'name' => $this->input->post('name'),
                'surname' => $this->input->post('surname'),
                'type_customer_id' => $this->input->post('type_customer_id'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
            ));

        }

        echo json_encode( array('success' => true) );
    }



}