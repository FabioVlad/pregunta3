<?php
include "cabecera.inc.php";
include "menu.inc2.php";
include "conexion.inc.php";

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }
    if(isset($_SESSION['ci'])){
        $ci = $_SESSION['ci'];
        
    }
    $rescolor = mysqli_query($con, "select * from color");

?>

<div id="right" style="background-color:#<?php echo $_SESSION['color'];?>;">
    <h2>Bienvenido a la Facultad de Ciencias Puras y Naturales</h2>
    <table style="font-size:25px">
            <tr>
                <td>
                <a href="informatica/">Informática</a>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>
                <a href="quimica/">Química</a>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td colspan="2">
                <a href="fisica/">Física</a>
                </td>
            </tr>
            
        </table>
    <div id="welcome"> 
      
      
      <p class="more"></p>
      <form action="cambiar_color.php" method="POST">
        <select id="color" name="color">
          
         <?php
while ($filacolor = mysqli_fetch_array($rescolor))
{
?>
<option value="<?php echo $filacolor[0];?>"><?php echo $filacolor[2];?></option>
<?php
};
?>
        </select>
        <input type="submit" value="cambiar color">
      </form>
      <h1>PROMEDIO NOTAS</h1>
    </div>
   
  </div>

  <div class="clear"> </div>
  <div id="spacer"> </div>
    
<?php

include "pie.inc.php";
?>