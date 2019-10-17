

<!DOCTYPE html>
<html>
<head>
    <title>Projeto BD2</title>  
</head>
<body>

 

     <script>

        var obj1 ={         
            assunto: "IFPE",
            corpo: "teste IFPE.",
            destinatarios: [
                {
                    tipo_destinatario: "para",
                    id_usuario_destinatario: 6,
                },
                {
                    tipo_destinatario: "cco",
                    id_usuario_destinatario: 2,
                },
                {
                    tipo_destinatario: "cc",
                    id_usuario_destinatario: 7,
                },
            ],
            id_usuario_remetente: 1,          
        };

        var json = JSON.stringify(obj1); // Transforma o obj1 em sintaxe JSON
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            } 
            if (this.readyState == 4 && this.status != 200) {
                console.log(this.status);
            } 
        };
        var url = "api/mensagens/enviar_mensagem";
        xhttp.open("post", url, true);
        xhttp.setRequestHeader("Content-type", "application/json");

        xhttp.send(json);

    </script> 
</body>
</html>