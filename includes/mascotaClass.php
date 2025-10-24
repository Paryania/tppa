<?php
require_once __DIR__ . '/mysqliConn.php';

class MascotaClass
{
    private $mysqli;

    public function __construct()
    {
        $mgr = new ManagerMysqli();
        $this->mysqli = $mgr->getConnection();
    }

    /**
     * Resuelve owner id:
     * - Si $duenio es numérico, se considera ya un id y se devuelve.
     * - Si es string, busca en la tabla dueños el id donde nombre = $duenio.
     * Devuelve int id o 0 si no encuentra.
     */
    private function resolveOwnerId($duenio)
    {
        if (is_numeric($duenio) && intval($duenio) > 0) {
            return intval($duenio);
        }

        $ownerId = 0;
        $stmt = $this->mysqli->prepare("SELECT id FROM dueños WHERE nombre = ? LIMIT 1");
        if ($stmt) {
            $stmt->bind_param("s", $duenio);
            $stmt->execute();
            $stmt->bind_result($id);
            if ($stmt->fetch()) {
                $ownerId = intval($id);
            }
            $stmt->close();
        }
        return $ownerId;
    }

    /**
     * Obtiene mascotas del dueño (usa la columna `dueño_id`)
     */
    public function getByOwner($duenio)
    {
        $vd = [];
        $ownerId = $this->resolveOwnerId($duenio);
        if ($ownerId <= 0) {
            return $vd; // no hay owner encontrado
        }

        $sql = "SELECT id, nombre, raza, direccion, edad, genero, descripcion FROM mascotas WHERE `dueño_id` = ? ORDER BY id DESC";
        $stmt = $this->mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $ownerId);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $vd[] = $row;
            }
            $stmt->close();
        }
        return $vd;
    }

    /**
     * Agrega una mascota. Acepta $duenio (id o nombre).
     * Campos opcionales: direccion, genero. Edad normalizada a int (0 si vacío).
     */
    public function addMascota($duenio, $nombre, $raza = '', $edad = 0, $descripcion = '', $direccion = '', $genero = '')
    {
        $ownerId = $this->resolveOwnerId($duenio);
        if ($ownerId <= 0 || trim($nombre) === '') {
            return false;
        }

        $edad = intval($edad);
        $stmt = $this->mysqli->prepare("INSERT INTO mascotas (`dueño_id`, nombre, raza, direccion, edad, genero, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("isssiss", $ownerId, $nombre, $raza, $direccion, $edad, $genero, $descripcion);
            $res = $stmt->execute();
            $stmt->close();
            return $res;
        }
        return false;
    }

    /**
     * Actualiza una mascota, solo si pertenece al dueño.
     */
    public function updateMascota($id, $duenio, $nombre, $raza = '', $edad = 0, $descripcion = '', $direccion = '', $genero = '')
    {
        $ownerId = $this->resolveOwnerId($duenio);
        $id = intval($id);
        if ($ownerId <= 0 || $id <= 0 || trim($nombre) === '') {
            return false;
        }

        $edad = intval($edad);
        $stmt = $this->mysqli->prepare("UPDATE mascotas SET nombre = ?, raza = ?, direccion = ?, edad = ?, genero = ?, descripcion = ? WHERE id = ? AND `dueño_id` = ?");
        if ($stmt) {
            $stmt->bind_param("sssissii", $nombre, $raza, $direccion, $edad, $genero, $descripcion, $id, $ownerId);
            $res = $stmt->execute();
            $stmt->close();
            return $res;
        }
        return false;
    }

    /**
     * Elimina una mascota (solo si pertenece al dueño).
     */
    public function deleteMascota($id, $duenio)
    {
        $ownerId = $this->resolveOwnerId($duenio);
        $id = intval($id);
        if ($ownerId <= 0 || $id <= 0) {
            return false;
        }

        $stmt = $this->mysqli->prepare("DELETE FROM mascotas WHERE id = ? AND `dueño_id` = ?");
        if ($stmt) {
            $stmt->bind_param("ii", $id, $ownerId);
            $res = $stmt->execute();
            $stmt->close();
            return $res;
        }
        return false;
    }

    public function __destruct()
    {
        if ($this->mysqli) {
            $this->mysqli->close();
        }
    }
}
?>