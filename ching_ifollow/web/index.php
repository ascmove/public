<?php
    /**
     * 操作类名称: PhpStorm.
     * 作者名称: ching
     * 创建时间: 2016/9/28 14:24
     */
    define('IN_MOBILE', TRUE);
    global $_W, $_GPC;
    $action = $_GPC['ac'];
    $op = $_GPC['op'];
    $_GPC['ac'] = $action = 'index';
    if(empty($controller) && empty($action)) {
        $_GPC['do'] = $controller = 'qrcode';
    }
    $file = CHING_WEB.'controller/'.$controller.'/'.$action.'.ctrl.php';
    if(!file_exists($file)) {
        header("Location: index.php?i={$_W['uniacid']}&c=entry&do=home&ac=index&m=ching_ifollow");
        exit;
    }
    require $file;

