								</div>
							</div>
						</div>
					</div>
					<div id="rightside">
						<div style="clear: both;">
							<div id="sidebar_ctl" style="display:inline;">
								<div id="sidebar">
									<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>

									<!-- <h1 class="rounded {5px transparent}" style="color: #111;" onclick="$('#c12_container').slideToggle('slow');">
										Categories
									</h1>
									<div class="containers rounded {5px bottom transparent}" id="c12_container">
										<div id="c12_ctl" style="display:inline;">
											<div id="c12">												
												<ul>
												<?php wp_list_categories('orderby=name&show_count=0&title_li='); ?>
												</ul>
											</div> 
										</div>
									</div> -->

									<h1 class="rounded {5px transparent}" style="color: #111;" onclick="$('#c11_container').slideToggle('slow');">
										Interacting
									</h1>
									<div class="containers rounded {5px bottom transparent}" id="c11_container">
										<div id="c11_ctl" style="display:inline;">
											<div id="c11">
												<ul>
													<li><a href="http://macconsultinggroup.com/directions">         	Directions			</a></li>
													<li><a href="http://macconsultinggroup.com/takein">             	Drop Off Form		</a></li>
													<li><a href="http://macconsultinggroup.com/service/remote-support">	Remote Support		</a></li>
													<li><a href="http://macconsultinggroup.com/payform">	Card Payment Form		</a></li>
													<li><a href="https://support.macconsultinggroup.com">           	Support Site			</a></li>
<!--													<li><a href="https://support.macconsultinggroup.com/cgi-bin/WebObjects/Helpdesk.woa/wa/FaqActions/viewAll">FAQ Area</a></li> -->
													<li><a href="http://macconsultinggroup.com/training">Authorized Training</a></li>
													<li><a href="https://mail.mcghosting.com">							Webmail				</a></li>
													<li><?php wp_loginout(); ?></li>
												</ul>
											</div> <!-- close: c11 -->
										</div>
									</div>
									<h1 class="rounded {5px transparent}" style="color: #111;" onclick="$('#c16_container').slideToggle('slow');">
										Partners
									</h1>
									<div class="containers rounded {5px bottom transparent}" id="c16_container">
										<div id="c16_ctl" style="display:inline;">
											<div id="c16">
												<ul>
													<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
												</ul>
											</div>
										</div>
									</div>
								<?php endif; ?>
								</div>
							</div>
						</div>
					</div> <!-- close: rightside  -->
					
				</div>
