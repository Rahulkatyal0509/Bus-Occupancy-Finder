<?php
 session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST"){
 $dbname="busoccupancy2";
 $servername="localhost";
 $username="root";
 $password="";
  $conn=mysqli_connect($servername,$username,$password,$dbname);
 if(!$conn){
   die("connection failed:".mysqli_connect_error());
  }
  $user_name=$_REQUEST["username"];
  $user_pass=$_REQUEST["password"];
  echo $user_name;
  echo $user_pass;
  $query="SELECT * FROM admin WHERE username='$user_name' and password='$user_pass';";
  $qry=mysqli_query($conn,$query);
  if(mysqli_num_rows($qry)>0){
	    $_SESSION["user"]=$user_name;
        //echo $_SESSION["user"];
        header("Location: http://localhost/appda2/Masterform.php");
  }
  else
  {
	    echo '<script type="text/javascript">

          alert("INVALID CREDENTIALS!!!"); 
          window.location.href="http://localhost/appda2/admin.php";
        </script>'; 
       

  }
 mysqli_close($conn);
 }
 
?>