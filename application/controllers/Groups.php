<?php
class Groups extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('groups/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('groups');
        $data['rs'] = $this->db->get('groups')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'groups_name',
                'rules' => 'required',
                'label' => 'groups Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('groups', array( 'groups_name' => $this->input->post('groups_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'groups_name',
                'rules' => 'required',
                'label' => 'groups Name'
            ),
            array(
                'field' => 'groups_id',
                'rules' => 'required',
                'label' => 'groups ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('groups_id', $this->input->post('groups_id'))->update('groups', array( 'groups_name' => $this->input->post('groups_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('groups_id', $this->input->post('groups_id'))->delete('groups');
        echo json_encode(array( 'success' => true) );
    }



}