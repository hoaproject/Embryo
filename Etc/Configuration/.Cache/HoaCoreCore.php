<?php

/**
 * Generated the 2010-12-04T14:37:53.000000Z
 */

return array (
  'keywords' => 
  array (
    'hoa' => NULL,
    'cwd' => NULL,
  ),
  'parameters' => 
  array (
    'root.framework' => '(:hoa:)',
    'root.data' => '(:%root.application:h:)/Data',
    'root.application' => '(:cwd:h:)',
    'framework.core' => '(:%root.framework:)/Core',
    'framework.library' => '(:%root.framework:)/Library',
    'framework.module' => '(:%root.framework:)/Module',
    'data.module' => '(:%root.data:)/Module',
    'protocol.Application' => '(:%root.application:)/',
    'protocol.Application/Public' => '(:%protocol.Application:)Public/',
    'protocol.Data' => '(:%root.data:)/',
    'protocol.Data/Etc' => '(:%protocol.Data:)Etc/',
    'protocol.Data/Etc/Configuration' => '(:%protocol.Data/Etc:)Configuration/',
    'protocol.Data/Etc/Locale' => '(:%protocol.Data/Etc:)Locale/',
    'protocol.Data/Lost+found' => '(:%protocol.Data:)Lost+found/',
    'protocol.Data/Module' => '(:%data.module:)/',
    'protocol.Data/Temporary' => '(:%protocol.Data:)Temporary/',
    'protocol.Data/Variable' => '(:%protocol.Data:)Variable/',
    'protocol.Data/Variable/Cache' => '(:%protocol.Data/Variable:)Cache/',
    'protocol.Data/Variable/Database' => '(:%protocol.Data/Variable:)Database/',
    'protocol.Data/Variable/Log' => '(:%protocol.Data/Variable:)Log/',
    'protocol.Data/Variable/Private' => '(:%protocol.Data/Variable:)Private/',
    'protocol.Data/Variable/Run' => '(:%protocol.Data/Variable:)Run/',
    'protocol.Data/Variable/Test' => '(:%protocol.Data/Variable:)Test/',
    'protocol.Library' => '(:%framework.library:)/',
    'namespace.prefix.Hoa' => '(:%framework.library:)',
    'namespace.prefix.Hoathis' => '(:%data.module:);(:%framework.module:)',
  ),
);