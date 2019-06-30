<?php include('../templates/header.php');
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

      $myusername = $_POST['username'];
      $mypassword = (int)$_POST['password']; 
      
      $query = "SELECT id_usuario FROM usuarios as u WHERE u.email = '$myusername' and u.password = $mypassword";
    
      $result = $db33 -> prepare($query);
      $result -> execute();
      $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if (sizeof($dataCollected) == 1) {
         $_SESSION["login_user"] = $myusername;
         $_SESSION["login_id"] = $dataCollected[0][0];
         
         header("location: /~grupo33/entrega3/index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Mail  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Contraseña  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
</html>