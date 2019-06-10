<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">Client Overview</h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->
						
						<div class="row">

							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-8">
								<div class="card card-underline">
									<div class="card-head">
										<header>Basic Information</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>client/update_info" method="POST">
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
														<input type="hidden" class="form-control" name="client_id" value="<?= (isset($client->client_id))?$client->client_id:''?>"/>
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
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary">Save</button>
											</div>
										</form>
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
										<form class="form" role="form" action="<?= base_url() ?>client/update_login" method="POST">
											<div class="form-group">
												<input type="text" class="form-control" name="client_username" value="<?= (isset($login->login_user))?$login->login_user:''?>" required>
												<label for="username">Username</label>
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="client_password" value="" placeholder="Enter to change Password" >
												<input type="hidden" class="form-control" name="client_login_id" value="<?= (isset($client->client_login_id))?$client->client_login_id:''?>"/>
												<input type="hidden" class="form-control" name="client_id" value="<?= (isset($client->client_id))?$client->client_id:''?>"/>
												<label for="password">Password</label>
											</div>
											<br>
											<div class="row">
												<div class="col-xs-12 text-right">
													<button style="margin-top: -14px" class="btn btn-primary btn-raised" type="submit">Save</button>
												</div><!--end .col -->
											</div><!--end .row -->
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<div class="card card-underline">
									<div class="card-head">
										<header>Schedule Call/Meeting</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>client/schedule_meeting" method="POST">
											<div class="form-group floating-label">
												<label for="date-meeting">Date</label>
												<input type="date" class="form-control" name="date">
												
											</div>
											<div class="form-group floating-label">
												<label for="time">Time</label>
												<input type="time" class="form-control" name="time">
												<input type="hidden" name="client_id" value="<?= $client->client_id ?>"/>
											</div>
											<div class="form-group floating-label text-right" style="margin-bottom: 0px">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary" style="margin-top: -17px;">Schedule</button>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								
							</div><!--end .col -->
							<!-- END SERVER STATUS -->

						</div><!--end .row -->
						
						<div class="row">
							<div class="col-md-8">
								<div class="card card-underline">
									<div class="card-head">
										<header>Notes</header>
									</div><!--end .card-head -->
									<div class="card-body height-9 scroll">
										<div class="table-responsive">
											<table class="table no-margin table-bordered">
												<thead>
													<tr>
														<th>Time</th>
														<th>Note</th>
														<th>File</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($client_notes as $note)
													{?>
													<tr>
														<td><?= $note->upload_time?></td>
														<td><?= $note->content?></td>
														<td><a download href="<?= base_url() ?>uploads/client/<?= $note->attachment ?>"  target="_blank"><?= $note->attachment?></a></td>
														<td><a type="button" href="<?= base_url()?>client/delete_note/<?= $note->note_id?>/<?= $client->client_id?>/<?= $note->attachment?>" class="btn ink-reaction btn-floating-action btn-sm btn-danger"><i class="md md-delete"></i></a></td>
													</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->

							<div class="col-md-4">
								<div class="card card-underline">
									<div class="card-head">
										<header>Add Notes</header>
									</div><!--end .card-head -->
									<div class="card-body height-9">
										<form class="form" role="form" action="<?= base_url() ?>client/upload_file" enctype='multipart/form-data' method="POST">
											<div class="form-group floating-label">
												<textarea name="content" id="content" class="form-control" style="padding-top: 0px" rows="4" placeholder=""></textarea>
												<label for="textarea2">Your Note</label>
											</div>
											<div class="form-group floating-label">
												<label class="file-label" >File Attachment</label>
												<div class="file-upload btn ink-reaction btn-raised btn-info mt-20">
													<span class="file-upload-text">
														Browse
													</span>
													<input type="file" name="filename" id="file">
													<input type="hidden" name="client_id" value="<?= $client->client_id ?>"/>
												</div>
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" style="margin-bottom: -9px" class="btn ink-reaction btn-raised btn-primary">Add</button>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->

						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->
<!-- BEGIN CONTENT-->
