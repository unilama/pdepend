<?php
/**
 * This file is part of PHP_Depend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2011, Manuel Pichler <mapi@pdepend.org>.
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
 * @subpackage Parser
 * @author     Manuel Pichler <mapi@pdepend.org>
 * @copyright  2008-2011 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    SVN: $Id$
 * @link       http://pdepend.org/
 */

require_once dirname(__FILE__) . '/ASTAllocationExpressionParsingTest.php';
require_once dirname(__FILE__) . '/ASTArgumentsParsingTest.php';
require_once dirname(__FILE__) . '/ASTFormalParameterParsingTest.php';
require_once dirname(__FILE__) . '/NamespaceResovingTest.php';
require_once dirname(__FILE__) . '/TokenStackTest.php';
require_once dirname(__FILE__) . '/UnstructuredCodeTest.php';
require_once dirname(__FILE__) . '/VersionAllParserTest.php';

/**
 * Main test suite for the PHP_Depend_Parser package.
 *
 * @category   QualityAssurance
 * @package    PHP_Depend
 * @subpackage Parser
 * @author     Manuel Pichler <mapi@pdepend.org>
 * @copyright  2008-2011 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: @package_version@
 * @link       http://pdepend.org/
 */
class PHP_Depend_Parser_AllTests extends PHPUnit_Framework_TestSuite
{
    /**
     * Constructs a new test suite instance.
     */
    public function __construct()
    {
        $this->setName('PHP::Depend::Parser::AllTests');

        $this->addTestSuite('PHP_Depend_Parser_ASTAllocationExpressionParsingTest');
        $this->addTestSuite('PHP_Depend_Parser_ASTArgumentsParsingTest');
        $this->addTestSuite('PHP_Depend_Parser_ASTFormalParameterParsingTest');
        $this->addTestSuite('PHP_Depend_Parser_NamespaceResovingTest');
        $this->addTestSuite('PHP_Depend_Parser_TokenStackTest');
        $this->addTest(PHP_Depend_Parser_UnstructuredCodeTest::suite());
        $this->addTestSuite('PHP_Depend_Parser_VersionAllParserTest');
    }

    /**
     * Returns a configured test suite instance.
     *
     * @return PHP_Depend_Parser_AllTests
     */
    public static function suite()
    {
        return new self();
    }
}
