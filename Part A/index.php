<?php
require_once("vendor/autoload.php");
ini_set('memory_limit', '-1');
$weather = new GuzzleWeather();

$egyption_cities = $weather->get_cities();

$json_cities = json_decode($egyption_cities, true);
if (isset($_POST["submit"])) {
    //opposite id to the selected city
    
    //opposite id to the selected city
    $key = $_POST["city"];
    $result = $weather->get_weather($key);
     //convert json to php array and true
   $data =json_decode($result->getBody(),true);    
     $cloud_desc= $data["weather"][0]["main"].": ".$data["weather"][0]["description"];
     $Temp="<br>Temprsure:  ".$data["main"]["temp_min"]."  C ".$data["main"]["temp_max"]."  C";
     $humaditiy="<br>Humidity: ".$data["main"]["humidity"]." %";
 
     $wind="<br>Wind: ".$data["wind"]["speed"]." km/h";
     $City_name=$data["name"];
     //recommended method
     /*highlight_string('<?php ' . var_export($data, true) . ';?>');*/
     //die();
 
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Weather</title>
        <link rel="stylesheet" href="resources/style.css">
      
    </head>
    <body>
        <div class="Wstatus">
            <h5><?php if(isset($_POST["submit"])) echo $City_name." Weather State" ?></h5>
            <h6><?php if(isset($_POST["submit"])) echo $cloud_desc.$Temp.$humaditiy.$wind ?></h6>
        </div>
        
    
        <form method="post">
            <h2>Guzzle Weather Forecast</h2>
            <h4>Zone: Egypt</h4>
            <select class="form-select" id="city" name="city" aria-label="Default select example">
                <option value="360542">Al Qurayn</option>
                <option value="361495">Al Ayyat</option>
                <option value="362882">Abu al Matamir</option>
                <option value="350789">Qalyub</option>
                <option value="355795">Halwan</option>
                <option value="356933">Farshut</option>
                <option value="356989">Faqus</option>
                <option value="359280">Banha</option>
                <option value="359173">Bani Suwayf</option>
            </select>
            <br><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Get Weather">
        </form>
    </body>
</html>