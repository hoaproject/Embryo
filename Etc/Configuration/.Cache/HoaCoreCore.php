<?php

/**
 * Generated the 2010-12-04T14:37:53.000000Z
 */

return array (
  'keywords' =>
  array (
    'root' => NULL,
    'cwd' => NULL,
  ),
  'parameters' =>
  array (
    'root.hoa' => '(:root:)',
    'root.application' => '(:cwd:h:)',
    'root.data' => '(:%root.application:h:)/Data',
    'protocol.Application' => '(:%root.application:)/',
    'protocol.Application/Public' => 'Public/',
    'protocol.Data' => '(:%root.data:)/',
    'protocol.Data/Etc' => 'Etc/',
    'protocol.Data/Etc/Configuration' => 'Configuration/',
    'protocol.Data/Etc/Locale' => 'Locale/',
    'protocol.Data/Library' => 'Library/Hoathis/;' .
                               'Library/Hoa/',
    'protocol.Data/Lost+found' => 'Lost+found/',
    'protocol.Data/Temporary' => 'Temporary/',
    'protocol.Data/Variable' => 'Variable/',
    'protocol.Data/Variable/Cache' => 'Cache/',
    'protocol.Data/Variable/Database' => 'Database/',
    'protocol.Data/Variable/Log' => 'Log/',
    'protocol.Data/Variable/Private' => 'Private/',
    'protocol.Data/Variable/Run' => 'Run/',
    'protocol.Data/Variable/Test' => 'Test/',
    'protocol.Library' => '(:%protocol.Data:)Library/Hoathis/;' .
                          '(:%protocol.Data:)Library/Hoa/;' .
                          '(:%root.hoa:)/Hoathis/;' .
                          '(:%root.hoa:)/Hoa/',
    'namespace.prefix.*' => '(:%protocol.Data:)Library/;(:%root.hoa:)/',
    'namespace.prefix.Application' => '(:%root.application:h:)/',
  ),
);