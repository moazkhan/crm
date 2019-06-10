<?php
$statuses = unserialize(LEAD_STATUS);
?>
<!-- BEGIN CONTENT-->

			<div id="content">
				<section>
					<div class="section-body">
						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="mt-10 mb-30">Clients List</h1>
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
										<div class="table-responsive">
											<table class="table no-margin table-bordered">
												<thead>
													<tr>
														<th>Name</th>
														<th>Email</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php
												
												foreach($clients as $client){ ?>	
													<tr>
														<td><?= $client->client_name?></td>
														<td><?= $client->client_email?></td>
														<td><?= $statuses[$client->client_status] ?></td>
														<td>
															<a  href="<?= base_url()?>client/edit/<?= $client->client_id?>" type="button" class="btn ink-reaction btn-floating-action btn-sm btn-success"><i class="md md-visibility"></i></a>
															<a href="<?= base_url()?>client/delete/<?= $client->client_id?>" type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger"><i class="md md-delete"></i></a>
														</td>
													</tr>
												<?php } ?>
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