<?php
class Work extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('work/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->join('unit', 'work.unit_id = unit.unit_id')
                        ->join('type_unit',  'unit.type_unit_id = type_unit.type_unit_id')
                        ->join('groups', 'work.groups_id = groups.groups_id')
                        ->join('category', 'work.category_id = category.category_id')
                        ->count_all_results('work');
        $data['rs'] = $this->db->join('unit', 'work.unit_id = unit.unit_id')
                        ->join('type_unit',  'unit.type_unit_id = type_unit.type_unit_id')
                        ->join('groups', 'work.groups_id = groups.groups_id')
                        ->join('category', 'work.category_id = category.category_id')
                        ->get('work')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(

            array(
                'field' => 'work_name',
                'rules' => 'required',
                'label' => 'work name'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('work', array(
                'work_name' => $this->input->post('work_name'),
                'unit_id' => $this->input->post('unit_id'),
                'work_id' => $this->input->post('work_id'),
                'groups_id' => $this->input->post('groups_id'),
                'category_id' => $this->input->post('category_id'),
                'status' => $this->input->post('status'),
                'ondate' => $this->input->post('ondate'),
                'supplier' => $this->input->post('supplier'),
                'percent' => $this->input->post('percent'),

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
               'field' => 'work_name',
               'rules' => 'required',
               'label' => 'work name'
           ),
       );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('work_id', $this->input->post('work_id'))->update('work', array(
                'work_name' => $this->input->post('work_name'),
                'unit_id' => $this->input->post('unit_id'),
                'work_id' => $this->input->post('work_id'),
                'groups_id' => $this->input->post('groups_id'),
                'category_id' => $this->input->post('category_id'),
                'status' => $this->input->post('status'),
                'ondate' => $this->input->post('ondate'),
                'supplier' => $this->input->post('supplier'),
                'percent' => $this->input->post('percent'),
            ));
            echo json_encode(array('success' => true));
        } else
        {
            echo json_encode(array('success' => false, 'msg' => validation_errors() ));
        }
    }

    public function delete()
    {
        $this->db->where('work_id', $this->input->post('work_id'))->delete('work');
        echo json_encode(array( 'success' => true) );
    }

}