<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("Connection Fail to Database ".mysqli_connect_error());
    }

    $name = $_POST['name'];
    $password = $_POST['password']; 

    $sql = 'SELECT * FROM `test`.`test`';

    $retrival = mysqli_query($con,$sql);
    $flag = 0;
    while ($row = mysqli_fetch_assoc($retrival)) {
        if($row['Username']==$name){
            if($row['Password']==$password){
                echo "<center><h1>Log-In Successfull</h1></center>";
                $flag = 1;
                break;
            }
        }  
    }
    if($flag==0){
        echo "<center><h1>Wrong Password</h1></center>";
    }
    $con->close();
}

?>
<html>
<head>
    <title>Graphic Password Authentication</title>
</head>
<body>
    <center>
    <form method='POST'>
    <input name='name' style="margin-top: 30px;margin-bottom: 30px;" type="name" placeholder="Enter your Name"></input>
    <div class="color">
        
        
        <img src='red.png' width="80px" height="80px" onclick="Perform('red')"></button>
        <img src='green.png' width="80px" height="80px" onclick="Perform('green')"></button>
        <img src='blue.png' width="80px" height="80px" onclick="Perform('blue')"></button>

        
    </div>
    <input name='password' style="margin-top: 30px;" class="count" type="password" placeholder="0"></input>
    </br>
    <button style="margin-top:20px;" type="submit"> Submit </button>
</form>
</center>
</body>
<script>
    function Perform(add){
        document.querySelector('.count').value += add; 
    
    }
</script>
</html>