<!DOCTYPE html>
<html lang="en" ng-app="comentApp" >
  <head>

    <meta charset="utf-8">
    <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mão de Obra Fácil - Contato</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.2.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="controller.js"></script>
    <style>
		input.ng-dirty.ng-invalid {
		    border-color: red;
		}
	</style>
  </head>
  <body ng-controller="ComentList">
	    <div class="container-fluid">
			<div class="row" style="background-color: white">
				<div class="col-md-12">
					<div class="row">
					  <nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </button>
					      <a class="navbar-brand" href="#">Inicial</a> </div>
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
					        <li class="active"> <a href="#">Quem Somos</a> </li>
					        <li> <a href="#">Contato</a> </li>
					        <li class="dropdown">
					          <ul class="dropdown-menu">
					            <li> <a href="#">Action</a> </li>
					            <li> <a href="#">Another action</a> </li>
					            <li> <a href="#">Something else here</a> </li>
					            <li class="divider"></li>
					            <li> <a href="#">Separated link</a> </li>
					            <li class="divider"></li>
					            <li> <a href="#">One more separated link</a> </li>
				              </ul>
				            </li>
				          </ul>
					      <form class="navbar-form navbar-left" role="search">
					        <div class="form-group">
					          <input type="text" class="form-control">
				            </div>
					        <button type="submit" class="btn btn-default"> Buscar </button>
				          </form>
					      <ul class="nav navbar-nav navbar-right">
					        <li> <a href="cadastro.html">Cadastre-se</a> </li>
					        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acesso<strong class="caret"></strong></a>
					          <ul class="dropdown-menu">
					            <li> <a href="#">Login</a> </li>
					            <li> <a href="#">Esqueci minha Senha</a> </li>
					            <li class="divider"></li>
					            <li> <a href="#">Ajuda</a> </li>
				              </ul>
				            </li>
				          </ul>
				        </div>
				      </nav>
					</div>
					<br>
					<span style="text-align: center; font-size: 36px;">Contato</span><br>
					<div class="row"></div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<h2 align="center" style="color: #000000; font-family: inherit;">&nbsp;</h2>
										<form name="add_coment" novalidate>
											<input type="hidden" name="id" ng-model="id">
											<input type="text" name="nome" ng-model="nome" size="50" placeholder="Digite o seu nome" required>
											<span style="color:red" ng-show="add_coment.nome.$dirty && add_coment.nome.$invalid"><span ng-show="add_coment.nome.$error.required">Por favor digite seu nome.</span></span><br>
											<input type="text" name="email" ng-model="email" placeholder="Digite o seu e-mail" size="50" maxlength="255" required>
											<span style="color:red" ng-show="add_coment.email.$dirty && add_coment.email.$invalid"><span ng-show="add_coment.email.$error.required">Por favor digite seu endereço de e-mail.</span></span><br>
											<input type="text" name="telefone" ng-model="telefone" placeholder="Digite o seu telefone" size="50" maxlength="255" required>
											<span style="color:red" ng-show="add_coment.telefone.$dirty && add_coment.telefone.$invalid"><span ng-show="add_coment.telefone.$error.required">Por favor digite seu telefone.</span></span><br>
											<input type="button" name="submit_coment" ng-show='add_cmt' value="Enviar" ng-click="coment_submit()" ng-disabled="add_coment.nome.$invalid ||  add_coment.email.$invalid ||  add_coment.telefone.$invalid">
											<input type="button" name="update_coment" ng-show='update_cmt'  value="Atualizar" ng-click="update_coment()" ng-disabled="add_coment.nome.$invalid ||  add_coment.email.$invalid ||  add_coment.telefone.$invalid">
										</form>
										<br/>
										<table border=1  class="table table-condensed table-hover" style="background-color: white">
									      	<thead>
									      		<th>ID</th>
									      		<th>Nome</th>
									      		<th>Email</th>
												<th>Telefone</th>													
									      		<th>Opções</th>     		
									      	</thead>	      	
								            <tbody ng-init="get_coment()">
								            	<tr ng-repeat="coment in coments">
											      	<td>{{ coment.id }}</td>
													<td>{{ coment.nome }}</td>
													<td>{{ coment.email }}</td>
													<td>{{ coment.telefone }}</td>
													<td><a href="" ng-click="coment_edit(coment.id)">Editar</a> | <a href="" ng-click="coment_delete(coment.id)">Excluir</a></td>
												</tr>    
								            </tbody>
								        </table>
										<div class="container-fluid">
										  <p> <a class="btn" href="#">Saiba Mais »</a></p>
										  <div class="row">
										    <div class="col-md-4">
										      <div class="thumbnail"> <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/300/200/business">
										        <div class="caption">
										          <h3> Profissionais </h3>
										          <p> Seja visto e encontrado por milhares de consumidores ao seu redor. Expanda sua rede de contatos como nunca imaginou!</p>
										          <p> <a class="btn btn-primary" href="#">Cadastre-se</a> <a class="btn" href="#">Saiba Mais</a> </p>
									            </div>
									          </div>
									        </div>
										    <div class="col-md-4">
										      <div class="thumbnail"> <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/300/200/business">
										        <div class="caption">
										          <h3> Empresas </h3>
										          <p> Tenha acesso aos melhores profissionais do mercado para indicar. Sem demora, sem burocracia.</p>
										          <p> <a class="btn btn-primary" href="#">Cadastre-se</a> <a class="btn" href="#">Saiba Mais</a> </p>
									            </div>
									          </div>
									        </div>
									      </div>
										  <p>&nbsp;</p>
										  <p>Todos os profissionais cadastrados no Mão de Obra Fácil são usuários do sistema. Pesquise e contrate direto do seu celular! 
										    Baixe grátis o app do Mão de Obra Fácil para iOS e Android e esteja conectado o tempo todo!</p>
										  <br>
										  <p align="center">2016 - Mão de Obra Fácil LTDA. Todos os direitos reservados.</p>
							  </div>
										<p>&nbsp;</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
