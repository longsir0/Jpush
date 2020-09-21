<?php
namespace app\system\command;
 
use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\system\model\SystemJpushLog as JpushLogModel;
use think\Db;
use JPush\Client as JPushSend;

class PushTask extends Command
{
    protected function configure()
    {
        $this->setName('PushTask')->setDescription('Command Test');
    }
 
    protected function execute(Input $input, Output $output)
    {
    	$row = Db::name('system_jpush_log')->where('status', 0)->limit(50)->field('app_key,master_secret,platform,push_content')->select();
        foreach ($row as $v) {
            $client = new JPushSend($v['app_key'], $v['master_secret']);
            $pusher = $client->push();
            $pusher->setPlatform($v['platform']);
            $pusher->addAllAudience();
            $pusher->setNotificationAlert($v['push_content']);
            $u = [];
            try {
                $pusher->send();
            } catch (\JPushSend\Exceptions\JPushException $e) {
            	$u['status'] = 0;
            	$output->writeln("执行推送失败，id:".$v['id'].";原因:".json_encode($e));
                throw new Exception($e, 1);
            }
            $u['id'] = $v['id'];
            $u['push_time'] = time();

        	var_dump($u);die;
            JpushLogModel::update($u);
            echo JpushLogModel::getlastsql();die;
            if (!JpushLogModel::update($u)) {
                $output->writeln("更新推送日志失败，id:".$v['id']);
            }
        }
    }
}