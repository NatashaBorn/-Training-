<?php
    $connect=mysql_connect("localhost","root","")or die(mysql_error());
        mysql_select_db("Articles");
            if(isset($_POST["enter"])){
                $e_login=$_POST["e_login"];
                $e_password= md5($_POST["e_password"]);
                $query=  mysql_query("SELECT * FROM users WHERE login='$e_login'");
                $user_data=  mysql_fetch_array($query);
                if($user_data["password"]==$e_password){
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
            
            if(isset($_POST["addIdeaArticle"])){
                
                
            }
            if(isset($_SESSION["name"])&&($_SESSION["name"])==='Natasha'){
                echo '
                <form  method="post" action="index.php">
                    <a href="myOffice.php">'.$_SESSION["name"].'</a>
                    <a href="ListIdeas.php">Предложенные идеи <br> для статьи</a><br>
                    <a href="addNewArticle.php">Добавить новую статью</a><br>
                    <input type="submit" name="exit" value="Выход"><br>
                </form>';
                
                
            }
            
            elseif(isset($_SESSION["name"])&&($_SESSION["name"])!='Natasha'){
                echo '
                <form  method="post" action="index.php">
                    <a href="myOffice.php">'.$_SESSION["name"].'</a>
                    <a href="addIdeaArticle.php">Предложить идею для статьи</a>
                    <br><input type="submit" name="exit" value="Выход"><br>
                </form>';
                
                
            }
            else{
                echo '<form  method="post" action="index.php">
                        <input type="text" name="e_login" placeholder="Login" required><br>
                        <input type="password" name="e_password" placeholder="Password" required><br>
                        <input type="submit" name="enter" value="Войти" onclick="">
                        <a href="reg.php" style="color: rgba(73, 58, 191, 0.87); background-color: inherit;margin-top:0;">Зарегистрироваться</a>   
                    </form>';
            }