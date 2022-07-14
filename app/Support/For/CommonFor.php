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

class CommonFor extends AbstractFor
{
    protected static $forstatus = [
        '0' => 'all_statuses',
        '1' => 'Vehicle',
        '2' => 'Package'
    ];
}