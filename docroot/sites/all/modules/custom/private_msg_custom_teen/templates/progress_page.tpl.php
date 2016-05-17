<!-- Progress Report Pagez -->
<div class="progress-page">
<h1 id = "title">
	<?php print variable_get('pg_title'); ?>
</h1>
<div class="progress-desc">
	<?php
	$page_desc = variable_get('pg_desc', array('value' => '', 'format' => NULL)); 
	print $page_desc['value']; ?>
</div>
<div class="print-page">
	<button class="print">Print My Progress</button>
</div>
<div class="user-desc">
<div class="avatar-id">
	<?php print user_avatar_progress_page(); ?>
</div>
<div class="point-status">
<div class="activity-status">
	<?php print 'Stamps Earned:'; ?>
</div>
<div class="points">
	<?php print 'Raffle Tickets Earned:'; ?>
</div>
</div>
</div>
<div class="progress-wrap">
<div class="report-acivity">
	<?php
	    print '<h1>Report an Activity</h1>	';
		$block = block_load('private_msg_custom_teen', 'progress_submit_block');
  	$output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
  	print $output; 
	?>
	<div class="submit">
		<button id="pg-report">Submit</button>
	</div>
	<div><?php
		$report_block_text = variable_get('report_block_desc', array('value' => '', 'format' => NULL));
	  	//print $report_block_text['value']
		?>
	</div>
</div>


<div class="reward-won"><?php
	print views_embed_view('prize_won_for_progress_page','block');
  ?>
</div>
<div class="progress-rewards">
	<?php
	  $reward_block = variable_get('progress_rewards', array('value' => '', 'format' => NULL)); 
	  print $reward_block['value']; ?>
</div>
</div>

<div class="progress-main">
	<?php 
	   print '<h1>My Passport Stamps</h1>';
		$grids = variable_get('no_of_grids');
		for($i=0; $i < $grids; $i++){
			echo '<div class = "grid" id = "cells'.$i.'"></div>';

		}
	?>
</div>
</div>

