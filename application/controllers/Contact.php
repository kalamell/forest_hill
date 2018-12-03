<?php
class Contact extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('contact/index');
    }

    public function getdata()
    {
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'contact_id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $offset = ($page-1)*$rows;
        $data['total'] = $this->db->count_all_results('contact');
        $data['rs'] = $this->db->order_by($sort, $order)->limit($offset, $rows)->get('contact')->result_array();

        $this->_getdata($data);
    }

    public function delete()
    {
        $this->db->where('contact_id', $this->input->post('contact_id'))->delete('contact');
        echo json_encode(array( 'success' => true) );
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'contact_name',
                'label' => 'Name',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $this->db->insert('contact', array(
                 'contact_name' => $this->input->post('contact_name'),
                'contact_phone' => $this->input->post('contact_phone'),
                'contact_email' => $this->input->post('contact_email'),
            ));
        }
        echo json_encode(array('success' => true));
    }

    public function do_edit()
    {
        $config = array(
            array(
                'field' => 'contact_name',
                'label' => 'Name',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $this->db->where('contact_id', $this->input->post('contact_id'))->update('contact', array(
                'contact_name' => $this->input->post('contact_name'),
                'contact_phone' => $this->input->post('contact_phone'),
                'contact_email' => $this->input->post('contact_email'),
            ));

        }

        echo json_encode( array('success' => true) );
    }



}