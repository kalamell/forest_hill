<?php
class Unit extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('unit/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->join('type_unit', 'unit.type_unit_id = type_unit.type_unit_id')->count_all_results('unit');
        $data['rs'] = $this->db->join('type_unit', 'unit.type_unit_id = type_unit.type_unit_id')->get('unit')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'land_no',
                'rules' => 'required',
                'label' => 'แปลง'
            ),
            array(
                'field' => 'type_unit_id',
                'rules' => 'required',
                'label' => 'ประเภทยูนิต แบบบ้าน'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('unit', array(
                'land_no' => $this->input->post('land_no'),
                'size_land' => $this->input->post('size_land'),
                'price_per_sqm' => $this->input->post('price_per_sqm'),
                'type_unit_id' => $this->input->post('type_unit_id'),
                'near_park' => $this->input->post('near_park')==null?'0':$this->input->post('near_park'),
                'land_corner' => $this->input->post('land_corner')==null?'0':$this->input->post('land_corner'),
                'price' => $this->input->post('price'),
                'discount' => $this->input->post('discount'),
                'price_discount' => $this->input->post('price_discount'),
                'fest' => $this->input->post('fest'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'give_date' => $this->input->post('give_date'),
                'check_date' => $this->input->post('check_date'),
                'transfer_date' => $this->input->post('transfer_date'),
                'promise_date' => $this->input->post('promise_date'),
                'book_date' => $this->input->post('book_date'),
                'price_per_sqm' => $this->input->post('price_per_sqm'),
                'customer_id' => $this->input->post('customer_id'),
                'price_start' => $this->input->post('price_start'),
                'foreman' => $this->input->post('foreman'),
                'structure_name' => $this->input->post('structure_name'),
                'architecture_name' => $this->input->post('architecture_name'),
                'dc_name' => $this->input->post('dc_name'),
                'plumbing_name' => $this->input->post('plumbing_name'),
                'remark' => $this->input->post('remark')
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
                        'field' => 'land_no',
                        'rules' => 'required',
                        'label' => 'แปลง'
                    ),
                    array(
                        'field' => 'type_unit_id',
                        'rules' => 'required',
                        'label' => 'ประเภทยูนิต แบบบ้าน'
                    ),
                );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('unit_id', $this->input->post('unit_id'))->update('unit', array(
                'land_no' => $this->input->post('land_no'),
                'size_land' => $this->input->post('size_land'),
                'price_per_sqm' => $this->input->post('price_per_sqm'),
                'type_unit_id' => $this->input->post('type_unit_id'),
                'near_park' => $this->input->post('near_park')==null?'0':$this->input->post('near_park'),
                'land_corner' => $this->input->post('land_corner')==null?'0':$this->input->post('land_corner'),
                'price' => $this->input->post('price'),
                'discount' => $this->input->post('discount'),
                'price_discount' => $this->input->post('price_discount'),
                'fest' => $this->input->post('fest'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'give_date' => $this->input->post('give_date'),
                'check_date' => $this->input->post('check_date'),
                'transfer_date' => $this->input->post('transfer_date'),
                'promise_date' => $this->input->post('promise_date'),
                'book_date' => $this->input->post('book_date'),
                'price_per_sqm' => $this->input->post('price_per_sqm'),
                'customer_id' => $this->input->post('customer_id'),
                'price_start' => $this->input->post('price_start'),
                'foreman' => $this->input->post('foreman'),
                'structure_name' => $this->input->post('structure_name'),
                'architecture_name' => $this->input->post('architecture_name'),
                'dc_name' => $this->input->post('dc_name'),
                'plumbing_name' => $this->input->post('plumbing_name'),
                'remark' => $this->input->post('remark')
            ));
            echo json_encode(array('success' => true));
        } else
        {
            echo json_encode(array('success' => false, 'msg' => validation_errors() ));
        }
    }

    public function delete()
    {
        $this->db->where('unit_id', $this->input->post('unit_id'))->delete('unit');
        echo json_encode(array( 'success' => true) );
    }

}