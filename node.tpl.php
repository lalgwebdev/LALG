<?php // $Id: node.tpl.php,v 1.1 2009/05/15 07:28:05 agileware Exp $ 
	//  Drupal 7 theme for LALG  ?>
<div class="Post">
  <div class="Post-body; <?php print $classes; ?>">
    <div class="Post-inner">
	
      <?php if (!empty($content['links']['lalg']['#links'])) : ?>
        <div class="PostMetadataFooter">
          <div class="PostFooterIcons metadata-icons">
            <?php print render($content['links']); ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!$page):     // If full page display Title is done in page.tpl.php ?>
	    <?php print render($title_prefix); ?>
		  <?php if ($title): ?>
		    <h2 class="PostHeaderIcon-wrapper"> 
			  <span class="PostHeader">
			    <a href="<?php echo $node_url; ?>" title="<?php echo $title; ?>">
			      <?php print $title; ?>
				</a>
			  </span>
			</h2>
		  <?php endif; ?>
		<?php print render($title_suffix); ?>
	  <?php endif ?>

	  <div class="PostContent">
			<div class="article">
				<?php hide($content['comments']);
					hide($content['links']); 
					print render($content);?>
				<?php if (isset($content['links']['node_read_more'])) { echo '<div class="read_more">'.get_html_link_output($content['links']['node_read_more']).'</div>'; }?>
			</div>
		</div>
		<div class="cleared"></div>
	  
	  <?php if (!empty($content['links']['lalg']['#links']) || !empty($content['links']['statistics']['#links']) || !empty($content['links']['node']['#links'])) : ?>
        <div class="PostMetadataFooter">
          <div class="PostFooterIcons metadata-icons">
            <?php print render($content['links']); ?>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
