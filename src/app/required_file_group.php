<?php
/**
 * 描述：
 * Created at 2021/6/7 15:38 by 陈庙琴
 */

namespace ws_public_resource\project_required_file\app;


use epii\orm\Db;
use epii\server\Args;
use ws_public_resource\project_required_file\libs\Constant;

class required_file extends base
{
    public function index()
    {
        try {
            $this->adminUiDisplay();
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function ajax_data()
    {
        try {
            $where = [];

            if ($group_name = Args::params('group_name')) {
                $where[] = [
                    'group_name', 'like', '%' . $group_name . '%'
                ];
            }

            return $this->tableJsonData(Constant::TABLE_REQUIRED_FILE_GROUP, $where, function ($row) {
                return $row;
            });
        } catch (\Exception $e) {
        }
    }

    public function add()
    {
        try {
            $id = Args::params('id/d', 0);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $insertData = [

                    'group_name' => Args::params('group_name/s/1'),
                    'description' => Args::params('description/s'),
                    'file_type' => Args::params('file_type/d'),
                    'status' => Args::params('status/d'),
                ];

                $timestamp = time();

                /************事务开始************/
                Db::startTrans();
                if ($id === 0) { // 新增
                    $insertData['create_time'] = $timestamp;
                    $res = Db::name('required_file')->insert($insertData, false, true);
                    if (!$res) {
                        throw new \Exception('添加失败');
                    }
                } else { // 修改
                    $insertData['update_time'] = $timestamp;
                    $res = Db::name(Constant::TABLE_REQUIRED_FILE_GROUP)->where('id', $id)->update($insertData);
                    if (!$res) {
                        throw new \Exception('修改失败');
                    }
                }
                Db::commit();
                /************事务结束************/

                $this->success();
            } else {
                if ($id > 0) {
                    $required_file = Db::name('required_file')->where('id', $id)->find();
                    $this->assign('required_file', $required_file);
                }

                $this->adminUiDisplay();
            }
        } catch (\Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
        }
    }

    public function del()
    {
        try {
            $id = Args::params('id');
            $res = Db::name(Constant::TABLE_REQUIRED_FILE_GROUP)->where('id', $id)->delete();
            if (!$res) {
                throw new \Exception('删除失败');
            }

            $this->success();
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}