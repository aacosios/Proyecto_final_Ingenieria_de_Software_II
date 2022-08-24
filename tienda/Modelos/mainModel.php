<?php

	if($peticion_ajax){
		require_once "../config/SERVER.php";
	}else{
		require_once "./config/SERVER.php";
	}

	class mainModel{

		/*----------  Funcion conectar a BD - Function connect to BD ----------*/
		protected static function conectar(){
			$conexion = new PDO(SGBD,USER,PASS);
			$conexion->exec("SET CHARACTER SET utf8");
			return $conexion;
		} /*--  Fin Funcion - End Function --*/

        		/*----------  Funcion desconectar de DB - Function disconnect from DB  ----------*/
		public function desconectar($consulta){
			global $conexion, $consulta;
			$consulta=null;
			$conexion=null;
			return $consulta;
		} /*--  Fin Funcion - End Function --*/


		/*----------  Funcion ejecutar consultas simples - Run simple queries function  ----------*/
		protected static function ejecutar_consulta_simple($consulta){
			$sql=self::conectar()->prepare($consulta);
			$sql->execute();
			return $sql;
		} /*--  Fin Funcion - End Function --*/

        		/*----------  Funcion desconectar de DB - Function disconnect from DB  ----------*/
		public function desconectar($consulta){
			global $conexion, $consulta;
			$consulta=null;
			$conexion=null;
			return $consulta;
		} /*--  Fin Funcion - End Function --*/


		/*----------  Funcion ejecutar consultas simples - Run simple queries function  ----------*/
		protected static function ejecutar_consulta_simple($consulta){
			$sql=self::conectar()->prepare($consulta);
			$sql->execute();
			return $sql;
		} /*--  Fin Funcion - End Function --*/

        
		/*---------- Funcion datos tabla - Table data function ----------*/
        public function datos_tabla($tipo,$tabla,$campo,$id){
			$tipo=self::limpiar_cadena($tipo);
			$tabla=self::limpiar_cadena($tabla);
			$campo=self::limpiar_cadena($campo);

			$id=self::decryption($id);
			$id=self::limpiar_cadena($id);

            if($tipo=="Unico"){
                $sql=self::conectar()->prepare("SELECT * FROM $tabla WHERE $campo=:ID");
                $sql->bindParam(":ID",$id);
            }elseif($tipo=="Normal"){
                $sql=self::conectar()->prepare("SELECT $campo FROM $tabla");
            }
            $sql->execute();

            return $sql;
		} /*-- Fin Funcion - End Function --*/