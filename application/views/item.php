<article<?php if($itm->sub->sub_direction) { ?> dir="<?php echo $itm->sub->sub_direction; ?>"<?php } ?> class="item<?php if($itm->history == 'read') { ?> read<?php } ?><?php if($this->input->get('items_display') == 'collapse' || $this->input->cookie('items_display') == 'collapse') { ?> collapse<?php } ?>" id="item_<?php echo $itm->itm_id; ?>">
	<ul class="actions">
		<?php if($itm->case_member != 'public_profile') { ?>
			<li><a class="history" href="<?php echo base_url(); ?>item/read/<?php echo $itm->itm_id; ?>" title="m"><span class="unread"<?php if($itm->history == 'unread') { ?> style="display:none;"<?php } ?>><i class="icon icon-circle"></i><span class="button-caption"><?php echo $this->lang->line('keep_unread'); ?></span></span><span class="read"<?php if($itm->history == 'read') { ?> style="display:none;"<?php } ?>><i class="icon icon-circle-blank"></i><span class="button-caption"><?php echo $this->lang->line('mark_as_read'); ?></span></span></a></li>
		<?php } ?>
		<?php if($itm->case_member != 'following') { ?>
		<?php if($this->config->item('starred_items') && $itm->case_member != 'public_profile') { ?>
			<li class="hide-collapse"><a class="star" href="<?php echo base_url(); ?>item/star/<?php echo $itm->itm_id; ?>" title="s"><span class="unstar"<?php if($itm->star == 0) { ?> style="display:none;"<?php } ?>><i class="icon icon-star"></i><span class="button-caption"><?php echo $this->lang->line('unstar'); ?></span></span><span class="star"<?php if($itm->star == 1) { ?> style="display:none;"<?php } ?>><i class="icon icon-star-empty"></i><span class="button-caption"><?php echo $this->lang->line('star'); ?></span></span></a></li>
		<?php } ?>
		<?php if($this->config->item('shared_items') && $itm->case_member != 'public_profile') { ?>
			<li class="hide-collapse"><a class="share" href="<?php echo base_url(); ?>item/share/<?php echo $itm->itm_id; ?>" title="<?php echo $this->lang->line('title_shift_s'); ?>"><span class="unshare"<?php if($itm->share == 0) { ?> style="display:none;"<?php } ?>><i class="icon icon-heart"></i><span class="button-caption"><?php echo $this->lang->line('unshare'); ?></span></span><span class="share"<?php if($itm->share == 1) { ?> style="display:none;"<?php } ?>><i class="icon icon-heart-empty"></i><span class="button-caption"><?php echo $this->lang->line('share'); ?></span></span></a></li>
		<?php } ?>
		<?php } ?>
		<?php if($this->input->get('items_display') == 'collapse' || $this->input->cookie('items_display') == 'collapse') { ?>
			<li><a class="expand" href="<?php echo base_url(); ?>item/expand/<?php echo $itm->itm_id; ?>" title="<?php echo $this->lang->line('title_o'); ?>"><i class="icon icon-collapse"></i><span class="button-caption"><?php echo $this->lang->line('expand'); ?></span></a></li>
			<li style="display:none;"><a class="collapse" href="#item_<?php echo $itm->itm_id; ?>" title="<?php echo $this->lang->line('title_o'); ?>"><i class="icon icon-collapse-top"></i><span class="button-caption"><?php echo $this->lang->line('collapse'); ?></a></span></li>
		<?php } else if($this->input->get('items_display') == 'expand') { ?>
			<li style="display:none;"><a class="expand" href="<?php echo base_url(); ?>item/expand/<?php echo $itm->itm_id; ?>" title="<?php echo $this->lang->line('title_o'); ?>"><i class="icon icon-collapse"></i><span class="button-caption"><?php echo $this->lang->line('expand'); ?></span></a></li>
			<li><a class="collapse" href="#item_<?php echo $itm->itm_id; ?>" title="<?php echo $this->lang->line('title_o'); ?>"><i class="icon icon-collapse-top"></i><span class="button-caption"><?php echo $this->lang->line('collapse'); ?></span></a></li>
		<?php } ?>
	</ul>
	<h2><a style="background-image:url(https://www.google.com/s2/favicons?domain=<?php echo $itm->sub->fed_host; ?>&amp;alt=feed);" class="favicon" target="_blank" href="<?php echo $itm->itm_link; ?>"><?php echo $itm->itm_title; ?></a></h2>
	<ul class="item-details">
		<li class="item-details-date"><i class="icon icon-calendar"></i><?php echo $itm->explode_date; ?></li>
		<li class="item-details-time"><i class="icon icon-time"></i><?php echo $itm->explode_time; ?><span class="timeago_outter"> (<span class="timeago" title="<?php echo $itm->itm_date; ?>"></span>)</span></li>

		<?php if($itm->case_member == 'public_profile') { ?>
			<li class="item-details-feed"><i class="icon icon-bookmark"></i><?php if($itm->sub->sub_title) { ?><?php echo $itm->sub->sub_title; ?><?php } else { ?><?php echo $itm->sub->fed_title; ?><?php } ?></li>
			<?php if($itm->itm_author) { ?>
				<li class="hide-phone item-details-author"><i class="icon icon-pencil"></i><?php echo $itm->itm_author; ?></li>
			<?php } ?>
			<?php if($this->config->item('tags') && $itm->categories) { ?>
				<li class="block hide-phone show-print item-details-tags"><i class="icon icon-tags"></i><?php echo implode(', ', $itm->categories); ?></li>
			<?php } ?>

		<?php } else if($itm->case_member == 'following') { ?>
			<li class="item-details-feed"><a class="from" data-fed_id="<?php echo $itm->fed_id; ?>" data-fed_host="<?php echo $itm->sub->fed_host; ?>" data-direction="<?php echo $itm->sub->sub_direction; ?>" href="<?php echo base_url(); ?>items/get/feed/<?php echo $itm->fed_id; ?>"><i class="icon icon-bookmark"></i><?php echo $itm->sub->title; ?></a></li>
			<?php if($itm->itm_author) { ?>
				<li class="hide-phone item-details-author"><i class="icon icon-pencil"></i><?php echo $itm->itm_author; ?></li>
			<?php } ?>
			<?php if($this->config->item('tags') && $itm->categories) { ?>
				<li class="block hide-phone show-print item-details-tags"><i class="icon icon-tags"></i><?php echo implode(', ', $itm->categories); ?></li>
			<?php } ?>

		<?php } else { ?>
			<li class="item-details-feed"><a class="from" data-fed_id="<?php echo $itm->fed_id; ?>" data-fed_host="<?php echo $itm->sub->fed_host; ?>" data-direction="<?php echo $itm->sub->sub_direction; ?>" data-priority="<?php echo $itm->sub->priority; ?>" href="<?php echo base_url(); ?>items/get/feed/<?php echo $itm->fed_id; ?>"><i class="icon icon-bookmark"></i><?php if($itm->sub->sub_title) { ?><?php echo $itm->sub->sub_title; ?><?php } else { ?><?php echo $itm->sub->fed_title; ?><?php } ?></a></li>
			<?php if($itm->itm_author) { ?>
				<li class="hide-phone item-details-author"><a class="author" data-itm_id="<?php echo $itm->itm_id; ?>" href="<?php echo base_url(); ?>items/get/author/<?php echo $itm->itm_id; ?>"><i class="icon icon-pencil"></i><?php echo $itm->itm_author; ?></a></li>
			<?php } ?>
			<?php if($this->config->item('folders')) { ?>
				<?php if($itm->sub->flr_id) { ?>
					<li class="hide-phone item-details-folder"><a class="folder" href="#load-folder-<?php echo $itm->sub->flr_id; ?>-items"><i class="icon icon-folder-close"></i><?php echo $itm->sub->flr_title; ?></a></li>
				<?php } else { ?>
					<li class="hide-phone item-details-folder"><a class="folder" href="#load-nofolder-items"><i class="icon icon-folder-close"></i><em><?php echo $this->lang->line('no_folder'); ?></em></a></li>
				<?php } ?>
			<?php } ?>
			<?php if($this->config->item('tags') && $itm->categories) { ?>
				<li class="block hide-phone show-print item-details-tags"><i class="icon icon-tags"></i><?php echo implode(', ', $itm->categories); ?></li>
			<?php } ?>
		<?php } ?>

		<?php if($this->config->item('members_list') && $itm->shared_by) { ?>
			<li class="block hide-phone"><i class="icon icon-link"></i><?php echo implode(', ', $itm->shared_by); ?></li>
		<?php } ?>
		<?php if($itm->foursquare) { ?>
			<li class="block hide-phone"><a target="_blank" href="https://foursquare.com/venue/<?php echo $itm->foursquare; ?>"><i class="icon icon-foursquare"></i><span class="button-caption">Foursquare</span></a></li>
		<?php } ?>
	</ul>
	<div class="item-content hide-collapse">
		<?php if($this->input->get('items_display') == 'collapse' || $this->input->cookie('items_display') == 'collapse') { ?>
		<?php } else if($this->input->get('items_display') == 'expand') { ?>
			<?php echo $this->load->view('item_expand', array('itm', $itm), TRUE); ?>
		<?php } ?>
	</div>
	<div class="item-footer hide-collapse">
		<ul class="actions">
		<?php if($this->config->item('readability_parser_key') && $itm->case_member != 'public_profile') { ?>
			<li><a class="link-item-readability" href="<?php echo base_url(); ?>item/readability/<?php echo $itm->itm_id; ?>"><i class="icon icon-file-text"></i><span class="button-caption"><?php echo $this->lang->line('readability'); ?></span></a></li>
		<?php } ?>
		<?php if($this->config->item('social_buttons')) { ?>
			<li><a class="link-item-like" href="#item-like-<?php echo $itm->itm_id; ?>" data-url="<?php echo urlencode($itm->itm_link); ?>"><i class="icon icon-thumbs-up-alt"></i><span class="button-caption"><?php echo $this->lang->line('like'); ?></span></a></li>
		<?php } ?>

		<?php if($this->config->item('share_external')) { ?>
			<li><a class="link-item-share" href="#item_<?php echo $itm->itm_id; ?>"><i class="icon icon-share"></i><span class="button-caption"><?php echo $this->lang->line('share'); ?></span></a></li>
			<?php if($this->config->item('share_external_email') && $itm->case_member != 'public_profile') { ?>
				<li class="hide item-share"><a class="modal_show" href="<?php echo base_url(); ?>item/email/<?php echo $itm->itm_id; ?>"><i class="icon icon-envelope"></i><span class="button-caption"><?php echo $this->lang->line('share_email'); ?></span></a></li>
			<?php } ?>
			<li class="hide item-share"><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($itm->itm_link); ?>"><i class="icon icon-share"></i>Facebook</a></li>
			<li class="hide item-share"><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($itm->itm_link); ?>"><i class="icon icon-share"></i>Google</a></li>
			<li class="hide item-share"><a target="_blank" href="https://twitter.com/intent/tweet?source=webclient&amp;text=<?php echo urlencode($itm->itm_title.' '.$itm->itm_link); ?>"><i class="icon icon-share"></i>Twitter</a></li>
		<?php } ?>
		</ul>
		<?php if($this->config->item('social_buttons')) { ?>
			<div class="item-like" id="item-like-<?php echo $itm->itm_id; ?>">
			</div>
		<?php } ?>
	</div>
</article>
