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
								<h1 class="mt-10 mb-30">Dashboard</h1>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->

						<div class="row">
							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-12">
								<div class="card card-underline">
									<div class="card-head">
										<header>Project Information</header>
									</div><!--end .card-head -->
									<div class="card-body">
										<?php if($client_project == null){ ?>
											<h3> You currently have no projects </h3>
										<?php }else{  ?>
										<div class="table-responsive">
											<table class="table no-margin table-bordered">
												<thead>
													<tr>
														<th>Project Name</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach($client_project as $project){ ?>	
															<tr>
																<td><?= $project->project_name ?></td>
																<td><?= $statuses[$project->project_status] ?></td>
																<td>
																	<a href="<?= base_url()?>discussion/view/<?=$project->project_id?>" class="btn ink-reaction btn-floating-action btn-sm btn-primary"><i class="md md-chat"></i></a>
																</td>
															</tr>
													<?php }} ?>	
												</tbody>
											</table>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END SITE ACTIVITY -->

						</div><!--end .row -->
						
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- JAVASCRIPT FOR CHECKBOX  -->
