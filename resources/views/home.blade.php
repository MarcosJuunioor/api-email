<!DOCTYPE html>
<html>
<head>
	<title>Projeto BD2</title>
</head>
<body>
	
			<form id="formEnvioEmail">	
			  			
				<h3 id="tituloEscrever">Escrever e-mail</h3>
				<select id="selectDestinatario">
					<option value="">Selecione um destinatário (obrigatório)</option>
				</select>
			  
			  
			  			
				<input id="assunto" type="text" placeholder="Assunto" required>
			  
			  
			
				<select id="selectCC">
					<option value="">CC (opcional)</option>
				</select>
			  
				<select id="selectCCo" >
					<option value="">CCo (opcional)</option>
				</select>
			  
				<label for="message-text" >Mensagem</label>
				<textarea id="corpoMensagem" rows="6" maxlength="252" placeholder="Máximo de 253 caracteres" required></textarea>
			  
			  <button type="reset" >Limpar</button>
			  <button id="sendMail" type="submit" >Enviar</button>
			</form>
	

			<h2 id="tituloConta">Contas</h2>
			
			<div id="scroolConta">
				<div id="dimensaoConta"></div>
			</div>
			
			<h2 id="tituloCaixa">Caixas</h2>

			<div id="scroolCaixa" >	
				<div id="dimensaoCaixa"></div>
			</div>
			
			<button id="escreverEmail" type="button">Escrever</button>
					
					
			<form id="cadastrarEmail">
				<h2 id="tituloLogin">Crie sua conta</h2>
				
				<br/><h6 >Conta de e-mail</h6>
				<input id="contaEmail" type="email" name="contaEmail" maxlength="25" required/><br/>
					
				<br/><h6 >Confirmar e-mail</h6>
				<input id="confirmarEmail" type="email" name="confirmarEmail" maxlength="25"required/><br/>
				
				<br/><h6 >Tipo de conta</h6>			
				<select id="tipoEmail" >
				  <option value="pessoal">Pessoal</option>
				  <option value="profissional">Profissional</option>
				</select>
				
				<br/><br/>
				<input type="submit"  value="Criar"/>							
			</form>
					

			<h2 id="tituloMensagem">Mensagens</h2>
			
			<div id="scroolMensagem">
				<div id="dimensaoMensagem"></div>
			</div>

			<div id="tituloMensagemUnica">TITULO</div><br/><br/>
			<p id="corpoMensagemUnica">CORPO</p>
					
</body>
</html>
