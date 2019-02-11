<?php
/*-----------------------------------------------------------------
！！！！警告！！！！
以下为系统文件，请勿修改
-----------------------------------------------------------------*/

//不能非法包含或直接执行
if (!defined('IN_BAIGO')) {
    exit('Access Denied');
}

if (!function_exists('fn_mailSend')) {
    fn_include(BG_PATH_FUNC . 'mail.func.php'); //载入模板类
}

/*-------------个人接口-------------*/
class CONTROL_API_API_PROFILE {

    function __construct() { //构造函数
        $this->config   = $GLOBALS['obj_base']->config;

        $this->general_api  = new GENERAL_API();
        //$this->general_api->chk_install();

        $this->mail     = fn_include(BG_PATH_LANG . $this->config['lang'] . DS . 'mail.php');

        $this->obj_crypt    = $this->general_api->obj_crypt;
        $this->obj_sign     = $this->general_api->obj_sign;

        $this->mdl_user_profile = new MODEL_USER_PROFILE();
        $this->mdl_verify       = new MODEL_VERIFY();
    }


    /**
     * ctrl_edit function.
     *
     * @access public
     * @return void
     */
    function ctrl_info() {
        $_arr_apiChks = $this->general_api->app_chk('post');
        if ($_arr_apiChks['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_apiChks);
        }

        $_arr_decrypt = $this->obj_crypt->decrypt($_arr_apiChks['appInput']['code'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret']);  //解密数据

        if ($_arr_decrypt['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_decrypt);
        }

        $_arr_inputInfo = fn_jsonDecode($_arr_decrypt['decrypt'], true);

        $_arr_infoInput = $this->mdl_user_profile->input_info($_arr_inputInfo);
        if ($_arr_infoInput['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_infoInput);
        }

        if (!$this->obj_sign->sign_check($_arr_decrypt['decrypt'], $_arr_apiChks['appInput']['sign'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret'])) {
            $_arr_tplData = array(
                'rcode' => 'x050403',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $_arr_userRow = $this->mdl_user_profile->mdl_read($_arr_infoInput['user_str'], $_arr_infoInput['user_by']);
        if ($_arr_userRow['rcode'] != 'y010102') {
            $this->general_api->show_result($_arr_userRow);
        }

        if ($_arr_userRow['user_status'] == 'disable') {
            $_arr_tplData = array(
                'rcode' => 'x010401',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        switch ($_arr_userRow['user_crypt_type']) {
            case 0:
            case 1:
                $_str_crypt = fn_baigoCrypt($_arr_infoInput['user_pass'], $_arr_userRow['user_rand'], true, $_arr_userRow['user_crypt_type']);
            break;

            default:
                $_str_crypt = fn_baigoCrypt($_arr_infoInput['user_pass'], $_arr_userRow['user_name'], true);
            break;
        }

        if ($_str_crypt != $_arr_userRow['user_pass']) {
            $_arr_tplData = array(
                'rcode' => 'x010213',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $this->mdl_user_profile->infoInput['user_id'] = $_arr_userRow['user_id'];

        $_arr_returnRow              = $this->mdl_user_profile->mdl_info();

        $this->general_api->notify_result($_arr_returnRow, 'edit');

        $_arr_tplData = array(
            'rcode' => $_arr_returnRow['rcode'],
        );
        $this->general_api->show_result($_arr_tplData);
    }


    function ctrl_pass() {
        $_arr_apiChks = $this->general_api->app_chk('post');
        if ($_arr_apiChks['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_apiChks);
        }

        $_arr_decrypt = $this->obj_crypt->decrypt($_arr_apiChks['appInput']['code'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret']);  //解密数据

        if ($_arr_decrypt['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_decrypt);
        }

        $_arr_inputPass = fn_jsonDecode($_arr_decrypt['decrypt'], true);

        $_arr_passInput = $this->mdl_user_profile->input_pass($_arr_inputPass);
        if ($_arr_passInput['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_passInput);
        }

        if (!$this->obj_sign->sign_check($_arr_decrypt['decrypt'], $_arr_apiChks['appInput']['sign'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret'])) {
            $_arr_tplData = array(
                'rcode' => 'x050403',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $_arr_userRow = $this->mdl_user_profile->mdl_read($_arr_passInput['user_str'], $_arr_passInput['user_by']);
        if ($_arr_userRow['rcode'] != 'y010102') {
            $this->general_api->show_result($_arr_userRow);
        }

        if ($_arr_userRow['user_status'] == 'disable') {
            $_arr_tplData = array(
                'rcode' => 'x010401',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        switch ($_arr_userRow['user_crypt_type']) {
            case 0:
            case 1:
                $_str_crypt = fn_baigoCrypt($_arr_passInput['user_pass'], $_arr_userRow['user_rand'], true, $_arr_userRow['user_crypt_type']);
            break;

            default:
                $_str_crypt = fn_baigoCrypt($_arr_passInput['user_pass'], $_arr_userRow['user_name'], true);
            break;
        }

        if ($_str_crypt != $_arr_userRow['user_pass']) {
            $_arr_tplData = array(
                'rcode' => 'x010244',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $_str_userPass  = fn_baigoCrypt($_arr_passInput['user_pass_new'], $_arr_userRow['user_name'], true);
        $_arr_returnRow = $this->mdl_user_profile->mdl_pass($_arr_userRow['user_id'], $_str_userPass);

        $_arr_tplData = array(
            'rcode' => $_arr_returnRow['rcode'],
        );
        $this->general_api->show_result($_arr_tplData);
    }


    function ctrl_qa() {
        $_arr_apiChks = $this->general_api->app_chk('post');
        if ($_arr_apiChks['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_apiChks);
        }

        $_arr_decrypt = $this->obj_crypt->decrypt($_arr_apiChks['appInput']['code'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret']);  //解密数据

        if ($_arr_decrypt['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_decrypt);
        }

        $_arr_inputQa = fn_jsonDecode($_arr_decrypt['decrypt'], true);

        $_arr_qaInput = $this->mdl_user_profile->input_qa($_arr_inputQa);
        if ($_arr_qaInput['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_qaInput);
        }

        if (!$this->obj_sign->sign_check($_arr_decrypt['decrypt'], $_arr_apiChks['appInput']['sign'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret'])) {
            $_arr_tplData = array(
                'rcode' => 'x050403',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $_arr_userRow = $this->mdl_user_profile->mdl_read($_arr_qaInput['user_str'], $_arr_qaInput['user_by']);
        if ($_arr_userRow['rcode'] != 'y010102') {
            $this->general_api->show_result($_arr_userRow);
        }

        if ($_arr_userRow['user_status'] == 'disable') {
            $_arr_tplData = array(
                'rcode' => 'x010401',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        switch ($_arr_userRow['user_crypt_type']) {
            case 0:
            case 1:
                $_str_crypt = fn_baigoCrypt($_arr_qaInput['user_pass'], $_arr_userRow['user_rand'], true, $_arr_userRow['user_crypt_type']);
            break;

            default:
                $_str_crypt = fn_baigoCrypt($_arr_qaInput['user_pass'], $_arr_userRow['user_name'], true);
            break;
        }

        if ($_str_crypt != $_arr_userRow['user_pass']) {
            $_arr_tplData = array(
                'rcode' => 'x010244',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $this->mdl_user_profile->qaInput['user_id'] = $_arr_userRow['user_id'];

        for ($_iii = 1; $_iii <= 3; $_iii++) {
            $this->mdl_user_profile->qaInput['user_sec_ques_' . $_iii] = $_arr_qaInput['user_sec_ques_' . $_iii];
            $this->mdl_user_profile->qaInput['user_sec_answ_' . $_iii] = fn_baigoCrypt($_arr_qaInput['user_sec_answ_' . $_iii], $_arr_userRow['user_name'], true);
        }

        $_arr_returnRow = $this->mdl_user_profile->mdl_qa();

        $_arr_tplData = array(
            'rcode' => $_arr_returnRow['rcode'],
        );
        $this->general_api->show_result($_arr_tplData);
    }


    /**
     * ctrl_change function.
     *
     * @access public
     * @return void
     */
    function ctrl_mailbox() {
        $_arr_apiChks = $this->general_api->app_chk('post');
        if ($_arr_apiChks['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_apiChks);
        }

        $_arr_decrypt = $this->obj_crypt->decrypt($_arr_apiChks['appInput']['code'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret']);  //解密数据

        if ($_arr_decrypt['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_decrypt);
        }

        $_arr_inputMailbox = fn_jsonDecode($_arr_decrypt['decrypt'], true);

        $_arr_mailboxInput = $this->mdl_user_profile->input_mailbox($_arr_inputMailbox);
        if ($_arr_mailboxInput['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_mailboxInput);
        }

        if (!$this->obj_sign->sign_check($_arr_decrypt['decrypt'], $_arr_apiChks['appInput']['sign'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret'])) {
            $_arr_tplData = array(
                'rcode' => 'x050403',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $_arr_userRow = $this->mdl_user_profile->mdl_read($_arr_mailboxInput['user_str'], $_arr_mailboxInput['user_by']);
        if ($_arr_userRow['rcode'] != 'y010102') {
            $this->general_api->show_result($_arr_userRow);
        }

        if ($_arr_userRow['user_status'] == 'disable') {
            $_arr_tplData = array(
                'rcode' => 'x010401',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        if ($_arr_mailboxInput['user_mail_new'] == $_arr_userRow['user_mail']) {
            $_arr_tplData = array(
                'rcode' => 'x010223',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        switch ($_arr_userRow['user_crypt_type']) {
            case 0:
            case 1:
                $_str_crypt = fn_baigoCrypt($_arr_mailboxInput['user_pass'], $_arr_userRow['user_rand'], true, $_arr_userRow['user_crypt_type']);
            break;

            default:
                $_str_crypt = fn_baigoCrypt($_arr_mailboxInput['user_pass'], $_arr_userRow['user_name'], true);
            break;
        }

        if ($_str_crypt != $_arr_userRow['user_pass']) {
            $_arr_tplData = array(
                'rcode' => 'x010213',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        if ((BG_REG_ONEMAIL == 'false' || BG_LOGIN_MAIL == 'on') && isset($_arr_mailboxInput['user_mail_new']) && $_arr_mailboxInput['user_mail_new']) {
            $_arr_userRowChk = $this->mdl_user_profile->mdl_read($_arr_mailboxInput['user_mail_new'], 'user_mail', $_arr_userRow['user_id']); //检查邮箱
            if ($_arr_userRowChk['rcode'] == 'y010102') {
                $_arr_tplData = array(
                    'rcode' => 'x010211',
                );
                $this->general_api->show_result($_arr_tplData);
            }
        }

        //file_put_contents(BG_PATH_ROOT . 'test.txt', $_str_userPass . '||' . $_str_rand);

        if (BG_REG_CONFIRM == 'on') {
            $_arr_returnRow    = $this->mdl_verify->mdl_submit($_arr_userRow['user_id'], $_arr_mailboxInput['user_mail_new'], 'mailbox');
            if ($_arr_returnRow['rcode'] != 'y120101' && $_arr_returnRow['rcode'] != 'y120103') {
                $_arr_tplData = array(
                    'rcode' => 'x010405',
                );
                $this->general_api->show_result($_arr_tplData);
            }

            $_str_verifyUrl = BG_SITE_URL . BG_URL_PERSONAL . 'index.php?m=profile&a=mailbox&verify_id=' . $_arr_returnRow['verify_id'] . '&verify_token=' . $_arr_returnRow['verify_token'];
            $_str_url       = '<a href="' . $_str_verifyUrl . '">' . $_str_verifyUrl . '</a>';
            $_str_html      = str_ireplace('{$verify_url}', $_str_url, $this->mail['mailbox']['content']);
            $_str_html      = str_ireplace('{$user_name}', $_arr_userRow['user_name'], $_str_html);
            $_str_html      = str_ireplace('{$user_mail}', $_arr_userRow['user_mail'], $_str_html);
            $_str_html      = str_ireplace('{$user_mail_new}', $_arr_mailboxInput['user_mail_new'], $_str_html);

            if (fn_mailSend($_arr_mailboxInput['user_mail_new'], $this->mail['mailbox']['subject'], $_str_html)) {
                $_arr_returnRow['rcode'] = 'y010406';
            } else {
                $_arr_returnRow['rcode'] = 'x010406';
            }

            unset($_arr_returnRow['verify_id'], $_arr_returnRow['verify_token']);
        } else {
            $_arr_returnRow = $this->mdl_user_profile->mdl_mailbox($_arr_userRow['user_id'], $_arr_mailboxInput['user_mail_new']);

            $this->general_api->notify_result($_arr_returnRow, 'mailbox');
        }

        $_arr_returnRow['user_id']      = $_arr_userRow['user_id'];
        $_arr_returnRow['user_name']    = $_arr_userRow['user_name'];

        $_arr_tplData = array(
            'rcode' => $_arr_returnRow['rcode'],
        );
        $this->general_api->show_result($_arr_tplData);
    }


    function ctrl_token() {
        $_arr_apiChks = $this->general_api->app_chk('post');
        if ($_arr_apiChks['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_apiChks);
        }

        $_arr_decrypt = $this->obj_crypt->decrypt($_arr_apiChks['appInput']['code'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret']);  //解密数据

        if ($_arr_decrypt['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_decrypt);
        }

        $_arr_inputToken = fn_jsonDecode($_arr_decrypt['decrypt'], true);

        $_arr_tokenInput = $this->mdl_user_profile->input_token($_arr_inputToken);
        if ($_arr_tokenInput['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_tokenInput);
        }

        if (!$this->obj_sign->sign_check($_arr_decrypt['decrypt'], $_arr_apiChks['appInput']['sign'], $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret'])) {
            $_arr_tplData = array(
                'rcode' => 'x050403',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        $_arr_userRow = $this->mdl_user_profile->mdl_read($_arr_tokenInput['user_str'], $_arr_tokenInput['user_by']);
        if ($_arr_userRow['rcode'] != 'y010102') {
            $this->general_api->show_result($_arr_userRow);
        }

        if ($_arr_userRow['user_status'] == 'disable') {
            $_arr_tplData = array(
                'rcode' => 'x010401',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        if ($_arr_userRow['user_refresh_expire'] < BG_NOW) {
            $_arr_tplData = array(
                'rcode' => 'x010235',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        if ($_arr_tokenInput['user_refresh_token'] != md5(fn_baigoCrypt($_arr_userRow['user_refresh_token'], $_arr_userRow['user_name']))) {
            $_arr_tplData = array(
                'rcode' => 'x010234',
            );
            $this->general_api->show_result($_arr_tplData);
        }

        //print_r($_arr_userRow);

        $_arr_tokenRefresh = $this->mdl_user_profile->mdl_token($_arr_userRow['user_id'], $_arr_userRow['user_name']);

        unset($_arr_userRow['user_pass'], $_arr_userRow['user_note']);

        $_arr_returnRow = array(
            'user_id'               => $_arr_userRow['user_id'],
            'user_access_token'     => $_arr_tokenRefresh['user_access_token'],
            'user_access_expire'    => $_arr_tokenRefresh['user_access_expire'],
        );

        //unset($_arr_returnRow['rcode']);
        $_str_src   = $this->general_api->encode_result($_arr_returnRow);
        $_str_sign  = $this->obj_sign->sign_make($_str_src, $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret']);
        $_arr_encrypt  = $this->obj_crypt->encrypt($_str_src, $_arr_apiChks['appKey'], $_arr_apiChks['appRow']['app_secret']);

        if ($_arr_encrypt['rcode'] != 'ok') {
            $this->general_api->show_result($_arr_encrypt);
        }

        $_arr_tplData = array(
            'code'      => $_arr_encrypt['encrypt'],
            'sign' => $_str_sign,
            'rcode'     => 'y010411',
        );

        $this->general_api->show_result($_arr_tplData);
    }
}
