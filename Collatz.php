<?php

class Collatz {
    public function run($start, $end) {
        $output = [];

        for ($i = $start; $i <= $end; $i++) {
            $sequence = $this->generateSequence($i);
            $highest  = $this->findHighestNumberFromSequence($sequence);
            $steps    = $this->findTotalStoppingTimeFromSequence($sequence);

            array_push($output, [
                "number"   => $i,
                "steps"    => $steps,
                "highest"  => $highest,
                "sequence" => $sequence
            ]);
        }

        return $output;
    }

    protected function generateSequence($number) {
        $sequence = [$number];
        
        while ($number != 1) {
            if ($number % 2 == 0) {
                $number = $number / 2;
            } else {
                $number = $number * 3 + 1;
            }

            array_push($sequence, $number);
        }

        return $sequence;
    }

    protected function findHighestNumberFromSequence($sequence) {
        $highest = 0;

        foreach ($sequence as $number) {
            if ($number > $highest) {
                $highest = $number;
            }
        }

        return $highest;
    }

    protected function findTotalStoppingTimeFromSequence($sequence) {
        return count($sequence) - 1;
    }
}