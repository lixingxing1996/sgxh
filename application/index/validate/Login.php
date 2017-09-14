<?php
namespace app\index\validate;

use think\Validate;

/**
 * 微信登录验证
 * Class Login
 * @package app\index\validate
 */
class Login extends Validate
{
    protected $rule = [
        'username' => 'require',
        'sdmu' => 'require',
        // 'verify'   => 'require|captcha'
    ];

    protected $message = [
        'username.require' => '请输入姓名',
        'sdmu.require' => '请输入sdmu账号',
        // 'verify.require'   => '请输入验证码',
        // 'verify.captcha'   => '验证码不正确'
    ];
}