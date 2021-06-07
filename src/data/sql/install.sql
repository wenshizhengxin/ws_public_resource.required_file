SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for epii_kb_required_file
-- ----------------------------
CREATE TABLE IF NOT EXISTS `epii_kb_required_file`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '所需文件表主键id',
  `file_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件名称',
  `description` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件描述',
  `file_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文件类型（自定义数字值）',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态：0-禁用；1-启用',
  `create_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '添加时间',
  `update_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '所需文件表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for epii_kb_required_file_group
-- ----------------------------
DROP TABLE IF NOT EXISTS `epii_kb_required_file_group`;
CREATE TABLE `epii_kb_required_file_group`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '所需文件组表主键id',
  `group_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '组名称',
  `description` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '组描述',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态：0-禁用；1-启用',
  `create_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '添加时间',
  `update_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '所需文件组表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for epii_kb_required_file_group_file
-- ----------------------------
DROP TABLE IF NOT EXISTS `epii_kb_required_file_group_file`;
CREATE TABLE `epii_kb_required_file_group_file`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '所需文件组-所需文件关联表主键id',
  `required_group_name_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '所需文件组表外键id',
  `required_file_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '所需文件表外键id',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态：0-禁用；1-启用',
  `create_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '添加时间',
  `update_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '所需文件组-所需文件关联表' ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
