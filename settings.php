<style type="text/css">
	#content-page { background:#e5e5e5; }
	.col6 { width:650px; float:left; margin:0 10px; }
	.col5 { width:500px; float:left;  margin:0 10px; }
	.form-container { border:2px solid #ddd; background:#fff; }
	.form-container h2 { margin:0; padding:10px 15px; background:#0492BC; color:#fff;}
	.form-container fieldset { padding:15px; }
	.form-container .quote { padding:15px; border:1px solid #eee; background:#f9f9f9; margin:15px; }
	.control-group { margin-bottom:15px; }
	.control-label { margin-bottom:5px; display:block; }
	.form-actions { margin-top:15px; margin-bottom:0;}
	.form-horizontal .form-actions { padding-left:15px;}
	.form-container input[type=text], .form-container textarea { padding:10px; width:95%; }
	.form-container input[type=text].swidth { width:30%; }
	
	.help { color:#999; font-size:12px; }
	.clearfix { clear:both; }
</style>
<div class="plugin-page">
	<div class="col5">
		<?php $pluginInfo = osc_plugin_get_info('nm_copypaste_plugin/index.php');  ?>
        <div class="form-container">
        <h2 class="render-title"><?php _e('Nomore Copy/Paste Settings', 'nm_copypaste_plugin'); ?></h2>
        <form action="<?php echo osc_admin_render_plugin_url('nm_copypaste_plugin/admin/settings.php'); ?>" class="form-horizontal" method="post">
          <input type="hidden" name="nomoreoption" value="nomoresettings" />
          <fieldset>
          <div class="control-group">
            <label class="control-label"><strong><?php _e('Enter field id/class name to disable paste option', 'nm_copypaste_plugin'); ?></strong></label>
            <div class="controls">
                <textarea rows="6" name="nm_id"><?php echo osc_esc_html(dd_nm_id()); ?></textarea>
            </div>
            <span class="help"><?php _e('Add more id/class names by adding comma', 'nm_copypaste_plugin'); ?>.</span>
          </div>
         </fieldset>
          
          <div class="form-actions">
            <input type="submit" value="<?php _e('Save changes', 'nm_copypaste_plugin'); ?>" class="btn btn-submit">
          </div>
          
        </form>
        
        </div>
        <div class="footer">
            <p class="form-row">
            &copy; <?php echo date('Y'); ?> <?php _e('Nomore Copy/Paste Plugin', 'nm_copypaste_plugin'); ?> - <a href="http://forums.osclass.org/plugins/nomore-copy-paste-%28free%29/" target="_blank"><?php _e('Support', 'nm_copypaste_plugin'); ?></a> - <a href="http://www.drizzlethemes.com/" target="_blank">DrizzleThemes.com</a>.
            </p>
        </div>
	</div><!-- /Col5 -->
    <div class="clearfix"></div>
</div>
