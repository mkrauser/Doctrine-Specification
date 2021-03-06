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

namespace Happyr\DoctrineSpecification\Operand;

use Doctrine\ORM\QueryBuilder;

@trigger_error('The '.__NAMESPACE__.'\BitNot class is deprecated since version 1.1 and will be removed in 2.0.', E_USER_DEPRECATED);

/**
 * @deprecated This class is deprecated since version 1.1 and will be removed in 2.0.
 */
class BitNot implements Operand
{
    /**
     * @var Operand|string
     */
    private $field;

    /**
     * @param Operand|string $field
     */
    public function __construct($field)
    {
        $this->field = $field;
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $dqlAlias
     *
     * @return string
     */
    public function transform(QueryBuilder $qb, $dqlAlias)
    {
        $field = ArgumentToOperandConverter::toField($this->field);

        $field = $field->transform($qb, $dqlAlias);

        return sprintf('(~ %s)', $field);
    }
}
