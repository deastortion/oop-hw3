<?php

include 'Collatz.php';

class CollatzStatistics extends Collatz {
    public function getStatistics($start, $end) {
        $output = [];

        for ($i = $start; $i <= $end; $i++) { 
            $sequence = $this->generateSequence($i);
            $steps    = $this->findTotalStoppingTimeFromSequence($sequence);

            array_push($output, [
                "number" => $i,
                "steps"  => $steps
            ]);
        }

        return $output;
    }
}