<!DOCTYPE html>
<html>
    <head>
       <?php 
        $title="Обратная связь";
        require_once "blocks/head.php";
        ?>
        
    </head>
    <body>
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
                    /*$(document).ready(function(){
                       $("#done").click(function(){
                          var name=$("#name").val();
                          var email=$("#email").val();
                          var subject=$("#subject").val();
                          var message=$("#message").val();
                          var fail="";

                          if(name.length < 3) fail = "Имя не меньше 3 символов";
                          else if(email.split('@').length-1==0||email.split('.').length-1==0)
                               fail="Вы ввели некорректный email";
                          else if(subject.length<5)
                               fail="Тема сообщения не менее 5 символов"; 
                          else if(message.length<20)
                               fail="Сообщение не менее 20 символов";
                            if(fail !=""){
                                $('#messageShow').html(fail + "<div class='clear'><br></div>");
                                $('#messageShow').show();
                                return false;
                            }
                       }); 
                    });*/
                </script>
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        <?php require_once "blocks/footer.php"?>
        
    </body>
</html>