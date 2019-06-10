<?php
	$statuses = unserialize(PROJECT_STATUS);
?>
<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">
								<?=$project->project_name?>
									<div class="floating-label pull-right">
										<a href="<?= base_url()?>discussion/view/<?=$project->project_id?>"><button class="btn ink-reaction btn-raised btn-primary">Discussion</button></a>
									</div>
								</h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->
						
						<div class="row">

							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-8">
								<div class="card card-underline">
									<div class="card-head">
										<header>Project Information</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>project/update_info" method="POST">
											<div class="form-group floating-label">
												<input name="project_name" type="text" class="form-control" id="project-name" value="<?= (isset($project->project_name))?$project->project_name:''?>">
												<label for="project-name">Project Name</label>
												<input type="hidden" name="project_id" value="<?= $project->project_id ?>"/>
											</div>
											<div class="form-group floating-label">
												<div class="input-group">
													<div class="input-group-content">
														<select id="select2" name="client_id" class="form-control">
															<option value="">&nbsp;</option>
															<?php foreach($clients as $client){ ?>
																<option <?= ($project->client_id == ((isset($client->client_id))?$client->client_id:''))?'selected':'' ?>  value="<?= $client->client_id?>"><?= $client->client_name ?></option>
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
												<textarea name="project_definition" id="textarea2" class="form-control" rows="6" placeholder=""><?= (isset($project->project_definition))?$project->project_definition:''?></textarea>
												<label for="textarea2">Project Definition</label>
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
										<header>Project Status</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>project/update_status" method="POST">
											<div class="form-group floating-label">
												<select id="select2" name="project_status" class="form-control">
													<?php foreach(unserialize(PROJECT_STATUS) as $index=>$project_status){ ?>
														<option <?= ($index == $project->project_status)?'selected':'' ?> value="<?= $index ?>"><?= $project_status ?></option>
													<?php } ?>
												</select>
												<label for="select2">Status</label>
												<input type="hidden" name="project_id" value="<?= $project->project_id ?>"/>
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary">update</button>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								
								<div class="card card-underline">
									<div class="card-head">
										<header>Schedule Call/Meeting</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>project/schedule_meeting" method="POST">
											<div class="form-group floating-label">
												<label for="date-meeting">Date</label>
												<input type="date" class="form-control" name="date">
											</div>
											<div class="form-group floating-label">
												<label for="time">Time</label>
												<input type="time" class="form-control" name="time">
												<input type="hidden" name="project_id" value="<?= $project->project_id ?>"/>
												
											</div>
											<div class="form-group floating-label text-right">
												<button type="submit" class="btn ink-reaction btn-raised btn-primary" style="margin-top: 18px;">Schedule</a>
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
														<th>file</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($project_notes as $note)
														{?>
														<tr>
															<td><?= $note->upload_time?></td>
															<td><?= $note->contant?></td>
															<td><a download href="<?= base_url() ?>uploads/project/<?= $note->attachment ?>"  target="_blank"><?= $note->attachment?></a></td>
															<td><a href="<?= base_url()?>project/delete_note/<?= $note->note_id?>/<?= $project->project_id?>/<?= $note->attachment?>" class="btn ink-reaction btn-floating-action btn-sm btn-danger"><i class="md md-delete"></i></a></td>
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
										<header>Project Notes</header>
									</div><!--end .card-head -->
									<div class="card-body height-9">
										<form class="form" role="form"  action="<?= base_url() ?>project/upload_file" enctype='multipart/form-data' method="POST">
											<div class="form-group floating-label">
												<textarea name="contant" id="textarea2" class="form-control" rows="4" placeholder=""></textarea>
												<label for="textarea2">Your Note</label>
											</div>
											<div class="form-group floating-label">
												<label class="file-label" >File Attachment</label>
												<div class="file-upload btn ink-reaction btn-raised btn-info mt-20">
													<span class="file-upload-text">
														Browse
													</span>
													<input type="file" name="filename" id="file">
													<input type="hidden" name="project_id" value="<?= $project->project_id ?>"/>
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
						
						<div class="row">

							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-12">
								<div class="card card-underline">
									<div class="card-head">
										<header>Project Credentials</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<form class="form" role="form" action="<?= base_url() ?>project/update_credential" enctype='multipart/form-data' method="POST">
											<div class="form-group floating-label">
												<textarea name="project_credential" id="textarea2" class="form-control" rows="6" placeholder="" ><?= (isset($project->project_credential))?$project->project_credential:''?></textarea>
												<label for="project_credential">Your Credentials</label>
												<input type="hidden" name="project_id" value="<?= $project->project_id ?>"/>
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