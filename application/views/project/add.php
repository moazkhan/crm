<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">Projects</h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->
						
						<div class="row">

							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-12">
								<div class="card card-underline">
									<form class="form" role="form" action="<?= base_url() ?>project/save" method="POST">
										<div class="card-head">
											<header>Project Information</header>
										</div><!--end .card-head -->
										<div class="card-body">
											
												<div class="form-group floating-label">
													<input type="text" class="form-control" name="project_name">
													<label for="project-name">Project Name</label>
												</div>
												<div class="form-group floating-label">
													<div class="input-group">
														<div class="input-group-content">
															<select id="select2" name="client_id" class="form-control">
																<option value="">&nbsp;</option>
																<?php foreach($clients as $client){ ?>
																<option value="<?= $client->client_id?>"><?= $client->client_name ?></option>
																<?php } ?>
															</select>
															<label for="select2">Client</label>
														</div>
														<div class="input-group-btn">
															<a class="btn btn-primary" href="<?= base_url() ?>client/add">Add New</a>
														</div>
													</div>
												</div>
												<div class="form-group floating-label">
													<textarea name="project_definition" class="form-control" rows="6" placeholder=""></textarea>
													<label for="textarea2">Project Definition</label>
												</div>
												
											
										</div><!--end .card-body -->
										
										<div class="card-head">
											<header>Project Credentials</header>
										</div><!--end .card-head -->
										<div class="card-body">
											
												<div class="form-group floating-label">
													<textarea name="project_credential" class="form-control" rows="6" placeholder=""></textarea>
													<label for="textarea2">Your Credentials</label>
												</div>
												<div class="form-group floating-label text-right">
													<button type="submit" class="btn ink-reaction btn-raised btn-primary">Save</button>
												</div>
											
										</div><!--end .card-body -->
									</form>
								</div><!--end .card -->
								
								<div class="card card-underline">
									
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END SITE ACTIVITY -->

						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->