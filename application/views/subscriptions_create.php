	<nav>
		<ul class="actions">
			<li><a href="<?php echo base_url(); ?>subscriptions"><i class="icon icon-step-backward"></i><?php echo $this->lang->line('back'); ?></a></li>
		</ul>
	</nav>
</header>
<main>
	<section>
		<section>
	<article class="title">
		<h2><i class="icon icon-bookmark"></i><?php echo $this->lang->line('subscriptions'); ?></h2>
	</article>

	<h2><i class="icon icon-plus"></i><?php echo $this->lang->line('add'); ?></h2>

	<?php echo validation_errors(); ?>

	<?php echo form_open(current_url()); ?>

	<?php if($error) { ?>
		<p><?php echo $error; ?></p>
	<?php } ?>

	<p>
	<?php echo form_label($this->lang->line('url'), 'url'); ?>
	<?php if(count($feeds) > 0) { ?>
		<?php echo form_dropdown('url', $feeds, set_value('url', ''), 'id="url" class="select required numeric"'); ?>
		<?php echo form_hidden('analyze_done', '1'); ?>
	<?php } else { ?>
		<?php echo form_input('url', set_value('url', $this->input->get('u')), 'id="url" class="input-xlarge required"'); ?>
	<?php } ?>
	</p>

	<?php if($this->config->item('folders')) { ?>
		<p>
		<?php echo form_label($this->lang->line('folder'), 'folder'); ?>
		<?php echo form_dropdown('folder', $folders, set_value('folder', ''), 'id="folder" class="select required numeric"'); ?>
		</p>
	<?php } ?>

	<p>
	<?php echo form_label($this->lang->line('priority'), 'priority'); ?>
	<?php echo form_dropdown('priority', array(0 => $this->lang->line('no'), 1 => $this->lang->line('yes')), set_value('priority', 0), 'id="priority" class="select numeric"'); ?>
	</p>

	<p>
	<?php echo form_label($this->lang->line('direction'), 'direction'); ?>
	<?php echo form_dropdown('direction', array('' => '-', 'ltr' => $this->lang->line('direction_ltr'), 'rtl' => $this->lang->line('direction_rtl')), set_value('direction', ''), 'id="direction" class="select numeric"'); ?>
	</p>

	<p>
	<button type="submit"><?php echo $this->lang->line('send'); ?></button>
	</p>
	<?php echo form_close(); ?>
		</section>
	</section>
</main>
