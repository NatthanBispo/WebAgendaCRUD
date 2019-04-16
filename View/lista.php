<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
    <link rel="stylesheet" type="text/css" href="../View/estiloSecao.css"/>
</head>
<body>
  <div class="divs" id="listaContatos">
    <h1>Lista de Contatos</h1>
    <table>
      <?php
          if ($listaDeContatos != null){?>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        <?php
                foreach ($listaDeContatos as $i) {
                    echo "<tr>";
                        echo "<td><strong>" . $i->getId() . "</strong></td>";
                        echo "<td><strong>" . $i->getNome() . "<strong></td>";
                        echo "<td>" . $i->getEmail() . "</td>";
                        echo "<td><a id='editar' href='../Controller/Controle.php?funcao=editarContato&id=".$i->getId()."'>Editar</a>
                        <a id='remover' href='../Controller/Controle.php?funcao=removerContato&id=".$i->getId()."'>Remover</a></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <p>
        <a href="../index.php">Voltar</a>
        <a href="../Controller/Controle.php?funcao=apagarLista">Zerar Lista</a>
    </p>
  </div>
</body>
</html>
