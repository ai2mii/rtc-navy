{{-- <div class="text-center">
	<h2 style="padding-top: 10px;">โปรแกรมจัดการข้อมูลข้าราชการ ลูกจ้างประจำ และพนักงานราชการ</h2>
</div> --}}
<nav class="navbar navbar-default">
  	<div class="container">
  		<ul class="nav navbar-nav">
	        <li class="logo">
	        	<i class="fa fa-anchor fa-2x" aria-hidden="true"></i>
	        </li>
	        <li class="logo text">
	        	ระบบจัดการกำลังพล</i>
	        </li>
      	</ul>

      	<ul class="nav navbar-nav navbar-right">
        	<li id="nav-search" class=""><a href="{{ action('HomeController@index') }}">ค้นหา<span class="sr-only">(current)</span></a></li>

			{{-- Isert data --}}
		    <li id="nav-add" class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">เพิ่มข้อมูล<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		            <li id="nav-add-person" style="margin-top: 9px;"><a href="{{ action('PersonalController@index') }}">ข้าราชการ / ลูกจ้าง / พนักงาน</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-add-position" ><a href="{{ action('PositionController@index') }}">ตำแหน่งตามอัตรา</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">สถานที่ปฏิบัติราชการ</a></li>
		        </ul>
		    </li>

			{{-- Registration book --}}
		    <li id="nav-house-registration" class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ทะเบียนบ้าน<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		            <li id="nav-house-registration-search" style="margin-top: 9px;"><a href="{{ action('HouseRegistrationController@searchBy') }}">ค้นหาทะเบียนบ้าน</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-house-registration-add"><a href="{{ action('HouseRegistrationController@add') }}">เพิ่ม / แก้ไข / ย้าย ทะเบียนบ้าน</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-house-registration-move"><a href="{{ action('HouseRegistrationController@moveRtc') }}">ย้ายทะเบียนบ้าน</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-house-registration-rtc"><a href="{{ action('HouseRegistrationController@rtc') }}">บ้านพัก ศฝท.</a></li>
		        </ul>
		    </li>

		    {{-- Report --}}
		    <li id="nav-report" class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ออกรายงาน<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		            <li id="nav-report-person" style="margin-top: 9px;"><a href="{{ action('ReportController@person') }}">ข้าราชการ / ลูกจ้าง / พนักงาน (ตามโครงสร้าง)</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-report-person2" style="margin-top: 9px;"><a href="{{ action('ReportController@person2') }}">ข้าราชการ / ลูกจ้าง / พนักงาน (ตามบรรจุ)</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-report-position"><a href="{{ action('ReportController@position') }}">ตำแหน่งตามโครงสร้าง</a></li>
		            <li role="separator" class="divider"></li>
		             <li id="nav-report-location"><a href="{{ action('ReportController@workLocation') }}">สถานที่ปฏิบัติราชการ</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-report-position-special"><a href="{{ action('ReportPositionController@index', 'under=บก.') }}">รายละเอียดบรรจุกำลังพล</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-report-position-summary"><a href="{{ action('ReportPositionController@summary') }}">สรุปยอดบัญชีกำลังพล</a></li>
		            <li role="separator" class="divider"></li>
		            <li id="nav-report-register-status"><a href="{{ action('ReportController@registerStatus') }}">สถานะการบรรจุ</a></li>
		        </ul>
		    </li>

		    {{-- Import --}}
		    <li id="nav-import" class="dropdown">
		        <a href="{{ action('ImportController@index') }}" >Import file</a>
		        
		    </li>
      </ul>

  </div>
</nav>