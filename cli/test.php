<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2019/12/27
 * Time: 11:30
 * Note: test.php
 */

namespace cli;


use app\library\dir_handle;

class test
{
    public $tz         = '*';
    public $local_path = 'D:\shared\GitGet';

    public function go()
    {
        $path_from = $this->local_path . DIRECTORY_SEPARATOR . "conf/dev.ini";
        $path_to   = $this->local_path . DIRECTORY_SEPARATOR . "logs/dev.ini";
        copy($path_from,$path_to);
    }
}