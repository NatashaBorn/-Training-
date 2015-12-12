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
                    $connection = mysql_connect("localhost", "root","");
                    $db = mysql_select_db("Articles");
                    if(!$connection||!$db){
			        exit(mysql_error());
			}
                    $id=$_GET['id'];
                    $base=$_GET['base'];
                    
                    if(isset($_GET)){
                        $result=mysql_query("SELECT * FROM $base WHERE id=$id");
                        $row=mysql_fetch_array($result);                   
                    }
                    
                    mysql_close();
                                        
                    ?> 
                    <div id="articles">
                    <h1><?php echo $row['title'];?></h1>
                    <?php echo '<img src="img/articles/'.$base.'/'.$id.'.jpg">';?>
                    <p><?php echo $row['full_text'];?></p>
                    <p>Дата публикации: <?php echo $row['date'];?> / <?php echo $row['time'];?></p>
                    <p>Автор новости: <?php echo $row['author'];?></p>
                    <a href="#">
                        <div class="more">Добавить в избранное</div>
                        </a>
                    </div>
                                                  
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        <?php require_once "blocks/footer.php"?>
        
    </body>
</html>