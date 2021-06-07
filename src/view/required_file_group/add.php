<form role="form" class="epii" method="post" data-form="1" action="">

    <div class="form-group">
        <label>文件组名称：</label>
        <input type="text" class="form-control" name="file_name" placeholder="请输入文件组名称" value="{$required_file_group['file_name'] ? ''}">
    </div>
    <div class="form-group">
        <label>文件组描述：</label>
        <textarea rows="5" class="form-control" name="description" placeholder="请输入文件组描述">{$required_file_group['description'] ? ''}</textarea>
    </div>
    <div class="form-group">
        <label>状态：</label>
        <select class="selectpicker" name="status"></select>
    </div>
    <div class="form-footer">
        <input type="hidden" name="id" value="{$required_file_group['id'] ? 0}">
        <button type="submit" class="btn btn-primary">提交</button>
    </div>
</form>