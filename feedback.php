<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
       <?php 
        $title="Обратная связь";
        require_once "blocks/head.php";
        ?>
        
    </head>
    <body>
       <div id="wrap_wrapper">
        <?php require_once "blocks/header.php"?>
        
        <div id="wrapper">
          <?php require_once "blocks/panel.php"?>
           <div id="leftCol">               
                <form id="form">
                    <input type="text" name="name" placeholder="Ваше имя" required /><br />
                    <input type="text" name="phone" placeholder="Ваш телефон" required /><br />
                    <textarea name="text" placeholder="Ваш текст"></textarea><br />
                    <button>Отправить</button>
                </form>
                
                <script src="js/jquery.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#form").submit(function() {
                            $.ajax({
                                type: "POST",
                                url: "mail.php",
                                data: $(this).serialize()
                            }).done(function() {
                                $(this).find("input").val("");
                                alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
                                $("#form").trigger("reset");
                            });
                            return false;
                        });

                    });
                    
                    
                </script>
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        
        <?php require_once "blocks/footer.php"?>
        </div>
    </body>
</html>