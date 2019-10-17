
<!DOCTYPE html>
<html>
<head>
    <title>Projeto BD2</title>  
</head>
<body>

    <form id="cadastro">
        <input id="nome" type="text" name="nome" placeholder="Primeiro nome" required/><br/>
        <input id="sobrenome" type="text" name="sobrenome" placeholder="Sobrenome" required/><br/>
        <input id="cpf" type="text" name="cpf" placeholder="XXX.XXX.XXX-XX" required/><br/>
        <!-- <input id="cpf" type="text" name="cpf" placeholder="XXX.XXX.XXX-XX" pattern="[0-9]{3}[.][0-9]{3}[.][0-9]{3}[-][0-9]{2}" required/></><br/><br/> -->
        <input id="email" type="email" name="email" placeholder="Conta de e-mail" required/><br/>           
        <input id="senha" type="password" name="senha" placeholder="Senha" required/><br/>
        <input id="confirmarSenha" type="password" name="confirmarSenha" placeholder="Repita a senha" required/><br/>
        
        <input type="submit" value="Cadastrar"/>
        <input type="reset" value="Limpar"/>
    </form>

    <br/><br/><br/>

    <form id="login">   
        <input id="email" type="email" name="email" placeholder="Conta de login" required/><br/>        
        <input id="senha2" type="password" name="senha2" placeholder="Insira sua senha" required/><br/>
        <input type="submit" value="Login"/>
        <input type="reset" value="Limpar"/>
    </form> 

     <script>
        //Cadastro de usuarios
        var formCadastro = document.getElementById("cadastro"); // Obtendo id do formulário de cadastro

        formCadastro.addEventListener("submit",function(e){ // Adicionando evento ao submeter cadastro
            e.preventDefault(); // Previne ação padrão de submissão

            if(document.getElementById("senha").value == document.getElementById("confirmarSenha").value){
                // Criação do objeto a ser tratado e enviado para o servidor
                var obj1 ={         
                    nome: document.getElementById("nome").value,
                    sobrenome: document.getElementById("sobrenome").value,
                    cpf: document.getElementById("cpf").value,
                    email: document.getElementById("email").value,          
                    senha: document.getElementById("senha").value,
                }

                var json = JSON.stringify(obj1); // Transforma o obj1 em sintaxe JSON
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 201) {
                        console.log(this.responseText);
                        alert("CADASTRADO *-*");
                    } 
                    if (this.readyState == 4 && this.status != 201) {
                        console.log(this.status);
                        alert("NÃO CADASTRADO x-x'");
                    } 
                };
                var url = "api/usuario";
                xhttp.open("post", url, true);
                xhttp.setRequestHeader("Content-type", "application/json");

                xhttp.send(json);
            }else{
                alert("As senhas são incompatíveis");
            }
        });

        //Login no sistema
        var formLogin = document.getElementById("login"); // Obtendo id do formulário de login

        formLogin.addEventListener("submit",function(e){ // Adicionando evento ao submeter login
            e.preventDefault(); // Previne ação padrão de submissão
                // Criação do objeto a ser tratado e enviado para o servidor
                var obj1 ={
                    email: document.getElementById("email").value,          
                    senha: document.getElementById("senha2").value,
                }

                var json = JSON.stringify(obj1); // Transforma o obj1 em sintaxe JSON
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.status);
                        //alert("ENTREI =D O token é: "+this.responseText);
                        window.location = "index/home";
                    }

                    if (this.readyState == 4 && this.status != 200) {
                        console.log(this.status);
                        alert("NÃO ENTREI ='(");
                    } 
                };
                var url = "api/usuario/login";
                xhttp.open("post", url, true);
                xhttp.setRequestHeader("Content-type", "application/json");

                xhttp.send(json);
            
        });

</body>
</html>