<?php
    class dbconnet{

        function connect(){
                $con=new mysqli("localhost","root","","codefest19");
                return $con;
        }
    }

    $obj=new dbconnet();
    $con=$obj->connect();
	if (isset($_POST["un"]) && isset($_POST["pw"])) {
		$d=$_POST["un"];
		$e=$_POST["pw"];
		$sql_add="SELECT id FROM user WHERE u_email='$d' AND u_password='$e';";
		$result_add=$con->query($sql_add);
		$row_add=$result_add->fetch_assoc();

		if($row_add['id']==""){
			echo "<div class='alert alert-danger' align='center'><strong>Invalid username or Password.</strong></div>";
		}
	
	else{
		$host  = $_SERVER['HTTP_HOST'];	
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'home.php';
		header("Location: http://$host$uri/$extra");
		exit;
	}
	}
?>