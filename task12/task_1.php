<?php
function isSimpleNumber($number)
{
    if ($number == 2) {
        return true;
    } else if ($number % 2 == 0) {
        return false;
    } else {
        $sqrt = (int) sqrt($number);
        for ($i = 3; $i <= $sqrt; $i += 2) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
}

function getSimpleNumbers($number)
{
    if ($number < 2) {
        return array($number);
    }
    $primes = array();
    $rest = $number;
    for ($i = 2; $i <= $number; $i++) {
        if (isSimpleNumber($i) && $number % $i == 0) {
            $primes[] = $i;
            $rest = $rest / $i;
        }
    }

    if ($rest > 1) {
        if (isSimpleNumber($rest)) {
            $primes[] = $rest;
        } else {
            $primes += getSimpleNumbers($rest);
        }

        usort($primes, function($a, $b) {
            return ($a - $b);
        });
    }
    return $primes;
}
$numbers = getSimpleNumbers(1463);
var_dump($numbers);