<?php
class Department extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('department/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('department');
        $data['rs'] = $this->db->get('department')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'department_name',
                'rules' => 'required',
                'label' => 'department Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('department', array( 'department_name' => $this->input->post('department_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'department_name',
                'rules' => 'required',
                'label' => 'department Name'
            ),
            array(
                'field' => 'department_id',
                'rules' => 'required',
                'label' => 'department ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('department_id', $this->input->post('department_id'))->update('department', array( 'department_name' => $this->input->post('department_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('department_id', $this->input->post('department_id'))->delete('department');
        echo json_encode(array( 'success' => true) );
    }



}