<?php
require_once 'config/connection.php';
require_once 'models/Lecturer.php';

class LecturerController
{
    private $lecturer;

    function __construct()
    {
        $this->lecturer = new Lecturer();
    }

    public function index()
    {
        $data_list = [];
        $data_to_edit = null;

        $this->lecturer->getLecturer();
        $data_list = $this->lecturer->fetchAll();
        
        if (isset($_GET['edit_id'])) {
            $this->lecturer->getLecturerById($_GET['edit_id']);
            $data_to_edit = $this->lecturer->fetch();
        }

        include 'views/layout/header.php';
        include 'views/lecturer.php';
        include 'views/layout/footer.php';
    }

    public function store($data)
    {
        $this->lecturer->add($data);
        header("Location: index.php?controller=lecturer&status=success_add");
    }

    public function update($data)
    {
        $this->lecturer->update($data);
        header("Location: index.php?controller=lecturer&status=success_edit");
    }

    public function delete($id)
    {
        $this->lecturer->delete($id);
        header("Location: index.php?controller=lecturer&status=success_delete");
    }
}
?>