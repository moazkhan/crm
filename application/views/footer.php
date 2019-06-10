<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="dashboard.html">
							<span class="text-lg text-bold text-primary ">FOUR NODES CRM</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
						<?php if($this->session->userdata('user') == 'client'){ ?>
						
							<a href="<?= base_url() ?>client/dashboard" class="active">
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						<?php }else{ ?>

						<a href="<?= base_url() ?>dashboard" class="active">
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-trending-up"></i></div>
								<span class="title">Leads</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?= base_url() ?>lead/" ><span class="title">List</span></a></li>
								<li><a href="<?= base_url() ?>lead/add" ><span class="title">Add Lead</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-person"></i></div>
								<span class="title">Clients</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?= base_url() ?>client" ><span class="title">List</span></a></li>
								<li><a href="<?= base_url() ?>client/add" ><span class="title">Add Client</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-phonelink"></i></div>
								<span class="title">Projects</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?= base_url() ?>project" ><span class="title">List</span></a></li>
								<li><a href="<?= base_url() ?>project/add" ><span class="title">Add Projects</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<?php } ?>
					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2018</span> <strong>Four Nodes</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN SIMPLE MODAL MARKUP -->
		<div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">

				 <!-- Modal CONTENT-->
				<div class="modal-content">
					<form class="form" role="form" action="<?= base_url() ?>calender/reschedule_meeting" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="simpleModalLabel">ReSchedule Call/Meeting</h4>
					</div>
					<div class="modal-body">
							<div class="form-group floating-label">
							<label for="date-meeting">Date</label>
								<input type="date" class="form-control" name="date">
							</div>
							<div class="form-group floating-label">
								<label for="time">Time</label>
								<input type="time" class="form-control" name="time">
								<input id="meeting_id" type="hidden" class="form-control" name="id" >
							</div>
							<br>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" name="submit">Reschedule</button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- END SIMPLE MODAL MARKUP -->
		
		<!-- BEGIN JAVASCRIPT -->
		<script src="<?= base_url() ?>theme/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/libs/spin.js/spin.min.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/source/App.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/source/AppNavigation.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/source/AppOffcanvas.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/source/AppCard.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/source/AppForm.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/source/AppNavSearch.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/source/AppVendor.js"></script>
		<script src="<?= base_url() ?>theme/assets/js/core/demo/Demo.js"></script>
	
		<!-- JAVASCRIPT FOR MODAL  -->
		<script type="text/javascript">
				$('.btn-reschedule').click(function(){		//  <== Activataing on .btn-reschedule
				
					$('#meeting_id').val($(this).data('id'));
					
				});

				$('.checkbox-meeting').click( function(){		//  <== Activataing on .btn-reschedule				
					
					if(this.checked){
					$.post( "<?= base_url() ?>calender/change_status", {id: $(this).data('mid')})
						.done(function( data ) {
							console.log(data);
						});			
					}else{
						$.post( "<?= base_url() ?>calender/change_status", {id: $(this).data('mid')})
						.done(function( data ) {
							console.log(data);
						});
					}		
				});

			</script>

		<!-- END JAVASCRIPT -->

	</body>
</html>