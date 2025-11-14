<?php
require_once 'config/connection.php';
require_once 'models/Publication.php';
require_once 'models/Lecturer.php';

// controller for publication
class PublicationController
{
    // publication and lecturer models
    private $publication;
    private $lecturer;

    // contsrutctor
    function __construct()
    {
        $this->publication = new Publication();
        $this->lecturer = new Lecturer();
    }

    // method to display the list of publications and handle edit requests
    public function index()
    {
        //  initialize variables
        $data_list = [];
        $data_to_edit = null;
        $lecturers = [];

        // fetch all publications and lecturers
        $this->publication->getPublication();
        $data_list = $this->publication->fetchAll();

        // fetch lecturers for dropdown
        $this->lecturer->getLecturer();
        $lecturers = $this->lecturer->fetchAll();
        

        // check if edit_id is set for editing a publication
        if (isset($_GET['edit_id'])) {
            $this->publication->getPublicationById($_GET['edit_id']);
            $data_to_edit = $this->publication->fetch();
        }

        // views
        include 'views/layout/header.php';
        include 'views/publication.php';
        include 'views/layout/footer.php';
    }

    // method to store a new publication
    public function store($data)
    {
        $this->publication->add($data);
        header("Location: index.php?controller=publication&status=success_add");
    }

    // method to update an existing publication
    public function update($data)
    {
        $this->publication->update($data);
        header("Location: index.php?controller=publication&status=success_edit");
    }

    // method to delete a publication
    public function delete($id)
    {
        $this->publication->delete($id);
        header("Location: index.php?controller=publication&status=success_delete");
    }
}
?>