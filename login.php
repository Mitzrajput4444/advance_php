<?php 
// echo $_COOKIE['my'];
session_start();
include("conn.php");
$msg="";

if(isset($_REQUEST['btnsubmit'])){
    
    $q = "select * from loginn_info
    where login_uname =  '".$_REQUEST['textuname']."' and
        login_pass = '".$_REQUEST['textpass']."'" ;
        $res=mysqli_query($c,$q);
        if(mysqli_num_rows($res)>0){
            
            $_SESSION['uname']=$_REQUEST['textuname'];
            header("location:dis.php");
        }
        else
        {
            $msg="<p class='invalid'><i class='bx bx-error-circle'></i>invalid User!!!</p>";
        }
       
        if(isset($_REQUEST['checkrem'])){
            setcookie("uname",$_REQUEST['textuname'],time()+60);
            setcookie("pass",$_REQUEST['textpass'],time()+60);
        }
    }
    if(isset($_COOKIE['uname']))
        $u=$_COOKIE['uname'];
    
    else
        $u="";
    
    if(isset($_COOKIE['pass']))
        $p=$_COOKIE['pass'];
    
    else
        $p="";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
    
    <form method="post">
   
   <div class="df-main">
   <h1>
        Admin Login
        <br/>
        <?php echo $msg ?>
    </h1>
   <div class=" df df-first">
    <label for="Username">Username</label>
    <i class=" fa-my fa-solid fa-user"></i>
    <input type="text" value="<?php echo $u; ?>"  placeholder="Enter Username" name="textuname" required>    
  </div>
  <div class="df df-first">
    <label for="Password">Password</label>
    <i class='bx show-hide bx-hide fa-my'></i></i>
    <input type="password" value="<?php echo $p; ?>"  placeholder="Enter Password" name="textpass" class="pass"required>    
  </div>
  <button type="submit" \ class=" btn btn-login"name="btnsubmit">Login</button>
  <div class="rembox">
    <input type="checkbox" class="input-check" name="checkrem"/><span class="ml">Rember me!</span>
   </div>
   </div>
  
    </form>
    <script src="script.js"></script>
</body>
</html>