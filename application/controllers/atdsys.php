<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class atdsys extends CI_Controller
{

    function index()
    {
        $this->load->view('top');
        $this->load->view('components/adminlogin');
    }
    public function home()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $data['student'] = $this->main_model->total_student();
            $data['count'] = $this->main_model->countclasses();
            $data['emp'] = $this->main_model->total_emp();
            $this->load->view('AdminHome', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }

    ///students-------------------------
    public function students()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $data['student'] = $this->main_model->fetch_student();
            $this->load->view('students', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function addstudent()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $data['student'] = $this->main_model->fetch_student1();
            $data['class'] = $this->main_model->fetch_class();
            $this->load->view('addstudent', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function addstddetails()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->form_validation->set_rules('admno', 'Admno', 'required');
            if ($this->form_validation->run()) {
                $admno = $this->input->post('admno');
                $stdname = $this->input->post('stdname');
                $classid = $this->input->post('class');

                $stddetails = array('adm_no' => $admno, 'student_name' => $stdname, 'class_id' => $classid);
                $check = $this->checkduplistudent($admno);
                if ($check < 1) {
                    if ($this->main_model->add_student($stddetails)) {
                        redirect(site_url('atdsys/students', 'refresh'));
                    } else {
                        redirect(site_url('atdsys/addstudent', 'refresh'));
                    }
                } else {
                    redirect(site_url('atdsys/addstudent'));
                }
            } else {
                redirect(site_url('stdsys/addstudent'));
            }
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function editstudent($id)
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $data['class'] = $this->main_model->fetch_class();
            $data['student'] = $this->main_model->edit_student($id);
            $this->load->view('editstudent', $data, $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function updatestudent($id)
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('admno', 'Admno', 'required');
            if ($this->form_validation->run()) {
                $admno = $this->input->post('admno');
                $stdname = $this->input->post('stdname');
                $class = $this->input->post('class');
                $stddetails = array('adm_no' => $admno, 'student_name' => $stdname, 'class' => $class);
                if ($this->main_model->update_student($stddetails, $id)) {
                    redirect(site_url('atdsys/students', 'refresh'));
                } else {
                    redirect(site_url('atdsys/editstudent', 'refresh'));
                }
            } else {
                redirect(site_url('atdsys/editstudent/' . $id));
            }
        } else {
            redirect(site_url('atdsys'));
        }
    }
    //delete Student------------------
    public function deletestudent($id)
    {
        $this->main_model->delete_student($id);
        redirect(site_url('atdsys/students', 'refresh'));
    }
    public function checkduplistudent($admno)
    {
        return $result = $this->main_model->check_duplicatestd($admno);
    }

    //Add class---------------------------------
    public function totalclasses()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $d['d_list'] = $this->main_model->count_student();
            $d['c_list'] = $this->main_model->fetch_class();
            $this->load->view('totalclasses', $d);
            //$this->totalclasses();
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function addclass()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $this->load->view('addclass');
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function addstdclass()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('class', 'Class', 'required');
            if ($this->form_validation->run()) {
                $class = $this->input->post('class');
                $classname = array('className' => $class);
                if ($this->main_model->addclass($classname)) {
                    redirect(site_url('atdsys/totalclasses', 'refresh'));
                } else {
                    redirect(site_url('atdsys/addclass', 'refresh'));
                }
            } else {
                redirect(site_url('atdsys/addclass'));
            }
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function editclass($d)
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $d = $this->uri->segment(3);
            $data['class'] = $this->main_model->edit_class($d);
            $this->load->view('editclass', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function updateclass($id)
    {
        if ($this->session->userdata('role') == 'admin') {
            $d = $this->uri->segment(3);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('class', 'Class', 'required');
            if ($this->form_validation->run()) {
                $class = $this->input->post('class');
                if ($this->main_model->update_class($class, $d)) {
                    redirect(site_url('atdsys/totalclasses', 'refresh'));
                } else {
                    redirect(site_url('atdsys/addclass', 'refresh'));
                }
            } else {
                redirect(site_url('atdsys/addclass'));
            }
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function deleteclass($d)
    {
        $d = $this->uri->segment(3);
        $this->main_model->delete_studentbyclass($d);
        redirect(site_url('atdsys/totalclasses', 'refresh'));
    }



    //Add employees
    public function employees()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $data['employe'] = $this->main_model->fetch_emp();
            $this->load->view('employees', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function addemp()
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $data['emp'] = $this->main_model->fetch_emp1();
            $this->load->view('addemp', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function addemployee()
    {
        if ($this->session->userdata('role') == 'admin') {


            $this->form_validation->set_rules('empcode', 'Empcode', 'required');
            $this->form_validation->set_rules('empname', 'Empname', 'required');

            if ($this->form_validation->run()) {
                $code1 = $this->input->post('empcode');
                $empname = $this->input->post('empname');
                $role = $this->input->post('role');
                $username = $empname . $code1;
                $password = $empname . '123';
                $data = array('code' => $code1, 'empname' => $empname, 'role' => $role, 'username' => $username, 'password' => $password);
                $check = $this->checkdupliemp($code1);
                if ($check < 1) {
                    if ($this->main_model->add_emp($data)) {
                        redirect(site_url('atdsys/employees', 'refresh'));
                    } else {
                        redirect(site_url('atdsys/addemp', 'refresh'));
                    }
                } else {
                    $this->session->set_flashdata('error', 'please enter different employee code!');
                    redirect(site_url('atdsys/addemp'));
                }
            } else {
                redirect(site_url('atdsys/addemp'));
            }
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function checkdupliemp($code1)
    {
        // $data=array('code'=>$code1);
        return $result = $this->main_model->check_duplicate($code1);
    }
    public function editemploye($id)
    {
        if ($this->session->userdata('role') == 'admin') {
            $this->load->view('top');
            $this->load->view('nav');
            $data['employe'] = $this->main_model->edit_emp($id);
            $this->load->view('editemploye', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function updateemp($id)
    {
        if ($this->session->userdata('role') == 'admin') {
            $code = $this->input->post('empcode');
            $empname = $this->input->post('empname');
            $role = $this->input->post('role');
            $check = $this->checkdupliemp($code);
            $data = array('code' => $code, 'empname' => $empname, 'role' => $role);
            $this->main_model->updateemp($data, $id);
            redirect(site_url('atdsys/employees', 'refresh'));
        }
    }


    public function deleteemploye($id)
    {
        $this->main_model->delete_emp($id);
        redirect(site_url('atdsys/employees', 'refresh'));
    }



    ///Teacher Modules////////////////
    public function hometeacher()
    {
        if ($this->session->userdata('role') == 'teacher') {
            $this->load->view('top');
            $this->load->view('Teacher/navteacher');
            $this->main_model->countclasses();
            $this->load->view('Teacher/Home');
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function Attendence()
    {
        if ($this->session->userdata('role') == 'teacher') {
            $this->load->view('top');
            $this->load->view('Teacher/navteacher');
            $data['class'] = $this->teacher_model->fetch_class();
            $this->load->view('Teacher/TakeAttendence', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function fetch_students()
    {
        if ($this->session->userdata('role') == 'teacher') {
            if ($this->input->post('show')) {
                $this->load->view('top');
                $this->load->view('Teacher/navteacher');
                $class = $this->input->post('class');
                $data['class'] = $this->teacher_model->fetch_class();
                $data['student'] = $this->teacher_model->fetch_students($class);
                $this->load->view('Teacher/TakeAttendence', $data);
                $this->load->view('footer');
            }
        }
    }
    public function addAttendence()
    {
        if ($this->session->userdata('role') == 'teacher') {
            $Admno = $this->input->post('admno');
            $Status = $this->input->post('status');
            $date = $this->input->post('tarik');
            $classid = $this->input->post('classid');

            $check = $this->checkduplicateattendence($Admno);
            if ($check < 1) {
                $result = $this->teacher_model->AddAttendence($Admno, $Status, $date, $classid);
                if ($result) {
                    // redirect('atdsys/Attendence');
                    echo "inserted";
                } else {
                    // redirect('atdsys/Attendence');
                    echo "something is wrong!";
                }
            }
            redirect('atdsys/Attendence');



        }
    }
    public function checkduplicateattendence($Admno)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d";
        $date = @mdate($format);

        $result = $this->teacher_model->checkduplicateattendence($Admno, $date);
        return $result;
    }
    public function AttendenceReport()
    {
        if ($this->session->userdata('role') == 'teacher') {
            $this->load->view('top');
            $this->load->view('Teacher/navteacher');
            $data['class'] = $this->teacher_model->fetch_class();
            $this->load->view('Teacher/AttendenceReport', $data);
            $this->load->view('footer');
        } else {
            redirect(site_url('atdsys'));
        }
    }
    public function fetch_attendence()
    {
        if ($this->session->userdata('role') == 'teacher') {
            $this->load->view('top');
            $this->load->view('Teacher/navteacher');
            $classid = $this->input->post('class');
            $data['class'] = $this->teacher_model->fetch_class();
            $date = $this->input->post('date');
            $data['atten'] = $this->teacher_model->fetch_attendence($classid, $date);
            $this->load->view('Teacher/AttendenceReport', $data);
            $this->load->view('footer');
        }
    }


    public function login_validation()
    {
        $this->form_validation->set_rules('user', 'username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('user');
            $password = $this->input->post('password');
            $result = $this->main_model->can_login($username, $password);
            if ($result != false) {
                foreach ($result->result() as $row) :
                    $session_data = array(
                        'username' => $row->username,
                        'role' => $row->role
                    );
                    $this->session->set_userdata($session_data);
                endforeach;
                if ($this->session->userdata('role') == 'admin') {
                    redirect(site_url('atdsys/home'));
                } elseif ($this->session->userdata('role') == 'teacher') {
                    redirect(site_url('atdsys/hometeacher'));
                }
            } else {
                $this->session->set_flashdata('error', 'invalid username and password');
                redirect(site_url('atdsys'));
            }
        } else {
            $this->index();
        }
    }
    public function testingfun()
    {
        $d['d_list'] = $this->main_model->testing();
        $this->load->view('testing/mergingdata', $d);
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('atdsys');
    }
}
