<?php

    class PersonaController{
        private $model;
        public function __construct()
        {
            require_once("c://laragon/www/CRUD_APRENDICES/Models/PersonaModel.php");
            $this->model = new Persona();
        }

        public function guardar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $id_tipo_documento, $n_documento, $id_g_sanguineo, $id_f_sanguineo, $id_genero, $id_programa){
            $id = $this->model->crearPersona($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $id_tipo_documento, $n_documento, $id_g_sanguineo, $id_f_sanguineo, $id_genero, $id_programa);
            return ($id!=false) ? header("Location:show.php?id=" .$id) : header("Location:create.php");
        }

        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }

        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }

        public function update($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $id_tipo_documento, $n_documento, $id_g_sanguineo, $id_f_sanguineo, $id_genero, $id_programa) {
            return ($this->model->update($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $id_tipo_documento, $n_documento, $id_g_sanguineo, $id_f_sanguineo, $id_genero, $id_programa)) ? header("Location: show.php?id=" . $id) : header("Location: index.php");
        }
        

        public function delete($id){
            return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=".$id);
        }
    }

?>