<div class="PageBackgroundSimpleGradient"></div>
<div class="PageBackgroundGlare">
  <div class="PageBackgroundGlareImage"></div>
</div>
<div class="Main">
  <div class="Sheet">
	<div class="Sheet-cc"></div>
	<div class="Sheet-body">
	  <div class="Header">
		<div class="logo-print">
			<?php print('Letchworth Arts and Leisure Group'); ?>
		</div>
		<div class="logo">
		  <?php if ($logo): ?>
			<a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a>
		  <?php endif; ?>
		</div>
	  </div>
	  <?php if ($page['navigation']): ?>
		<div class="nav">
		  <div class="l"></div>
		  <div class="r"></div>
		  <?php print render($page['navigation']); ?>
		</div>
	  <?php endif; ?>
	  <?php if ($page['toolbar']): ?>
		<div class="toolbar">
		  <?php print render($page['toolbar']); ?>
		</div>
	  <?php endif; ?>
	  <?php if ($page['header']): ?>
		<div class="content-header">
		  <?php print render($page['header']); ?>
		</div>
	  <?php endif; ?>
	  <div class="contentLayout">
		<div class="<?php echo ($page['sidebar_second']) ? 'content' : 'content-wide'; ?>">
		  <div class="Post">
			<div class="Post-body">
			  <div class="Post-inner">
				<div class="PostContent">
				  <?php if ($show_messages && $messages): echo $messages; endif; ?>
				  
				  <?php print render($title_prefix); ?>
				  <?php if ($title): ?>
					<h2 class="PostHeaderIcon-wrapper" >
						<?php print $title; ?>
					</h2>
				  <?php endif; ?>
				  <?php print render($title_suffix); ?>
				  				  
				  <?php print render($page['help']); ?>
				  <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
				  <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				  
				  <?php print art_content_replace(render($page['content'])); ?>
				</div>
				<div class="cleared"></div>
			  </div>
			</div>
		  </div>
		</div>
		
		<?php if ($page['sidebar_first']): ?>
			<div id="sidebar-first" class="column sidebar"><div class="section">
				<?php print render($page['sidebar_first']); ?>
			</div></div> <!-- /.section, /#sidebar-first -->
		<?php endif; ?>

		<?php if ($page['sidebar_second']): ?>
			<div id="sidebar-second" class="column sidebar-second"><div class="section">
				<?php print render($page['sidebar_second']); ?>
			</div></div> <!-- /.section, /#sidebar-second -->
		<?php endif; ?>
	  </div>
	  
	  <div class="cleared"></div>
	  	<div id="footer"><div class="section">
			<?php print render($page['footer']); ?>
		</div></div> <!-- /.section, /#footer -->
	  </div>
	</div>
  </div>
</div>

