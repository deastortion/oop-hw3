<?php

class ArithmeticProgression {
    public static function check($sequence) {
        if (count($sequence) <= 1) {
            throw new Exception("[Exception] The sequence should contain more elements!");
        }

        sort($sequence);

        $difference = end($sequence) - prev($sequence);

        for ($index = 0; $index < sizeof($sequence) - 1; $index++) {
            if (($sequence[$index + 1] - $sequence[$index]) != $difference) {
                return false;
            }
        } 

        return true;
    }
}