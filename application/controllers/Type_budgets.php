<?php
class Type_budgets extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('type_budgets/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('type_budgets');
        $data['rs'] = $this->db->get('type_budgets')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'type_budgets_name',
                'rules' => 'required',
                'label' => 'type_budgets Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('type_budgets', array( 'type_budgets_name' => $this->input->post('type_budgets_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'type_budgets_name',
                'rules' => 'required',
                'label' => 'type_budgets Name'
            ),
            array(
                'field' => 'type_budgets_id',
                'rules' => 'required',
                'label' => 'type_budgets ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('type_budgets_id', $this->input->post('type_budgets_id'))->update('type_budgets', array( 'type_budgets_name' => $this->input->post('type_budgets_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('type_budgets_id', $this->input->post('type_budgets_id'))->delete('type_budgets');
        echo json_encode(array( 'success' => true) );
    }



}