<?php

namespace App\Helper;

use Illuminate\Support\Carbon;

class Helper
{
    public static function generateRandomString($length)
    {
        $alpha = "QWERTYUIOPASDFGHJKLZXCVBNM";
        $returnData = "";
        for ($i = 0; $i < $length; $i++) {
            $returnData .= $alpha[rand(0, strlen($alpha) - 1)];
        }
        return $returnData;
    }

    public static function generateRandomNumber($length)
    {
        $returnData = "";
        for ($i = 0; $i < $length; $i++) {
            $returnData .= rand(0, 9);
        }
        return $returnData;
    }

    public static function getDateNow()
    {
        return Carbon::now()->format('Y-m-d H:i:s');
    }

    public static function decimalToBase36($decimalNumber) {
        // Make sure the input is a non-negative integer
        if (!is_int($decimalNumber) || $decimalNumber < 0) {
            return "Invalid input";
        }
    
        // Define base36 characters
        $base36Chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Calculate base36 representation
        $base36 = '';
        while ($decimalNumber > 0) {
            $remainder = $decimalNumber % 36;
            $base36 = $base36Chars[$remainder] . $base36;
            $decimalNumber = intval($decimalNumber / 36);
        }
    
        // Pad with leading zeros if necessary (to make it 3 characters long)
        $base36 = str_pad($base36, 3, '0', STR_PAD_LEFT);
    
        return $base36;
    }

    public static function base36ToDecimal($base36Number) {
        // Make sure the input is a string
        if (!is_string($base36Number)) {
            return "Invalid input";
        }
        
        // Define base36 characters
        $base36Chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        // Calculate decimal representation
        $decimal = 0;
        $base36Length = strlen($base36Number);
        for ($i = 0; $i < $base36Length; $i++) {
            $char = $base36Number[$i];
            $index = strpos($base36Chars, $char);
            if ($index === false) {
                return "Invalid base36 character";
            }
            $decimal = $decimal * 36 + $index;
        }
        
        return $decimal;
    }

    public static function getLastPart($string) {
        $parts = explode('-', $string);
        return end($parts);
    }

    public static function getYearFromNo($string) {
        $parts = explode('-', $string);
        $datePart = $parts[0];
        $year = substr($datePart, 3, 2);
        return $year;
    }
}
