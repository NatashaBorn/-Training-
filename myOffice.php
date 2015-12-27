<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
       <?php 
        $title="Информация о нас";
        require_once "blocks/head.php";
        ?>
    </head>
    <body>
       <div id="wrap_wrapper">
        <?php require_once "blocks/header.php"?>
        
        <div id="wrapper">
           <?php require_once "blocks/panel.php"?>
            <div id="leftCol">
                 <div id="myOffice">
                    
                     <h2 style="margin: 5px 20px 10px;"><?php echo $_SESSION["name"] ?>!</h2>
                     <h3 style="margin: 5px 20px 10px;">Добро пожаловать в ваш личный кабинет!</h3>
                    
                    <?php 
                    $count=  count($_SESSION);
                    if(isset($_SESSION)&&$count!=1)
                        echo '<h3>Список понравившихся вам записей:</h3>';
                    else {
                        echo '<h3>Сюда вы может добавлять понравившиеся вам записи.</h3>';
                        
                    }
                            if(($_SESSION[".$id."]===$value)&&$click==true){
                                unset($_SESSION[".$id."]);
                            }
                        foreach ($_SESSION as $value) {
                            $connection = mysql_connect("localhost", "root","");
                            $db = mysql_select_db("Articles");
                            if(!$connection||!$db){
			        exit(mysql_error());
			    }
                            $id=$_GET['id'];
                            $click=$_GET['click'];
                            
                            if(($_SESSION[".$id."]===$value)&&$click==true){
                                unset($_SESSION[".$id."]);
                                continue;
                            }
                            if($value!=$_SESSION["name"]){
                            $result = mysql_query("SELECT * FROM articles WHERE id=$value");
                            
                            mysql_close();
                            
                            if($row= mysql_fetch_array($result)) { ?> 
                                <div id="articles">  
                                <?php echo'<a href="article.php?type='.$row['type'].'&id='.$row["id"].'">
                                        <h1 class="title">'.$row['title'].'</h1>
                                        </a>';?>
                                <?php echo '<img src="img/articles/'.$row['image'].'">';?>
                                
                                <p><?php echo $row['intro_text'];?></p>
                                <div style="clear:both;"></div>
                                
                                    
                                <?php 
                                echo'<a href="article.php?type='.$row["type"].'&id='.$row["id"].'" style="float: left;">
                                <div class="more">Подробнее...</div>
                                </a>';
                                echo '<a href="myOffice.php?id='.$row["id"].'&click=true">
                                    <div><center>Убрать из избранного</div>
                                    </a>';
                                ?>
                          
                                <div style="clear:both;"></div>
                                </div>
                                <?php } 
                                }
                            }  
                         ?>
                    
                </div>
                
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        
        <?php require_once "blocks/footer.php"?>
        </div>
    </body>
</html>