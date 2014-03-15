								<li id="search">
									<div id="applesearch_ctl" style="display:inline;">
										<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/" >
											<div id="applesearch">
												<span class="sbox">
													<span id="xlsSearch_ctl">
														<input type="search" value="Search..." class="searchTextBox" name="s" id="xlsSearch" onblur="if (this.value == '') { this.value='Search...'; jQuery(this).addClass('blank'); };" onfocus="if (this.value == 'Search...') { this.value=''; jQuery(this).removeClass('blank'); };" />
													</span>
												</span> 
												<span class="sbox_r" id="srch_clear"></span> 
												<input type="image" id="searchsubmit" value="Search" style="border: 0px; padding: 0px;" src="<?php bloginfo('stylesheet_directory'); ?>/css/images/search_go.png" />
											</div>
										</form>
									</div>
								</li>
