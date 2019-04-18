<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
	<title>Novo</title>
  <link rel="stylesheet" type="text/css" href="../View/estiloSecao.css"/>
</head>
<body>
  <div class="divs">
	   <form action="../Controller/Controle.php?funcao=adcionaNovo" method="POST">
        <h1>Cadastrar <br/> Contato</h1>
        <p class="nome">
            <label for="nome">Nome</label><br/>
            <input type="text" id="nome" placeholder="Fulano de Tal" required="required" name="nome" />

        </p>
        <p>
            <label for="email">Email</label><br/>
            <input type="email" id="email" placeholder="fulano@mail.com" name="email" />

        </p>
        <p class="submit">
            <input type="submit" value="Enviar" name="formNovo" />
            <input type="button" value="Cancelar" onclick="window.location='../index.php';"/>
        </p>
    </form>
  </div>

</body>
</html>
