<?php
  session_start();
?>

<!DOCTYPE html>

<html lang="pt-br">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/style.css">
    <title>🛒</title>
  </head>

  <body>

    <div class="title" align="center">
      <h1>🛒 Carrinho de compras PHP</h1>
    </div>

    <?php
    // Lista em itens
      $itens = array(['nome'=>'☕ Café','imagem'=>'cafe.png','preco'=>'5'],
              ['nome'=>'🍶 Água','imagem'=>'agua.png','preco'=>'3'],
              ['nome'=>'🍫 Chocolate','imagem'=>'chocolate.png','preco'=>'8']);

      foreach ($itens as $key => $value){
      // Abertura HTML
    ?>

    <div class="itens">
      <h2><?php echo $value['nome']; ?></h2>
      <p><b>Valor: R$ <?php echo $value['preco']; ?>,00</b></p>
      <img width="100" src="assets/<?php echo $value['imagem']?>" />
      <a href="?adicionar=<?php echo $key; ?>">📦 Adicionar ao carrinho </a>
    </div>

    <div class="itens">
      <a href="?remover=<?php echo $key; ?>">❌ Remover produto </a>
    </div>

    <?php
    // Fechamento HTML
    
    }
    ?>

    <?php
      if (isset($_GET['adicionar'])){
        
        // Adicionar ao carrinho 
        
        $idproduto = (int) $_GET['adicionar'];
        
        // Se o Valor idproduto estiver dentro de $itens

        if(isset($itens[$idproduto])){
          if(isset($_SESSION['carrinho'][$idproduto])){
            $_SESSION['carrinho'][$idproduto]['quant']++;
          } else {
            $_SESSION['carrinho'][$idproduto] = array('quant'=>1,'nome'=>$itens[$idproduto]['nome'],'preco'=>$itens[$idproduto]['preco']);
          }
          echo "<script>alert('➕ Produto adicionado')</script>";
        } else {
          die('O produro não existe');
        }
      }
      
      // Remover do carrinho 
    
      if (isset($_GET['remover'])){

        $idproduto = (int) $_GET['remover'];
        
        if(isset($itens[$idproduto])){
          $_SESSION['carrinho'][$idproduto]['quant']--;
        }
        echo "<script>alert('❌ Produto Removido')</script>";
      }
    ?>

    <div class="lista" align="center">

      <?php
      // Lista de itens
        require('lista.php');
      // Html / CSS
      ?>

      <div class="total">
        
        <p><?php echo 'Valor total R$: '.$total.',00<br>';?>
           <?php echo 'Quantidade de itens: '.$quant.'<br>'; ?></p>
      
      </div>
    
    </div>

  </body>

</html>
