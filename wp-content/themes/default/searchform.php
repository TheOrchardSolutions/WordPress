								<li id="search">
									<div id="applesearch_ctl" style="display:inline;">
										<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
											<div id="applesearch">
												<span class="sbox">
													<span id="xlsSearch_ctl">
														<!-- <?php get_search_form(); ?> -->
														<input type="search" name="xlsSearch" id="xlsSearch" value="<?php the_search_query(); ?>" autosave="bsn_srch" results="5" class="searchTextBox" />
													</span>
												</span> 
												<span class="sbox_r" id="srch_clear"></span> 
												<span style="">
													<span id="c2_ctl">
														<img name="c2" id="c2" class="searchButton" onclick="document.location.href='index.php?search='+ $('#xlsSearch').val(); return false;" src="<?php bloginfo('stylesheet_directory'); ?>/css/images/search_go.png" />
														<input type="hidden" name="c2_x" id="c2_x" value="" />
														<input type="hidden" name="c2_y" id="c2_y" value="" />
													</span>
												</span>
											</form>
										</div>
									</div>
								</li>
