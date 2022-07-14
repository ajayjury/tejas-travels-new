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

class RideType extends AbstractFor
{
    protected static $forstatus = [
        '0' => 'ride_type',
        '1' => 'All',
        '2' => 'Local',
        '3' => 'Outstation',
        '4' => 'Airport',
    ];
}