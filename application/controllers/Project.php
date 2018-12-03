<?php
class Project extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('project/index');
    }

    public function getdata()
    {

        $data['total'] = $this->db->join('type_project', 'project.type_project_id = type_project.type_project_id')->count_all_results('project');
        $data['rs'] = $this->db->join('type_project', 'project.type_project_id = type_project.type_project_id')->get('project')->result_array();

        $this->_getdata($data);
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'project_code',
                'rules' => 'required|is_unique[project.project_code]',
                'label' => 'project code'
            ),
            array(
                'field' => 'project_name',
                'rules' => 'required',
                'label' => 'project name'
            ),
            array(
                'field' => 'type_project_id',
                'rules' => 'required',
                'label' => 'ประเภทโครงการ'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->insert('project', array( 
                'project_code' => $this->input->post('project_code'),
                'project_name' => $this->input->post('project_name'),
                'location' => $this->input->post('location'),
                'land_size' => $this->input->post('land_size'),
                'type_project_id' => $this->input->post('type_project_id'),
                'project_price' => $this->input->post('project_price'),
                'total_unit' => $this->input->post('total_unit'),
                'sale_avg' => $this->input->post('sale_avg'),
                'total_model' => $this->input->post('total_model'),
                'sale_area' => $this->input->post('sale_area'),
                'central_area' => $this->input->post('central_area'),
                'start_date' => $this->input->post('start_date'),
                'close_date' => $this->input->post('close_date'),
                'facilities' => $this->input->post('facilities'),
                'price_per_sqm' => $this->input->post('price_per_sqm'),
                'design_engineer' => $this->input->post('design_engineer'),
                'architect' => $this->input->post('architect'),
                'foreman' => $this->input->post('foreman'),
                'contact_land' => $this->input->post('contact_land'),
                'contact_councils' => $this->input->post('contact_councils'),
                'contact_water_supply' => $this->input->post('contact_water_supply'),
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
                'field' => 'project_code',
                'rules' => 'required'.$w,
                'label' => 'project code'
            ),
            array(
                'field' => 'project_name',
                'rules' => 'required',
                'label' => 'project name'
            ),
            array(
                'field' => 'type_project_id',
                'rules' => 'required',
                'label' => 'ประเภทโครงการ'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->db->where('project_id', $this->input->post('project_id'))->update('project', array( 
                'project_code' => $this->input->post('project_code'),
                'project_name' => $this->input->post('project_name'),
                'location' => $this->input->post('location'),
                'land_size' => $this->input->post('land_size'),
                'type_project_id' => $this->input->post('type_project_id'),
                'project_price' => $this->input->post('project_price'),
                'total_unit' => $this->input->post('total_unit'),
                'sale_avg' => $this->input->post('sale_avg'),
                'total_model' => $this->input->post('total_model'),
                'sale_area' => $this->input->post('sale_area'),
                'central_area' => $this->input->post('central_area'),
                'start_date' => $this->input->post('start_date'),
                'close_date' => $this->input->post('close_date'),
                'facilities' => $this->input->post('facilities'),
                'price_per_sqm' => $this->input->post('price_per_sqm'),
                'design_engineer' => $this->input->post('design_engineer'),
                'architect' => $this->input->post('architect'),
                'foreman' => $this->input->post('foreman'),
                'contact_land' => $this->input->post('contact_land'),
                'contact_councils' => $this->input->post('contact_councils'),
                'contact_water_supply' => $this->input->post('contact_water_supply'),
            ));
            echo json_encode(array('success' => true));
        } else 
        {
            echo json_encode(array('success' => false, 'msg' => validation_errors() ));
        }
    }

    public function delete()
    {
        $this->db->where('project_id', $this->input->post('project_id'))->delete('project');
        echo json_encode(array( 'success' => true) );
    }

}