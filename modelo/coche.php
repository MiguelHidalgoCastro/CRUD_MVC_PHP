<?php

class Coche
{
    private $conexion;
    public $id;
    public $marca;
    public $modelo;
    public $precio;

    public function __construct()
    {
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $sql = 'SELECT * FROM coches';
            $lista = $this->conexion->query($sql);
            $datos = $lista->fetchAll(PDO::FETCH_OBJ);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addCoche(Coche $data)
    {
        try {
            $sql = 'INSERT INTO coches (marca, modelo, precio) VALUES(:marca, :modelo, :precio)';
            $insert = $this->conexion->prepare($sql);
            $insert->bindParam(':marca', $data->marca, PDO::PARAM_STR);
            $insert->bindParam(':modelo', $data->modelo, PDO::PARAM_STR);
            if ($data->precio > 0)
                $insert->bindParam(':precio', $data->precio, PDO::PARAM_INT);
            else {
                $tmp = NULL;
                $insert->bindParam(':precio', $tmp, PDO::PARAM_STR);
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "<script>alert('Coche ya existente')
            window.location.href='index.php?c=coche&a=crud'</script>";
                exit;
            } else
                die($e->getMessage());
        }
    }

    public function getCoche($id)
    {
        try {
            $sql = "SELECT * FROM coches WHERE id = :id";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute(array(':id' => $id));
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update(Coche $data)
    {
        try {
            $sql = "UPDATE coches SET marca = :marca, modelo = :modelo, precio = :precio WHERE id = :id";
            $update = $this->conexion->prepare($sql);
            return $update->execute(array(':marca' => $data->marca, ':modelo' => $data->modelo, ':precio' => $data->precio, ':id' => $data->id));
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "<script>alert('Coche ya existente')
            window.location.href='index.php?c=coche&a=crud&id=" . $data->id . "'</script>";
                exit;
            } else
                die($e->getMessage());
        }
    }

    public function eliminar($id)
    {
        try {
            $sql = "DELETE FROM coches WHERE id = :id";
            $delete = $this->conexion->prepare($sql);
            return $delete->execute(array(':id' => $id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
