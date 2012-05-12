<?php
/**
 * This file is part of PHP_Depend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2012, Manuel Pichler <mapi@pdepend.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   QualityAssurance
 * @package    PHP_Depend
 * @subpackage AST
 * @author     Manuel Pichler <mapi@pdepend.org>
 * @copyright  2008-2012 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    SVN: $Id$
 * @link       http://pdepend.org/
 */

/**
 * AST node that represents a PHP interface.
 *
 * @category   QualityAssurance
 * @package    PHP_Depend
 * @subpackage AST
 * @author     Manuel Pichler <mapi@pdepend.org>
 * @copyright  2008-2012 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: @package_version@
 * @link       http://pdepend.org/
 * @since      2.0.0
 */
class PHP_Depend_AST_Interface extends PHPParser_Node_Stmt_Interface implements PHP_Depend_AST_Type
{
    /**
     * References to other ast nodes.
     *
     * @var PHP_Depend_AST_InterfaceRefs
     */
    private $refs;

    /**
     * Constructs a new interface instance.
     *
     * @param PHPParser_Node_Stmt_Interface $interface
     * @param PHP_Depend_AST_InterfaceRefs $refs
     */
    public function __construct( PHPParser_Node_Stmt_Interface $interface, PHP_Depend_AST_InterfaceRefs $refs )
    {
        parent::__construct(
            $interface->name,
            array(
                'extends'  =>  $interface->extends,
                'stmts'    =>  $interface->stmts
            ),
            $interface->attributes
        );

        $this->refs           = $refs;
        $this->namespacedName = $interface->namespacedName;

        $this->refs->initialize( $this );
    }

    /**
     * Returns the global identifier for this node.
     *
     * @return string
     */
    public function getId()
    {
        return $this->getAttribute( 'id' );
    }

    /**
     * Returns the namespace for this node.
     *
     * @return PHP_Depend_AST_Namespace
     */
    public function getNamespace()
    {
        return $this->refs->getNamespace();
    }

    /**
     * Magic wake up method that will register this object in the global node
     * reference context.
     *
     * @return void
     * @access private
     */
    public function __wakeup()
    {
        $this->refs->initialize( $this );
    }
}