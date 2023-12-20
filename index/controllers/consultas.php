<?php
    include("conexion.php");
    class Consultas{
        public function get_nosotros(){
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$sql = "SELECT * FROM nosotros";
			$result = $conexion->prepare($sql);
            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
		}
        public function tDoc(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM tipodocumento";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function genero(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM genero";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function poblacion(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM poblacion";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function ConsultarRegCurso($idcurso){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT co.nombre,co.codigo, co.tCurso,co.id_jornada, tc.tipoCurso, jor.nombrejor
            FROM convocatorias AS co
            INNER JOIN tipocurso AS tc ON tc.id=co.tCurso
            INNER JOIN jornada AS jor ON jor.id=co.id_jornada
             WHERE co.codigo=$idcurso";
            

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function get_depa(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM departamentos ORDER BY nombreDepartamento ASC";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function contacto($nombres,$apellidos,$correo,$celular,$asunto,$mensaje,$fecha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO `safiro`.`contacto` (`nombres`,`apellidos`,`correo`,`celular`,`asunto`,`mensaje`,`fecha`)
            VALUES ('$nombres', '$apellidos', '$correo', $celular, '$asunto', '$mensaje','$fecha')";
       
            $result = $conexion->prepare($sql);
            
            $result->execute();
            // $resultado = false;
            return $result;
        }

        public function mostrarjornada(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM jornada";
            

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function get_convocatorias(){
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$sql = "SELECT convocatorias.* ,tc.tipoCurso,j.nombrejor,per.nombre AS ninstructor,per.apellidos AS ainstructor FROM `convocatorias` 
            INNER JOIN tipocurso AS tc ON tc.id=tCurso
            INNER JOIN jornada AS j ON id_jornada=j.id 
            INNER JOIN person AS per ON  per.nDoc=nDoc_responsable";
			$result = $conexion->prepare($sql);
            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
		}

        public function testimonios(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, per.foto,per.nombre,per.apellidos,r.nombrerol FROM comentarios AS c INNER JOIN person AS per ON per.nDoc=c.nDocu INNER JOIN rol AS r ON per.rol=r.id WHERE per.foto != 'perfil.jpg' "; //ORDER BY rand() limit 1

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function SaveTestimonio($nombresTestimonio,$apellidosTestimonio,$ocupacionTestimonio,$comentarioTestimonio,$rutaFotoEditarSql){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO comentarios (`nombres`, `apellidos`, `ocupacion`, `comentario`, `foto`)
            VALUES ('$nombresTestimonio', '$apellidosTestimonio', '$ocupacionTestimonio', '$comentarioTestimonio', '$rutaFotoEditarSql')";
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            // $resultado = false;
            return $result;
        }

        public function galeria(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM galeria";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function eventos(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM eventos";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function contarAprendices(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) FROM person WHERE rol=2";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function contarCursos(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) FROM convocatorias";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function contarInstructores(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) FROM person WHERE rol=1";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarAprendicesConvocatorias(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) FROM registroconv WHERE rol=1";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadas(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) FROM jornada";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function ConsultarCurso($idcurso){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT convocatorias.nombre AS nomcur,convocatorias.codigo,convocatorias.id_jornada,convocatorias.fecha_inicio,convocatorias.fecha_fin,convocatorias.descripcion,convocatorias.foto, per.nombre, per.apellidos,per.numerocel, t.tipoCurso, j.nombrejor, COUNT(inscritos.convocatorias) 
			FROM convocatorias 
            INNER JOIN person AS per ON per.nDoc=nDoc_responsable 
            INNER JOIN tipocurso AS t ON t.id=tCurso 
            INNER JOIN jornada AS j ON j.id=id_jornada
            INNER JOIN registroconv AS inscritos ON inscritos.convocatorias=codigo
            WHERE convocatorias.id=$idcurso;";
            // var_dump($sql);
            // die();

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }


        // public function fechafin(){
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $sql = "SELECT fechaFinPromocion from curso where fechaFinPromocion > now()";

        //     $result = $conexion->prepare($sql);

        //     $result->execute();
        //     $resultado = false;
        //     while($f=$result->fetch()){
        //         $resultado[]=$f;
        //     }
        //     return $resultado;
        // }

        // public function fechafinMañana(){
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $sql = "SELECT fechaFinPromocion from curso where fechaFinPromocion >= now() AND jornada=1";

        //     $result = $conexion->prepare($sql);

        //     $result->execute();
        //      $resultado = false;
        //     while($f=$result->fetch()){
        //         $resultado[]=$f;
        //     }
        //     return $resultado;
        // }

        // public function fechafinTarde(){
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $sql = "SELECT fechaFinPromocion from curso where fechaFinPromocion >= now() AND jornada=2";

        //     $result = $conexion->prepare($sql);

        //     $result->execute();
        //      $resultado = false;
        //     while($f=$result->fetch()){
        //         $resultado[]=$f;
        //     }
        //     return $resultado;
        // }

        // public function fechafinNoche(){
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $sql = "SELECT fechaFinPromocion from curso where fechaFinPromocion >= now() AND jornada=3";

        //     $result = $conexion->prepare($sql);

        //     $result->execute();
        //      $resultado = false;
        //     while($f=$result->fetch()){
        //         $resultado[]=$f;
        //     }
        //     return $resultado;
        // }

        // public function fechafinFindesemana(){
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $sql = "SELECT fechaFinPromocion from curso where fechaFinPromocion >= now() AND jornada=4";

        //     $result = $conexion->prepare($sql);

        //     $result->execute();
        //      $resultado = false;
        //     while($f=$result->fetch()){
        //         $resultado[]=$f;
        //     }
        //     return $resultado;
        // }

        // public function fechafinVirtual(){
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $sql = "SELECT fechaFinPromocion from curso where fechaFinPromocion >= now() AND jornada=5";

        //     $result = $conexion->prepare($sql);

        //     $result->execute();
        //      $resultado = false;
        //     while($f=$result->fetch()){
        //         $resultado[]=$f;
        //     }
        //     return $resultado;
        // }



    }
?>