<?php $cfg = array(
    'title'         => $this->lang['mod']['page']['upgrade'] . ' &raquo; ' . $this->lang['mod']['page']['over'],
    "sub_title"     => $this->lang['mod']['page']['over'],
    "mod_help"      => 'upgrade',
    "act_help"      => 'over',
    "pathInclude"   => BG_PATH_TPLSYS . 'install' . DS . 'default' . DS . 'include' . DS,
);

include($cfg['pathInclude'] . 'upgrade_head.php'); ?>

    <form name="upgrade_form_dbtable" id="upgrade_form_dbtable">
        <input type="hidden" name="<?php echo $this->common['tokenRow']['name_session']; ?>" value="<?php echo $this->common['tokenRow']['token']; ?>">
        <input type="hidden" name="a" value="over">

        <div class="card-body">
            <div class="alert alert-success">
                <span class="oi oi-circle-check"></span>
                <?php echo $this->lang['mod']['label']['over']; ?>
            </div>

            <div class="bg-submit-box"></div>
        </div>

        <div class="card-footer">
            <div class="btn-toolbar justify-content-between">
                <div class="btn-group">
                    <a href="<?php echo BG_URL_INSTALL; ?>index.php?m=upgrade&a=smtp" class="btn btn-outline-secondary"><?php echo $this->lang['mod']['btn']['prev']; ?></a>
                    <?php include($cfg['pathInclude'] . 'upgrade_drop.php'); ?>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-primary bg-submit"><?php echo $this->lang['mod']['btn']['complete']; ?></button>
                </div>
            </div>
        </div>
    </form>

<?php include($cfg['pathInclude'] . 'install_foot.php'); ?>

    <script type="text/javascript">
    var opts_submit_form = {
        ajax_url: "<?php echo BG_URL_INSTALL; ?>index.php?m=upgrade&c=request",
        msg_text: {
            submitting: "<?php echo $this->lang['common']['label']['submitting']; ?>"
        },
        jump: {
            url: "<?php echo BG_URL_CONSOLE; ?>index.php",
            text: "<?php echo $this->lang['mod']['href']['jumping']; ?>"
        }
    };

    $(document).ready(function(){
        var obj_submit_form = $("#upgrade_form_dbtable").baigoSubmit(opts_submit_form);
        $(".bg-submit").click(function(){
            obj_submit_form.formSubmit();
        });
    });
    </script>

<?php include($cfg['pathInclude'] . 'html_foot.php');