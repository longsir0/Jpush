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

use app\system\model\SystemJpush as JpushModel;
use app\system\model\SystemJpushLog as JpushLogModel;
use think\Db;
use Env;
use hisi\Dir;
use JPush\Client as JPushSend;
/**
 * 后台默认首页控制器
 * @package app\system\admin
 */

class Jpush extends Admin
{
    public $tabData = [];
    protected $hisiTable = 'SystemJpush';
    protected $hisiModel = 'SystemJpush';

    /**
     * 添加App
     */
    public function addJpush()
    {
        if ($this->request->isPost()) {

            $data = $this->request->post();

            if (!JpushModel::create($data)) {
                return $this->error('添加失败');
            }

            return $this->success('添加成功');
        }

        return $this->fetch('appFrom');
    }

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

    /**
     * 欢迎首页
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
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

            $data['data'] = Db::name('system_jpush')->where($where)->page($page)->limit($limit)->select();
            //echo Db::name('app')->getlastsql();die;
            $data['count'] = Db::name('system_jpush')->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        return $this->fetch("appList");
    }

    /**
     * 清理缓存
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function clear()
    {
        $path   = Env::get('runtime_path');
        $cache  = $this->request->param('cache/d', 0);
        $log    = $this->request->param('log/d', 0);
        $temp   = $this->request->param('temp/d', 0);

        if ($cache == 1) {
            Dir::delDir($path.'cache');
        }

        if ($temp == 1) {
            Dir::delDir($path.'temp');
        }

        if ($log == 1) {
            Dir::delDir($path.'log');
        }

        return $this->success('任务执行成功');
    }
    /*开始推送*/
    public function push($id = 0){
        if ($this->request->isPost()) {
            $data = $this->request->post();
            //var_dump($data);
            if(isset($data['platform'])){
                $platform_type = 'all';
            }else{
                $platform_type = [];
                isset($data['platform_type']['android']) ? array_push($platform_type, 'android') : '';
                isset($data['platform_type']['ios']) ? array_push($platform_type, 'ios') : '';
                isset($data['platform_type']['winphone']) ? array_push($platform_type, 'winphone') : '';
            }
            $row = Db::name('system_jpush')->where('id', 'in', $data['id'])->field('app_key,master_secret')->select();
            foreach ($row as $v) {
                $in = $v;
                $in['platform'] = json_encode($platform_type);
                $in['push_content'] = $data['push_content'];
                if (!JpushLogModel::insert($in)) {
                    return $this->error('提交失败');
                }
                /*$client = new JPushSend($v['app_key'], $v['master_secret']);
                $pusher = $client->push();
                $pusher->setPlatform($platform_type);
                $pusher->addAllAudience();
                $pusher->setNotificationAlert($data['push_content']);
                try {
                    $pusher->send();
                } catch (\JPushSend\Exceptions\JPushException $e) {
                    // try something else here
                    throw new Exception($e, 1);
                }*/
            }
            return $this->success('提交成功，请耐心等待');
        }
        //$row = Db::name('system_jpush')->where('id', 'in', $id)->find();
        $row['id'] = implode(",", $_GET['id']);
        //var_dump($_GET['id']);die;
        $this->assign('formData', $row);
        return $this->fetch("push");
    }
    /**
     * 删除app
     * @param int $id
     * @return mixed
     */
    public function delJpush()
    {
        parent::del();
    }
}
