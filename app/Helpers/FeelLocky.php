<?php

function FeelLockyCalculateHelper($incoming_random_value)
{

    if ($incoming_random_value % 2 == 0) {

        return 'Lose';

    }

    else {
        if ($incoming_random_value > 900) {

            $procent = 80;
            return round($incoming_random_value * ($procent / 100));

        } elseif ($incoming_random_value > 600) {

            $procent = 60;
            return round($incoming_random_value * ($procent / 100));

        } elseif ($incoming_random_value > 300) {

            $procent = 20;
            return round($incoming_random_value * ($procent / 100));

        } elseif ($incoming_random_value < 300) {

            $procent = 10;
            return round($incoming_random_value * ($procent / 100));
        }
    }

}
