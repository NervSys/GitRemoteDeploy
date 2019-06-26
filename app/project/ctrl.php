<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 6/17/2019
 * Time: 2:28 PM
 * Note: ctrl.php
 */

namespace app\project;

use ext\errno;
use app\library\model;
use app\git\ctrl as git_ctrl;

class ctrl extends model
{
    public $tz = 'add,edit,git_clone';

    private $user_id = 0;

    /**
     * ctrl constructor.
     */
    public function __construct()
    {
        parent::__construct();

        errno::load('app', 'proj_ctrl');

        if (0 === $this->user_id = $this->get_user_id()) {
            errno::set(3000);
            parent::stop();
        }
    }

    /**
     * @api 新增或编辑项目
     * @param string $proj_name
     * @param string $proj_desc
     * @param string $proj_git_url
     * @param string $proj_local_path
     * @param string $proj_user_name
     * @param string $proj_user_email
     * @param array $proj_backup_files
     * @return array
     */
    public function add(
        string $proj_name,
        string $proj_desc,
        string $proj_git_url,
        string $proj_local_path,
        string $proj_user_name,
        string $proj_user_email,
        array $proj_backup_files = []
    ): array
    {
        $this->begin();
        try {
                $time = time();
                $this->insert('project')
                    ->value([
                        'proj_name' => $proj_name,
                        'proj_desc' => $proj_desc,
                        'proj_git_url' => $proj_git_url,
                        'proj_local_path' => $proj_local_path,
                        'proj_user_name' => $proj_user_name,
                        'proj_user_email' => $proj_user_email,
                        'proj_backup_files' => json_encode($proj_backup_files),
                        'add_time' => $time
                    ])
                    ->execute();
                $proj_id = $this->last_insert();
                $this->insert('project_team')
                    ->value([
                        'proj_id' => $proj_id,
                        'user_id' => $this->user_id,
                        'add_time' => $time
                    ])
                    ->execute();
                $log='添加项目';
            $conf = [
                'git_url' => $proj_git_url,
                'local_path' => $proj_local_path,
                'user_name' => $proj_user_name,
                'user_email' => $proj_user_email,
            ];
            git_ctrl::new($conf);
            $this->add_log($proj_id,$this->user_id,$log);
            $this->commit();
        } catch (\PDOException $e) {
            $this->rollback();
            $err = $e->getMessage();
            errno::set(3003, 1);
            return ['err' => $err];
        }
        return errno::get(3002);
    }

    /**
     * @api 部署
     * @param int $proj_id
     * @return array
     */
    public function git_clone(int $proj_id)
    {
        $project = $this->select('project')
            ->field('*')
            ->where(['proj_id',$proj_id])
            ->fetch();
        if (empty($project)){
            return errno::get(3004);
        }
        $project = $project[0];
        $conf = [
            'git_url' => $project['proj_git_url'],
            'local_path' => $project['proj_local_path'],
            'user_name' => $project['proj_user_name'],
            'user_email' => $project['proj_user_email'],
        ];
        $git_ctrl = git_ctrl::new($conf);
        $res = $git_ctrl->current_branch();
        errno::set(3002);
        return $res;
    }

    private function add_log(int $proj_id,int $user_id , string $proj_log)
    {
        return $this->insert('project_log')
            ->value([
                'proj_id' => $proj_id,
                'proj_log' => $proj_log,
                'user_id' => $user_id,
                'add_time' => time()
            ])
            ->execute();
    }
}