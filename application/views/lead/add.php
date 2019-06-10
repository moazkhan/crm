<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">New Lead</h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->
						
						<div class="row">

							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-12">
								<div class="card card-underline">
									<div class="card-head">
										<header>Basic Information</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>lead/save" method="POST">
											<div class="form-group floating-label">
												<input type="text" class="form-control" name="lead_name">
												<label for="name">Name</label>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="email" class="form-control" name="lead_email">
														<label for="email">Email</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_phone">
														<label for="phone">Phone</label>
													</div>
												</div>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" name="lead_address">
												<label for="address">Address</label>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_city">
														<label for="city">City</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_state">
														<label for="state">State</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_zip">
														<label for="zip">Zip</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<select name="lead_country" class="form-control">
															<option value="NULL">&nbsp;</option>
															<?php foreach(unserialize(COUNTRIES) as $country){ ?>
																<option value="<?= $country ?>"><?= $country ?></option>
															<?php } ?>
														</select>
														<label for="select2">Country</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<select name="lead_source" class="form-control">
															<option value="NULL">&nbsp;</option>
															<?php foreach(unserialize(SOURCE) as $source){ ?>
																<option value="<?= $source ?>"><?= $source ?></option>
															<?php } ?>
														</select>
														<label for="select2">Source</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_skype_id">
														<label for="skype-id">Skype ID</label>
													</div>
												</div>
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary">Save</button>
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