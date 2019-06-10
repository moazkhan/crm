<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">Dashboard</h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->

						<div class="row">

							<!-- BEGIN TODOS -->
							<div class="col-md-6">
								<div class="card card-underline">
									<div class="card-head">
										<header>Today's Summary</header>
									</div><!--end .card-head -->
									<div class="card-body height-9 scroll">
										<ul class="list" data-sortable="true">
											
											<?php foreach($calender_lead as $meeting)
											{?>
												<li class="tile">
													<div class="checkbox checkbox-styled tile-text">
														<label>
															<input <?= ($meeting->status == 2)?"checked":""; ?> type="checkbox" class="checkbox-meeting" data-mid="<?= $meeting->id?>" >
															
															<span>Call\Meeting with <?= $meeting->lead_name?> at <?= $meeting->meeting_time?></span>
														</label>
													</div>
													<a class="btn btn-flat ink-reaction btn-default" href="<?= base_url() ?>/lead/edit/<?= $meeting->lead_id?>">
														<i class="md md-visibility"></i>
													</a>
													<a class="btn btn-flat ink-reaction btn-default btn-reschedule"  data-toggle="modal" data-target="#simpleModal" data-id="<?= $meeting->id?>">
														<i class="md md-refresh"></i>
													</a>
												</li>
											<?php }?>
											<?php foreach($calender_client as $meeting)
											{?>
												<li class="tile">
													<div class="checkbox checkbox-styled tile-text">
														<label>
														<input <?= ($meeting->status == 2)?"checked":""; ?> type="checkbox" class="checkbox-meeting" data-mid="<?= $meeting->id?>">
															
															<span>Call\Meeting with <?= $meeting->client_name?> at <?= $meeting->meeting_time?></span>
														</label>
													</div>
													<a class="btn btn-flat ink-reaction btn-default" href="<?= base_url() ?>/client/edit/<?= $meeting->client_id?>">
														<i class="md md-visibility"></i>
													</a>
													<a class="btn btn-flat ink-reaction btn-default btn-reschedule" data-toggle="modal" data-target="#simpleModal" data-id="<?= $meeting->id?>">
														<i class="md md-refresh"></i>
													</a>
												</li>
											<?php }?>
											<?php foreach($calender_project as $meeting)
											{?>
												<li class="tile">
													<div class="checkbox checkbox-styled tile-text">
														<label>
														<input <?= ($meeting->status == 2)?"checked":""; ?> type="checkbox" class="checkbox-meeting" data-mid="<?= $meeting->id?>">
															
															<span>Call\Meeting with <?= $meeting->project_name?> at <?= $meeting->meeting_time?></span>
														</label>
													</div>
													<a class="btn btn-flat ink-reaction btn-default" href="<?= base_url() ?>/project/edit/<?= $meeting->project_id?>">
														<i class="md md-visibility"></i>
													</a>
													<a class="btn btn-flat ink-reaction btn-default btn-reschedule" data-toggle="modal" data-target="#simpleModal" data-id="<?= $meeting->id?>">
														<i class="md md-refresh"></i>
													</a>
												</li>
											<?php }?>
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END TODOS -->

							<!-- BEGIN REGISTRATION HISTORY -->
							<div class="col-md-6">
								<div class="card card-underline">
									<div class="card-head">
										<header>Pending Projects</header>
									</div><!--end .card-head -->
									<div class="card-body height-9 scroll">
										<div class="table-responsive">
											<table class="table no-margin table-bordered">
												<thead>
													<tr>
														<th>Project Name</th>
														<th>Client</th>
														<th style="width: 60px;">Action</th>
													</tr>
												</thead>
												<tbody>
												<?php
														foreach($pending_projects as $project){?>	
															<tr>
																<td><?= $project->project_name ?></td>
																<td><?= $project->client_name ?></td>
																<td>
																	<a href="<?= base_url()?>project/edit/<?= $project->project_id?>" class="btn ink-reaction btn-floating-action btn-sm btn-success"><i class="md md-visibility"></i></a> 
																</td>
															</tr>
													<?php } ?>
													
												</tbody>
											</table>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END REGISTRATION HISTORY -->

						</div><!--end .row -->
						
						<div class="row">

							<!-- BEGIN TODOS -->
							<div class="col-md-6">
								<div class="card card-underline">
									<div class="card-head">
										<header>Activity Log</header>
									</div><!--end .card-head -->
									<div class="card-body height-9 scroll">
										<div class="table-responsive">
											<table class="table no-margin table-bordered">
												<thead>
													<tr>
														<th>Time</th>
														<th>Note</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>10:00 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
													<tr>
														<td>11:30 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
													<tr>
														<td>10:00 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
													<tr>
														<td>11:30 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
													<tr>
														<td>10:00 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
													<tr>
														<td>11:30 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
													<tr>
														<td>10:00 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
													<tr>
														<td>11:30 AM</td>
														<td>Consectetuer enim ducimus, lorem repellat architecto.</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END TODOS -->

							<!-- BEGIN REGISTRATION HISTORY -->
							<div class="col-md-6">
								<div class="card card-underline">
									<div class="card-head">
										<header>Active Projects</header>
									</div><!--end .card-head -->
									<div class="card-body height-9 scroll">
										<div class="table-responsive">
											<table class="table no-margin table-bordered">
												<thead>
													<tr>
														<th>Project Name</th>
														<th>Client</th>
														<th style="width: 60px;">Action</th>
													</tr>
												</thead>
												<tbody>
												<?php
														foreach($active_projects as $project){?>	
															<tr>
																<td><?= $project->project_name ?></td>
																<td><?= $project->client_name ?></td>
																<td>
																	<a href="<?= base_url()?>project/edit/<?= $project->project_id?>" class="btn ink-reaction btn-floating-action btn-sm btn-success"><i class="md md-visibility"></i></a> 
																</td>
															</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END REGISTRATION HISTORY -->

						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- JAVASCRIPT FOR CHECKBOX  -->
		<script type="text/javascript">
			

				
			</script>