<?php
require_once 'app/config/config.php';
class Equipo {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    

    public function get($id) {
        $stmt = $this->db->prepare('SELECT * FROM equipos WHERE id_equipo = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
