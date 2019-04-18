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
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
            </tr>
        <?php
                foreach ($listaDeContatos as $i) {
                    echo "<tr>";
                        echo "<td><strong>" . $i->getId() . "</strong></td>";
                        echo "<td><strong>" . $i->getNome() . "<strong></td>";
                        echo "<td>" . $i->getEmail() . "</td>";
                        echo "<td class='alterar'>
                                <a id='editar' href='../Controller/Controle.php?funcao=editarContato&id=".$i->getId()."'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'>
                                        <path d='M6 0l-1 1 2 2 1-1-2-2zm-2 2l-4 4v2h2l4-4-2-2z'/>
                                    </svg>
                                </a>
                                <a class='alterar' id='remover' href='../Controller/Controle.php?funcao=removerContato&id=".$i->getId()."'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'>
                                        <path fill='#0097A7' d='M3 0c-.55 0-1 .45-1 1h-1c-.55 0-1 .45-1 1h7c0-.55-.45-1-1-1h-1c0-.55-.45-1-1-1h-1zm-2 3v4.81c0 .11.08.19.19.19h4.63c.11 0 .19-.08.19-.19v-4.81h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5v-3.5h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5v-3.5h-1z' />
                                    </svg>
                                </a>
                            </td>";
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
