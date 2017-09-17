<?php
/**
 * 场景二维码模块处理程序
 *
 * @author 易福源码网
 * @url http://www.efwww.com/
 */
defined('IN_IA') or exit('Access Denied');

class Ching_ifollowModuleProcessor extends WeModuleProcessor {
	public function respond() {
        global $_W;
		//这里定义此模块进行消息处理时的具体过程, 请查看微擎文档来编写你的代码
        $message = $this -> message;
        $openid = $this -> message['from'];
        $content = $this -> message['content'];
        $msgtype = strtolower($message['msgtype']);
        $rid = $this->rule;
        $event = strtolower($message['event']);
        if($msgtype == 'text') {
            $qrcode = pdo_get('ching_ifollow', array('uniacid'=>$_W['uniacid'], 'rid'=>$rid));
            if($qrcode) {
                if(!$qrcode['mid']) {
                    $path = str_replace('../attachment', '',$qrcode['path']);
                    load()->classs('weixin.account');
                    $acc = WeAccount::create($_W['acid']);
                    $media = $acc->uploadMedia($path);
                    $mid = $media['media_id'];
                    pdo_update('ching_ifollow', array('uniacid'=>$_W['uniacid'], 'rid'=>$rid), array('mid'=>$mid, 'm_data'=>json_encode($media)));
                } else {
                    $mid = $qrcode['mid'];
                }
                return $this->respImage($mid);
            }
        }
        $ticket = $message['Ticket'];
        if($event == 'subscribe') {
            //关注

        } elseif($event == 'unsubscribe') {

        }
	}
}