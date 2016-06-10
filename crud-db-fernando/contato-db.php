<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mão de Obra Fácil - Contato</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="crud.js"></script>
    <script type="text/javascript" src="js/jquery-2.2.2.js"></script>
    <!--<script src="js/jquery.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </head>
  <body>
	    <div class="container-fluid">
			<div class="row" style="background-color: white">
				<div class="col-md-12">
					<div class="row"></div>
					<br>
					<div class="container-fluid">
					  <div class="row">
					  <div class="col-md-12">
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
					  <p>&nbsp;</p>
					  <div class="col-md-12">
					    <div class="row"> <br>
					      <span style="text-align: center; font-size: 36px;">Contato</span><br>
					      <br>
					      <br>
					      <div>
					        <label class="control-label" style="color: white">Name</label>
					        <div>
					          <input size="50" maxlength="50" name="nome" type="text" id="nome" placeholder="Nome" required>
					          <div>
					            <label id="erroNome" style="color: red"></label>
				              </div>
				            </div>
					        <div>
					          <div>
					            <label class="control-label" style="color: white">E-Mail</label>
					            <div>
					              <input size="50" maxlength="50" name="email" type="text" id="email" placeholder="E-Mail" required>
					              <div>
					                <label id="erroEmail" style="color: red"></label>
				                  </div>
				                </div>
					            <div>
					              <label class="control-label" style="color: white">Telefone</label>
					              <div>
					                <input size="50" maxlength="50" name="telefone" type="text" id="telefone" placeholder="Telefone" required>
					                <div>
					                  <label id="erroTelefone" style="color: red"></label>
				                    </div>
					                <div></div>
				                  </div>
					              <input name="button" type="button" id="btnAdd" onclick="add();" class="btn btn-success" value="Enviar" />
					              <br>
					              <br>
					              <table class="table table-stripdes table-bordered" id="tabela"  style="background-color: white">
					                <tr>
					                  <th>ID</th>
					                  <th>Nome</th>
					                  <th>E-Mail</th>
					                  <th>Telefone</th>
					                  <th>Opções</th>
				                    </tr>
					                <?
								          mysql_connect("localhost", "scriptsf_user", "20scripts16");
								          mysql_select_db("scriptsf_maodeobra");
								           
								          $sql = mysql_query("SELECT * FROM MAODEOBRA ORDER BY id ASC");
								          while($coluna = mysql_fetch_array($sql)){
								            $id = $coluna["id"];
								        ?>
					                <tr>
					                  <td><?=$coluna['id'];?></td>
					                  <td>
					                    <?= $coluna["nome"]; ?>
					                    </td>
					                  <td>
					                    <?= $coluna["email"]; ?>
					                    </td>
					                  <td>
					                    <?= $coluna["telefone"]; ?>
					                    </td>
					                  <td><span id="enviar<?=$id?>">
					                    <button href="javascript:" onclick="editar('<?=$id;?>')">Alterar</button>
					                    </span>
					                    <button href="javascript:;" onclick="apagar('<?=$id ?>', this.parentNode.parentNode.rowIndex);">Remover</button></td>
				                    </tr>
					                <?
								        }
								  ?>
				                  </table>
				                </div>
				              </div>
				            </div>
				          </div>
				        </div>
				      </div>
					  <p>&nbsp;</p>
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
					<br><br><br>
					<br>
					<div class="row">
  </body>
</html>