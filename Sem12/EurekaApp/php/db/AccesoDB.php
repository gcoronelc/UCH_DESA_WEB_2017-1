<?php

class AccesoDB {
  public static function getConnection() {
    $cn = null;
    try {
      $dsn = 'mysql:host=localhost;dbname=eurekabank';
      $cn = new PDO($dsn, 'eureka', 'admin');
      $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $cn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $cn->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    } catch (Exception $exc) {
      throw new Exception("No se tiene acceso al servidor.");
    }
    return $cn;
  }
}

?>