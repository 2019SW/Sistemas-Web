<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
                <?php include 'DbConfig.php'?>
                <?php

                $xml = simplexml_load_file('../xml/Questions.xml');


                               
                $resultset=array();  //Associative Array
                echo "<div id='table'><center><table border=1>
                    <tr>
                    <th>Correo</th><th>Enunciado</th><th>Correcta</th><th>Incorrecta1</th><th>Incorrecta2</th><th>Incorrecta3</th><th>Tema</th>
                    <tr>
                    </tr></center>";    
                    foreach($xml->children() as $item)
                    {
                        echo "<tr>";
                        echo "<td>" . $item['author'] . "</td>";
                        echo "<td>" . $item->itemBody->p . "</td>";
                        echo "<td>" . $item->correctResponse->value . "</td>";
                        echo "<td>" . $item->incorrectResponses->value[0] . "</td>";
                        echo "<td>" . $item->incorrectResponses->value[1] . "</td>";
                        echo "<td>" . $item->incorrectResponses->value[2] . "</td>";
                        echo "<td>" . $item['subject'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table><br>";
 
                    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>