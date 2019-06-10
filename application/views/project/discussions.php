<?php
?>
<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30"><?=$project_name?></h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->
						
						<div class="row">
							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-12">
								<div class="card card-underline">
									<div class="card-head">
										<header>Project Discussion</header>
										
									</div>
									<div class="card-body">
										
										<div class="msg_history">
											<?php foreach($discussions as $project_discussion){ ?>

												<!-- Chcking discussions for users other than loggedin user -->	
												<?php if($this->session->userdata('user_id') != $project_discussion->user_id){ ?>
												<div class="incoming_msg">
												 <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
													<div class="received_msg">
													<div class="received_withd_msg">
														<p><?= $project_discussion->discussion ?></p>
														<span class="time_date"><?php echo date("d/m/Y h:i A",strtotime($project_discussion->discusssion_time)); ?></span></div>
													</div>
												</div>
												<?php }else{ ?>
												<div class="outgoing_msg">
													<div class="sent_msg">
													<p><?= $project_discussion->discussion ?></p>
													<span class="time_date"><?php echo date("d/m/Y h:i A",strtotime($project_discussion->discusssion_time)); ?></span> </div>
												</div>
											<?php }} ?>
										</div>
										
									
								</div> <!--end .card-body --> 
						</div>
						
						<div class="row">
							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-12">
								<div class="card card-underline">
									<div class="card-head">
										<header>Post Message</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>discussion/save" enctype='multipart/form-data' method="POST">
											<div class="form-group floating-label">
												<textarea name="project_discussion" id="textarea2" class="form-control" rows="6" placeholder="" ></textarea>
												<label for="project_credential">Enter Message Here </label>
												<input type="hidden" name="project_id" value = "<?= $project_id?>" />
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary">Post</button>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END SITE ACTIVITY -->
							
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->