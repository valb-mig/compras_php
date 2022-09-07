
<?php
  // Lista do carrinho
  foreach ($_SESSION['carrinho'] as $key => $value){

    echo '<p>Nome: '.$value['nome'].' | Valor: R$ '.$value['quant']*$value['preco'].',00 | Quantidade: '.$value['quant'].'</p>';

    $quant_r = $value['quant'];
    $quant = $quant + $quant_r; 

    $total_r = $value['preco']*$value['quant'];
    $total = $total + $total_r; 
  }
?>
