<?php

use App\Enums\SupportStatus;

if (!function_exists('getStatusSupport')) {
    function getStatusSupport(string $value): string {
       return SupportStatus::fromValue($value);
    }
}