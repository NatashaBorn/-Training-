<div id="rightCol">
    <div class="banner">
       <?php
        $connect=mysql_connect("localhost","root","")or die(mysql_error());
        mysql_select_db("MyDB");
            if(isset($_POST["enter"])){
                $e_login=$_POST["e_login"];
                $e_password= md5($_POST["e_password"]);
                $query=  mysql_query("SELECT * FROM users WHERE login='$e_login'");
                $user_data=  mysql_fetch_array($query);
                if($user_data["password"]==$e_password){
                    session_start();
                    $_SESSION['name']=$e_login;
                }
                else{
                    echo 'Error!';
                }
            }
            if(isset($_POST["exit"])){
                session_destroy();
                unset($_SESSION["name"]);
            }
            
            
            if(isset($_SESSION["name"])){
                echo 'Ты зашел!<br><form  method="post" action="">
            <input type="submit" name="exit" value="Exit"><br>
        </form>';
                
                
            }
            else{
                echo '<form  method="post" action="">
            <input type="text" name="e_login" placeholder="Login" required><br>
            <input type="password" name="e_password" placeholder="Password" required><br>
            <input type="submit" name="enter" value="Autorization"><br>
            <a href="reg.php">Зарегистрироваться</a>     
        </form>';
            }
        ?>
    </div>
    <div class="banner">
        <img src="img/banner_2.jpg." alt="Баннер 2" title="Баннер 2">
    </div>
</div>






