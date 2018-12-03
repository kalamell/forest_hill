<?php
class Staff extends Template_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->_render('staff/index');
    }

    public function getdata()
    {
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'staff_id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $offset = ($page-1)*$rows;
        $data['total'] = $this->db->count_all_results('staff');
        $data['rs'] = $this->db->select('*,CONCAT(staff.name," ", staff.surname) AS full_name')
            ->join('department', 'staff.department_id = department.department_id')
            ->join('position', 'staff.position_id = position.position_id')
            ->order_by($sort, $order)->limit($offset, $rows)->get('staff')->result_array();

        $this->_getdata($data);
    }

    public function delete()
    {
        $this->db->where('staff_id', $this->input->post('staff_id'))->delete('staff');
        echo json_encode(array( 'success' => true) );
    }

    public function do_save()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'surname',
                'label' => 'Surname',
                'rules' => 'required'
            ),
            array(
                'field' => 'position_id',
                'label' => 'ตำแหน่ง',
                'rules' => 'required'
            ),
            array(
                'field' => 'department_id',
                'label' => 'แผนก',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[staff.username]'
            ),

            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),

            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|is_unique[staff.email]'
            ),
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $this->db->insert('staff', array(
                'staff_code' => $this->input->post('staff_code'),
                'name' => $this->input->post('name'),
                'surname' => $this->input->post('surname'),
                'department_id' => $this->input->post('department_id'),
                'position_id' => $this->input->post('position_id'),
                'username' => $this->input->post('username'),
                'pwfix' => $this->input->post('pwfix'),
                'password' => do_hash($this->input->post('pwfix')),
                'idcard' => $this->input->post('idcard'),
                'address' => $this->input->post('address'),
                'mobile' => $this->input->post('mobile'),
                'province_id' => $this->input->post('province_id'),
            ));
        }
        echo json_encode(array('success' => true));
    }

    public function do_edit()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'surname',
                'label' => 'Surname',
                'rules' => 'required'
            ),
            array(
                'field' => 'position_id',
                'label' => 'ตำแหน่ง',
                'rules' => 'required'
            ),
            array(
                'field' => 'department_id',
                'label' => 'แผนก',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),

            array(
                'field' => 'pwfix',
                'label' => 'Password',
                'rules' => 'required'
            ),

            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|is_unique[staff.email]'
            ),
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {

            $chk = $this->db->where(array(
                'staff_id !=' => $this->input->post('staff_id'),
                'username' => $this->input->post('username')
            ))->get('staff');


            if ($chk->num_rows()==0) {

                $this->db->where('staff_id', $this->input->post('staff_id'))->update('staff', array(
                    'staff_code' => $this->input->post('staff_code'),
                    'name' => $this->input->post('name'),
                    'surname' => $this->input->post('surname'),
                    'department_id' => $this->input->post('department_id'),
                    'position_id' => $this->input->post('position_id'),
                    'username' => $this->input->post('username'),
                    'password' => do_hash($this->input->post('pwfix')),
                    'pwfix' => $this->input->post('pwfix'),
                    'idcard' => $this->input->post('idcard'),
                    'address' => $this->input->post('address'),
                    'mobile' => $this->input->post('mobile'),
                    'province_id' => $this->input->post('province_id'),
                ));

            }

        }

        echo json_encode( array('success' => true) );
    }



}