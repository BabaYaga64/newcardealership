$porsche = new Car("2014 Porsche 911", 114989, 798989, "<img src='porshe.jpg'>");
$ford = new Car("2011 Ford F450", 12445, 98989, "<img src='ford.jpg'>");
$lexus = new Car("2013 Lexus 350", 55584, 8888, "<img src='lexus.jpg'>");
$mercedes = new Car("Mercedes Benz CLS550", 390000, 37979, "<img    src='mercedes.jpg'>");
$mercedes->setPrice(9999999);
$mercedes->setMiles(2);
$mercedes->setMakeModel($lexus);

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($_GET['pricexx']) && ($car->worthMileage($_GET['milesxx']))) {
    array_push($cars_matching_search, $car);
}

}



?>

<!DOCTYPE html>
<html>
<head>
<title>Your Car Dealership's Homepage</title>
</head>
<body>
<h1>Your Car Dealership</h1>

//This will be what twig does
<ul>
    <?php

    ?>
</ul>
</body>
</html>
