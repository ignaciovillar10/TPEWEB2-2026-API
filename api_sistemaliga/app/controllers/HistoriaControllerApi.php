<?php

require_once 'app/models/Historia.model.php';

require_once 'app/models/Equipo.model.php';

class HistoriaControllerApi{


    private $model;


    public function __construct(){
         $this->model = new Historia();
         $this->modelEquipo = new Equipo();
    }



    public function getHistorias($req, $res) {
        $sortBy = null;
        $order = 'ASC';
        $historias = null;
        if(isset($req->query->sortBy) && $req->query->sortBy === 'fecha_fundacion'){
                $sortBy = 'fecha_fundacion';
            }


        if(isset($req->query->order)){
            $direction = strtoupper($req->query->order);
            if($direction === 'ASC'|| $direction === 'DESC'){
                $order = $direction;
            }
        }

        if(isset($req->query->fecha_fundacion)){
            $historias = $this->model->getAllFilterByFecha();
        }else{

            if($sortBy){
                $historias = $this->model->getAllSorted($sortBy,$order);
            }else{
                $historias = $this->model->getAll();
            }

        }
        return $res->json($historias,200);
           
    }


    public function getHistoriaById($req,$res) {
        if (empty($req->params->id)) {
            return $res->json('Faltan datos', 400);
        }
        $historia = $this->model->get($req->params->id);
        if($historia){
            return $res->json($historia,200);
        }else{
            return $res->json("La historia no existe",404);
        }
    }

    public function insertHistoria($req, $res) {

        if (empty($req->body->titulo) || empty($req->body->historia) || empty($req->body->id_equipo)) {
            return $res->json('Faltan datos', 400);
        }
        $titulo = $req->body->titulo;
        $historia = $req->body->historia;
        $id_equipo = $req->body->id_equipo;

        $equipo = $this->modelEquipo->get($id_equipo);


        if($equipo){
            $this->model->create($id_equipo, $titulo, $historia);
        }
        else{
            return $res->json("El equipo no existe", 400); 
        }

        return $res->json("Se agrego la historia", 201); 
    }


    public function updateHistoriaById($req, $res) {
        if (empty($req->params->id) || empty($req->body->titulo) || empty($req->body->historia)||empty($req->body->fecha_fundacion) ||empty($req->body->id_equipo)) {
            return $res->json('Faltan datos', 400);
        }
        $id_historia = $req->params->id;
        $titulo = $req->body->titulo;
        $historia = $req->body->historia;
        $id_equipo = $req->body->id_equipo;
        $fecha_fundacion = $req->body->fecha_fundacion;
        $equipo = $this->modelEquipo->get($id_equipo);
        $existeHistoria = $this->model->get($id_historia);

        if($equipo == null){
            return $res->json("El equipo no existe",400);
        }

        if($existeHistoria){
            $this->model->update($id_historia, $titulo, $historia, $fecha_fundacion, $id_equipo);
            return $res->json("Se actualizo la historia", 200);
        }else{
            return $res->json("La historia no existe",404);
        }
    }

}

?>