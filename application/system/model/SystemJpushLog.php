<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5.1开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2021 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\system\model;

use think\Model;
use think\facade\Cache;

/**
 * 后台用户模型
 * @package app\system\model
 */
class SystemJpushLog extends Model
{
    // 定义时间戳字段名
    protected $createTime = 'create_time';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
}
