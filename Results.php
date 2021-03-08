<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Results extends CI_Controller {

    //protected $auth;

    public function __construct() {
        parent::__construct();

        $this->load->model(['UserModel']);

        if (!authenticate() && !strpos(current_url(), "true")) {
            echo json_encode(['access' => false]);
            die;
        }
    }

    public function get_results($class_id = "", $section_id = "", $subject_id = "", $session_id = "", $term_id = "") {
        $params = func_get_args();

        $checker = array(
            'class_id' => $params[0],
            'section_id' => $params[1],
            'subject_id' => $params[2],
            'session' => $params[3],
            'term' => $params[4],
        );

        $this->db->where($checker);
        $response = $this->db->get('marks')->result_array();
        echo json_encode($response);
    }

    //BROADSHEET SECTION
    //method gets subject and students and checks if there are results
    public function get_broadsheet($school_id, $student_id2 = 0, $session_id, $term, $class_id, $section_id) {
        $params = func_get_args();
        $data_arr = array();

        $school_id = $params[0];
        $student_id2 = $params[1];
        $session_id = $params[2];
        $term = $params[3];
        $class_id = $params[4];
        $section_id = $params[5];

        $this->db->order_by('id', 'asc');
        $subjects = $this->db->get_where('subjects', array('school_id' => $school_id, 'class_id' => $class_id))->result_array();

        $students = $this->db->query("SELECT users.name AS name, students.id AS student_id FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN enrols ON students.id = enrols.student_id WHERE students.school_id = $school_id AND enrols.class_id = $class_id AND enrols.section_id=$section_id")->result_array();

        $check_results = $this->db->query("SELECT users.name AS name, marks.CA AS ca, marks.exam AS exam, marks.mark_obtained AS total, subjects.name AS subject FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id INNER JOIN subjects ON marks.subject_id = subjects.id WHERE marks.session=$session_id AND marks.term=$term AND marks.class_id=$class_id AND marks.section_id=$section_id AND marks.school_id=$school_id")->result_array();

        $data_arr['subjects'] = $subjects;
        $data_arr['students'] = $students;
        $data_arr['check_results'] = $check_results;

        echo json_encode($data_arr);
    }

    //method supplies student results for individual rows of broadsheet
    public function get_bs_results($school_id, $student_id = 0, $session_id, $term, $class_id, $section_id) {
        $params = func_get_args();

        $school_id = $params[0];
        $student_id = $params[1];
        $session_id = $params[2];
        $term = $params[3];
        $class_id = $params[4];
        $section_id = $params[5];

        $res = $this->db->query("SELECT users.name AS name, marks.CA AS ca, marks.exam AS exam, marks.mark_obtained AS total, marks.percentages AS percentage, subjects.name AS subject FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id INNER JOIN subjects ON marks.subject_id = subjects.id WHERE students.id=$student_id AND marks.session=$session_id AND marks.term=$term AND marks.class_id=$class_id AND marks.section_id=$section_id ORDER BY subjects.id")->result_array();

        echo json_encode($res);
    }

    //method to fetch position of student
    public function get_student_position($school_id, $student_id2, $session_id, $term, $class_id, $section_id, $sibling = false) {
        //$CI = &get_instance();
        //$CI->load->database();

        //array to store averages
        $average_arr = array();

        $students = $this->db->query("SELECT users.name AS name, students.id AS student_id from users INNER JOIN students ON users.id = students.user_id INNER JOIN enrols ON students.id = enrols.student_id WHERE students.school_id = $school_id AND enrols.class_id = $class_id AND enrols.section_id=$section_id")->result_array();

        foreach ($students as $student) {
            $student_id = $student['student_id'];
            if ($this->check_result($student_id, $term, $session_id, $class_id, $section_id)) {
                $results = $this->db->query("SELECT users.name AS name, marks.CA AS ca, marks.exam AS exam, marks.mark_obtained AS total, subjects.name AS subject FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id INNER JOIN subjects ON marks.subject_id = subjects.id WHERE students.id=$student_id AND marks.session=$session_id AND marks.term=$term AND marks.class_id=$class_id AND marks.section_id=$section_id")->result_array();

                $res = 0;
                $total_subj = 0;
                foreach ($results as $result) {
                    $res += $result['total'];
                    $total_subj++;
                }

                // Avoid division by zero
                $total_subj = $total_subj == 0 ? 1 : $total_subj;

                $average_arr[$student_id] = ($res / $total_subj);
            }
        }
        arsort($average_arr);

        $put_arr = array();
        $i = 0;
        foreach ($average_arr as $key => $average) {
            if (!$this->search_multi($key, $put_arr)) {
                $check_arr = array();
                $j = 0;
                foreach ($average_arr as $keys => $avg) {
                    if ($average == $avg) {
                        $check_arr[$j] = $keys;
                        $j++;
                    }
                }
                $put_arr[$i] = $check_arr;
                $i++;
            }
        }

        // Run check to ascertain positions
        $data_count = 0;
        $final_array = array();

        foreach ($put_arr as $arr) {
            $data_position = array_search($arr, $put_arr);

            // if ($data_position < 1) {
            $data_position = ($data_position + 1);
            $data_position = (string) $data_position;
            $final_array[$data_position] = $arr;
            // } else {
            //     $data_count = ($data_count + 1);
            //     $final_array[$data_count] = $arr;
            // }
            // $data_count = count($arr);
        }
        // Run check to ascertain positions

        //echo json_encode($final_array);die;

        $pos = "";
        foreach ($final_array as $key => $arr) {
            $srch = array_search($student_id2, $arr);
            if (gettype($srch) != "boolean") {
                $pos = $key;
            }
        }
        //echo json_encode($final_array);die;
        $num = (int) $pos;
        if ($average_arr[$student_id2] < 1) {
            $position = null;
            $data = array('position' => $position);
        } else {
            $position = $this->addOrdinalNumberSuffix($num);
            $data = array('position' => $position);
        }

        if ($sibling) {
            return $position;
        } else {
            echo json_encode($data);
        }
    }

    // Method to check if student has result
    public function check_result($student_id, $term, $session, $class, $arm) {
        $res = true;
        if ($term == 3) {
            $status = 0;
            for ($i = 1; $i < 4; $i++) {
                $res_count = $this->db->get_where('marks', array('student_id' => $student_id, 'term' => $i, 'session' => $session))->num_rows();
                if ($res_count > 0) {
                    $status++;
                } else {
                    $status = $status < 1 ? 0 : $status - 1;
                }
            }
            if ($status == 3) {
                $res = true;
            } else {
                $res = false;
            }
        } else {
            $res_count = $this->db->get_where('marks', array('student_id' => $student_id, 'term' => $term, 'session' => $session))->num_rows();
            if ($res_count > 0) {
                $res = true;
            } else {
                $res = false;
            }
        }
        return $res;
        //echo json_encode(array('status' => $res));
    }

    //Method searches a two dimensional array
    private function search_multi($needle, $arr) {
        $truth_count = 0;
        $false_count = 0;
        foreach ($arr as $val) {
            if (is_array($val)) {
                $stat = array_search($needle, $val);
                if (gettype($stat) != "boolean") {
                    $truth_count++;
                } else {
                    $false_count++;
                }
            } else {
                continue;
            }
        }
        if ($truth_count > 0) {
            return true;
        } else {
            return false;
        }
    }

    //method sets position to ordinal number
    public function addOrdinalNumberSuffix($num) {
        if (!in_array(($num % 100), array(11, 12, 13))) {
            switch ($num % 10) {
            // Handle 1st, 2nd, 3rd
            case 1:return $num . 'st';
            case 2:return $num . 'nd';
            case 3:return $num . 'rd';
            }
        }
        return $num . 'th';
    }
//BROADSHEET SECTION

//REPORTSHEET SECTION
    public function index($school_id) {
        try {
            $sch_sessions = $this->db->get_where('sessions', array('school_id' => $school_id))->result_array();
            $response = array(
                'status' => true,
                'data' => $sch_sessions,
            );
        } catch (Exception $e) {
            $response = array(
                'status' => false,
                'message' => $e->getMessage(),
            );
        }
        echo json_encode($response);
    }

    public function reportsheet_template() {
        $templates = $this->db->get('report_sheets')->result_array();
        echo json_encode($templates);
    }

    public function template_update() {
        try {
            $data = file_get_contents("php://input", true);
            $data = json_decode($data);
            $res = '';
            $_POST = (array) $data;

            $payload = array(
                'template_id' => $data->temp_id,
            );

            $this->db->where(array('school_id' => $data->school_id));
            $stat = $this->db->update('settings', $payload);

            $response = array(
                'status' => $stat,
                'notification' => "Template updated successfully!",
            );
        } catch (Exception $e) {
            $response = array(
                'status' => false,
                'notification' => $e->getMessage(),
            );
        }

        echo json_encode($response);
    }

    public function get_std_data($ins, $school_id, $student_id, $session_id, $term, $class_id, $section_id, $download = "false") {
        $user_id = $this->db->get_where('students', array('id' => $student_id))->row('user_id');

        //first row (school info)
        $school = $this->db->query("SELECT * FROM schools INNER JOIN settings ON schools.id = settings.school_id WHERE schools.id=?", array($school_id))->row();

        //second row
        if ($ins == "android") {
            $bd_check = "(" . date('Y') . " - from_unixtime(users.birthday, '%Y'))";
        } else {
            $bd_check = "users.birthday";
        }

        $student = $this->db->query("SELECT users.name AS name,users.gender AS gender, users.email AS email,  students.code AS code, (SELECT classes.name FROM classes WHERE classes.school_id = $school_id AND id=marks.class_id) AS class, (SELECT sections.name FROM sections WHERE sections.class_id = $class_id AND id=marks.section_id) AS arm, (SELECT sessions.name FROM sessions WHERE sessions.school_id = $school_id AND id=marks.session) AS session, " . $bd_check . " AS dateofbirth, marks.term AS term FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id WHERE marks.school_id = ? AND marks.student_id = ? AND marks.session = ? AND marks.term = ? AND marks.class_id = ? AND marks.section_id = ?", array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->row();

        //third row
        $results = $this->db->query("SELECT subjects.name AS subject, marks.CA AS ca, marks.exam AS exam, marks.mark_obtained AS total, marks.percentages AS percentages, (SELECT grades.name FROM grades WHERE marks.mark_obtained >= grades.mark_from AND marks.mark_obtained <= grades.mark_upto AND grades.school_id=$school_id) AS grade, (SELECT grades.comment FROM grades WHERE marks.mark_obtained >= grades.mark_from AND marks.mark_obtained <= grades.mark_upto AND grades.school_id=$school_id) AS remark FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id INNER JOIN subjects ON marks.subject_id = subjects.id WHERE marks.school_id = ? AND marks.student_id = ? AND marks.session = ? AND marks.term = ? AND marks.class_id = ? AND marks.section_id = ? ORDER BY marks.subject_id", array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->result_array();

        $pos = $this->get_student_position($school_id, $student_id, $session_id, $term, $class_id, $section_id, true);

        $init_post_arr = array(
            'pos' => $pos,
        );

        //fourth row
        $avr = 0;
        $cumm_average = 0;
        $result_query = "SELECT COUNT(marks.subject_id) AS subj_offered, SUM(marks.mark_obtained) AS total_score, AVG(marks.mark_obtained) AS average, (SELECT COUNT(enrols.student_id) AS student FROM enrols WHERE enrols.school_id = $school_id AND enrols.class_id = $class_id AND enrols.section_id = $section_id AND enrols.session = $session_id) AS class_size FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id WHERE marks.school_id = ? AND marks.student_id = ? AND marks.session = ? AND marks.term = ? AND marks.class_id = ? AND marks.section_id = ?";
        if ($term == 3) {
            $position_data = $this->db->query($result_query, array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->row();
            for ($i = 1; $i <= 3; $i++) {
                $avr += $this->db->query($result_query, array($school_id, $student_id, $session_id, $i, $class_id, $section_id))->row('average');
            }
            $cumm_average = round(($avr / 3), 2);
        } else {
            $position_data = $this->db->query($result_query, array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->row();
        }

        //attendance data
        $attendance['total'] = ($this->db->get_where('daily_attendances', array('school_id' => $school_id, 'student_id' => $student_id, 'session_id' => $session_id, 'class_id' => $class_id, 'section_id' => $section_id))->num_rows());

        $attendance['present'] = ($this->db->get_where('daily_attendances', array('school_id' => $school_id, 'student_id' => $student_id, 'session_id' => $session_id, 'class_id' => $class_id, 'section_id' => $section_id, 'status' => 1))->num_rows());

        $attendance['absent'] = ($this->db->get_where('daily_attendances', array('school_id' => $school_id, 'student_id' => $student_id, 'session_id' => $session_id, 'class_id' => $class_id, 'section_id' => $section_id, 'status' => 0))->num_rows());
        //attendance data

        //Class teacher data
        $class_teacher = $this->db->query("SELECT users.name AS teacher FROM users INNER JOIN teachers ON teachers.user_id = users.id INNER JOIN teacher_permissions ON teacher_permissions.teacher_id = teachers.id WHERE teachers.school_id = 1 AND teacher_permissions.class_id = 1 AND teacher_permissions.section_id = 1 AND (teacher_permissions.marks = 1 OR teacher_permissions.attendance = 1)")->row('teacher');
        //Class teacher data

        $position_data = (array) $position_data;

        $final_pos = array_merge($position_data, $init_post_arr);

        $data = compact('school', 'student', 'results', 'final_pos', 'attendance', 'class_teacher', 'cumm_average', 'school_logo', 'ins', 'user_id');
        return $data;
    }

    public function android($session, $user_id, $term) {
        $this->db->select('users.id AS user_id, students.id AS student_id, students.school_id AS school_id, enrols.class_id AS class_id, enrols.section_id AS section_id');
        $this->db->from('users');
        $this->db->join('students', 'students.user_id=users.id');
        $this->db->join('enrols', 'enrols.student_id=students.id');
        $this->db->where('user_id', $user_id);
        $student = $this->db->get()->row();

        //var_dump($student); echo $student->class_id;die;

        $data = $this->get_reportsheet('android', $student->school_id, $student->student_id, $session, $term, $student->class_id, $student->section_id);

        $response = array(
            'status' => true,
            'data' => $data,
        );

        echo json_encode($response);
    }

    public function get_reportsheet($ins, $school_id = "", $student_id = "", $session_id, $term, $class_id = "", $section_id = "", $download = "false") {
        $params = func_get_args();

        $ins = $params[0];
        $school_id = $params[1];
        $student_id = $params[2];
        $session_id = $params[3];
        $term = $params[4];
        $class_id = $params[5];
        $section_id = $params[6];
        $download = $params[7];
        $user_id = $this->db->get_where('students', array('id' => $student_id))->row('user_id');

        //first row (school info)
        $school = $this->db->query("SELECT * FROM schools INNER JOIN settings ON schools.id = settings.school_id WHERE schools.id=?", array($school_id))->row();

        //second row
        if ($ins == "android") {
            $bd_check = "(" . date('Y') . " - from_unixtime(users.birthday, '%Y'))";
        } else {
            $bd_check = "users.birthday";
        }

        $student = $this->db->query("SELECT users.name AS name,users.gender AS gender, users.email AS email,  students.code AS code, (SELECT classes.name FROM classes WHERE classes.school_id = $school_id AND id=marks.class_id) AS class, (SELECT sections.name FROM sections WHERE sections.class_id = $class_id AND id=marks.section_id) AS arm, (SELECT sessions.name FROM sessions WHERE sessions.school_id = $school_id AND id=marks.session) AS session, " . $bd_check . " AS dateofbirth, marks.term AS term FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id WHERE marks.school_id = ? AND marks.student_id = ? AND marks.session = ? AND marks.term = ? AND marks.class_id = ? AND marks.section_id = ?", array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->row();

        //third row
        $results = $this->db->query("SELECT subjects.name AS subject, marks.CA AS ca, marks.exam AS exam, marks.mark_obtained AS total, marks.percentages AS percentages, (SELECT grades.name FROM grades WHERE marks.mark_obtained >= grades.mark_from AND marks.mark_obtained <= grades.mark_upto AND grades.school_id=$school_id) AS grade, (SELECT grades.comment FROM grades WHERE marks.mark_obtained >= grades.mark_from AND marks.mark_obtained <= grades.mark_upto AND grades.school_id=$school_id) AS remark FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id INNER JOIN subjects ON marks.subject_id = subjects.id WHERE marks.school_id = ? AND marks.student_id = ? AND marks.session = ? AND marks.term = ? AND marks.class_id = ? AND marks.section_id = ? ORDER BY marks.subject_id", array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->result_array();

        $pos = $this->get_student_position($school_id, $student_id, $session_id, $term, $class_id, $section_id, true);

        $init_post_arr = array(
            'pos' => $pos,
        );

        //fourth row
        $avr = 0;
        $cumm_average = 0;
        $result_query = "SELECT COUNT(marks.subject_id) AS subj_offered, SUM(marks.mark_obtained) AS total_score, AVG(marks.mark_obtained) AS average, (SELECT COUNT(enrols.student_id) AS student FROM enrols WHERE enrols.school_id = $school_id AND enrols.class_id = $class_id AND enrols.section_id = $section_id AND enrols.session = $session_id) AS class_size FROM users INNER JOIN students ON users.id = students.user_id INNER JOIN marks ON students.id = marks.student_id WHERE marks.school_id = ? AND marks.student_id = ? AND marks.session = ? AND marks.term = ? AND marks.class_id = ? AND marks.section_id = ?";
        if ($term == 3) {
            $position_data = $this->db->query($result_query, array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->row();
            for ($i = 1; $i <= 3; $i++) {
                $avr += $this->db->query($result_query, array($school_id, $student_id, $session_id, $i, $class_id, $section_id))->row('average');
            }
            $cumm_average = round(($avr / 3), 2);
        } else {
            $position_data = $this->db->query($result_query, array($school_id, $student_id, $session_id, $term, $class_id, $section_id))->row();
        }

        //attendance data
        $attendance['total'] = ($this->db->get_where('daily_attendances', array('school_id' => $school_id, 'student_id' => $student_id, 'session_id' => $session_id, 'class_id' => $class_id, 'section_id' => $section_id))->num_rows());

        $attendance['present'] = ($this->db->get_where('daily_attendances', array('school_id' => $school_id, 'student_id' => $student_id, 'session_id' => $session_id, 'class_id' => $class_id, 'section_id' => $section_id, 'status' => 1))->num_rows());

        $attendance['absent'] = ($this->db->get_where('daily_attendances', array('school_id' => $school_id, 'student_id' => $student_id, 'session_id' => $session_id, 'class_id' => $class_id, 'section_id' => $section_id, 'status' => 0))->num_rows());
        //attendance data

        //Class teacher data
        $class_teacher = $this->db->query("SELECT users.name AS teacher FROM users INNER JOIN teachers ON teachers.user_id = users.id INNER JOIN teacher_permissions ON teacher_permissions.teacher_id = teachers.id WHERE teachers.school_id = 1 AND teacher_permissions.class_id = 1 AND teacher_permissions.section_id = 1 AND (teacher_permissions.marks = 1 OR teacher_permissions.attendance = 1)")->row('teacher');
        //Class teacher data

        $position_data = (array) $position_data;

        $final_pos = array_merge($position_data, $init_post_arr);

        if ($ins == "android") {
            $school_logo = get_school_logo($user_id);
            // Generate Result PDF file format
            $data = $this->reportsheet_format("<div>Hello</div>", $params, compact('school', 'student', 'results', 'final_pos', 'attendance', 'class_teacher', 'cumm_average', 'school_logo', 'ins'), $ins, $user_id);
            $pdf_url = $data;

            $school = empty($school) ? null : $school;
            $student = empty($student) ? null : $student;
            $results = empty($results) ? null : $results;
            $final_pos = empty($final_pos) ? null : $final_pos;
            $attendance = empty($attendance) ? null : $attendance;
            $class_teacher = empty($class_teacher) ? null : $class_teacher;
            $pdf_url = empty($pdf_url) ? null : $pdf_url;

            return compact('school', 'student', 'results', 'final_pos', 'attendance', 'class_teacher', 'pdf_url');
        } else if ($ins == "web") {
            $school_logo = get_school_logo($user_id);

            if ($download == "true") {
                $ins_one = "web";
                $ins = "android";

                $paper_height = ((count($results) * 35) + 690);

                // Generate Result HTML file format
                $data = $this->reportsheet_format("<div>Hello</div>", $params, compact('school', 'student', 'results', 'final_pos', 'attendance', 'class_teacher', 'cumm_average', 'school_logo', 'ins'), $ins_one, $user_id);
                $html = $data;

                // Load pdf library
                $this->load->library('pdf');

                // Load HTML content
                $this->pdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation OGH:690
                // $this->pdf->setPaper('A4', 'portrait');

                // (Optional) Setup the paper size and orientation OGH:690
                $this->pdf->setPaper(array(0, 0, 695, $paper_height));

                // Render the HTML as PDF
                $this->pdf->render();

                // Output the generated PDF (1 = download and 0 = preview)
                $this->pdf->stream("Result.pdf", array("Attachment" => 1));
            } else {
                $data = $this->reportsheet_format("<div>Hello</div>", $params, compact('school', 'student', 'results', 'final_pos', 'attendance', 'class_teacher', 'cumm_average', 'school_logo', 'ins'), $ins, $user_id);
                $html = $data;

                $download_url = current_url() . "/true";
                echo json_encode(compact('school', 'student', 'results', 'final_pos', 'attendance', 'class_teacher', 'download_url', 'html'));
            }
        } else if ($ins == "web-multiple") {
            $payload = file_get_contents("php://input", true);
            $payload = json_decode($payload, true);

            $ins_one = "web";
            $ins = "android";

            //Generate temporary directory
            //$temp_name = 'tempdir-' . $school_id . '-' . $class_id;

            $students = $payload['students'];
            // $class_name = $this->db->get_where('classes', array('id' => $class_id))->row('name');

            $i = 0;
            $html = "";
            foreach ($students as $student) {
                $res_det = $this->get_std_data($ins, $school_id, $student, $session_id, $term, $class_id, $section_id, $download = "false");

                $user_id = $res_det['user_id'];
                $school_logo = get_school_logo($user_id);

                $compact = array('school' => $res_det['school'], 'student' => $res_det['student'], 'results' => $res_det['results'], 'final_pos' => $res_det['final_pos'], 'attendance' => $res_det['attendance'], 'class_teacher' => $res_det['class_teacher'], 'cumm_average' => $res_det['cumm_average'], 'school_logo' => $school_logo, 'ins' => $res_det['ins']);

                // Generate Result HTML file format
                $data = $this->reportsheet_format("<div>Hello</div>", $params, $compact, $ins_one, $user_id);
                $html .= $data;
                $i++;
            }
            echo json_encode(array('status' => true, 'data' => json_encode($html), 'result_count' => $i));
        }
    }

    public function reportsheet_format($html = "", $std_data, $page_data, $ins, $user_id = "") {
        // Get output html
        //$html = $this->output->get_output();
        $data = "";
        $paper_height = ((count($page_data['results']) * 28) + 690);

        // Get the school active result template
        $result_template = $this->db->get_where('report_sheets', array('id' => get_settings('template_id', $user_id)))->row('name');

        // Load the template view
        $html = $this->load->view('reportsheets/' . $result_template, $page_data, true);

        // Fix encoding
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

        if ($ins == "android") {
            // Load pdf library
            $this->load->library('pdf');

            // Load HTML content
            $this->pdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation OGH:690
            $this->pdf->setPaper(array(0, 0, 695, $paper_height));

            // Render the HTML as PDF
            $this->pdf->render();

            // Output the generated PDF (1 = download and 0 = preview)
            //$this->pdf->stream("welcome.pdf", array("Attachment"=>1));

            $pdf_string = $this->pdf->output();

            $pdf_root = realpath('uploads/result-pdf');

            if (file_put_contents($pdf_root . "/result-" . $std_data[2] . "-" . $std_data[3] . "-" . $std_data[4] . ".pdf", $pdf_string)) {
                $url = "uploads/result-pdf/result-" . $std_data[2] . "-" . $std_data[3] . "-" . $std_data[4] . ".pdf";
                $data = $url;
            } else {
                $data = "Error uploading file";
            }
        } else if ($ins == "web") {
            $data = $html;
        }

        return $data;
    }

    public function delete_pdf() {
        $data = file_get_contents("php://input", true);
        $data = json_decode($data);

        if (unlink(realpath($data->file_name))) {
            $response = array(
                'status' => true,
                'message' => "File was deleted successfully",
            );
        } else {
            $response = array(
                'status' => false,
                'message' => "Error deleting file",
            );
        }

        echo json_encode($response);
    }

    public function bulk_result() {
        $data = file_get_contents("php://input", true);
        $data = json_decode($data);

        $html = "<div> Hello </div>";

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->pdf->loadHtml($html);

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("welcome.pdf", array("Attachment" => 1));

        //echo json_encode($data);
    }

}
