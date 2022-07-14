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

class UserType extends AbstractFor
{
    protected static $forstatus = [
        '0' => 'user_type',
        '1' => 'Super Admin',
        '2' => 'Sub Admin',
        '3' => 'Content',
        '4' => 'Operational',
    ];
}