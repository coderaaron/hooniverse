<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ) ?>">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" id="header-search-field" placeholder="Search …" value="" name="s" title="Search for:">
	</label>
	<button type="submit" class="search-submit">
		<img src="<?php echo get_template_directory_uri(); ?>/inc/search.svg" width="22" height="22" alt="">
		<span class="screen-reader-text">Search</span>
	</button>
</form>
