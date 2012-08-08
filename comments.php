<?php /* --[ COMMENTS ] --*/ ?>
<?php if(USE_FACEBOOK_COMMENTS): ?>
	<!-- load facebook comments -->
	<div class="fb-comments"data-href="<?php the_permalink(); ?>" data-num-posts="2" mobile="false"></div>
<?php else: ?>
	<!-- load wordpress comments -->
	<?php comment_form(); ?>
<?php endif; ?>