<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $image_path;


        function __construct($make_model, $price, $miles, $image_path)
        {
            $this->make_model = $make_model;
            $this->price = $price;
            $this->miles = $miles;
            $this->image_path = $image_path;

        }

        function worthBuying($max_price)
        {
            return $this->price < ($max_price + 100);

        }

        function worthMileage($max_mileage)
        {
            return $this->miles < ($max_mileage + 100);
        }

        function setMakeModel()
        {
             $this->make_model;
        }

        function setPrice($new_price)
        {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
                $formatted_price = number_format($float_price, 2);
                $this->price = $formatted_price;
            }
        }

        function setMiles()
        {
             $this->miles;
        }

        function setImage()
        {
            $this->image_path;
        }

        function getMakeModel()
        {
            return $this->make_model;
        }

        function getPrice()
        {
            return $this->price;

        }

        function getMiles()
        {
            return $this->miles;
        }

        function getImage()
        {
            return $this->image_path;
        }

        static function getAll()
        {
            return $_SESSION['cars_matching_search'];
        }

        function save()
        {
            array_push($_SESSION['cars_matching_search'], $this);
        }
        static function deleteAll()
        {
            $_SESSION['cars_matching_search'] = array();
        }
    }

    ?>
