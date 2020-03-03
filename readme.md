
# API Rest PHP de Email Corporativo
## Descrição
O presente projeto trata-se de um trabalho acadêmico para a disciplina de banco de dados 2, o qual consiste em uma API Rest desenvolvida em linguagem PHP com o uso do FrameWork Laravel. 
A API fornece, basicamente, os seguintes serviços: cadastro de usuário e listagem dos usuários cadastrados, login, obtenção de um usuário específico, listagem e obtenção de caixas de mensagens pertencentes a um usuário específico, enviar mensagem, listagem de todas as mensagens de uma caixa de mensagens de um usuário, recuperação de uma mensagem específica, exclusão de mensagens e moção de mensagens entre as diferentes caixas.
    
## Objetivo
Seria uma espécie de e-mail via intranet, corporativo ou talvez um “messenger corporativo” entre usuários do mesmo sistema.
    
## Modelo relacional
Visto que foi utilizado um banco de dados relacional, abaixo está a modelagem do mesmo, para que se tenha uma visão panorâmica da relação entre as tabelas.
![modelo relacional](https://github.com/MarcosJuunioor/api-email/blob/master/modelo%20relacional%20api_email.png)


## Documentação da API
Abaixo segue a documentação da API, onde estão descritos os serviços fornecidos e a sintaxe de solicitação de cada um. As URL's estão definidas considerando que o servidor é "local host", só para ilustração. Obs: Os métodos estão organizados em 3 grupos: Usuário, Caixa de Mensagens e Mensagens.

### Usuário 

#### Listar todos os usuários cadastrados 

Chamar por get a url "localhost/api/usuario" 

#### Cadastrar um usuário 

Passar por post um json com os dados "nome", "sobrenome", "cpf", "email", "senha" na url "localhost/api/usuario".  

#### Fazer login 

Passar por post o email e a senha do usuário na url "localhost/api/usuario/login". Será retornado um token relacionado ao usuário. 

OBS: retorna 0 se o login for mal sucedido. 

#### Obter um usuário específico  

Passar por get o "token" do usuário na url "localhost/api/usuario/digite_o_token_aqui". 

Será retornado um json com os dados do usuário. 

Exemplo: "localhost/api/usuario/Ajh2Pk3m2" 

OBS: retorna 0 se o usuário não for encontrado. 

### Caixa de Mensagens 

#### Lista de Caixas de um Usuário 

Chamar por GET o endereço localhost/api/caixas/{token}/{idUsuario}, passando o token e o id do usuário na url. 

OBS: Retorna zero caso o token esteja incorreto ou não seja encontrado. 

#### Recuperar uma Caixa específica 

Chamar por GET o endereço localhost/api/recuperar_caixa/{idCaixa}/{token},  passando o id da caixa e o token na url. 

OBS: Retorna zero caso o token esteja incorreto ou não for encontrado. 

### Mensagens

#### Enviar Mensagem 

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

#### Listar todas as mensagens de uma caixa de mensagens de um usuário 

Chamar por get o endereço localhost/api/mensagens/{token}/{id_caixa_de_mensagens}, passando o token e o id da caixa de mensagens do respectivo usuário, em {token} e {id_caixa_de_mensagens}, respectivamente. 

OBS: Retorna zero caso o token esteja incorreto ou não for encontrado. 

#### Recuperar uma Mensagem específica 
Método a ser implementado...

#### Excluir uma Mensagem 
Método a ser implementado...
 
#### Mover uma Mensagem 
Método a ser implementado...

## Linguagens e Framework
O projeto foi desenvolvido em PHP com o uso do Framework Laravel. O SGBD utilizado foi o Postgres SQL.







