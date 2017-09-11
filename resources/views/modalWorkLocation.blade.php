<div class="modal fade bs-work-location-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content row" style="height: 170px;">
    		<div class="row">
	    		<div class="header-search col-md-12">
	    			<h2>เลือกสถานที่ปฏิบัติราชการ</h2>
	    		</div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="searchWorkPosition" class="col-md-4 control-label">ตำแหน่ง</label>
                        <div class="col-md-4">
                            <select id="searchWorkPosition" name="searchWorkPosition" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
                                <option  {{ $person && $person->workPositionCode == '' ? 'selected' : '' }} >-</option>
                                @foreach($staticLists->staticWorkPosition as $value)
                                    <option data-code="{{ $value->code }}" {{ $person && $person->workPositionCode == $value->code ? 'selected' : '' }} >{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="searchWorkLocation" class="col-md-4 control-label">สถานที่</label>
                        <div class="col-md-4">
                            <select id="searchWorkLocation" name="searchWorkLocation" data-attr="tetstttttt" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
                                 <option {{ $person && $person->workLocationCode == '' ? 'selected' : '' }} >-</option>
                                @foreach($staticLists->staticWorkLocation as $value)
                                    <option data-code="{{ $value->code }}" {{ $person && $person->workLocationCode == $value->code ? 'selected' : '' }} >{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

	    		<div class="col-md-2">
	    			<button type="button" class="btn btn-primary btn-form" id="btn-search-work-location">ตกลง</button>
	    		</div>
    		</div>
    	</div>
  	</div>
</div>