<div class="modal fade bs-position-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content row">
    		<div class="row">
	    		<div class="header-search">
	    			<h2>ค้นหาตำแหน่ง</h2>
	    		</div>
	    		<div class="col-md-8 body-search">
		    		<div class="form-group">
						<label for="positionCode" class="col-md-4 control-label">รหัสตำแหน่ง</label>
						<div class="col-md-4">
							<input type="text" class="form-control search-text" id="positionCode" name="positionCode" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="positionName" class="col-md-4 control-label">ชื่อตำแหน่ง</label>
						<div class="col-md-4">
							<input type="text" class="form-control search-text" id="positionName" name="positionName" placeholder="">
						</div>
					</div>
	    		</div>
	    		<div class="col-md-4">
	    			<button type="button" class="btn btn-primary btn-form" id="btn-search-position">ค้นหา</button>
	    		</div>

    		</div>
    		<div class="header-search-position">ผลการค้นหา</div>
    		<div class="row header-search-position">
    			<div class="col-md-3">รหัสตำแหน่ง</div>
    			<div class="col-md-3">ชื่อตำแหน่ง</div>
    			<div class="col-md-2">ยศ</div>
    			<div class="col-md-2">พรรค/เหล่า</div>
    			<div class="col-md-2">สายวิทยาการ</div>
    		</div>
    		<div class="row result-position">
    			<div class="col-md-2" id="colCode"></a></div>
    			<div class="col-md-4" id="colName"></div>
    			<div class="col-md-2" id="colRank"></div>
    			<div class="col-md-2" id="colCorps"></div>
    			<div class="col-md-2" id="colLine"></div>
    		</div>
    	</div>
  	</div>
</div>