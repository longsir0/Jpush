<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2021 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------


return [
  [
    'title' => '开发助手',
    'icon' => 'aicon ai-shezhi',
    'module' => 'developer',
    'url' => 'developer',
    'param' => '',
    'target' => '_self',
    'debug' => 0,
    'system' => 0,
    'nav' => 1,
    'sort' => 100,
    'childs' => [
      [
        'title' => '应用中心',
        'icon' => 'aicon ai-shezhi',
        'module' => 'developer',
        'url' => 'developer/index',
        'param' => '',
        'target' => '_self',
        'debug' => 0,
        'system' => 0,
        'nav' => 1,
        'sort' => 0,
        'childs' => [
          [
            'title' => '模块列表',
            'icon' => 'aicon ai-caidan',
            'module' => 'developer',
            'url' => 'developer/module/index',
            'param' => '',
            'target' => '_self',
            'debug' => 0,
            'system' => 0,
            'nav' => 1,
            'sort' => 0,
            'childs' => [
              [
                'title' => '设计模块',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/design',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '版本管理',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/versions',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '发布新版本',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/addVersion',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '修改版本',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/editVersion',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '版本打包',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/package',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '版本状态',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/status',
                'param' => 'table=developer_versions',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '删除版本',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/delVersion',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '生成模块',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/build',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '图标上传',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/module/icon',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
            ],
          ],
          [
            'title' => '插件列表',
            'icon' => 'aicon ai-caidan',
            'module' => 'developer',
            'url' => 'developer/plugins/index',
            'param' => '',
            'target' => '_self',
            'debug' => 0,
            'system' => 0,
            'nav' => 1,
            'sort' => 0,
            'childs' => [
              [
                'title' => '设计插件',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/design',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '版本管理',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/versions',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '发布新版本',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/addVersion',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '修改版本',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/editVersion',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '版本打包',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/package',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '版本状态',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/status',
                'param' => 'table=developer_versions',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '删除版本',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/delVersion',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '生成插件',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/build',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
              [
                'title' => '图标上传',
                'icon' => '',
                'module' => 'developer',
                'url' => 'developer/plugins/icon',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 0,
                'sort' => 0,
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];

