<?php
class Type_unit extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('type_unit/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('type_unit');
        $data['rs'] = $this->db->get('type_unit')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'type_unit_name',
                'rules' => 'required',
                'label' => 'type_unit Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('type_unit', array( 'type_unit_name' => $this->input->post('type_unit_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'type_unit_name',
                'rules' => 'required',
                'label' => 'type_unit Name'
            ),
            array(
                'field' => 'type_unit_id',
                'rules' => 'required',
                'label' => 'type_unit ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('type_unit_id', $this->input->post('type_unit_id'))->update('type_unit', array( 'type_unit_name' => $this->input->post('type_unit_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('type_unit_id', $this->input->post('type_unit_id'))->delete('type_unit');
        echo json_encode(array( 'success' => true) );
    }



}