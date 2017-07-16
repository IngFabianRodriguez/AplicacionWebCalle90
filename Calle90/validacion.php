<?php
session_start();

include ('conexion.php');
  $link=conectar();

  $u=$_REQUEST["usuario"];
  $p=$_REQUEST["contraseña"];


  $sql="select * from usuario, login where login.Correo='$u' and login.Password='$p' and usuario.Correo=login.Correo;";
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($row=mysqli_fetch_array($result)){

        $_SESSION['correo']=$row['Correo'];
        $_SESSION['nombre']=$row['Nombre'];
        $_SESSION['apellido']=$row['Apellido'];
        $_SESSION['cargo']=$row['Cargo'];
        $_SESSION['IdUsuario']=$row['IdUsuario'];


if ($p == "Uniminuto") {
  echo "<script type='text/javascript'>
    alert('Bienvenido(a) ".$_SESSION['cargo']." ".$_SESSION['nombre']." ".$_SESSION['apellido']. " al sistema');
    window.location='/Calle90/usuarios/changepass.html';
  </script>";

}elseif($p != "Uniminuto" && $_SESSION['cargo']=='Laboratorista') {
  	echo "<script type='text/javascript'>
  		alert('Bienvenido(a) ".$_SESSION['cargo']." ".$_SESSION['nombre']." ".$_SESSION['apellido']. " al sistema');
      window.location='/Calle90/administradores/indexadmon.php';
  	</script>";
  }elseif($p != "Uniminuto" && $_SESSION["cargo"]=='Coordinador'){
    echo "<script type='text/javascript'>
      alert('Bienvenido(a) ".$_SESSION['cargo']." ".$_SESSION['nombre']." ".$_SESSION['apellido']. " al sistema');
      window.location='/Calle90/administradores/indexadmon.php';
    </script>";
  }elseif($p != "Uniminuto" && $_SESSION["cargo"]=='Desarrollador'){
    echo "<script type='text/javascript'>
      alert('Bienvenido(a) ".$_SESSION['cargo']." ".$_SESSION['nombre']." ".$_SESSION['apellido']. " al sistema');
      window.location='/Calle90/administradores/indexadmon.php';
    </script>";
  }

} else{
 echo "<script type='text/javascript'>
    alert('El usuario o el pass ingresados no conciden');
      window.location='/Calle90/index.php';
  </script>";
}




?>
