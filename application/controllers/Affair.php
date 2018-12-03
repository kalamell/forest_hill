<?php
class Affair extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('affair/index');
    }

    public function getdata()
    {
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'affair_id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $offset = ($page-1)*$rows;
        $data['total'] = $this->db->count_all_results('affair');
        $data['rs'] = $this->db->order_by($sort, $order)->limit($offset, $rows)->get('affair')->result_array();

        $this->_getdata($data);
    }

    public function delete()
    {
        $this->db->where('affair_id', $this->input->post('affair_id'))->delete('affair');
        echo json_encode(array( 'success' => true) );
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'affair_name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'affair_contact',
                'label' => 'Contact',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $this->db->insert('affair', array(
                'affair_name' => $this->input->post('affair_name'),
                'affair_contact' => $this->input->post('affair_contact'),
                'affair_phone' => $this->input->post('affair_phone')
            ));
        }
        echo json_encode(array('success' => true));
    }

    public function do_edit()
    {
        $config = array(
           array(
                'field' => 'affair_name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'affair_contact',
                'label' => 'Contact',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {

           
                $this->db->where('affair_id', $this->input->post('affair_id'))->update('affair', array(
                    'affair_name' => $this->input->post('affair_name'),
                    'affair_contact' => $this->input->post('affair_contact'),
                    'affair_phone' => $this->input->post('affair_phone')
                ));

 
        }

        echo json_encode( array('success' => true) );
    }



}