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
		var xhr1 = new XMLHttpRequest(); // Criando um objeto XMLHttpRequest
		
		
		// Especifica o tipo de conexão com o servidor (tipo, url e assincrona)
		xhr1.open("POST", "127.0.0.1/api/usuario", false);
		
		//Adiciona cabeçalho HTTP a requisição (nome do cabeçalho e valor do cabeçalho)
		xhr1.setRequestHeader("Content-type", "application/json"); 
		
		
		xhr1.onreadystatechange = function(){ // Função executada toda vez que o status do objeto XMLHttpRequest for alterado
			//Cadastro realizado
			if(xhr1.readyState == XMLHttpRequest.DONE && xhr1.status == 200){ //if (this.readyState == 4 && this.status == 200)
				alert("CADASTRADO!!");
			}
			// Erro no cadastro
			if(xhr1.readyState == XMLHttpRequest.DONE && xhr1.status != 200){
				alert("NÃO CADASTRADO!!");
			}
			
		}
		
		xhr1.send(json); //Envia a sintaxe JSON para o servidor
	}else{
		alert("As senhas são incompatíveis");
	}
});

