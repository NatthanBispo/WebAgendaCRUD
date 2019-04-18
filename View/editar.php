<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
	<title>Editar</title>
  <link rel="stylesheet" type="text/css" href="../View/estiloSecao.css"/>
</head>
<body>
  <div class="divs">
	   <form action="../Controller/Controle.php?funcao=updateContato&id=<?=$id?>"  method="POST">
        <h1>Atualizar <br/> Contato</h1>
        <p class="nome">
            <label for="nome">Nome</label><br/>
            <input type="text" id="newName" value="<?= $nome?>" required="required" name="newName" />
        </p>
        <p>
            <label for="email">Email</label><br/>
            <input type="email" id="newEmail" value="<?= $email?>" required="required" name="newEmail" />
        </p>
        <p class="submit">
            <input type="submit" value="Enviar" name="formEditar"/>
            <input type="button" value="Cancelar" onclick="window.location='../Controller/Controle.php?funcao=verLista';"/>
        </p>
      </form>
  </div>

</body>
</html>
