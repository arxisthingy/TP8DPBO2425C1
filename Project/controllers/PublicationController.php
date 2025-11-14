<?php
require_once 'config/connection.php';
require_once 'models/Publication.php';
require_once 'models/Lecturer.php';

class PublicationController
{
    private $publication;
    private $lecturer;

    function __construct()
    {
        $this->publication = new Publication();
        $this->lecturer = new Lecturer();
    }

    public function index()
    {
        $data_list = [];
        $data_to_edit = null;
        $lecturers = [];

        $this->publication->getPublication();
        $data_list = $this->publication->fetchAll();

        $this->lecturer->getLecturer();
        $lecturers = $this->lecturer->fetchAll();
        
        if (isset($_GET['edit_id'])) {
            $this->publication->getPublicationById($_GET['edit_id']);
            $data_to_edit = $this->publication->fetch();
        }

        include 'views/layout/header.php';
        include 'views/publication.php';
        include 'views/layout/footer.php';
    }

    public function store($data)
    {
        $this->publication->add($data);
        header("Location: index.php?controller=publication&status=success_add");
    }

    public function update($data)
    {
        $this->publication->update($data);
        header("Location: index.php?controller=publication&status=success_edit");
    }

    public function delete($id)
    {
        $this->publication->delete($id);
        header("Location: index.php?controller=publication&status=success_delete");
    }
}
?>