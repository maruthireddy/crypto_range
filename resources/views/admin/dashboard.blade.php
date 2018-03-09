@include('/admin/header')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>

<meta name="csrf-token" content="{{ csrf_token() }}">

      <link rel="stylesheet" href="../crypto_range/radio/css/style1.css">
	  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<style>
.box{
	padding: 2px;
	margin: 0px;
	//box-shadow: 4px 4px #888888;
}
.r3_counter_box{
	height:200px !important;
}
</style>
<style>
input{
  border: 0;
  width: calc(100% - 10px);
  margin-left: 5px;
}

input:focus{
  outline: 0;
}

.androidTextbox{
  width: auto;
  height: 50px;
  position: relative;
}

.androidTextbox:after{
  content: "";
	display: inline-block;
  position: relative;
	border:1px solid #28a6d0;
  border-top: none;
	width: 100%;
	height: 3px;
  top: -12px;
}

</style>
<style>

table caption {
	padding: .5em 0;
}

table.dataTable th,
table.dataTable td {
  white-space: nowrap;
}
</style>
		<!-- main content start-->
	<div id="page-wrapper">
	<div class="main-page">
	<div id="team" class="team-content all_pad w3agile">
	<div class="container">
      <div class="col-md-3" ></div>
    <div class="col-md-6" style="margin-top:10%">
      <center><h2>Reports</h2></center>
      <form action="/admin/dashboard" method="GET">
            {{ csrf_field() }}
	 <div class="form-group">
            <input type="date" name="from_date"  class="form-control">
          </div>
      <div class="form-group">
            <input type="date" name="to_date"  class="form-control">
          </div>

	         <div class="form-group ">
              <input type="submit" value="Submit" class="btn btn-success">
          </div>
      </center>
  </form>
        </div>
        <div class="col-md-12" style="margin-top:10%">
       <div class="inner_sec_info_agileits_w3">
				<div class="col-md-3 plan_grid">
					<div class="plan_grid_info_w3ls">
						<div class="price_tittle">
						</div>
						<div class="price-bg">
							<p class="price-label-1"><span></span> <label>Total Users<label></label>{{$user_count}}</label></p>
								</div>
						 </div>
					</div>
					<div class="col-md-3 plan_grid">
						 <div class="plan_grid_info_w3ls">
							 <div class="price_tittle">
							</div>
							 <div class="price-bg">
									<p class="price-label-1"><span></span> <label>Total Intereset Paid<label></label>{{$investment_count}}</label></p>
								</div>
						 </div>
					</div>
					<div class="col-md-3 plan_grid">
						 <div class="plan_grid_info_w3ls">
							 <div class="price_tittle">
							</div>
							 <div class="price-bg">
									<p class="price-label-1"><span></span> <label>Total Withdraw<label></label>{{$withdraw_count}}
									</label></p>
								</div>
						 </div>
					</div>

							<div class="col-md-3 plan_grid">
						 <div class="plan_grid_info_w3ls">
							 <div class="price_tittle">
							</div>
							 <div class="price-bg">
									<p class="price-label-1"><span></span> <label>Total Investment<label></label>{{$daily_profit}}</label></p>
								</div>
						 </div>
					</div>
					</div>
			    <div class="clearfix"></div>
        </div>
			</div>
         </div>
      </div>
   </div>
@include('admin/footer')