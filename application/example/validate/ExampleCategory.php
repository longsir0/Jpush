<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP提供个人非商业用途免费使用，商业需授权。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\example\validate;

use think\Validate;

/**
 * 新闻验证器
 * @package app\example\validate
 */
class ExampleCategory extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|分类名称' => 'require|unique:example_category,name^pid',
    ];
}
