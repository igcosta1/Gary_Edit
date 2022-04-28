<!DOCTYPE html>
<html>
<head>
	<?header("Content-Type: text/html; charset=utf-8", true);?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gary | Engenharia Digital </title>
      <link rel="shortcut icon" href="favicon.png" type="image/x-png">
	<link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> <!-- INTERAÇÃO JS COM ALGUMAS FUNÇÕES -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> <!-- INTERAÇÃO JS COM ALGUMAS FUNÇÕES -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
</head>
<body>
    <div class="wrapper">
        <div class="title">Gary</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div>
                    <img src="favicon.png" id="log_ed">
                </div>
                <div class="msg-header">
                    <p>Ol&aacute, eu sou o Gary, a intelig&ecirc;ncia artificial da SNC-Lavalin. Como posso te ajudar? <br> Lembre-se, eu ainda estou aprendendo. Por favor, evite acentos.</p>
                </div>
            </div>			
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Digite sua mensagem.." required>
                <button id="send-btn">Enviar</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox">  <div><img src="favicon.png" id="log_ed"></div> <div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                //start ajax 
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div><img src="favicon.png" id="log_ed"></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        //Quando o bate-papo desce, a barra de rolagem automaticamente desce para a parte inferior
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
</body>
</html>