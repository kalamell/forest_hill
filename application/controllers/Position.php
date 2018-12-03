<?php
class Position extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('position/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('position');
        $data['rs'] = $this->db->get('position')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'position_name',
                'rules' => 'required',
                'label' => 'Position Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('position', array( 'position_name' => $this->input->post('position_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'position_name',
                'rules' => 'required',
                'label' => 'Position Name'
            ),
            array(
                'field' => 'position_id',
                'rules' => 'required',
                'label' => 'Position ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('position_id', $this->input->post('position_id'))->update('position', array( 'position_name' => $this->input->post('position_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('position_id', $this->input->post('position_id'))->delete('position');
        echo json_encode(array( 'success' => true) );
    }



}