<?php $cfg = array(
    'title'          => $this->lang['common']['page']['console'] . ' &raquo; ' . $this->lang['mod']['page']['forgot'],
    'active'         => 'forgot',
    'pathInclude'    => BG_PATH_TPLSYS . 'console' . DS . 'default' . DS . 'include' . DS
);

include($cfg['pathInclude'] . 'login_head.php'); ?>

    <form action="<?php echo BG_URL_CONSOLE; ?>index.php" method="get">
        <input type="hidden" name="m" value="forgot">
        <input type="hidden" name="a" value="step_2">

        <div class="form-group">
            <?php if (isset($this->tplData['rcode']) && !fn_isEmpty($this->tplData['rcode']) && isset($this->lang['rcode'][$this->tplData['rcode']])) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="oi oi-circle-x"></span>
                    <?php echo $this->lang['rcode'][$this->tplData['rcode']]; ?>
                </div>
            <?php } ?>
        </div>

        <div class="form-group">
            <label><?php echo $this->lang['mod']['label']['username']; ?> <span class="text-danger">*</span></label>
            <input type="text" name="admin_name" id="admin_name" placeholder="<?php echo $this->lang['rcode']['x010201']; ?>" data-validate class="form-control">
            <small class="form-text" id="msg_admin_name"></small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?php echo $this->lang['mod']['btn']['next']; ?></button>
        </div>
    </form>

<?php include($cfg['pathInclude'] . 'login_foot.php');
include($cfg['pathInclude'] . 'html_foot.php');