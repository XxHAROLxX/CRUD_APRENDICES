<?php
    class Persona {
        private $PDO;
        public function __construct()
        {
            require_once("c://laragon/www/CRUD_APRENDICES/Database/conexion.php");
            $con = new Database();
            $this->PDO = $con->conexion();
        }

        public function crearPersona($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $id_tipo_documento, $n_documento, $id_g_sanguineo, $id_f_sanguineo, $id_genero, $id_programa){
            $stmt = $this->PDO->prepare("INSERT INTO aprendices VALUES(null, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :fecha_nacimiento, :id_tipo_documento, :n_documento, :id_g_sanguineo, :id_f_sanguineo, :id_genero, :id_programa)");
            $stmt->bindParam(':primer_nombre', $primer_nombre); 
            $stmt->bindParam(':segundo_nombre', $segundo_nombre); 
            $stmt->bindParam(':primer_apellido', $primer_apellido); 
            $stmt->bindParam(':segundo_apellido', $segundo_apellido); 
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento); 
            $stmt->bindParam(':id_tipo_documento', $id_tipo_documento); 
            $stmt->bindParam(':n_documento', $n_documento); 
            $stmt->bindParam(':id_g_sanguineo', $id_g_sanguineo); 
            $stmt->bindParam(':id_f_sanguineo', $id_f_sanguineo); 
            $stmt->bindParam(':id_genero', $id_genero); 
            $stmt->bindParam(':id_programa', $id_programa); 

            return ($stmt->execute()) ? $this->PDO->lastInsertId() : false; 
        }

        public function show($id) {
            $stmt = $this->PDO->prepare("
                SELECT 
                    p.id AS id_persona,
                    p.primer_nombre, 
                    p.segundo_nombre, 
                    p.primer_apellido, 
                    p.segundo_apellido, 
                    p.fecha_nacimiento, 
                    td.tipo AS tipo_documento, 
                    p.n_documento, 
                    gs.grupo AS grupo_sanguineo, 
                    fs.factor AS factor_sanguineo, 
                    g.nombre_genero,
                    pf.id AS id_programa_formacion,
                    pf.programa
                FROM aprendices p
                JOIN tipos_documento td ON p.id_tipo_documento = td.id
                JOIN grupos_sanguineos gs ON p.id_g_sanguineo = gs.id
                JOIN factores_sanguineos fs ON p.id_f_sanguineo = fs.id
                JOIN generos g ON p.id_genero = g.id
                JOIN programas_formacion pf ON p.id_programa = pf.id
                WHERE p.id = :id
                LIMIT 1
            ");
            $stmt->bindParam(":id", $id);
            return ($stmt->execute()) ? $stmt->fetch() : false;
        }

        public function index(){
            $stmt = $this->PDO->prepare("SELECT 
                    p.id,
                    p.primer_nombre, 
                    p.segundo_nombre, 
                    p.primer_apellido, 
                    p.segundo_apellido, 
                    p.fecha_nacimiento, 
                    td.tipo AS tipo_documento, 
                    p.n_documento, 
                    gs.grupo AS grupo_sanguineo, 
                    fs.factor AS factor_sanguineo, 
                    g.nombre_genero,
                    pf.id AS id_programa_formacion,
                    pf.programa
                FROM aprendices p
                JOIN tipos_documento td ON p.id_tipo_documento = td.id
                JOIN grupos_sanguineos gs ON p.id_g_sanguineo = gs.id
                JOIN factores_sanguineos fs ON p.id_f_sanguineo = fs.id
                JOIN generos g ON p.id_genero = g.id
                JOIN programas_formacion pf ON p.id_programa = pf.id");
            return ($stmt->execute()) ? $stmt->fetchAll() : false;
        }

        public function update($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $id_tipo_documento, $n_documento, $id_g_sanguineo, $id_f_sanguineo, $id_genero, $id_programa) {
            try {
                $stmt = $this->PDO->prepare("UPDATE aprendices SET primer_nombre = :primer_nombre, segundo_nombre = :segundo_nombre, primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido, fecha_nacimiento = :fecha_nacimiento, id_tipo_documento = :id_tipo_documento, n_documento = :n_documento, id_g_sanguineo = :id_g_sanguineo, id_f_sanguineo = :id_f_sanguineo, id_genero = :id_genero, id_programa = :id_programa WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':primer_nombre', $primer_nombre);
                $stmt->bindParam(':segundo_nombre', $segundo_nombre);
                $stmt->bindParam(':primer_apellido', $primer_apellido);
                $stmt->bindParam(':segundo_apellido', $segundo_apellido);
                $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
                $stmt->bindParam(':id_tipo_documento', $id_tipo_documento);
                $stmt->bindParam(':n_documento', $n_documento);
                $stmt->bindParam(':id_g_sanguineo', $id_g_sanguineo);
                $stmt->bindParam(':id_f_sanguineo', $id_f_sanguineo);
                $stmt->bindParam(':id_genero', $id_genero);
                $stmt->bindParam(':id_programa', $id_programa);
        
                return $stmt->execute();
            } catch (PDOException $e) {
                error_log("Error en update: " . $e->getMessage());
                return false;
            }
        }

        public function delete($id){
            $stmt = $this->PDO->prepare("DELETE FROM aprendices WHERE id = :id");
            $stmt->bindParam(":id",$id);
            return ($stmt->execute()) ? true : false ;
        }
    }
?>