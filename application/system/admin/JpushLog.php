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

namespace app\system\admin;

use app\system\model\SystemJpushLog as JpushLogModel;
use think\Db;
use Env;
use hisi\Dir;
/**
 * 后台默认首页控制器
 * @package app\system\admin
 */

class JpushLog extends Admin
{
    public $tabData = [];
    protected $hisiTable = 'SystemJpushLog';
    protected $hisiModel = 'SystemJpushLog';

    /**
     * 修改App
     * @param int $id
     * @return mixed
     */
    public function editJpush($id = 0)
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            
            if (!JpushModel::update($data)) {
                return $this->error('修改失败');
            }
            return $this->success('修改成功');
        }

        $row = Db::name('system_jpush')->where('id', '=', $id)->find();
        //var_dump($row);die;
        $this->assign('formData', $row);
        return $this->fetch('appFrom');
    }

    public function list()
    {
        if ($this->request->isAjax()) {
            $where      = $data = [];
            $page       = $this->request->param('page/d', 1);
            $limit      = $this->request->param('limit/d', 15);
            $keyword    = $this->request->param('keyword/s');
            $where[]    = ['id', 'neq', 0];
            if ($keyword) {
                $where[] = ['android_package', 'like', "%{$keyword}%"];
            }

            $data['data'] = Db::name('system_jpush_log')->where($where)->page($page)->limit($limit)->select();
            //echo Db::name('app')->getlastsql();die;
            $data['count'] = Db::name('system_jpush_log')->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        return $this->fetch();
    }

    /**
     * 删除app
     * @param int $id
     * @return mixed
     */
    public function delJpushLog()
    {
        parent::del();
    }
}
