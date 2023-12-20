<?php
    include("conexion.php");
    class Consultas{
        public function salir(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
            session_destroy();
            
            echo "<script>location.href='../../index/index.php'</script>";
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
        public function contarAprendices(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) AS contar FROM person WHERE rol=2";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarAprendicesInstructor($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(reg.id) AS contar FROM registroconv AS reg 
            INNER JOIN convocatorias AS c ON reg.convocatorias=c.codigo 
            WHERE c.nDoc_responsable=$ndoc";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarConvocatoriasInstructor($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) AS contar FROM convocatorias WHERE nDoc_responsable=$ndoc";
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadasInstructordia($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS contar 
            FROM convocatorias AS c 
            WHERE c.nDoc_responsable=$ndoc AND c.id_jornada=1";

            // var_dump($sql);
            // die();
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadasInstructortarde($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS contar 
            FROM convocatorias AS c 
            WHERE c.nDoc_responsable=$ndoc AND c.id_jornada=2";

            // var_dump($sql);
            // die();
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadasInstructornoche($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS contar 
            FROM convocatorias AS c 
            WHERE c.nDoc_responsable=$ndoc AND c.id_jornada=3";

            // var_dump($sql);
            // die();
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadasInstructorvirtual($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS contar 
            FROM convocatorias AS c 
            WHERE c.nDoc_responsable=$ndoc AND c.id_jornada=4";

            // var_dump($sql);
            // die();
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadasInstructorfds($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS contar 
            FROM convocatorias AS c 
            WHERE c.nDoc_responsable=$ndoc AND c.id_jornada=5";

            // var_dump($sql);
            // die();
        
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
            $sql = "SELECT COUNT(id) AS contar FROM person WHERE rol=1";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarCoordinadores(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(id) AS contar FROM person WHERE rol=3";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarConvocatorias(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM convocatorias";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contar1(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM person WHERE rol= 2 AND genero=1";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contar2(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM person WHERE rol= 2 AND genero=2";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contar3(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM person WHERE rol= 2 AND genero=3";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarTecnologo(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.tCurso=2;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarTecnico(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.tCurso=1;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarComplementario(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.tCurso=3;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadaDia(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) AS contar from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.id_jornada=1;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadaTarde(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) AS contar from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.id_jornada=2;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadaNoche(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) AS contar from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.id_jornada=3;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadaVirtual(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) AS contar from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.id_jornada=4;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function contarJornadaFds(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(r.id) AS contar from registroconv as r INNER JOIN convocatorias as c ON r.convocatorias=c.codigo WHERE c.id_jornada=5;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }


        

        public function regitrosmeses($año){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $enero = 1;
            $febrero = 2;
            $marzo = 3;
            $abril = 4;
            $mayo = 5;
            $junio = 6;
            $julio = 7;
            $agosto = 8;
            $septiembre = 9;
            $octubre = 10;
            $noviembre = 11;
            $diciembre = 12;
            $sql = "SELECT COUNT(id) as enero FROM person WHERE month(fechaper) = :enero AND year(fechaper) = $año;
            SELECT COUNT(id) as febrero FROM person WHERE month(fechaper) = :febrero AND year(fechaper) = $año;
            SELECT COUNT(id) as marzo FROM person WHERE month(fechaper) = :marzo AND year(fechaper) = $año;
            SELECT COUNT(id) as abril FROM person WHERE month(fechaper) = :abril AND year(fechaper) = $año;
            SELECT COUNT(id) as mayo FROM person WHERE month(fechaper) = :mayo AND year(fechaper) = $año;
            SELECT COUNT(id) as junio FROM person WHERE month(fechaper) = :junio AND year(fechaper) = $año;
            SELECT COUNT(id) as julio FROM person WHERE month(fechaper) = :julio AND year(fechaper) = $año;
            SELECT COUNT(id) as agosto FROM person WHERE month(fechaper) = :agosto AND year(fechaper) = $año;
            SELECT COUNT(id) as septiembre FROM person WHERE month(fechaper) = :septiembre AND year(fechaper) = $año;
            SELECT COUNT(id) as octubre FROM person WHERE month(fechaper) = :octubre AND year(fechaper) = $año;
            SELECT COUNT(id) as noviembre FROM person WHERE month(fechaper) = :noviembre AND year(fechaper) = $año;
            SELECT COUNT(id) as diciembre FROM person WHERE month(fechaper) = :diciembre AND year(fechaper) = $año;";

            $result = $conexion->prepare($sql);
            $result->bindParam(":enero", $enero , PDO::PARAM_INT);
            $result->bindParam(":febrero", $febrero, PDO::PARAM_INT);
            $result->bindParam(":marzo", $marzo, PDO::PARAM_INT);
            $result->bindParam(":abril", $abril, PDO::PARAM_INT);
            $result->bindParam(":mayo", $mayo, PDO::PARAM_INT);
            $result->bindParam(":junio", $junio, PDO::PARAM_INT);
            $result->bindParam(":julio", $julio, PDO::PARAM_INT);
            $result->bindParam(":agosto", $agosto, PDO::PARAM_INT);
            $result->bindParam(":septiembre", $septiembre, PDO::PARAM_INT);
            $result->bindParam(":octubre", $octubre, PDO::PARAM_INT);
            $result->bindParam(":noviembre", $noviembre, PDO::PARAM_INT);
            $result->bindParam(":diciembre", $diciembre, PDO::PARAM_INT);
            $result->execute();

            do{
                $datos = $result->fetchAll();
                $resultado[] = $datos;
            }while($result->nextRowset());

            return  $resultado;
        }
        public function comentariosmeses($año){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $enero = 1;
            $febrero = 2;
            $marzo = 3;
            $abril = 4;
            $mayo = 5;
            $junio = 6;
            $julio = 7;
            $agosto = 8;
            $septiembre = 9;
            $octubre = 10;
            $noviembre = 11;
            $diciembre = 12;
            $sql = "SELECT COUNT(id) as enero FROM comentarios WHERE month(fecha) = :enero AND year(fecha) = $año;
            SELECT COUNT(id) as febrero FROM comentarios WHERE month(fecha) = :febrero AND year(fecha) = $año;
            SELECT COUNT(id) as marzo FROM comentarios WHERE month(fecha) = :marzo AND year(fecha) = $año;
            SELECT COUNT(id) as abril FROM comentarios WHERE month(fecha) = :abril AND year(fecha) = $año;
            SELECT COUNT(id) as mayo FROM comentarios WHERE month(fecha) = :mayo AND year(fecha) = $año;
            SELECT COUNT(id) as junio FROM comentarios WHERE month(fecha) = :junio AND year(fecha) = $año;
            SELECT COUNT(id) as julio FROM comentarios WHERE month(fecha) = :julio AND year(fecha) = $año;
            SELECT COUNT(id) as agosto FROM comentarios WHERE month(fecha) = :agosto AND year(fecha) = $año;
            SELECT COUNT(id) as septiembre FROM comentarios WHERE month(fecha) = :septiembre AND year(fecha) = $año;
            SELECT COUNT(id) as octubre FROM comentarios WHERE month(fecha) = :octubre AND year(fecha) = $año;
            SELECT COUNT(id) as noviembre FROM comentarios WHERE month(fecha) = :noviembre AND year(fecha) = $año;
            SELECT COUNT(id) as diciembre FROM comentarios WHERE month(fecha) = :diciembre AND year(fecha) = $año;";

            

            $result = $conexion->prepare($sql);
            $result->bindParam(":enero", $enero , PDO::PARAM_INT);
            $result->bindParam(":febrero", $febrero, PDO::PARAM_INT);
            $result->bindParam(":marzo", $marzo, PDO::PARAM_INT);
            $result->bindParam(":abril", $abril, PDO::PARAM_INT);
            $result->bindParam(":mayo", $mayo, PDO::PARAM_INT);
            $result->bindParam(":junio", $junio, PDO::PARAM_INT);
            $result->bindParam(":julio", $julio, PDO::PARAM_INT);
            $result->bindParam(":agosto", $agosto, PDO::PARAM_INT);
            $result->bindParam(":septiembre", $septiembre, PDO::PARAM_INT);
            $result->bindParam(":octubre", $octubre, PDO::PARAM_INT);
            $result->bindParam(":noviembre", $noviembre, PDO::PARAM_INT);
            $result->bindParam(":diciembre", $diciembre, PDO::PARAM_INT);
            $result->execute();

            do{
                $datos = $result->fetchAll();
                
                $resultado[] = $datos;
            }while($result->nextRowset());

            return  $resultado;
        }
        public function contactomeses($año){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $enero = 1;
            $febrero = 2;
            $marzo = 3;
            $abril = 4;
            $mayo = 5;
            $junio = 6;
            $julio = 7;
            $agosto = 8;
            $septiembre = 9;
            $octubre = 10;
            $noviembre = 11;
            $diciembre = 12;
            $sql = "SELECT COUNT(id) as enero FROM contacto WHERE month(fecha) = :enero AND year(fecha) = $año;
            SELECT COUNT(id) as febrero FROM contacto WHERE month(fecha) = :febrero AND year(fecha) = $año;
            SELECT COUNT(id) as marzo FROM contacto WHERE month(fecha) = :marzo AND year(fecha) = $año;
            SELECT COUNT(id) as abril FROM contacto WHERE month(fecha) = :abril AND year(fecha) = $año;
            SELECT COUNT(id) as mayo FROM contacto WHERE month(fecha) = :mayo AND year(fecha) = $año;
            SELECT COUNT(id) as junio FROM contacto WHERE month(fecha) = :junio AND year(fecha) = $año;
            SELECT COUNT(id) as julio FROM contacto WHERE month(fecha) = :julio AND year(fecha) = $año;
            SELECT COUNT(id) as agosto FROM contacto WHERE month(fecha) = :agosto AND year(fecha) = $año;
            SELECT COUNT(id) as septiembre FROM contacto WHERE month(fecha) = :septiembre AND year(fecha) = $año;
            SELECT COUNT(id) as octubre FROM contacto WHERE month(fecha) = :octubre AND year(fecha) = $año;
            SELECT COUNT(id) as noviembre FROM contacto WHERE month(fecha) = :noviembre AND year(fecha) = $año;
            SELECT COUNT(id) as diciembre FROM contacto WHERE month(fecha) = :diciembre AND year(fecha) = $año;";

            

            $result = $conexion->prepare($sql);
            $result->bindParam(":enero", $enero , PDO::PARAM_INT);
            $result->bindParam(":febrero", $febrero, PDO::PARAM_INT);
            $result->bindParam(":marzo", $marzo, PDO::PARAM_INT);
            $result->bindParam(":abril", $abril, PDO::PARAM_INT);
            $result->bindParam(":mayo", $mayo, PDO::PARAM_INT);
            $result->bindParam(":junio", $junio, PDO::PARAM_INT);
            $result->bindParam(":julio", $julio, PDO::PARAM_INT);
            $result->bindParam(":agosto", $agosto, PDO::PARAM_INT);
            $result->bindParam(":septiembre", $septiembre, PDO::PARAM_INT);
            $result->bindParam(":octubre", $octubre, PDO::PARAM_INT);
            $result->bindParam(":noviembre", $noviembre, PDO::PARAM_INT);
            $result->bindParam(":diciembre", $diciembre, PDO::PARAM_INT);
            $result->execute();

            do{
                $datos = $result->fetchAll();
                
                $resultado[] = $datos;
            }while($result->nextRowset());

            return  $resultado;
        }
        public function hombres(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(genero) from person WHERE genero=1;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function mujeres(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(genero) from person WHERE genero=2;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function indefinidos(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(genero) from person WHERE genero=3;";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function adminhombres(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS masculinos from comentarios AS c 
            INNER JOIN person AS p ON p.nDoc=c.nDocu WHERE p.genero=1;";

            // var_dump($sql);
            // die();

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function adminmujeres(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS femenina from comentarios AS c 
            INNER JOIN person AS p ON p.nDoc=c.nDocu WHERE p.genero=2;";

            // var_dump($sql);
            // die();

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function adminindefinidos(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT COUNT(c.id) AS indefinidos from comentarios AS c 
            INNER JOIN person AS p ON p.nDoc=c.nDocu WHERE p.genero=3;";

            // var_dump($sql);
            // die();

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function meses(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM meses";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function estructuraexcel($ficha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT estructuracurri.*,tc.TEnombre, c.nDoc_responsable, c.fecha_inicio, c.fecha_fin, i.nombre AS nomins, i.apellidos AS apeins, tic.tipoCurso, c.tCurso , c.nombre AS nomcur, j.nombrejor fROM  estructuracurri
            INNER JOIN tipoestructura AS tc ON tCompetencia=tc.id
            INNER JOIN convocatorias AS c ON c.codigo=estructuracurri.ficha
            INNER JOIN tipocurso AS tic ON tic.id=c.tCurso 
            INNER JOIN jornada AS j ON j.id=c.id_jornada
            INNER JOIN person AS i ON i.nDoc=c.nDoc_responsable
            WHERE ficha=$ficha ORDER BY  estructuracurri.tCompetencia ASC";
            // var_dump($sql);
            // die();
            // SELECT convocatorias.*,tc.tipoCurso,j.nombrejor,per.nombre AS ninstructor,per.apellidos AS ainstructor FROM `convocatorias`
            // INNER JOIN tipocurso AS tc ON tCurso=tc.id 
            // INNER JOIN jornada AS j ON id_jornada=j.id 
            // INNER JOIN person AS per ON  per.nDoc=nDoc_responsable
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportefechasAprendicess($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT per.*,g.nombregen, td.nombretd,p.nombrepob, r.nombrerol, de.nombreDepartamento , ci.nombreCiudad 
            FROM person AS per
            LEFT JOIN genero AS g ON per.genero=g.id 
            LEFT JOIN tipodocumento AS td ON per.tDoc=td.id 
            LEFT JOIN poblacion AS p ON per.tpoblacion=p.id 
            LEFT JOIN rol AS r ON per.rol=r.id 
            LEFT JOIN departamentos AS de ON per.id_depa=de.codigoDepartamento 
            LEFT JOIN ciudad AS ci ON per.id_muni=ci.codigoCiudad WHERE rol=2 AND fechaper BETWEEN '$fechainicio' AND '$fechafin'";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportegenero($genero){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT per.*, td.nombretd, r.nombrerol, de.nombreDepartamento , ci.nombreCiudad, g.nombregen, p.nombrepob
            FROM person AS per 
            LEFT JOIN tipodocumento AS td ON per.tDoc=td.id 
            LEFT JOIN rol AS r ON per.rol=r.id 
            LEFT JOIN genero AS g ON per.genero=g.id
            LEFT JOIN poblacion AS p ON per.tpoblacion=p.id
            LEFT JOIN departamentos AS de ON per.id_depa=de.codigoDepartamento 
            LEFT JOIN ciudad AS ci ON per.id_muni=ci.codigoCiudad WHERE per.genero=$genero AND per.rol=2";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reporteficha($ficha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,c.fecha_fin,
            c.nombre as nombrecur, tipo.tipocurso,p.tpoblacion, pobla.nombrepob, depa.nombreDepartamento,ciu.nombreCiudad,tipodo.nombretd,g.nombregen 
            FROM registroconv AS registro
            INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
            INNER JOIN convocatorias AS c ON c.codigo=registro.convocatorias
            INNER JOIN tipocurso AS tipo ON tipo.id=p.tDoc
            INNER JOIN genero AS g ON g.id=p.genero
            INNER JOIN poblacion AS pobla ON pobla.id=p.tpoblacion
            INNER JOIN departamentos AS depa ON depa.codigoDepartamento=p.id_depa
            INNER JOIN ciudad AS ciu ON ciu.codigoCiudad=p.id_muni
            INNER JOIN tipodocumento AS tipodo ON tipodo.id=p.tDoc
            WHERE convocatorias=$ficha";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reporteLugar($departamento,$Ciudad){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT per.*, td.nombretd, r.nombrerol, de.nombreDepartamento , ci.nombreCiudad ,g.nombregen,p.nombrepob
            FROM person AS per 
            LEFT JOIN tipodocumento AS td ON per.tDoc=td.id 
            LEFT JOIN rol AS r ON per.rol=r.id 
            LEFT JOIN genero AS g ON per.genero=g.id 
            LEFT JOIN poblacion AS p ON per.tpoblacion=p.id 
            LEFT JOIN departamentos AS de ON per.id_depa=de.codigoDepartamento 
            LEFT JOIN ciudad AS ci ON per.id_muni=ci.codigoCiudad WHERE per.rol=2 AND per.id_depa=$departamento AND per.id_muni=$Ciudad";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reporteJornada($jornada){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,c.fecha_fin,
            c.nombre as nombrecur, tipo.tipocurso,p.tpoblacion, pobla.nombrepob, depa.nombreDepartamento,ciu.nombreCiudad,tipodo.nombretd, g.nombregen, j.nombrejor
            FROM registroconv AS registro
            INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
            INNER JOIN convocatorias AS c ON c.codigo=registro.convocatorias
            INNER JOIN tipocurso AS tipo ON tipo.id=p.tDoc
            INNER JOIN genero AS g ON g.id=p.genero
            INNER JOIN jornada AS j ON j.id=c.id_jornada
            INNER JOIN poblacion AS pobla ON pobla.id=p.tpoblacion
            INNER JOIN departamentos AS depa ON depa.codigoDepartamento=p.id_depa
            INNER JOIN ciudad AS ciu ON ciu.codigoCiudad=p.id_muni
            INNER JOIN tipodocumento AS tipodo ON tipodo.id=p.tDoc
            WHERE c.id_jornada=$jornada";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportetipoDeCurso($tipoDeCurso){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,c.fecha_fin,
            c.nombre as nombrecur, tipo.tipoCurso,p.tpoblacion, pobla.nombrepob, depa.nombreDepartamento,ciu.nombreCiudad,tipodo.nombretd,g.nombregen
            FROM registroconv AS registro
            INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
            INNER JOIN convocatorias AS c ON c.codigo=registro.convocatorias
            INNER JOIN tipocurso AS tipo ON tipo.id=c.tCurso
            INNER JOIN genero AS g ON g.id=p.genero
            INNER JOIN poblacion AS pobla ON pobla.id=p.tpoblacion
            INNER JOIN departamentos AS depa ON depa.codigoDepartamento=p.id_depa
            INNER JOIN ciudad AS ciu ON ciu.codigoCiudad=p.id_muni 
            INNER JOIN tipodocumento AS tipodo ON tipodo.id=p.tDoc
            WHERE c.tCurso=$tipoDeCurso";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportefechasComentarios($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, p.nombre, p.apellidos,td.nombretd,g.nombregen,p.correo,p.numerocel,pobla.nombrepob,d.nombreDepartamento,ciu.nombreCiudad
            FROM comentarios AS c
            INNER JOIN person AS p ON p.nDoc=c.nDocu 
            INNER JOIN tipodocumento AS td ON p.tDoc=td.id
            INNER JOIN genero AS g ON p.genero=g.id
            INNER JOIN poblacion AS pobla ON p.tpoblacion=pobla.id
            INNER JOIN departamentos AS d ON p.id_depa=d.codigoDepartamento 
            INNER JOIN ciudad AS ciu ON p.id_muni=ciu.codigoCiudad
            WHERE c.fecha BETWEEN '$fechainicio' AND '$fechafin'";
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportegeneroComentarios($genero){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, p.nombre, p.apellidos,td.nombretd,g.nombregen,p.correo,p.numerocel,pobla.nombrepob,d.nombreDepartamento,ciu.nombreCiudad
            FROM comentarios AS c 
            INNER JOIN person AS p ON p.nDoc=c.nDocu 
            INNER JOIN tipodocumento AS td ON p.tDoc=td.id
            INNER JOIN genero AS g ON p.genero=g.id
            INNER JOIN poblacion AS pobla ON p.tpoblacion=pobla.id
            INNER JOIN departamentos AS d ON p.id_depa=d.codigoDepartamento 
            INNER JOIN ciudad AS ciu ON p.id_muni=ciu.codigoCiudad
            WHERE p.genero=$genero AND p.rol=2";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportecomentariosJornada($jornada){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, p.nombre, p.apellidos,td.nombretd,g.nombregen,p.correo,p.numerocel,pobla.nombrepob,d.nombreDepartamento,ciu.nombreCiudad,jor.nombrejor
            FROM comentarios AS c 
            INNER JOIN person AS p ON p.nDoc=c.nDocu 
            INNER JOIN tipodocumento AS td ON p.tDoc=td.id
            INNER JOIN genero AS g ON p.genero=g.id
            INNER JOIN poblacion AS pobla ON p.tpoblacion=pobla.id
            INNER JOIN departamentos AS d ON p.id_depa=d.codigoDepartamento 
            INNER JOIN ciudad AS ciu ON p.id_muni=ciu.codigoCiudad
            INNER JOIN registroconv AS reg ON c.nDocu=reg.nDocreg
            INNER JOIN convocatorias AS conv ON reg.convocatorias=conv.codigo
            INNER JOIN jornada AS jor ON conv.id_jornada=jor.id
            WHERE conv.id_jornada=$jornada AND p.rol=2";
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reporteComentariosPuntuacion($pi,$pf){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, p.nombre, p.apellidos,td.nombretd,g.nombregen,p.correo,p.numerocel,pobla.nombrepob,d.nombreDepartamento,ciu.nombreCiudad
            FROM comentarios AS c
            INNER JOIN person AS p ON p.nDoc=c.nDocu 
            INNER JOIN tipodocumento AS td ON p.tDoc=td.id
            INNER JOIN genero AS g ON p.genero=g.id
            INNER JOIN poblacion AS pobla ON p.tpoblacion=pobla.id
            INNER JOIN departamentos AS d ON p.id_depa=d.codigoDepartamento 
            INNER JOIN ciudad AS ciu ON p.id_muni=ciu.codigoCiudad
            WHERE c.puntuacion BETWEEN '$pi' AND '$pf'";
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportefechasEventos($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM eventos WHERE fecha BETWEEN '$fechainicio' AND '$fechafin'";
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportefechasContacto($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM contacto WHERE fecha BETWEEN '$fechainicio' AND '$fechafin'";
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportefechasConvocatorias($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, tc.tipoCurso, j.nombrejor, p.nombre AS nomins, p.apellidos AS apeins
            FROM convocatorias AS c 
            INNER JOIN person AS p ON c.nDoc_responsable=p.nDoc
            INNER JOIN tipocurso AS tc ON c.tCurso=tc.id 
            INNER JOIN jornada AS j ON c.id_jornada=j.id
            
            WHERE c.fecha_inicio BETWEEN '$fechainicio' AND '$fechafin'";
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reporteJornadaConvocatorias($jornada){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, tc.tipoCurso, j.nombrejor, p.nombre AS nomins, p.apellidos AS apeins
            FROM convocatorias AS c 
            INNER JOIN person AS p ON c.nDoc_responsable=p.nDoc
            INNER JOIN tipocurso AS tc ON c.tCurso=tc.id 
            INNER JOIN jornada AS j ON c.id_jornada=j.id
            
            WHERE c.id_jornada=$jornada";
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function reportetipoDeCursoConvocatorias($tipoDeCurso){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, tc.tipoCurso, j.nombrejor, p.nombre AS nomins, p.apellidos AS apeins
            FROM convocatorias AS c 
            INNER JOIN person AS p ON c.nDoc_responsable=p.nDoc
            INNER JOIN tipocurso AS tc ON c.tCurso=tc.id 
            INNER JOIN jornada AS j ON c.id_jornada=j.id         
            WHERE c.tCurso=$tipoDeCurso";
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function estructura($ficha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT estructuracurri.*,tc.TEnombre fROM  estructuracurri
            INNER JOIN tipoestructura AS tc ON tCompetencia=tc.id
            WHERE ficha=$ficha ORDER BY estructuracurri.tCompetencia ASC";

            // SELECT convocatorias.*,tc.tipoCurso,j.nombrejor,per.nombre AS ninstructor,per.apellidos AS ainstructor FROM `convocatorias`
            // INNER JOIN tipocurso AS tc ON tCurso=tc.id 
            // INNER JOIN jornada AS j ON id_jornada=j.id 
            // INNER JOIN person AS per ON  per.nDoc=nDoc_responsable
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }

         public function tEstru(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM tipoestructura";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function rol(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM rol";

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
        public function instructor(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM person WHERE rol = 1";
            

            $result = $conexion->prepare($sql);

            $result->execute();
            //$resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function mostrarTipoCurso(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM tipocurso";
            

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
        public function convocatorias(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion(); 
            
            $sql = "SELECT con.*, t.tipoCurso FROM convocatorias AS con 
        
            INNER JOIN jornada AS j ON con.id_jornada=j.id
            INNER JOIN tipocurso AS t ON con.tCurso=t.id";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }


        public function dias(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            //$sql = "SELECT * FROM estudio";
            $sql = "SELECT e.*, td.nombremes FROM estudio AS e LEFT JOIN meses AS td ON e.nombreMes=td.id";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function registrarcurso($nombre,$tCurso,$ficha,$jornada,$fechainicio,$fechafin,$descripcion,$rutafinalSql,$instructor){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO convocatorias (`nombre`, `tCurso`, `codigo`, `id_jornada`, `fecha_inicio`, `fecha_fin`, `descripcion`, `foto`, `nDoc_responsable`) 
            VALUES 
            ('$nombre',$tCurso,$ficha,$jornada,'$fechainicio','$fechafin','$descripcion','$rutafinalSql',$instructor)";
            
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
          
            return $result;
        }
        public function estudio($mes,$dias,$año){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO estudio ( `dias`,`nombreMes`,`año`) VALUES ($dias,$mes,$año)";
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
          
            return $result;
        }
        public function editarestudio($eDias,$eMes,$eAño,$eId){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "UPDATE `estudio` SET `dias`= $eDias, `nombreMes`=$eMes , `año`=$eAño WHERE id=$eId";
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
          
            return $result;
        }
        public function existemes($mes,$año){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM estudio WHERE nombreMes=$mes AND año=$año";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = NULL;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function editconvocatoriasCor($nombre,$tipoCurso,$ficha,$jornada,$fechainicio,$fechafin,$descripcion,$rutafinalSql,$instructor,$id){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            if(!empty($rutafinalSql)){
                $sql = "UPDATE `convocatorias` SET `nombre`='$nombre', `tCurso`=$tipoCurso, `codigo`=$ficha, `id_jornada`=$jornada, `fecha_inicio`='$fechainicio', `fecha_fin`='$fechafin', `descripcion`='$descripcion', `foto`= '$rutafinalSql',`nDoc_responsable`= $instructor  WHERE `id`=$id";
            }else{
                $sql = "UPDATE `convocatorias` SET `nombre`='$nombre', `tCurso`=$tipoCurso, `codigo`=$ficha, `id_jornada`=$jornada, `fecha_inicio`='$fechainicio', `fecha_fin`='$fechafin', `descripcion`='$descripcion', `nDoc_responsable`= $instructor  WHERE `id`=$id";
            }
          
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
          
            return $result;
        }

        public function guardar_usuario($numDoc,$nombre,$apellidos,$genero,$tipoDoc,$numeroCel,$correo,$rol,$tPoblacion,$fecha,$fechaNacimiento,$ncontra,$departamento,$ciudad,$rutafinalSql1,$rutafinalSql2){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO person (`nDoc`, `tDoc`, `nombre`,`apellidos`, `genero`,`numerocel`, `correo`, `rol`,`tpoblacion`, `fechaper`, `fechanacimiento`,`documentoPdf`, `registraduriaDocu`,`contrasena`,`id_depa`,`id_muni`) 
            VALUES ($numDoc,$tipoDoc,'$nombre','$apellidos',$genero,$numeroCel,'$correo',$rol,$tPoblacion,'$fecha','$fechaNacimiento', '$rutafinalSql1','$rutafinalSql2','$ncontra',$departamento,$ciudad)";
            // var_dump($sql);
            // die();
            
            $result = $conexion->prepare($sql);

            $result->execute();
            return $result;
            
        }
        public function user(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT per.*, td.nombretd, r.nombrerol , de.nombreDepartamento , ci.nombreCiudad, g.nombregen, p.nombrepob FROM person AS per 
            LEFT JOIN tipodocumento AS td ON per.tDoc=td.id 
            LEFT JOIN rol AS r ON per.rol=r.id 
            LEFT JOIN poblacion AS p ON per.tpoblacion=p.id 
            LEFT JOIN genero AS g ON per.genero=g.id
            LEFT JOIN departamentos AS de ON per.id_depa=de.codigoDepartamento 
            LEFT JOIN ciudad AS ci ON per.id_muni=ci.codigoCiudad";

            $result = $conexion->prepare($sql);

            $result->execute();
            //$resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function curso(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT con.*, p.nombre AS nomins, p.apellidos AS apeins, j.nombrejor, t.tipoCurso FROM convocatorias AS con 
            INNER JOIN person AS p ON con.nDoc_responsable=p.nDoc
            INNER JOIN jornada AS j ON con.id_jornada=j.id
            INNER JOIN tipocurso AS t ON con.tCurso=t.id";
            // $sql = "SELECT cur.*,t.tipoCurso, j.nombrejor FROM curso AS cur INNER JOIN tipocurso AS t ON cur.tipoCurso=t.id INNER JOIN jornada AS j ON cur.jornada=j.id";

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function editarUsuarioone($idUser){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM person WHERE id=$idUser";
            

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }
        
        public function editarmes($id){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM estudio WHERE id=$id";
            

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }

        public function editarUsuario($enombre,$eapellidos,$etipoDoc,$enumDoc,$egenero,$enumcelular,$ecorreo,$etpoblacion,$erol,$ncontra,$rutafinalSql,$rutafinalSql2,$departamento,$ciudad){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            if($ncontra!="" && $rutafinalSql!="" && $rutafinalSql2!=""){
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion,documentoPdf='$rutafinalSql',registraduriaDocu='$rutafinalSql2', contrasena='$ncontra', id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
            }elseif($ncontra!="" && $rutafinalSql!=""){
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion,documentoPdf='$rutafinalSql', contrasena='$ncontra', id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
            }elseif($ncontra!=""){
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion,contrasena='$ncontra', id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
            }elseif($ncontra!="" && $rutafinalSql2!=""){
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion,registraduriaDocu='$rutafinalSql2', contrasena='$ncontra', id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
            }elseif($rutafinalSql!="" && $rutafinalSql2!=""){
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion,documentoPdf='$rutafinalSql',registraduriaDocu='$rutafinalSql2', id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
            }elseif($rutafinalSql!=""){
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion,documentoPdf='$rutafinalSql', id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
            }elseif($rutafinalSql2!=""){
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion,registraduriaDocu='$rutafinalSql2',id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
            }
            
            else{
                $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`genero`=$egenero,`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol,tpoblacion=$etpoblacion, id_depa=$departamento , id_muni=$ciudad  WHERE nDoc=$enumDoc";
            }
            // var_dump($sql);
            // die();

            $result = $conexion->prepare($sql);

            $result->execute();
            return $result;
            
        }

        public function eliminar_usuario($idUsuario){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM person WHERE id=$idUsuario";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

          }
          
        public function eliminarmes($idUsuario){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM estudio WHERE id=$idUsuario";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

          }
          public function eliminar_curso($idCurso){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM convocatorias WHERE id=$idCurso";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

          }
          public function editarCursoone($idCurso){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            //$sql = "SELECT * FROM convocatorias WHERE id=$idCurso";
            $sql = "SELECT con.*, p.nombre AS nomins, p.apellidos AS apeins, j.nombrejor, t.tipoCurso FROM convocatorias AS con 
            INNER JOIN person AS p ON con.nDoc_responsable=p.nDoc
            INNER JOIN jornada AS j ON con.id_jornada=j.id
            INNER JOIN tipocurso AS t ON con.tCurso=t.id Where con.id=$idCurso";
            

            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }
         public function guardar_carga_masiva_usuario($sqln){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql=$sqln;
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;
          }
          public function actualizarFoto($numDoc,$rutafinalSql){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql="UPDATE person SET foto='$rutafinalSql' WHERE nDoc=$numDoc;";
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);
            $result->execute();

          }
          public function actualizarInformacion($id,$nombre,$apellidos,$tipoDoc,$genero,$tPoblacion,$numcelular,$correo){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql="UPDATE person SET nombre='$nombre', apellidos='$apellidos' , `genero`=$genero, `tpoblacion`=$tPoblacion,tDoc=$tipoDoc, numerocel='$numcelular' , correo='$correo' WHERE id=$id;";
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);
            $result->execute();

          }
          public function actualizar_contraseña($numDoc,$ncontra){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql="UPDATE person SET contrasena='$ncontra' WHERE nDoc=$numDoc;";
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);
            $result->execute();

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
        public function get_muni($id){
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$sql = "SELECT * FROM ciudad WHERE codigoDepartamento=$id ORDER BY nombreCiudad ASC";
			$result = $conexion->prepare($sql);
			$result->execute();
			$resultado = $result->fetchall(PDO::FETCH_ASSOC);
			return $resultado;
		}
        public function get_convocatorias(){
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$sql = "SELECT convocatorias.*,tc.tipoCurso,j.nombrejor,per.nombre AS ninstructor,per.apellidos AS ainstructor FROM `convocatorias`
            INNER JOIN tipocurso AS tc ON tCurso=tc.id 
            INNER JOIN jornada AS j ON id_jornada=j.id 
            INNER JOIN person AS per ON  per.nDoc=nDoc_responsable";
			$result = $conexion->prepare($sql);
            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
		}
        public function guardar_convocatorias($nombre,$tCurso,$codigo,$id_jornada,$fecha_inicio,$fecha_fin,$descripcion,$rutafinalSql,$nDoc){
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$sql = "INSERT INTO convocatorias (`nombre`,`tCurso`, `codigo`, `id_jornada`, `fecha_inicio`, `fecha_fin`, `descripcion`, `foto`, `nDoc_responsable`)
             VALUES 
             ('$nombre',$tCurso,$codigo,$id_jornada,'$fecha_inicio','$fecha_fin','$descripcion','$rutafinalSql',$nDoc)";
            
             
            $result = $conexion->prepare($sql);
            $result->execute();
            // $resultado = false;
            
            return $result;
		}
        public function editarconvocatoriaone($nDoc,$idco){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM convocatorias WHERE id=$idco AND nDoc_responsable=$nDoc";
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }
        public function get_ones__convocatorias($nDoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT convocatorias.*,j.nombrejor,tc.tipoCurso FROM `convocatorias` INNER JOIN jornada AS j ON id_jornada=j.id INNER JOIN tipocurso AS tc ON tCurso=tc.id WHERE nDoc_responsable=$nDoc";
            

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }
        
        public function editarconv($nDoc,$id,$nombre,$tipoCur,$id_jornada,$codigo,$fecha_inicio,$fecha_fin,$descripcion,$rutafinalSql){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            if($rutafinalSql!=""){
                $sql = "UPDATE convocatorias SET nombre='$nombre',`tCurso`=$tipoCur,`codigo`=$codigo, id_jornada=$id_jornada, fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', descripcion='$descripcion', foto='$rutafinalSql' WHERE id=$id AND nDoc_responsable=$nDoc";
            }else{
                $sql = "UPDATE convocatorias SET nombre='$nombre',`tCurso`=$tipoCur,`codigo`=$codigo, id_jornada=$id_jornada, fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', descripcion='$descripcion' WHERE id=$id AND nDoc_responsable=$nDoc";
            }
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);

            $result->execute();
            return $result;
            
        }
        public function eliminar_convocatoria($nDoc,$id){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM convocatorias WHERE id=$id AND nDoc_responsable=$nDoc";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

          }

        public function SaveTestimonio($documentoTestimonio,$comentarioTestimonio,$puntuacionTestimonio,$fecha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO comentarios ( `nDocu`, `comentario`,`puntuacion`,`fecha`)
            VALUES ( $documentoTestimonio, '$comentarioTestimonio',$puntuacionTestimonio,'$fecha')";

            // var_dump($sql);
            // die();
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            // $resultado = false;
            return $result;
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
        public function editareventoone($idco){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM eventos WHERE id=$idco";
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }
        public function guardar_evento($nombreevento, $fechaevento, $descripcionevento, $rutafinalSql){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO eventos (`nombre`, `fecha`, `descripcion`, `foto`)
            VALUES ('$nombreevento', '$fechaevento', '$descripcionevento', '$rutafinalSql')";

            // var_dump($sql);
            // die();
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            // $resultado = false;
            return $result;
        }

        public function editarevento($idevento, $ecnombreevento,$ecfechaevento,$ecdescripcionevento,$rutafinalSql){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            if($rutafinalSql!=""){
                $sql = "UPDATE eventos SET nombre='$ecnombreevento',`fecha`='$ecfechaevento',`descripcion`='$ecdescripcionevento', `foto`='$rutafinalSql' WHERE id=$idevento";
            }else{
                $sql = "UPDATE eventos SET nombre='$ecnombreevento',`fecha`='$ecfechaevento',`descripcion`='$ecdescripcionevento' WHERE id=$idevento";
            }
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);

            $result->execute();
            return $result;
            
        }

        public function eliminar_evento($id){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM eventos WHERE id=$id";
            $result = $conexion->prepare($sql);
            $result->execute();
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
        public function admcontacto(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM contacto";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function cometarios(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT com.*, p.nombre,p.apellidos,r.nombrerol
            FROM comentarios AS com 
            INNER JOIN person AS p ON p.nDoc=com.nDocu
            INNER JOIN rol AS r ON r.id=p.rol";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }

        public function eliminar_comentario($id){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM comentarios WHERE id=$id";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

        }
        public function eliminar_contacto($id){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM contacto WHERE id=$id";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

        }
        public function aprendices(){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT per.*, td.nombretd, r.nombrerol , de.nombreDepartamento , ci.nombreCiudad , g.nombregen, p.nombrepob
            FROM person AS per 
            LEFT JOIN tipodocumento AS td ON per.tDoc=td.id 
            LEFT JOIN rol AS r ON per.rol=r.id 
            LEFT JOIN genero AS g ON per.genero=g.id 
            LEFT JOIN poblacion AS p ON per.tpoblacion=p.id 
            LEFT JOIN departamentos AS de ON per.id_depa=de.codigoDepartamento 
            LEFT JOIN ciudad AS ci ON per.id_muni=ci.codigoCiudad WHERE per.rol=2";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
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

        public function editarnosotrosone($idco){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM nosotros WHERE id=$idco";
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }
        public function editarConvocatoriaUsuarioone($idUsucon){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            // $sql = "SELECT * FROM registroconv WHERE id=$idUsucon";
            $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,p.tpoblacion,p.id as idp
                FROM registroconv AS registro
                INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
                WHERE registro.id=$idUsucon";
            $result = $conexion->prepare($sql);
           

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }

        public function editarAcercadenosotros($primerTexto,$segundoTexto,$rutafinalSql,$rutafinalSql2){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            if($rutafinalSql!="" && $rutafinalSql2 !=""){
                $sql = "UPDATE nosotros SET fotoPrincipal='$rutafinalSql',`primerTexto`='$primerTexto',`segundoTexto`='$segundoTexto', `fotoSegundaria`='$rutafinalSql2' WHERE id=1";
            }elseif($rutafinalSql!=""){
                $sql = "UPDATE nosotros SET fotoPrincipal='$rutafinalSql',`primerTexto`='$primerTexto',`segundoTexto`='$segundoTexto' WHERE id=1";
            }elseif($rutafinalSql2 !=""){
                $sql = "UPDATE nosotros SET `primerTexto`='$primerTexto',`segundoTexto`='$segundoTexto', `fotoSegundaria`='$rutafinalSql2' WHERE id=1";
            }else{
                $sql = "UPDATE nosotros SET `primerTexto`='$primerTexto',`segundoTexto`='$segundoTexto' WHERE id=1";
            }
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);

            $result->execute();
            return $result;
            
        }

        public function editargaleriaone($idga){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM galeria WHERE id=$idga";
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }
        public function eliminar_galeria($id){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM galeria WHERE id=$id";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

        }
        public function editargaleria($idgaleria, $nombregaleria,$descripciongaleria,$rutafinalSql){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            if($rutafinalSql!=""){
                $sql = "UPDATE galeria SET nombre='$nombregaleria',`descripcion`='$descripciongaleria', `foto`='$rutafinalSql' WHERE id=$idgaleria";
            }else{
                $sql = "UPDATE galeria SET nombre='$nombregaleria',`descripcion`='$descripciongaleria' WHERE id=$idgaleria";
            }
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);

            $result->execute();
            return $result;
            
        }
        public function guardar_galeria($Renombregaleria, $descripciongaleria, $rutafinalSql){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO galeria (`nombre`, `descripcion`, `foto`)
            VALUES ('$Renombregaleria', '$descripciongaleria', '$rutafinalSql')";

            // var_dump($sql);
            // die();
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            // $resultado = false;
            return $result;
        }
         
        
    public function actualizardocu($cambio,$nDoc,$rutafinalSql1,$rutafinalSql2){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $sql = "UPDATE person SET tDoc=$cambio, documentoPdf='$rutafinalSql1',documentoPdf='$rutafinalSql2' WHERE nDoc=$nDoc" ;
        
        // var_dump($sql);
        // die();
        $result = $conexion->prepare($sql);

        $result->execute();
        return $result;
        
    }

    public function ConsultarConvocatoria($codigocur){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,c.fecha_fin,
        c.nombre as nombrecur, tipo.tipocurso,p.tpoblacion, pobla.nombrepob, depa.nombreDepartamento,ciu.nombreCiudad,tipodo.nombretd
        FROM registroconv AS registro
        INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
        INNER JOIN convocatorias AS c ON c.codigo=registro.convocatorias
        INNER JOIN tipocurso AS tipo ON tipo.id=p.tDoc
        INNER JOIN poblacion AS pobla ON pobla.id=p.tpoblacion
        INNER JOIN departamentos AS depa ON depa.codigoDepartamento=p.id_depa
        INNER JOIN ciudad AS ciu ON ciu.codigoCiudad=p.id_muni
        INNER JOIN tipodocumento AS tipodo ON tipodo.id=p.tDoc
        WHERE convocatorias=$codigocur;";
        // var_dump($sql);
        // die();

        // $sql = "SELECT per.*, td.nombretd, r.nombrerol , de.nombreDepartamento , ci.nombreCiudad 
        //     FROM person AS per 
        //     LEFT JOIN tipodocumento AS td ON per.tDoc=td.id 
        //     LEFT JOIN rol AS r ON per.rol=r.id 
        //     LEFT JOIN departamentos AS de ON per.id_depa=de.codigoDepartamento 
        //     LEFT JOIN ciudad AS ci ON per.id_muni=ci.codigoCiudad WHERE per.rol=2";

        
        $result = $conexion->prepare($sql);
        $resultado = false;
        $result->execute();
        while($f=$result->fetch()){
            $resultado[]=$f;
        }
        return $resultado;
    }

    public function traerReceptores($rolemisor){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT per.*, r.nombrerol FROM person as per
        INNER JOIN rol as r on rol=r.id   
        WHERE rol=$rolemisor";
        $result = $conexion->prepare($sql);

        $result->execute();
        // $resultado = false;
        while($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;
        
    }
    public function enviarmensaje($docureceptor,$titulo,$texto,$docuemisor,$fotoemisor,$fechaenvio,$estado,$tipoaviso){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO `notificaciones`( `docuemisor`, `docureceptor`, `titulomensaje`, `mensaje`, `foto`,`fechaenvio`,`estado`,`tipomensaje`)
         VALUES ($docuemisor,$docureceptor,'$titulo','$texto','$fotoemisor','$fechaenvio','$estado','$tipoaviso')";
    
        $result = $conexion->prepare($sql);
        
        $result->execute();
        // $resultado = false;
        return $result;
    }

    public function notificaciones($docureceptor){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT noti.*, rr.nombrerol as rolreceptor, re.nombrerol as rolemisor, peme.rol, peme.nombre as nombreemi, peme.apellidos as apellidoemi, pre.rol, pre.nombre as nombrerece, pre.apellidos as apellidorece from notificaciones as noti
        INNER JOIN person as peme on peme.nDoc=docuemisor
        INNER JOIN person as pre on pre.nDoc=docureceptor
        INNER JOIN rol AS re on  re.id=peme.rol
        INNER JOIN rol AS rr on  rr.id=pre.rol
        WHERE docureceptor=$docureceptor;";
        $result = $conexion->prepare($sql);

        $result->execute();
        $resultado = false;
        while($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;
        
    }

    public function borrarmensaje($id){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM `notificaciones` where id=$id";
    
        $result = $conexion->prepare($sql);          
        $result->execute();
        return $result;
    }
    public function mensajeleido($id,$estado,$horaleido){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $sql = "UPDATE `notificaciones` SET `estado`='$estado',`fechaleido`='$horaleido' WHERE id=$id";
        
        $result = $conexion->prepare($sql);          
        $result->execute();
        return $result;
    }


    }


?>