<?php

/**
 * This file is part of the Happyr Doctrine Specification package.
 *
 * (c) Tobias Nyholm <tobias@happyr.com>
 *     Kacper Gunia <kacper@gunia.me>
 *     Peter Gribanov <info@peter-gribanov.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Happyr\DoctrineSpecification\Filter;

use Happyr\DoctrineSpecification\Operand\Operand;

class LessThan extends Comparison
{
    /**
     * @param Operand|string $field
     * @param Operand|mixed  $value
     * @param string|null    $dqlAlias
     */
    public function __construct($field, $value, $dqlAlias = null)
    {
        parent::__construct(self::LT, $field, $value, $dqlAlias);
    }
}
