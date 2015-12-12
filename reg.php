<!DOCTYPE html>
<html>
    <head>

       <?php 
        $title="Информация о нас";
        require_once "blocks/head.php";
        ?>

    </head>
    <body>
        <?php require_once "blocks/header.php"?>
        
        <div id="wrapper">
           <?php require_once "blocks/panel.php"?>
            <div id="leftCol">
                <?php
                    $connect=mysql_connect("localhost","root","")or die(mysql_error());
                    mysql_select_db("MyDB");
        
                    //$result=mysql_query("SELECT login FROM users WHERE login=$login");
                    
                    if(isset($_POST["submit"])){
                        $username=$_POST["username"];
                        $login=$_POST["login"];
                        $password=$_POST["password"];
                        $r_password=$_POST["r_password"];
                        
                        $result=mysql_query("SELECT login FROM users WHERE login='$login'");
                        $row=mysql_fetch_assoc($result);               
                        
                        if($row==true){
                            echo 'Логин занят'; 
                        }
                        else if($password==$r_password){
                            $password=md5($password);
                            $query=  mysql_query("INSERT INTO users VALUES('','$username','$login','$password')")or die(mysql_error());
                            echo 'Вы удачно зарегистрировались';                            
                        }
                        else {
                        print("Пароли не совпадают! Повторите попытку!");
                        }
                        mysql_close();
                    }
                    
                ?>
                 
                 <form  method="post" action="reg.php">
                     <input type="text" name="username" placeholder="Username" required><br>
                     <input type="text" name="login" placeholder="Login" required><br>
                     <input type="password" name="password" placeholder="Password" required><br>
                     <input type="password" name="r_password" placeholder="R_Password" required><br>
                    <input type="submit" name="submit" value="Register"><br>
                    
                 </form>
                 
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        <?php require_once "blocks/footer.php"?>
        
    </body>
</html>