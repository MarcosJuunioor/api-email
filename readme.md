
## Descrição
<p>
O presente projeto trata-se de um trabalho acadêmico para a disciplina de banco de dados 2, o qual consiste em uma API Rest desenvolvida em linguagem PHP com o uso do FrameWork Laravel. 
A API fornece, basicamente, os seguintes serviços: cadastro de usuário e listagem dos usuários cadastrados, login, obtenção de um usuário específico, listagem e obtenção de caixas de mensagens pertencentes a um usuário específico, enviar mensagem, listagem de todas as mensagens de uma caixa de mensagens de um usuário, recuperação de uma mensagem específica, exclusão de mensagens e moção de mensagens entre as diferentes caixas.
</p>
    
## Objetivo
<p>
Seria uma espécie de e-mail via intranet, corporativo ou talvez um “messenger corporativo” entre usuários do mesmo sistema.
</p>
    
## Modelo relacional
<p align="center"><img src="https://1drv.ms/u/s!AmUga8KLe-iygd85QQmLI3bOHdHalg" width="400"></p>


## Documentação da API
<p> 
</p>
*Usuário 

 listar todos os usuários cadastrados 

Chamar por get a url "localhost/api/usuario" 

  

cadastrar um usuário 

Passar por post um json com os dados "nome", "sobrenome", "cpf", "email", "senha" na url "localhost/api/usuario". 

 

 fazer login 

Passar por post o email e a senha do usuário na url "localhost/api/usuario/login". Será retornado um token relacionado ao usuário. 

OBS: retorna 0 se o login for mal sucedido. 

 

 obter um usuário específico  

Passar por get o "token" do usuário na url "localhost/api/usuario/digite_o_token_aqui". 

Será retornado um json com os dados do usuário. 

Exemplo: "localhost/api/usuario/Ajh2Pk3m2" 

OBS: retorna 0 se o usuário não for encontrado. 

  

*Caixa de Mensagens 

Lista de Caixas de um Usuário 

Chamar por GET o endereço localhost/api/caixas/{token}/{idUsuario}, passando o token e o id do usuário na url. 

OBS: Retorna zero caso o token esteja incorreto ou não seja encontrado. 

Recuperar uma Caixa específica 

Chamar por GET o endereço localhost/api/recuperar_caixa/{idCaixa}/{token},  passando o id da caixa e o token na url. 

OBS: Retorna zero caso o token esteja incorreto ou não for encontrado. 

Métodos - Mensagens de Email 

Enviar Mensagem 

Chamar por POST o endereço localhost/api/mensagens/enviar_mensagem, passando os seguintes dados em um Json: assunto, corpo, destinatarios e id_usuario_remetente. “destinatarios” será um vetor com objetos de campos “tipo_destinatario” e  “id_usuario_destinatario”. 

Exemplo de objeto javascript com os dados necessários:  

        var obj = {          

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

Listar todas as mensagens de uma caixa de mensagens de um usuário 

Chamar por get o endereço localhost/api/mensagens/{token}/{id_caixa_de_mensagens}, passando o token e o id da caixa de mensagens do respectivo usuário, em {token} e {id_caixa_de_mensagens}, respectivamente. 

OBS: Retorna zero caso o token esteja incorreto ou não for encontrado. 

<p> Recuperar uma Mensagem específica </p>

 

Excluir uma Mensagem 

 

Mover uma Mensagem 











