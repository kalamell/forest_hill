<?php
class Type_home extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('type_home/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('type_home');
        $data['rs'] = $this->db->get('type_home')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'type_home_name',
                'rules' => 'required',
                'label' => 'type_home Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('type_home', array( 'type_home_name' => $this->input->post('type_home_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'type_home_name',
                'rules' => 'required',
                'label' => 'type_home Name'
            ),
            array(
                'field' => 'type_home_id',
                'rules' => 'required',
                'label' => 'type_home ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('type_home_id', $this->input->post('type_home_id'))->update('type_home', array( 'type_home_name' => $this->input->post('type_home_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('type_home_id', $this->input->post('type_home_id'))->delete('type_home');
        echo json_encode(array( 'success' => true) );
    }



}