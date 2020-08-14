<?php

namespace Monetizze;

require("Sorteio.php");

use Monetizze\Sorteio;

$jogos = new Sorteio(7,5);
$soterio = $jogos->realizarSorteio();

?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <title>Monetizze</title>
        <meta charset="utf-8">

        <!-- CSS BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    </head>
    <style>
        body {
            margin-top: 5%;
        }
        
        tr,
        h2 {
            text-align: center;
        }
    </style>

    <body>
        <div class="container">
            <div class="card  border-dark">
                <div class="card-header">
                    <h2>Monetizze</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="center-align" scope="col" colspan="6">Resultado do jogo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($jogos->getResultado() as $key => $resultado) { ?>
                                        <td class="<?php  ?>">
                                            <?php echo $resultado; ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <?php foreach ($jogos->getJogos() as $key => $jogo) { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="<?php echo $jogos->getDezenas(); ?>">Jogo
                                            <?php echo $key + 1; ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($jogo as $valor) { ?>
                                        <td class="<?php if ($jogos->marcarNumero($valor, $key, $soterio)) echo " bg-warning "; ?>">
                                            <?php echo $valor; ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 ml-3">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Novo Resultado</button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </html>