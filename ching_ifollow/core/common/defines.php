<?php
    if(!defined('IN_IA')) {
        exit('Access Denied');
    }
    define('CHING_NAME', 'ching_ifollow');
    !defined('CHING_PATH') && define('CHING_PATH', IA_ROOT.'/addons/ching_ifollow/');
    !defined('CHING_CORE') && define('CHING_CORE', CHING_PATH.'core/');
    !defined('CHING_APP') && define('CHING_APP', CHING_PATH.'app/');
    !defined('CHING_WEB') && define('CHING_WEB', CHING_PATH.'web/');
    !defined('CHING_DATA') && define('CHING_DATA', CHING_PATH.'data/');