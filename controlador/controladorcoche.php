<?php
require_once 'modelo/coche.php';
class ControladorCoche
{
    private $modelocoche;
    public function __construct()
    {
        $this->modelocoche = new Coche();
    }

    public function listar()
    {
        $array = $this->modelocoche->listar();
        return $array;
    }

    public function index()
    {
        require_once 'vista/header.php';
        require_once 'vista/coche/coche.php';
    }

    public function crud()
    {
        $coche = new Coche();

        if (isset($_GET['id'])) {
            $coche = $this->modelocoche->getCoche($_GET['id']);
        }

        require_once 'vista/header.php';
        require_once 'vista/coche/cocheadd.php';
    }

    public function save()
    {
        $coche = new Coche();

        $coche->id = $_POST['id'];
        $coche->marca = $_POST['marca'];
        $coche->modelo = $_POST['modelo'];
        $coche->precio = $_POST['precio'];

        $coche->id > 0
            ? $this->modelocoche->update($coche)
            : $this->modelocoche->addCoche($coche);

        header('Location: index.php');
    }

    public function delete()
    {
        $this->modelocoche->eliminar($_GET['id']);
        header('Location: index.php');
    }
}
