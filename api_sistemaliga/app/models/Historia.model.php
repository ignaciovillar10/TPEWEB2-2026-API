<?php
require_once 'app/config/config.php';
class Historia {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM historia_equipo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getAllSorted($column,$order){
        $query = $this->db->prepare("SELECT * FROM historia_equipo ORDER BY $column $order");
        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllFilterByFecha() {
        $query = $this->db->query('SELECT * FROM historia_equipo ORDER BY fecha_fundacion');
        return $query->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function get($id) {
        $stmt = $this->db->prepare('SELECT * FROM historia_equipo WHERE id_historia = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($id_equipo, $titulo, $historia) {
        $stmt = $this->db->prepare('INSERT INTO historia_equipo (id_equipo, titulo, historia) VALUES (?, ?,?)');
        return $stmt->execute([$id_equipo, $titulo, $historia]);
    }
    public function update($id_historia, $titulo, $historia, $fecha_fundacion, $id_equipo) {
        $stmt = $this->db->prepare('UPDATE historia_equipo SET titulo = ?, historia = ?, fecha_fundacion=? , id_equipo = ? WHERE id_historia = ?');

        return $stmt->execute([$titulo, $historia, $fecha_fundacion, $id_equipo,$id_historia]);
    }
}
