<div class="washu-main-menu-wrapper">
	<div class="container">
		<nav class="washu-main-menu">
			<button class="main-menu-back mobile-only">Back</button>
			<button class="main-menu-close mobile-only">Close</button>
			<span class="washu-main-menu-title mobile-only">Menu</span>

			<div class="washu-main-menu-content">
				<div class="header-search mobile-only">
					<?php get_search_form(); ?>
					<button class="desktop-search-close">
						<img src="<?php echo get_template_directory_uri() . '/_assets/icons/close.svg'; ?>" width="22" height="22" alt="">
						<span class="screen-reader-text">Close Search</span>
					</button>
				</div>

				<ul class="washu-main-menu-list">
					<?php chauvenet_main_menu(); ?>
				</ul>

				<div class="nav-search">
					<button type="button">
						<img src="<?php echo get_template_directory_uri() . '/_assets/icons/search.svg'; ?>" width="22" height="22" alt="">
						<span class="screen-reader-text">Open Search</span>
					</button>
				</div>
			</div><!-- .washu-main-menu-content -->
		</nav> <!-- .washu-main-menu -->
	</div>
</div> <!-- .washu-main-menu-wrapper -->