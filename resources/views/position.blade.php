@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center; margin: 20px;">เพิ่มตำแหน่งตามอัตรา</h2>
	<div class="container">
		<form class="form-horizontal" method="POST" action="{{ action('PositionController@save') }}" onsubmit="return confirm('ต้องการบันทึกใช่หรือไม่?');">
		 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  	<div class="form-group">
			    <label for="code" class="col-md-4 control-label">รหัสตำแหน่ง</label>
			    <div class="col-md-4">
			      	<input type="text" class="form-control input-form" id="code" name="code" placeholder="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label for="name" class="col-md-4 control-label">ชื่อตำแหน่ง</label>
			    <div class="col-md-4">
			      	<input type="text" class="form-control input-form" id="name" name="name" placeholder="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label for="rank" class="col-md-4 control-label">อัตรา</label>
			    <div class="col-md-4">
			      	<input type="text" class="form-control input-form" id="rank" name="rank" placeholder="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label for="corps" class="col-md-4 control-label">พรรค เหล่า</label>
			    <div class="col-md-4">
			      	<input type="text" class="form-control input-form" id="corps" name="corps" placeholder="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label for="line" class="col-md-4 control-label">สายวิทยาการ</label>
			    <div class="col-md-4">
			      	<input type="text" class="form-control input-form" id="line" name="line" placeholder="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label for="under" class="col-md-4 control-label">สังกัด</label>
			    <div class="col-md-4">
			      	<input type="text" class="form-control input-form" id="under" name="under" placeholder="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label for="isOpen" class="col-md-4 control-label">สถานะบรรจุ</label>
			    <div class="col-md-4">
			      	<div class="radio">
					  	<label>
					    	<input checked="" type="radio" name="isOpen" id="isOpen1" value="1">
					    	เปิดบรรจุ
					  	</label>
					</div>
					<div class="radio">
					  	<label>
					    	<input type="radio" name="isOpen" id="isOpen0" value="0">
					    	ปิดบะะจุ
					  	</label>
					</div>
			    </div>
		  	</div>
		  	{{-- <div class="form-group">
			    <label for="corps" class="col-md-4 control-label">พรรค เหล่า</label>
			    <div class="col-md-4">
			      	<div id="uk-position" class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
			            <!-- <button class="uk-button">เลือกพรรค/เหล่า <i class="uk-icon-caret-down"></i></button> -->
			            <input type="text" class="form-control input-form" id="corps" name="corps" placeholder="เลือก พรรค/เหล่า">
			            <div class="uk-dropdown uk-dropdown-width-4 uk-dropdown-autoflip uk-dropdown-bottom" aria-hidden="true" tabindex="" style="top: 30px; left: 0px;">
			                <div class="uk-grid uk-dropdown-grid">
			                	@foreach ($corps as $corp)
				                    <div class="uk-width-1-4">
				                        <ul class="uk-nav uk-nav-dropdown uk-panel">
				                        	<li class="uk-nav-header">{{ $corp->name }}</li>
				                        	<li class="uk-nav-divider"></li>
				                        	@foreach ($corp->corps as $eachCorp)
				                            	<li><a class="corps-list" href="javascript:void(0);" data-group="{{ $corp->name }}">{{ $eachCorp }}</a></li>
				                            @endforeach
				                        </ul>
				                    </div>
			                    @endforeach
			                </div>
			            </div>
			        </div>
			    </div>
		  	</div> --}}
		  	{{-- <div class="form-group">
			    <label for="line" class="col-md-4 control-label">สายวิทยาการ</label>
			    <div class="col-md-4">
			      	<!-- <input type="text" class="form-control input-form" id="line" name="line" placeholder=""> -->
				    <div id="uk-position-line" class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
		                <button class="uk-button">Click me <i class="uk-icon-caret-down"></i></button>
		                <input type="text" class="form-control input-form" id="line" name="line" placeholder="เลือก สายวิทยาการ">
		                <div class="uk-line uk-dropdown uk-dropdown-bottom" aria-hidden="true" tabindex="" style="top: 30px; left: 0px;">
		                    <ul id="lists-line" class="uk-nav uk-nav-dropdown">

		                    </ul>
		                </div>
		            </div>
			    </div>
		  	</div> --}}


		  	<div class="form-group">
			    <div class="col-md-offset-4 col-md-10">
			      	<button type="submit" class="btn btn-primary btn-form">บันทึก</button>
			      	<button type="submit" class="btn btn-danger btn-form">ยกเลิก</button>
			    </div>

		  	</div>
		</form>
	</div>
@endsection
