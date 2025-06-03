<?php

namespace App\Traits;

trait CustomTrait
{
    function formatIndianRupee($amount)
    {
        // Format number in Indian number format: 1,23,456.78
        $formatted = number_format($amount, 2, '.', '');

        $parts = explode('.', $formatted);
        $number = $parts[0];
        $decimal = isset($parts[1]) ? $parts[1] : '00';

        // Get last 3 digits (e.g., 456)
        $lastThree = substr($number, -3);
        $restUnits = substr($number, 0, -3);

        if ($restUnits != '') {
            $restUnits = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $restUnits);
            $formatted = $restUnits . ',' . $lastThree;
        } else {
            $formatted = $lastThree;
        }

        return '₹' . $formatted . '.' . $decimal;
    }
}
