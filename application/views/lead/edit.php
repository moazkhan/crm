<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">Lead Overview</h1>
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
										<form class="form" role="form" action="<?= base_url() ?>lead/update" method="POST">
											
											<div class="form-group floating-label">
												<input type="hidden" name="lead_id" value="<?= $lead->lead_id ?>"/>
												<input type="text" class="form-control" name="lead_name" value="<?= $lead->lead_name ?>">
												<label for="name">Name</label>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="email" class="form-control" name="lead_email" value="<?= $lead->lead_email ?>">
														<label for="email">Email</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_phone" value="<?= $lead->lead_phone ?>">
														<label for="phone">Phone</label>
													</div>
												</div>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" name="lead_address" value="<?= $lead->lead_address ?>">
												<label for="address">Address</label>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_city" value="<?= $lead->lead_city ?>">
														<label for="city">City</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_state" value="<?= $lead->lead_state ?>">
														<label for="state">State</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_zip" value="<?= $lead->lead_zip ?>">
														<label for="zip">Zip</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<select name="lead_country" class="form-control">
															<option value="NULL">&nbsp;</option>
															<?php foreach(unserialize(COUNTRIES) as $country){ ?>
																<option <?= ($country == $lead->lead_country)?'selected':'' ?> value="<?= $country ?>"><?= $country ?></option>
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
																<option <?= ($source == $lead->lead_source)?'selected':'' ?> value="<?= $source ?>"><?= $source ?></option>
															<?php } ?>
														</select>
														<label for="select2">Source</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group floating-label">
														<input type="text" class="form-control" name="lead_skype_id" value="<?= $lead->lead_skype_id ?>">
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
										<header>Lead Status</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>lead/update" method="POST">
											<div class="form-group floating-label">
												<select id="select2" name="lead_status" class="form-control">
													<option value="NULL">&nbsp;</option>
													<?php foreach(unserialize(LEAD_STATUS) as $index=>$lead_status){ ?>
														<option <?= ($index == $lead->lead_status)?'selected':'' ?> value="<?= $index ?>"><?= $lead_status ?></option>
													<?php } ?>
												</select>
												<label for="select2">Status</label>
												<input type="hidden" name="lead_id" value="<?= $lead->lead_id ?>"/>
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary">update</button>
												<a href="<?= base_url() ?>lead/transfertoclient/<?= $lead->lead_id ?>" class="btn ink-reaction btn-raised btn-primary">Transfer To Client</a>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								
								<div class="card card-underline">
									<div class="card-head">
										<header>Schedule Call/Meeting</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>lead/schedule_meeting" method="POST">
											<div class="form-group floating-label">
												<label for="date-meeting">Date</label>
												<input type="date" class="form-control" name="date">
												
											</div>
											<div class="form-group floating-label">
												<label for="time">Time</label>
												<input type="time" class="form-control" name="time">
												<input type="hidden" name="lead_id" value="<?= $lead->lead_id ?>"/>
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary" style="margin-top: 17px;">Schedule</button>
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
													<?php foreach($lead_notes as $note)
													{?>
													<tr>
														<td><?= $note->upload_time?></td>
														<td><?= $note->contant?></td>
														<td><a download href="<?= base_url() ?>uploads/lead/<?= $note->attachment ?>"  target="_blank"><?= $note->attachment?></a></td>
														<td><a href="<?= base_url()?>lead/delete_note/<?= $note->note_id?>/<?= $lead->lead_id?>/<?= $note->attachment?>" class="btn ink-reaction btn-floating-action btn-sm btn-danger"><i class="md md-delete"></i></a></td>
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
										<form class="form" role="form" action="<?= base_url() ?>lead/upload_file" enctype='multipart/form-data' method="POST">
											<div class="form-group floating-label">
												<textarea name="contant" id="contant" class="form-control" rows="4" placeholder=""></textarea>
												<label for="textarea2">Your Note</label>
											</div>
											<div class="form-group floating-label">
												<label class="file-label" >File Attachment</label>
												<div class="file-upload btn ink-reaction btn-raised btn-info mt-20">
													<span class="file-upload-text">
														Browse
													</span>
													<input type="file" name="filename" id="file">
													<input type="hidden" name="lead_id" value="<?= $lead->lead_id ?>"/>
												</div>
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary">Add</button>
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