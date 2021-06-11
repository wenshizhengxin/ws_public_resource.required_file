<?php

/**
 * Created by PhpStorm.
 * User: Adminstrator
 * Date: 2020/5/21
 * Time: 9:18
 */

namespace ws_public_resource\project_required_file;

use epii\admin\center\config\Settings;
use epii\admin\center\libs\AddonsApp;
use ws_public_resource\project_required_file\libs\Constant;

class App extends AddonsApp
{

    public function install(): bool
    {
        // TODO: Implement install() method.
        // 执行sql文件
        $res = $this->execSqlFile(__DIR__ . "/data/sql/install.sql", "epii_");
        if (!$res) {
            return false;
        }
        // 初始化配置
        $initSettings = require __DIR__ . '/data/setting/setting.php';
        foreach ($initSettings as $setting) {
            Settings::set(Constant::ADDONS . '.' . $setting['name'], $setting['value'], 0, 2, $setting['note']);
        }

        // 添加菜单及子菜单
        $pid = $this->addMenuHeader("项目所需文件", 'fa-file-pdf-o');
        if (!$pid) {
            return false;
        }
        $id = $this->addMenu($pid, '所需文件', '?app=required_file@index');
        if (!$id) {
            return false;
        }
        $id = $this->addMenu($pid, '所需文件组', '?app=required_file_group@index');
        if (!$id) {
            return false;
        }

        return true;
    }

    public function update($new_version, $old_version): bool
    {
        // TODO: Implement update() method.
        //        $updateSql = __DIR__ . '/data/update_sql/' . $old_version . '-' . $new_version . '.sql';
        ////        if (is_file($updateSql) === true) {
        ////            $res = $this->execSqlFile($updateSql, "epii_");
        ////            if (!$res) {
        ////                return false;
        ////            }
        ////        }

        return true;
    }

    public function onOpen(): bool
    {
        // TODO: Implement onOpen() method.
        return true;
    }

    public function onClose(): bool
    {
        // TODO: Implement onClose() method.
        return true;
    }
}
