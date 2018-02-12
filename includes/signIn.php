<div class="modal-popup modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<div class="modal-title">
					<p id="h">Sign In to Justfiles</p>
				</div>
			</div>
			<div class="modal-body">
				  <div class="col-lg-6">
				    <div id="email_form" class="form-group has-feedback">
					<label for="email" class="email control-label">Email</label>
					<input type="email" name="email" id="email" placeholder="Your Email Address" class="form-control">
					<span id="email_feedback" class="form-control-feedback"></span>
                    <span class="email_help help-block"></span>
                  </div>
                  <br>
                  <div id="pass1_form" class="form-group has-feedback">
                   	<label for="pass1" class="pass1 control-label">Choose Password</label>
					<input type="Password" name="pass1" id="pass1" placeholder="Choose Password" class="form-control">
                     <span id="pass1_feedback" class="form-control-feedback"></span>
                     <span class="pass1_help help-block"></span>
                   </div>
                   <br>
                   <div class="form-group">
						<label for="country" class="country control-label">Country</label>
					<select class="form-control" id="country" name="country">
					    <option value="">--Choose Country--</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Brazil">Brazil</option><option value="Colombia">Colombia</option>
						<option value="Cameroon">Cameroon</option><option value="Portugal">Portugal</option>
						<option value="Congo">Congo</option><option value="Argentina">Argentina</option>
						<option value="Uruguay">Uruguay</option><option value="Italy">Italy</option>
						<option value="Spain">Spain</option><option value="United States Of America">United States Of America</option>
					</select>
					</div><br>
					     </div>

                       <div class="col-lg-6">
                       <div id="uname_form" class="form-group has-feedback">
					<label for="uname" class="uname control-label">User Name</label>
					<input type="uname" name="uname" id="uname" placeholder="Create Username" class="form-control">
                    <span id="uname_feedback" class="form-control-feedback"></span>
                    <span class="uname_help help-block"></span>
                  </div>
                      <br>
                      <div id="pass2_form" class="form-group has-feedback">
                      <label for="pass2" class="pass2 control-label">Confirm Password</label>
					  <input type="Password" name="pass2" id="pass2" placeholder="Confirm Password" class="form-control">
                      <span id="pass2_feedback" class="form-control-feedback"></span>
                      <span class="pass2_help help-block"></span>
                      </div>
					<br>
					
                    <div class="form-group">
                    	<label for="gender" class="gender control-label">Select Gender</label>
					<select class="form-control" id="gender" name="gender">
					    <option value="">--Choose Gender--</option>
						<option value="Male">Male</option>
						<option value="Femail">Female</option>
					</select>
                    </div>
					<br>
				  </div>
				</div>
					
				<div style="margin-top: 200px;" class="modal-footer">
				        <div style="float: right;" class="col-lg-6">
				        	<button id="button_reg" class="btn btn-primary">Sign In</button>
					        <button id="button_cancel" class="btn btn-danger">Cancel</button>
				        </div>
				        <div style="float: right;" class="col-lg-6">
				        <span id="signInResult" style="color: red; font-weight: bold; text-transform: capitalize;"></span>
									</div>
			</div>
		</div>
	</div>
</div>