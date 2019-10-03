
<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
$base = "https://pokeapi.co/api/v2/pokemon";
$id = $_POST['input'] ;
$data = file_get_contents($base.'/'.$id);
$pokemon = json_decode($data);
//$test = $pokemon->name;

$height = $pokemon->height;
$weight = $pokemon->weight;
$base_experience = $pokemon->base_experience;
$name = $pokemon->name;
$abilities0 = $pokemon->abilities[0]->ability->name;
$abilities1 = $pokemon->abilities[1]->ability->name;
$moves0 = $pokemon->moves[0]->move->name;
$moves1 = $pokemon->moves[1]->move->name;
$moves2 = $pokemon->moves[2]->move->name;
$moves3 = $pokemon->moves[3]->move->name;

$evolution = $pokemon->species;
//var_dump($evolution);
$speciesUrl = $evolution->url;
$json2 = file_get_contents("$speciesUrl");
$pokemonEvo = json_decode("$json2");
$decentControl = $pokemonEvo->evolves_from_species;
$json_evo = file_get_contents($base.'/'.$decentControl->name);
$evoControl = json_decode($json_evo);
$nombre = $evoControl->name;

var_dump($evoControl->name);

if ($evoControl->sprites->front_default === NULL) {
    $evoControl->sprites->front_default = "pokeball.png";

}

//var_dump($pokemon->name);
//var_dump($pokemon->height);
//var_dump($pokemon->weight);
//var_dump($pokemon->base_experience);
//var_dump($pokemon->abilities[1]->name);

//$evolutions = $pokemon->species->url;
//$evolutionData = file_get_contents($evolutions);
//$evolutionDecode = json


?>


<!--//-->
<!--//$pokemon = 'bulbasaur';-->
<!--//$api = curl_init("https://pokeapi.co/api/v2/$pokemon");-->
<!--//curl_setopt($api,CURLOPT_RETURNTRANSFER, true);-->
<!--//$response = curl_exec($api);-->
<!--//curl_close($api);-->
<!--//-->
<!--//$json = json_decode($response);-->
<!--//echo '<h2>HABILITIES</h2>';-->
<!--//foreach($json->abilities as $k-> $v) {-->
<!--//    echo $v->ability->name.'<br>';-->
<!--//}-->
<!--//-->
<!--//-->
<!---->



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="jumbotron vertical-center">
    <div class="container container-fluid p-4 mt-2">

        <div class="form-row mb-3">
            <div class="col-4">
                <form method="post">
                <input name="input" type="text" id="input" class="rounded-pill form-control">
                    <button id="search" type="submit">Search Poké</button>
                </form>
            </div>
            <div class="col-1">
                <div class="rounded-pill" id="run"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div id="nameBox" class="mx-auto">
                    <span id="nameDisplay"><?php echo "$name" ?> </span>
                </div>
                <div id="infoDisplay" class="mx-auto">
                    <table class="mx-auto mt-2">
                        <tbody>
                        <tr>
                            <td>Height:</td>
                            <td id="heightDisplay"><?php echo "$height" ?> </td>
                        </tr>
                        <tr>
                            <td>Weight:</td>
                            <td id="weightDisplay"><?php echo "$weight" ?>   </td>
                        </tr>
                        <tr>
                            <td>Base Exp:</td>
                            <td id="expDisplay"><?php echo "$base_experience" ?></td>
                        </tr>
                        <tr id="abiDisplay">
                            <td>Abilities:</td>
                            <td>
                                <ul id="abiList"><?php echo "$abilities0<br>$abilities1" ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td id="typesDisplay1"></td>
                            <td id="typesDisplay2"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-3 p-3">
                <div id="imgDisplay" class="img" >
                    <img src="<?php echo $pokemon->sprites->front_default ?> ">


                </div>
            </div>
            <div class="col">
                <div id="flavorDisplay"></div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-5">
                <div id="moveBox" class="mx-auto">
                    <ul id="moveList"><span id="moveSpan">Moves</span>
                        <li id="move1"> <?php echo "$moves0" ?> </li>
                        <li id="move2"> <?php echo "$moves1" ?> </li>
                        <li id="move3"> <?php echo "$moves2" ?> </li>
                        <li id="move4"> <?php echo "$moves3" ?> </li>
                    </ul>
                </div>
            </div>

            <div class="col-6">
                <div class="row">
                    <div id="evoDisplay">
                        <table class="mx-auto justify-content-center">
                            <tr id="evoTarget">
                                <p><?php echo "$nombre" ?></p>
                                <?php
                                echo '<td><img src="'.$evoControl->sprites->front_default.'" alt="evo" class="pokeImg"> </td>'?></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="app.js"></script>
</body>
</html>