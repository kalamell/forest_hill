<?php
class Category extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('category/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('category');
        $data['rs'] = $this->db->get('category')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'category_name',
                'rules' => 'required',
                'label' => 'category Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('category', array( 'category_name' => $this->input->post('category_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'category_name',
                'rules' => 'required',
                'label' => 'category Name'
            ),
            array(
                'field' => 'category_id',
                'rules' => 'required',
                'label' => 'category ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('category_id', $this->input->post('category_id'))->update('category', array( 'category_name' => $this->input->post('category_name')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('category_id', $this->input->post('category_id'))->delete('category');
        echo json_encode(array( 'success' => true) );
    }



}