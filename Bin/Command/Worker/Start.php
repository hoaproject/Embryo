<?php

/**
 * Hoa
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2007-2011, Ivan Enderlin. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace {

from('Hoa')

/**
 * \Hoa\Socket\Internet\DomainName
 */
-> import('Socket.Internet.DomainName')

/**
 * \Hoa\Worker\Backend\Shared
 */
-> import('Worker.Backend.Shared');


/**
 * Class StartCommand.
 *
 *
 *
 * @author     Ivan Enderlin <ivan.enderlin@hoa-project.net>
 * @copyright  Copyright © 2007-2011 Ivan Enderlin.
 * @license    New BSD License
 */

class StartCommand extends \Hoa\Console\Command\Generic {

    /**
     * Author name.
     *
     * @var VersionCommand string
     */
    protected $author      = 'Ivan Enderlin';

    /**
     * Program name.
     *
     * @var VersionCommand string
     */
    protected $programName = 'Start';

    /**
     * Options description.
     *
     * @var VersionCommand array
     */
    protected $options     = array(
        array('fastcgi-domain', parent::NO_ARGUMENT, 'D'),
        array('fastcgi-port',   parent::NO_ARGUMENT, 'P'),
        array('help',           parent::NO_ARGUMENT, 'h'),
        array('help',           parent::NO_ARGUMENT, '?')
    );



    /**
     * The entry method.
     *
     * @access  public
     * @return  int
     */
    public function main ( ) {

        $domain = 'localhost';
        $port   = 9000;

        while(false !== $c = parent::getOption($v)) {

            switch($c) {

                case 'D':
                    $domain = $v;
                  break;

                case 'P':
                    $port = $v;
                  break;

                case 'h':
                case '?':
                    return $this->usage();
                  break;
            }
        }

        parent::listInputs($workerPath);

        if(null === $workerPath)
            return $this->usage();

        \Hoa\Worker\Backend\Shared::start(
            new \Hoa\Socket\Internet\DomainName(
                $domain,
                $port,
                'tcp'
            ),
            $workerPath
        );

        return HC_SUCCESS;
    }

    /**
     * The command usage.
     *
     * @access  public
     * @return  int
     */
    public function usage ( ) {

        cout('Usage   : worker:start <options> <worker_path>');
        cout('Options :');
        cout(parent::makeUsageOptionsList(array(
            'D'    => 'PHP-FPM domain name (default: localhost).',
            'P'    => 'PHP-FPM port number (default: 9000).',
            'help' => 'This help.'
        )));

        return HC_SUCCESS;
    }
}

}
