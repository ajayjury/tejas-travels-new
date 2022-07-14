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

class HolidayType extends AbstractFor
{
    protected static $forstatus = [
        '0' => 'holiday_type',
        '1' => 'Holiday',
        '2' => 'Festival',
    ];
}