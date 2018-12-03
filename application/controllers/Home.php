<?php
class Home extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('home/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->join('type_home', 'home.type_home_id = type_home.type_home_id')->count_all_results('home');
        $data['rs'] = $this->db->join('type_home', 'home.type_home_id = type_home.type_home_id')->get('home')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'home_code',
                'rules' => 'required|is_unique[home.home_code]',
                'label' => 'home code'
            ),
            array(
                'field' => 'home_name',
                'rules' => 'required',
                'label' => 'home name'
            ),
            array(
                'field' => 'type_home_id',
                'rules' => 'required',
                'label' => 'ชนิดบ้าน'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('home', array(
                'home_code' => $this->input->post('home_code'),
                'home_name' => $this->input->post('home_name'),
                'area' => $this->input->post('area'),
                'place' => $this->input->post('place'),
                'style' => $this->input->post('style'),
                'type_home_id' => $this->input->post('type_home_id'),
                'price' => $this->input->post('price'),
                'price_sale' => $this->input->post('price_sale'),
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
                'field' => 'home_code',
                'rules' => 'required',
                'label' => 'home code'
            ),
            array(
                'field' => 'home_name',
                'rules' => 'required',
                'label' => 'home name'
            ),
            array(
                'field' => 'type_home_id',
                'rules' => 'required',
                'label' => 'ชนิดบ้าน'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('home_id', $this->input->post('home_id'))->update('home', array(
                'home_code' => $this->input->post('home_code'),
                'home_name' => $this->input->post('home_name'),
                'area' => $this->input->post('area'),
                'place' => $this->input->post('place'),
                'style' => $this->input->post('style'),
                'type_home_id' => $this->input->post('type_home_id'),
                'price' => $this->input->post('price'),
                'price_sale' => $this->input->post('price_sale'),
            ));
            echo json_encode(array('success' => true));
        } else
        {
            echo json_encode(array('success' => false, 'msg' => validation_errors() ));
        }
    }

    public function delete()
    {
        $this->db->where('home_id', $this->input->post('home_id'))->delete('home');
        echo json_encode(array( 'success' => true) );
    }

}