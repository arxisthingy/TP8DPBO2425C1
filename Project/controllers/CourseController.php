<?php
require_once 'config/connection.php';
require_once 'models/Course.php';
require_once 'models/Lecturer.php';

class CourseController
{
    private $course;
    private $lecturer;

    function __construct()
    {
        $this->course = new Course();
        $this->lecturer = new Lecturer();
    }

    public function index()
    {
        $data_list = [];
        $data_to_edit = null;
        $lecturers = [];

        $this->course->getCourse();
        $data_list = $this->course->fetchAll();
        
        $this->lecturer->getLecturer();
        $lecturers = $this->lecturer->fetchAll();
        
        if (isset($_GET['edit_id'])) {
            $this->course->getCourseById($_GET['edit_id']);
            $data_to_edit = $this->course->fetch();
        }

        include 'views/layout/header.php';
        include 'views/course.php';
        include 'views/layout/footer.php';
    }

    public function store($data)
    {
        $this->course->add($data);
        header("Location: index.php?controller=course&status=success_add");
    }

    public function update($data)
    {
        $this->course->update($data);
        header("Location: index.php?controller=course&status=success_edit");
    }

    public function delete($id)
    {
        $this->course->delete($id);
        header("Location: index.php?controller=course&status=success_delete");
    }
}
?>