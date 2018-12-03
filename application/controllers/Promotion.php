<?php
class Promotion extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('promotion/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->count_all_results('promotion');
        $data['rs'] = $this->db->get('promotion')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'promotion_name',
                'rules' => 'required',
                'label' => 'promotion Name'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('promotion', array( 'promotion_name' => $this->input->post('promotion_name'), 'promotion_price' => $this->input->post('promotion_price')));
        }
        echo json_encode(array('success' => true));
    }

    public function do_update()
    {
        $config = array(
            array(
                'field' => 'promotion_name',
                'rules' => 'required',
                'label' => 'promotion Name'
            ),
            array(
                'field' => 'promotion_id',
                'rules' => 'required',
                'label' => 'promotion ID'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('promotion_id', $this->input->post('promotion_id'))->update('promotion', array( 'promotion_name' => $this->input->post('promotion_name'), 'promotion_price' => $this->input->post('promotion_price')));
        }
        echo json_encode(array('success' => true));
    }

    public function delete()
    {
        $this->db->where('promotion_id', $this->input->post('promotion_id'))->delete('promotion');
        echo json_encode(array( 'success' => true) );
    }

}