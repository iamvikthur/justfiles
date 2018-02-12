<div class="modal-popup modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<div class="modal-title">
					<p id="h">Upload Files to Justfiles</p>
				</div>
			</div>
			<div class="modal-body" id="tbl">
				<form method="get" action="#" id="1" class="form-group fom" enctype="multipart/form-data">
			      <table class="table" id="row1">
					<tr>
						<td>
							<input type="file" class="form-control" name="file" id="file">
							<br>
							<div class="progress">
								<div id="progress1" style="width: 0%;" class="progress-bar progress-bar-striped active"></div>
							</div>
							<button class="btn btn-info btn-sm" type="submit" id="upload">Upload</button>
							<button class="btn btn-danger btn-sm" type="button" id="cancel">Cancel</button>
						</td>
						<td>
							<button id="add_fields" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
						</td>
					</tr>
			</table>
				</form>
		</div>
	</div>
</div>