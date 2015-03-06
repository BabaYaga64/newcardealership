<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/car.php';

    session_start();
    if (empty($_SESSION['cars_matching_search'])) {
    $_SESSION['cars_matching_search'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/returnbestdeals", function() use ($app) {

        $cars_matching_search = array();
        $porsche = new Car("2014 Porsche 911", 114989, 798989, "<img src='porshe.jpg'>");
        $porsche->save();

        //
        // $output ="";
        //
        // if (empty($cars_matching_search)) {
        //          $output = "There are no cars that meet your search criteria.";
        //     } else {
        //         foreach ($cars_matching_search as $car) {
        //             $output .= "It's your lucky day!";
        //             $output .= "<li>" . $car->getMakeModel() . "</li>";
        //             $output .= "<ul>";
        //             $output .= "<li> $" . $car->getPrice() . "</li>";
        //             $output .= "<li> Miles:" .  $car->getMiles() . "</li>";
        //             $output .= "<li>" . $car->getImage() . "</li>";
        //             $output .= "</ul>";
        //         }
        //     }
            return $app['twig']->render('cars.twig', array('cars' => Car::getAll()));


    });

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                <title>Find a Car</title>
            </head>

            <body>
                <div class='container'>
                    <h1>Find a Car!</h1>
                    <form action='/returnbestdeals'>
                        <div class='form-group'>
                            <label for='price'>Enter Maximum Price:</label>
                            <input id='price' name='price' class='form-control' type='number'>
                        </div>
                        <div class='form-group'>
                            <label for='miles'>Enter Maximum Mileage:</label>
                            <input id='miles' name='miles' class='form-control' type='number'>
                        </div>
                        <button type='submit' class='btn-success'>Submit</button>
                    </form>
                </div>
            </body>

        </html>
    ";
    });

    return $app;
?>
