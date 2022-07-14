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

class DiscountType extends AbstractFor
{
    protected static $forstatus = [
        '0' => 'discount_type',
        '1' => 'Per',
        '2' => 'Fix',
    ];
}