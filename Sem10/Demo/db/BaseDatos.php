<?php

class BaseDatos {

  private $cn = null;
  private $liberar = TRUE; 
  const LOGFILE = "prueba.log";

  public function __construct() {
    $this->cn = mysql_connect("localhost", "eureka", "admin");
    mysql_select_db("eurekabank", $this->cn);
  }

  public function executeQuery($query) {
    $rs = mysql_query($query, $this->cn);
    $lista = array();
    while ($rec = mysql_fetch_assoc($rs)) {
      $lista[] = $rec;
    } return $lista;
  }

  public function __destruct() {
    if ($this->liberar) {
      $this->dispose();
    } else {
      error_log("Conexión ya fué liberada.\n", 3, self::LOGFILE);
    }
  }

  public function dispose() {
    if ($this->liberar) {
      if ($this->cn) {
        mysql_close($this->cn);
        $this->cn = null;
        error_log("Conexión Liberada.\n", 3, self::LOGFILE);
      }
      $this->liberar = FALSE;
    }
  }

}

?>
