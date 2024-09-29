
    <?php 
        if(isset($_POST['numerofilas'])&& isset($_POST['numerocolumnas']) && isset($_POST['fila']) && isset($_POST['columna']) && isset($_POST['color']))
        {
            $numerofilas=$_POST['numerofilas'];
            $numerocolumnas=$_POST['numerocolumnas'];
            $fila=$_POST['fila'];
            $columna=$_POST['columna'];
            $color=$_POST['color'];
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>p4</title>
                <style>
                    .container{
                        margin:0 auto;
                        width: 300px;
                        
                    }
                    
                    table {
                        border-collapse: collapse;
                        border:2px solid black;
                        
                    }
                    td {
                        width: 50px;
                        height: 50px;
                        border:2px solid black;

                    }
                    
                    .celdaBlanca {
                        background-color: white;
                    }
                    .celdaAmarilla{
                        background-color:#FFC000;
                    }
                    .color{
                        background-color:<?php echo $color ?>;
                    }
                </style>
            </head>
            <body>

            <div class="container">

            <table>
                <?php
                

                for ($i = 1; $i <= $numerofilas; $i++) {
                    echo "<tr>"; 
                    for ($j = 1; $j <= $numerocolumnas; $j++) {
                        if (($i + $j) % 2 == 0) {
                            if($i==$fila && $j==$columna)
                            {
                                $bandera=true;
                                $ii=$i;
                                $jj=$j;
                                ?>
                                <td class="celdaAmarilla">
                                    <img src="../Bowser.png" style="width:30px;">
                                    
                                    
                                
                                </td>

                            <?php 
                            } 
                        else
                        {
                            echo '<td class="color">j</td>';


                        }
                        }
                        else { 
                        if($i==$fila && $j==$columna)
                        {
                            
                            ?>
                            <td class="celdaAmarilla">
                                <img src="../Bowser.png" style="width:30px;">
                                
                                
                            
                            </td>

                          <?php  
                        }
                        else{
                            echo '<td class="celdaBlanca">h</td>';


                        }
                        
                        
                        }
                        

                        
                    }
                    echo "</tr>";
                }
                
                ?>
            </table>

            </div>
            </body>
            </html>

        <?php
        }
        else{
            echo "variables no guardadas";
        }

    ?>



