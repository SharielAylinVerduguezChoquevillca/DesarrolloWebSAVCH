<?php
session_start(); 

class Operaciones {
    private $a;
    private $b;

    
    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

   
    public function sumar() {
        return $this->a + $this->b;
    }

    public function restar() {
        return $this->a - $this->b;
    }

    public function multiplicar() {
        return $this->a * $this->b;
    }

    public function dividir() {
        if ($this->b != 0) {
            return $this->a / $this->b;
        } else {
            return "Error: División por cero.";
        }
    }
}

if (isset($_POST['a']) && isset($_POST['b'])) {
    
    error_log("Valores recibidos: a = " . $_POST['a'] . ", b = " . $_POST['b']);
    $_SESSION['a'] = $_POST['a'];
    $_SESSION['b'] = $_POST['b'];

    header("Location: menu.php");
    exit();
}

    else {
   
    header("Location: pregunta3.html");
    exit();
}
?>

