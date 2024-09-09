<?php
session_start();

if (!isset($_SESSION['a']) || !isset($_SESSION['b']) || !isset($_SESSION['c'])) {
    echo "No se han introducido valores aún. Por favor, introduzca los datos primero.";
    echo "<br><a href='index.php'>Volver al menú</a>";
    exit();
}

class Operaciones {
    public $a;
    public $b;
    public $c;

    public function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function calcularSuma() {
        return $this->a + $this->b + $this->c;
    }

    public function calcularMayor() {
        return max($this->a, $this->b, $this->c);
    }

    public function mostrarCalculos() {
        $suma = $this->calcularSuma();
        $mayor = $this->calcularMayor();

        echo "<h2>Resultados:</h2>";
        echo "<table border='1' style='width:50%; text-align:center; border-collapse:collapse;'>";
        echo "<tr style='background-color:red; color:white;'>";
        echo "<th>Valor de A</th><th>Valor de B</th><th>Valor de C</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$this->a</td><td>$this->b</td><td>$this->c</td>";
        echo "</tr>";
        echo "<tr style='background-color:red; color:white;'>";
        echo "<td><b>Suma</b></td><td colspan='2'>$suma</td>";
        echo "</tr>";
        echo "<tr style='background-color:red; color:white;'>";
        echo "<td><b>Mayor</b></td><td colspan='2'>$mayor</td>";
        echo "</tr>";
        echo "</table>";
    }
}

$a = $_SESSION['a'];
$b = $_SESSION['b'];
$c = $_SESSION['c'];

$operaciones = new Operaciones($a, $b, $c);
$operaciones->mostrarCalculos();
?>

<br><a href="index.php">Volver al menú</a>
