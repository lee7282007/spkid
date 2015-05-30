<?php include(APPPATH . 'views/common/header.php'); ?>
<script type="text/javascript" src="public/js/utils.js"></script>
<script type="text/javascript" src="public/js/validator.js"></script>
<script type="text/javascript">
    //<![CDATA[
    function check_form(){
        var validator = new Validator('mainForm');
        validator.required('action_code', '请填写CODE');
        validator.required('action_name', '请填写名称');
        validator.isInt('sort_order', '请正确填写排序');
        return validator.passed();
    }

    //]]>
</script>
<div class="main">
    <div class="main_title"><span class="l">权限管理 >> 编辑</span> <span class="r"><a href="action/index" class="return r">返回列表</a></span></div>
    <div class="blank5"></div>
    <?php print form_open_multipart('action/proc_edit/' . $action->action_id, array('name' => 'mainForm', 'onsubmit' => 'return check_form()')); ?>
    <table class="form" cellpadding=0 cellspacing=0>
        <tr>
            <td colspan=2 class="topTd"></td>
        </tr>
        <tr>
            <td class="item_title">父权限ID:</td>
            <td class="item_input">
                <input name="parent_id" class="textbox require" id="parent_id" value="<?php echo $action->parent_id ?>" /></td>
        </tr>
        <tr>
            <td class="item_title">CODE:</td>
            <td class="item_input">
                <input name="action_code" class="textbox require" id="action_code" value="<?php echo $action->action_code ?>" /></td>
        </tr>
        <tr>
            <td class="item_title">名称:</td>
            <td class="item_input">
                <input name="action_name" class="textbox require" id="action_name" value="<?php echo $action->action_name ?>" /></td>
        </tr>
        <tr>
            <td class="item_title">按钮名称:</td>
            <td class="item_input">
                <input name="menu_name" class="textbox require" id="menu_name" value="<?php echo $action->menu_name ?>" /></td>
        </tr>
        <tr>
            <td class="item_title">链接:</td>
            <td class="item_input">
                <input name="url" class="textbox require" id="url" value="<?php echo $action->url ?>" /></td>
        </tr>
        <tr>
            <td class="item_title">排序:</td>
            <td class="item_input">
                <input id="sort_order" class="textbox require" name="sort_order" value="<?php echo $action->sort_order ?>" />
                  排序值小的显示在前
            </td>
        </tr>
        <tr>
            <td class="item_title"></td>
            <td class="item_input">
                <?php print form_submit(array('name' => 'mysubmit', 'class' => 'button', 'value' => '提交')); ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 class="bottomTd"></td>
        </tr>
    </table>
    <?php print form_close(); ?>
</div>
<?php include(APPPATH . 'views/common/footer.php'); ?>
