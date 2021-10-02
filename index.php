<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Biblioteca Digital</title>
</head>
<body>
    <!--  center: para mantener todos los elementos del texto-->
    <center>
        <br><br>
        <div id="form">
            <h1>Biblioteca digital</h1>
          <form  method="post">
              <!--Para organizar la infromacion un table-->
              <table width="100%" border="1" cellpadding="15">
                  <!-- cellpadding: especifica el espacio, en píxeles, entre la pared de la celda y su contenido-->
                  <tr>
                      <td>
                          <input type="text" name="año" placeholder="Año" value="<?php if(isset($_GET['edit'])) echo  $getROW['año']; ?>">
                      </td>
                  </tr>

                  <tr>
                      <td>
                          <input type="text" name="autor" placeholder="Autor" value="<?php if(isset($_GET['edit'])) echo  $getROW['autor']; ?>">
                      </td>

                  </tr>
                  
                  <tr>
                      <td>
                          <input type="text" name="titulo" placeholder="Titulo" value="<?php if(isset($_GET['edit'])) echo  $getROW['titulo']; ?>">
                      </td>

                  </tr>

                  <tr>
                      <td>
                          <input type="text" name="url" placeholder="URL ubicación del recurso" value="<?php if(isset($_GET['edit'])) echo  $getROW['url']; ?>">
                      </td>

                  </tr>

                  <tr>
                      <td>
                          <input type="text" name="esp" placeholder="Especialidad" value="<?php if(isset($_GET['edit'])) echo  $getROW['esp']; ?>">
                      </td>

                  </tr>

                  <tr>
                      <td>
                          <input type="text" name="edo" placeholder="Editorial" value="<?php if(isset($_GET['edit'])) echo  $getROW['edo']; ?>">
                      </td>

                  </tr>

                  <tr>
                      <td>
                          <?php 
                          
                            if(isset($_GET['edit'])){
                                ?>
                                <button type="submit" name="update">Editar</button>
                                <?php 
                            }
                            else{
                                ?>
                                <button type="submit" name="save">Registrar</button>
                                <?php
                            }
                          ?>
                      </td>
                  </tr>

              </table>
          </form>
          <br><br>
          </center> 
          <!--Tabla que servirá para listar los registros que se encuentran en la base de datos-->
          <table width="100%" border="1" cellpadding="15" align="center">
               <tr>
                   <td>ID</td>
                   <td>Año de publicación</td>
                   <td>Autor</td>
                   <td>Título</td>
                   <td>Especialidad</td>
                   <td>Editorial</td>
                   <td>URL del recurso</td>
                   <td>Acción</td>
                   <td>Acción</td>
               </tr>
            <?php
              $res = $MySQLiconn->query("SELECT * FROM biblioteca_digital");
              while ($row=$res->fetch_array())
              {
              ?>

                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['año'];?></td>
                    <td><?php echo $row['autor'];?></td>
                    <td><?php echo $row['titulo'];?></td>
                    <td><?php echo $row['esp'];?></td>
                    <td><?php echo $row['edo'];?></td>

                    <td><button><a id="boton" href="<?php echo $row['url']?>" onclick="return confirm('Confirmar que desea leer libro')">Leer Libro</a></button> </td>
                    <td><a href="?edit=<?php echo $row['id']?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
                    <td><a href="?del=<?php echo $row['id']?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
                </tr>         
                <?php
              }

              ?>
          </table>


        </div>
 
</body>
</html>