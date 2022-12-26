<?php
class main_model extends CI_Model
{
    public function can_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('adminteacher');
    }

    public function check_duplicate($data)
    {
        $this->db->where('code', $data);
        $query = $this->db->get('adminteacher');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function check_duplicatestd($empno)
    {
        $this->db->where('adm_no', $empno);
        $query = $this->db->get('student');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_emp($data)
    {

        return $que = $this->db->insert('adminteacher', $data);
    }
    public function fetch_emp()
    {
        $query = $this->db->get('adminteacher');
        return $query->result();
    }
    public function fetch_emp1()
    {
        $query = "select * from adminteacher order by code DESC limit 1";
        $res = $this->db->query($query);
        return $res->row();
    }
    public function edit_emp($id)
    {
        $query = $this->db->get_where('adminteacher', ['id' => $id]);
        return $query->row();
    }
    public function updateemp($data, $id)
    {
        return $this->db->update('adminteacher', $data, ['id' => $id]);
    }
    public function delete_emp($id)
    {
        return $this->db->delete('adminteacher', ['id' => $id]);
    }


    //////class-------------------------
    public function addclass($className)
    {
        return $query = $this->db->insert('class', $className);
    }
    public function fetch_class()
    {
        $query = $this->db->get('class');
        return $query->result();
    }
    public function edit_class($d)
    {
        $query = $this->db->get_where('class', ['className' => $d]);
        return $query->row();
    }
    public function update_class($updateclass, $d)
    {
        $data = [
            'className' => '' . $updateclass . '',
        ];

        $this->db->where('id', $d);
        return $this->db->update('class', $data);
    }
    public function update_student_class($updateclass, $d)
    {
        $data = [
            'class' => '' . $updateclass . '',
        ];
        $this->db->where('class', $d);
        return $this->db->update('student', $data);
    }

    public function delete_class($d)
    {
        return $this->db->delete('class', ['className' => $d]);
    }
    public function testing_mod($data)
    {
        echo $query = $this->db->get('student');
    }
    public function countclasses()
    {
        $this->db->select('*')->from('class')->group_by('className');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //student------------------->
    public function add_student($stddetails)
    {
        return $que = $this->db->insert('student', $stddetails);
    }
    public function fetch_student()
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('class', 'student.class_id = class.id');
        $this->db->group_by('student.adm_no');
        $query = $this->db->get();
        return $query->result();
    }
    public function fetch_student1()
    {
        $query = "select * from student order by adm_no DESC limit 1";
        $res = $this->db->query($query);
        return $res->row();
    }
    public function edit_student($id)
    {
        $query = $this->db->get_where('student', ['id' => $id]);
        return $query->row();
    }
    public function update_student($stddetails, $id)
    {
        return $this->db->update('student', $stddetails, ['id' => $id]);
    }
    public function delete_student($id)
    {
        return $this->db->delete('student', ['id' => $id]);
    }
    public function delete_studentbyclass($d)
    {
        $this->delete_class($d);
        $this->db->delete('class', ['className' => $d]);
        return $this->db->delete('student', ['class' => $d]);
    }
    public function count_student()
    {
        // $dquery = "SELECT class AS cid, COUNT(id) AS qty FROM student GROUP BY cid";
        // return $this->db->query($dquery)->result_array();

        $query = "SELECT class.className, count(student.id) as qty
        FROM class
        left JOIN student ON class.id = student.class_id
        group by class.className
        ORDER BY student.id;";
        return $this->db->query($query)->result();
    }
    public function total_emp()
    {
        $this->db->select('*')->from('adminteacher')->group_by('code');
        $employees = $this->db->get();
        return $employees->num_rows();
    }
    public function total_student()
    {
        $this->db->select('*')->from('student')->group_by('adm_no');
        $students = $this->db->get();
        return $students->num_rows();
    }
    public function testing()
    {
        // $dquery = "SELECT class AS cid, COUNT(id) AS qty FROM student GROUP BY cid";
        // return $this->db->query($dquery)->result_array();

        echo "testing.....";
    }
}
