<?php
class teacher_model extends CI_Model
{

    public function showStudents()
    {
        // $this->db->where('username', $username);
        // $this->db->where('password', $password);
        //  return $this->db->get('adminteacher');
    }
    public function fetch_class()
    {
        $query = $this->db->get('class');
        return $query->result();
    }
    public function fetch_students($class)
    {
        // $data = array('class' => $class);

        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('class', 'student.class_id = class.id');
        $this->db->where('student.class_id', $class);
        $this->db->group_by('student.adm_no');
        $query = $this->db->get();
        // $query =  $this->db->get_where('student', $data);
        return $query->result();
    }
    public function AddAttendence($Admno, $Status, $date, $classid)
    {



        for ($i = 0; $i < count($Admno); $i++) {
            $query = "INSERT INTO `attendence`( `Admno`, `Status`, `Date`, `class_id`) VALUES ('$Admno[$i]','$Status[$i]',now(),'$classid[$i]')";
            $result = $this->db->query($query);
        }
        return $result;
    }
    public function fetch_attendence($class, $date)
    {
        $this->db->select('*');
        $this->db->from('attendence');
        $this->db->join('student', 'attendence.class_id = student.class_id');
        $this->db->where(array('attendence.class_id' => $class, 'attendence.date' => $date));
        $this->db->group_by('attendence.Admno');
        $query = $this->db->get();
        // foreach ($query->result() as $row) {
        //     echo $row->Admno;
        //     echo $row->student_name;
        // }
        return $query->result();
    }
    public function checkduplicateattendence($Admno, $date)
    {
        for ($i = 0; $i < count($Admno); $i++) {
            echo $query = "select * from `attendence` where Admno = $Admno[$i] and Date = '$date' ";
            $result = $this->db->query($query);
        }
        if ($result->num_rows() > 0) {
            return true;
        } else {
           return false;
        }
    }
}
