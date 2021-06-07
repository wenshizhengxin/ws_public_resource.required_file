<form role="form" class="epii" method="post" data-form="1" action="">

    <div class="form-group">
        <label>文件名称：</label>
        <input type="text" class="form-control" name="file_name" placeholder="请输入文件名称" value="{$required_file['file_name'] ? ''}">
    </div>
    <div class="form-group">
        <label>文件描述：</label>
        <textarea rows="5" class="form-control" name="description" placeholder="请输入文件描述">{$required_file['description'] ? ''}</textarea>
    </div>
    <div class="form-group">
        <label>文件类型：</label>
        <input type="number" class="form-control" name="file_type" placeholder="请输入文件类型" value="{$required_file['file_type'] ? ''}">
    </div>
    <div class="form-group">
        <label>状态：</label>
        <select class="selectpicker" name="status"></select>
    </div>
    <div class="form-footer">
        <input type="hidden" name="id" value="{$required_file['id'] ? 0}">
        <button type="submit" class="btn btn-primary">提交</button>
    </div>
</form>