<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Database Connection</title>
</head>
<style>
    body{display: flex; justify-content: center; zoom:1.7;}
    p{color:green; text-shadow: 0 0 12px green; position: absolute;left: 44%;}
    pre{color:red; text-shadow:  0 0 12px red ;}
@keyframes pulse {0% {transform: scale(1);}100% {transform: scale(1.1);}}
#submit{animation: pulse 1s alternate-reverse infinite;
        box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.3);
        padding: 7px 20px;
        background: #00458f;
        color: #fff;
        border-radius: 5px; 
        position: relative;
        top: 197%;
        left: 9%;
}
#next{position: absolute; top: 78px;  left: 58%;}

</style>
<body>

    <?php
    if(isset($_POST['next'])){ header("location:2creat-DB.php");};
    if($_SERVER['REQUEST_METHOD']=="POST"){

        try{
            $con=new PDO("mysql:host=localhost","SAMIR","samir123");
            $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            echo "<p>CONNECT✅</p>";
            
        }
        catch(PDOException){
         echo "<pre>note connect❌</pre>";
        
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input id="submit" name="submit" type="submit" value="CLICK">
        <button name="next" id="next">➡️</button>
    </form>

    <div>
    </div>
</body>
</html>
