<div class="msg_history">
    <div class="incoming_msg">
        <div class="received_msg">
        <div class="received_withd_msg">
            <p>Test which is a new approach to have all
            solutions</p>
            <span class="time_date"> 11:01 AM    |    June 9</span></div>
        </div>
    </div>
    <div class="outgoing_msg">
        <div class="sent_msg">
        <p>Test which is a new approach to have all
            solutions</p>
        <span class="time_date"> 11:01 AM    |    June 9</span> </div>
    </div>
    <div class="incoming_msg">
        <div class="received_msg">
        <div class="received_withd_msg">
            <p>Test, which is a new approach to have</p>
            <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
        </div>
    </div>
    <div class="outgoing_msg">
        <div class="sent_msg">
        <p>Apollo University, Delhi, India Test</p>
        <span class="time_date"> 11:01 AM    |    Today</span> </div>
    </div>
    <div class="incoming_msg">
        <div class="received_msg">
        <div class="received_withd_msg">
            <p>We work directly with our designers and suppliers,
            and sell direct to you, which means quality, exclusive
            products, at a price anyone can afford.</p>
            <span class="time_date"> 11:01 AM    |    Today</span></div>
        </div>
    </div>
</div>


<?php foreach($discussions as $project_discussion){ ?>
										<div class="alert alert-success" role="alert">
											<div class="row">
												
												<div class="col-md-10">
													<?= $project_discussion->discussion ?>
												</div>	
												<div class="col-md-2">
													<i class="pull-right">
													<?php echo "  ". $project_discussion->discusssion_time; ?>
												</i>
												</div>	
											</div>
										</div>
									<?php } ?>
												