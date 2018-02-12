<div class="modal-popup modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<div class="modal-title">
					<p id="h">Log In to Justfiles</p>
				</div>
			</div>
			<div class="modal-body">
				  <div class="col-lg-6">
				    <div class="form-group has-feedback">
					<label for="dunno" class="email control-label">Email Or User Name</label>
					<input type="text" name="dunno" id="dunno" placeholder="Your Email Address Or User Name" class="form-control">
					<span id="dunno_feedback" class="form-control-feedback"></span>
                    <span class="dunno_help help-block"></span>
                  </div>
                  <br>
                  
					     </div>

                       <div class="col-lg-6">
                      <div class="form-group has-feedback">
                      <label for="pass" class="pass control-label">Your Password</label>
					  <input type="Password" name="pass" id="pass" placeholder="Your Password" class="form-control">
                      <span id="pass_feedback" class="form-control-feedback"></span>
                      <span class="pass_help help-block"></span>
                      </div>
				</div>
					
				<div style="margin-top: 100px;" class="modal-footer">
				        <div style="float: right;" class="col-lg-6">
				           <div class="spinner" id="spinner"></div>
				        	<button id="button_log" class="btn btn-primary">Log In</button>
					        <button id="button_cancel" class="btn btn-danger">Cancel</button>
				        </div>
				        <div style="float: right;" class="col-lg-6">
				        <span id="logInResult" style="color: red; font-weight: bold; text-transform: capitalize;"></span>
									</div>

			</div>
		</div>
	</div>
</div>
</div>