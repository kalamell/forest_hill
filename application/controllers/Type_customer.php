<?php
class Type_customer extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('type_customer/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('type_customer');
        $data['rs'] = $this->db->get('type_customer')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'type_customer_name',
                'rules' => 'required',
                'label' => 'type_customer Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('type_customer', array( 'type_customer_name' => $this->input->post('type_customer_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'type_customer_name',
                'rules' => 'required',
                'label' => 'type_customer Name'
            ),
            array(
                'field' => 'type_customer_id',
                'rules' => 'required',
                'label' => 'type_customer ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('type_customer_id', $this->input->post('type_customer_id'))->update('type_customer', array( 'type_customer_name' => $this->input->post('type_customer_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('type_customer_id', $this->input->post('type_customer_id'))->delete('type_customer');
        echo json_encode(array( 'success' => true) );
    }



}