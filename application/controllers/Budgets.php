<?php
class Budgets extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('budgets/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->join('type_budgets',  'budgets.type_budgets_id = type_budgets.type_budgets_id')
                        ->count_all_results('budgets');
        $data['rs'] = $this->db->join('type_budgets',  'budgets.type_budgets_id = type_budgets.type_budgets_id')
                        ->get('budgets')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(

            array(
                'field' => 'budgets_name',
                'rules' => 'required',
                'label' => 'budgets name'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('budgets', array(
                'budgets_name' => $this->input->post('budgets_name'),
                'type_budgets_id' => $this->input->post('type_budgets_id'),
                'budgets_total' => $this->input->post('budgets_total'),
                'ratio' => $this->input->post('ratio'),
            ));
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'msg' => validation_errors() ));
        }

    }

    public function do_update()
    {
        $w = '';
        $config = array(
           array(
               'field' => 'budgets_name',
               'rules' => 'required',
               'label' => 'work name'
           ),
       );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('budgets_id', $this->input->post('budgets_id'))->update('budgets', array(
               'budgets_name' => $this->input->post('budgets_name'),
              'type_budgets_id' => $this->input->post('type_budgets_id'),
              'budgets_total' => $this->input->post('budgets_total'),
              'ratio' => $this->input->post('ratio'),
            ));
            echo json_encode(array('success' => true));
        } else
        {
            echo json_encode(array('success' => false, 'msg' => validation_errors() ));
        }
    }

    public function delete()
    {
        $this->db->where('budgets_id', $this->input->post('budgets_id'))->delete('budgets');
        echo json_encode(array( 'success' => true) );
    }

}