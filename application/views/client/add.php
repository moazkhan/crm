<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">New Client</h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->
						
						<form class="form" role="form" action="<?= base_url() ?>client/save" method="POST">
						<div class="row">

							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-8">
								<div class="card card-underline">
									<div class="card-head">
										<header>Basic Information</header>
									</div><!--end .card-head -->
									<div class="card-body">
										
											<div class="form-group floating-label">
												<input type="text" class="form-control" name="client_name" value="<?= (isset($client->client_name))?$client->client_name:''?>">
												<label for="name">Name</label>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="email" class="form-control" name="client_email" value="<?= (isset($client->client_email))?$client->client_email:''?>">
														<label for="email">Email</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="client_phone" value="<?= (isset($client->client_phone))?$client->client_phone:''?>">
														<label for="phone">Phone</label>
													</div>
												</div>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" name="client_address" value="<?= (isset($client->client_address))?$client->client_address:''?>">
												<label for="address">Address</label>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="client_city" value="<?= (isset($client->client_city))?$client->client_city:''?>">
														<label for="city">City</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="client_state" value="<?= (isset($client->client_state))?$client->client_state:''?>">
														<input type="hidden" class="form-control" name="client_status" value="<?= (isset($client->client_status))?$client->client_status:''?>"/>
														<label for="state">State</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="client_zip" value="<?= (isset($client->client_zip))?$client->client_zip:''?>" >
														<label for="zip">Zip</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<select name="client_country" class="form-control">
															<option value="NULL">&nbsp;</option>
															<?php foreach(unserialize(COUNTRIES) as $country){ ?>
																<option <?= ($country == ((isset($client->client_country))?$client->client_country:''))?'selected':'' ?> value="<?= $country ?>"><?= $country ?></option>
															<?php } ?>
														</select>
														<label for="select2">Country</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<select name="client_source" class="form-control">
															<option value="NULL">&nbsp;</option>
															<?php foreach(unserialize(SOURCE) as $source){ ?>
																<option <?= ($source == ((isset($client->client_source))?$client->client_source:''))?'selected':'' ?> value="<?= $source ?>"><?= $source ?></option>
															<?php } ?>
														</select>
														<label for="select2">Source</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="client_skype_id" value="<?= (isset($client->client_skype_id))?$client->client_skype_id:''?>">
														<label for="skype-id">Skype ID</label>
													</div>
												</div>
											</div>
											
										
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END SITE ACTIVITY -->

							<!-- BEGIN SERVER STATUS -->
							<div class="col-md-4">
								<div class="card card-underline">
									<div class="card-head">
										<header>Login Information</header>
									</div><!--end .card-head -->
									<div class="card-body">
										
											<div class="form-group">
												<input type="text" class="form-control" name="client_username" required>
												<label for="username">Username</label>
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="client_password" required>
												<label for="password">Password</label>
											</div>
											<br>
											<div class="row">
												<div class="col-xs-12 text-right">
													<button class="btn btn-primary btn-raised" type="submit">Save</button>
												</div><!--end .col -->
											</div><!--end .row -->
										
									</div><!--end .card-body -->
								</div><!--end .card -->
								
							</div><!--end .col -->
							<!-- END SERVER STATUS -->

						</div><!--end .row -->
						</form>
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->