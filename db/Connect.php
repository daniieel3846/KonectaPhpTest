<?php
/**
 * Description of Connect
 *
 * @author Danielpg
 */
require_once('Config.php');

class Connect {
 
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct() {
        $this->host = SERVIDOR;
        $this->db = NAMEDB;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->charset = CHARSET;
    }
    
    function onConnect() {
        try {
            $conexion = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE,
                PDO::ATTR_PERSISTENT => TRUE
            ];
            $pdo = new PDO($conexion, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            ?>
            <script>alert('Error to Connected');</script>
            <?php
        }
    }
}
?>