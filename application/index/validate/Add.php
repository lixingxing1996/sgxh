<?php
namespace app\index\validate;

use think\Validate;

/**
 * 微信登录验证
 * Class Login
 * @package app\index\validate
 */
class Add extends Validate
{
    protected $rule = [
        'phone' => 'require',

         'verify'   => 'require|captcha'
    ];

    protected $message = [
        'phone.require' => '请选择选择手机号码',
        'sdmu.require' => '请输入sdmu账号',
        'verify.require'   => '请输入验证码',
        'verify.captcha'   => '验证码不正确'
    ];
}