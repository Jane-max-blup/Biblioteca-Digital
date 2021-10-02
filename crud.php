<?php
/*Una funcion que permite hacer la llamada de un archivo e incluir ese archivo en este nuevo archivo y que se hara solo una vez*/
include_once 'db.php';

/*codigo para la insercion de datos*/
if(isset($_POST['save']))
{
    $año = $MySQLiconn->real_escape_string($_POST['año']);
    $autor = $MySQLiconn->real_escape_string($_POST['autor']);
    $titulo = $MySQLiconn->real_escape_string($_POST['titulo']);
    $url = $MySQLiconn->real_escape_string($_POST['url']);
    $esp = $MySQLiconn->real_escape_string($_POST['esp']);
    $edo = $MySQLiconn->real_escape_string($_POST['edo']);

    $SQL = $MySQLiconn->query("INSERT INTO biblioteca_digital(año,autor,titulo,url,esp,edo) VALUES('$año','$autor','$titulo','$url','$esp','$edo')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}

/*codigo para la eliminacion de datos*/
if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM biblioteca_digital WHERE id=".$_GET['del']);

    header("Location: index.php");
}

/*codigo para la actualizacion de los datos */
if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM biblioteca_digital WHERE id=".$_GET['edit']);
    /*fecth_array: convierte la data que esta como un objeto a un arreglo */
    $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE biblioteca_digital SET año='".$_POST['año']."', autor='".$_POST['autor']."', titulo='".$_POST['titulo']."', url='".$_POST['url']."', esp='".$_POST['esp']."', edo='".$_POST['edo']."'WHERE id=".$_GET['edit']);
    header("Location: index.php");
    
}
?>