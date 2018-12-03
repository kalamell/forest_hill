<?php
class Type_project extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('type_project/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('type_project');
        $data['rs'] = $this->db->get('type_project')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'type_project_name',
                'rules' => 'required',
                'label' => 'type_project Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('type_project', array( 'type_project_name' => $this->input->post('type_project_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'type_project_name',
                'rules' => 'required',
                'label' => 'type_project Name'
            ),
            array(
                'field' => 'type_project_id',
                'rules' => 'required',
                'label' => 'type_project ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('type_project_id', $this->input->post('type_project_id'))->update('type_project', array( 'type_project_name' => $this->input->post('type_project_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('type_project_id', $this->input->post('type_project_id'))->delete('type_project');
        echo json_encode(array( 'success' => true) );
    }



}