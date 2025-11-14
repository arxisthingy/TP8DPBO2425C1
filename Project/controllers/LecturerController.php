<?php
require_once 'config/connection.php';
require_once 'models/Lecturer.php';

// controller for lecturer
class LecturerController
{
    // lecturer model
    private $lecturer;

    // constructor
    function __construct()
    {
        $this->lecturer = new Lecturer();
    }

    // method to display list of lecturers and handle edit requests
    public function index()
    {
        // initialize variables
        $data_list = [];
        $data_to_edit = null;

        // fetch all lecturers
        $this->lecturer->getLecturer();
        $data_list = $this->lecturer->fetchAll();
        
        // check if edit_id is set for editing a lecturer
        if (isset($_GET['edit_id'])) {
            $this->lecturer->getLecturerById($_GET['edit_id']);
            $data_to_edit = $this->lecturer->fetch();
        }

        // views
        include 'views/layout/header.php';
        include 'views/lecturer.php';
        include 'views/layout/footer.php';
    }

    // method to store a new lecturer
    public function store($data)
    {
        $this->lecturer->add($data);
        header("Location: index.php?controller=lecturer&status=success_add");
    }

    // method to update an existing lecturer
    public function update($data)
    {
        $this->lecturer->update($data);
        header("Location: index.php?controller=lecturer&status=success_edit");
    }

    // method to delete a lecturer
    public function delete($id)
    {
        $this->lecturer->delete($id);
        header("Location: index.php?controller=lecturer&status=success_delete");
    }
}
?>