<?php

/**
 * This file is part of FusionInvoice.
 *
 * (c) FusionInvoice, LLC <jessedterry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Support\For;

class SubTripType extends AbstractFor
{
    protected static $forstatus = [
        '0' => 'sub_trip_type',
        '1' => 'One Way',
        '2' => 'Round Way',
        '3' => 'Pick Up',
        '4' => 'Drop',
    ];
}