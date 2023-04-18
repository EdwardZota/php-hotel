    <?php

        $hotels = [

            [
                'name' => 'Hotel Belvedere',
                'description' => 'Hotel Belvedere Descrizione',
                'parking' => true,
                'vote' => 4,
                'distance_to_center' => 10.4
            ],
            [
                'name' => 'Hotel Futuro',
                'description' => 'Hotel Futuro Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 2
            ],
            [
                'name' => 'Hotel Rivamare',
                'description' => 'Hotel Rivamare Descrizione',
                'parking' => false,
                'vote' => 1,
                'distance_to_center' => 1
            ],
            [
                'name' => 'Hotel Bellavista',
                'description' => 'Hotel Bellavista Descrizione',
                'parking' => false,
                'vote' => 5,
                'distance_to_center' => 5.5
            ],
            [
                'name' => 'Hotel Milano',
                'description' => 'Hotel Milano Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 50
            ],

    ];

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels & Co.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="text-center">
    <div>
        <?php
            var_dump($arrayParkingSi);
        ?>
    </div>
    <form action="index.php" method="GET" class="d-flex justify-content-center py-3">
        <div class="form-group mx-5">
            <label for="parking">Parcheggio:</label>
            <select name="parking" id="parking">
                <option value=""></option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>

        <div class="form-group mx-5">
            <label for="voto">Votazione:</label>
            <input type="number" name="voto" id="voto"/>
        </div>

        <button type="submit">Cerca</button>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <?php 
                    foreach($hotels[0] as $key => $value ){
                        echo "<th scope='col'>". $key ."</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 

                $filtroParcheggio=null;
                if(isset($_GET['parking'])){
                    $filtroParcheggio=$_GET['parking'];
                }
                $filtroVoto=null;
                if(isset($_GET['voto'])){
                    $filtroVoto=$_GET['voto'];
                }

                $hotelFiltrati=[];
                foreach($hotels as $hotel){
                    if($filtroParcheggio=='' || ($filtroParcheggio=='Si' && $hotel['parking']==true) || ($filtroParcheggio=='No' && $hotel['parking']==false)){
                        if($filtroVoto=='' || $hotel['vote'] >= $filtroVoto){
                            $hotelFiltrati[]=$hotel;
                        }
                    }
                }

                foreach($hotelFiltrati as $hotel){

                    echo '<tr>';

                    foreach($hotel as $info => $value){

                            if($info == 'parking' ){
                                
                            if($value==true){
                                $value='Si';
                            }else{
                                $value='No';
                            }
                        }

                        echo "<td>". $value ."</td>";

                    }
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>