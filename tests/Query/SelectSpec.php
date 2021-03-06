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

namespace tests\Happyr\DoctrineSpecification\Query;

use Doctrine\ORM\QueryBuilder;
use Happyr\DoctrineSpecification\Operand\Field;
use Happyr\DoctrineSpecification\Query\QueryModifier;
use Happyr\DoctrineSpecification\Query\Select;
use PhpSpec\ObjectBehavior;

/**
 * @mixin Select
 */
class SelectSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('foo');
    }

    public function it_is_a_select()
    {
        $this->shouldBeAnInstanceOf(Select::class);
    }

    public function it_is_a_specification()
    {
        $this->shouldHaveType(QueryModifier::class);
    }

    public function it_select_single_filed(QueryBuilder $qb)
    {
        $qb->select(['a.foo'])->shouldBeCalled();
        $this->modify($qb, 'a');
    }

    public function it_select_several_fields(QueryBuilder $qb)
    {
        $this->beConstructedWith('foo', 'bar');
        $qb->select(['b.foo', 'b.bar'])->shouldBeCalled();
        $this->modify($qb, 'b');
    }

    public function it_select_several_fields_as_array(QueryBuilder $qb)
    {
        $this->beConstructedWith(['foo', 'bar']);
        $qb->select(['b.foo', 'b.bar'])->shouldBeCalled();
        $this->modify($qb, 'b');
    }

    public function it_select_operand(QueryBuilder $qb)
    {
        $this->beConstructedWith('foo', new Field('bar'));
        $qb->select(['b.foo', 'b.bar'])->shouldBeCalled();
        $this->modify($qb, 'b');
    }
}
