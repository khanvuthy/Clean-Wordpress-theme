<form class="cleantheme-search" method="get" name="searchform" action="<?php bloginfo('url'); ?>/">
	<input name="s" type="text" value="<?php echo esc_attr(get_search_query()); ?>" />
	<input class="cleantheme-search-button" type="submit" value="" />
</form>