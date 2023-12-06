<?php
class Conexion
{
      public function get_conexion()
      {
            $user = "root";
            $pass = "";
            $host = "localhost";
            $db = "b7_35523572_ttmdb";

            $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            return $conexion;
      }
}
