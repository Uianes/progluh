<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>PROGLUH</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header>
        <div id="brand">PROGLUH</div>
    </header>
    <main>
        <nav id="links">
            <a href="#">
                <i class="material-icons" id="back">chevron_left</i>
            </a>
            <br>
            <p class="title1">
                ANÁLISE DOS CURRÍCULOS DOS CURSOS TÉCNICOS EM INFORMÁTICA NO BRASIL
            </p>
        </nav>
        <div class="container-fluid">
            <div id="author">
                <p>Uianes Luiz Rockenbach Biondo
                    <br>
                    Data de criação: 15/01/2022
                    <br>
                    Última modificação: 15/01/2022
                </p>
            </div>
            <div class="text1" style="padding-top: 30vh">
                <div class="row">
                    <div class="col-12 text-center">
                        <form method="POST">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="curso" id="concomitante" value="concomitante" checked>
                                <label class="form-check-label" for="concomitante">Concomitante</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="curso" id="integrado" value="integrado">
                                <label class="form-check-label" for="integrado">Integrado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="curso" id="proeja" value="proeja">
                                <label class="form-check-label" for="proeja">PROEJA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="curso" id="subsequente" value="subsequente">
                                <label class="form-check-label" for="subsequente">Subsequente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="submit" name="gerar" class="btn btn-success" value="Gerar"/>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['gerar'])){
                                $dadosJson = file_get_contents("ppcs/".$_POST['curso']."_ppcs.json");
                                $dadosJsonDecodificados = json_decode($dadosJson);

                                echo"<div class='table-responsive'><table class='table table-bordered' style='font-size: smaller'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>
                                                    ID
                                                </th>
                                                <th scope='col'>
                                                    Instituição
                                                </th>
                                                <th scope='col'>
                                                    Campus
                                                </th>
                                                <th scope='col'>
                                                    Tipo
                                                </th>
                                                <th scope='col'>
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    ";

                                foreach($dadosJsonDecodificados as $key => $value){
                                    echo "
                                        <tr>
                                            <th scope='row' style='background-color: $value->cor;'>
                                                $value->id
                                            </th>
                                            <th scope='row'>
                                                $value->instituição
                                            </th>
                                            <th scope='row'>
                                                $value->campus
                                            </th>
                                            <th scope='row'>
                                                $value->tipo
                                            </th>";
                                            if($value->cor == "green"){
                                                echo "
                                                <th scope='row'>
                                                    <a href='$value->status' target='_blank'>Acessar</a>
                                                </th>
                                                ";
                                            } else {
                                                echo "
                                                <th scope='row'>
                                                    $value->status
                                                </th>
                                                ";
                                            }
                                        echo "</tr>";        
                                }
                                echo "</tbody> </table> </div>";
                            }
                        ?>
                    </div>
                </div>    
            </div>
    </main>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>