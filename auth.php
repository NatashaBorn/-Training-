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
                    
                    if(isset($_POST["enter"])){
                        $e_login=$_POST["e_login"];
                        $e_password=  md5($_POST["e_password"]);
                        
                        $query=  mysql_query("SELECT * FROM users WHERE login='$e_login'");
                        $user_data=  mysql_fetch_array($query);
                   
                        if($user_data["password"]==$e_password){
                            echo 'Ok';
                            $check=true;
                        }
                        else{
                            echo 'Error!';
                        }
                    }
                ?>
                 
                <form  method="post" action="auth.php">
                     <input type="text" name="e_login" placeholder="Login" required><br>
                     <input type="password" name="e_password" placeholder="Password" required><br>
                     <input type="submit" name="enter" value="autorization"><br>
                    
                 </form>
                 
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        <?php require_once "blocks/footer.php"?>
        
    </body>
</html>