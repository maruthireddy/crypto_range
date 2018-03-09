@include('crypto_range/header')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>

<meta name="csrf-token" content="{{ csrf_token() }}">

      <link rel="stylesheet" href="radio/css/style1.css">
	  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<style>
.box{
	padding: 2px;
	margin: 0px;
	//box-shadow: 4px 4px #888888;
}
.r3_counter_box{
	height:135px !important;
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
	<div class="container"><br/>
		<h3 class="title"> PLAN </h3>

					@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


@if($errors->any())
  <div class="alert alert-danger">
				 @foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	 @endforeach
            	   </div>
				@endif
       <div class="inner_sec_info_agileits_w3">
        <div class="col-md-2  widget2">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Invest</strong></h5>
                      <button class="btn-xs btn-success" type="button" data-toggle="modal" data-target="#inv1">Invest</button>
                    </div>
                </div>
        	</div>

				<div class="col-md-2 widget2">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Total Trades</strong></h5>
                        <p style="color:#fff">{{number_format((float)$dashboard_wallet->total_investment, 3, '.', '')}}</p>
                    </div>
                </div>
        	</div>
					<div class="col-md-2  widget2">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Active Trades</strong></h5>
                        <p style="color:#fff">{{number_format((float)$dashboard_wallet->active_investment, 3, '.', '')}}</p>
                    </div>
                </div>
        	</div>
           <div class="col-md-2  widget2">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-money user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Available Balance</strong></h5>
                        <p style="color:#fff">{{number_format((float)$dashboard_wallet->balance, 3, '.', '')}}</p>
                    </div>
                </div>
        	</div>
							</div>
        <div class="col-md-2  widget2">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Total Earned</strong></h5>
                        <p style="color:#fff">{{number_format((float)$dashboard_wallet->total_earning, 3, '.', '')}}</p>
                    </div>
                </div>
        	 </div>
				<div class="col-md-2 widget2">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Withdraw</strong></h5>
                      <button class="btn-xs btn-success" type="button" data-toggle="modal" data-target="#draw">Withdraw</button>
                    </div>
                </div>
        	 </div>


<!--trading table-->
<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
            <div class="col-md-12 button_set_one two" style="margin-top:20px;">
				<div class="col-md-12">

				<div class="row">
				   <div class="col-md-12 widget-shadow">
        <ul id="myTabs" class="nav nav-tabs" role="tablist" style="margin-top: 10px;">

       <li role="presentation" class="active"><a href="#trading_history" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Trading History</a></li>

       <li role="presentation" class=""><a href="#withdraw" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Withdraw Transactions</a></li>
        </ul>
        <div id="myTabContent" class="tab-content scrollbar1">

		  <div role="tabpanel" class="tab-pane fade active in" id="trading_history" aria-labelledby="home-tab">
            <div class="col-md-12 button_set_one two" style="margin-top:20px;">
				<div class="col-md-12">

				<div class="row">
						<div class="col-xs-12" style="font-family:italic;font-size:13px">
						  <table  class="table  table-responsive" >

							<thead>
										<tr>
    								  <th>#</th>
    								  <th>Date</th>
    								  <th>Trade ID</th>
    								  <th>Plan Name</th>
    								  <th>Profit Amount</th>
                      <th>Profit Percentage</th>
    								</tr>
							</thead>
							<tbody>
								 <?php $i=1; ?>
                    @foreach($user_trades as $ut)
                    <tr>
                      <th scope="row"><?php echo $i ?></th>
                      <td>{{$ut->created_at}}</td>
                      <td>{{$ut->invest_id}}</td>
                      @if($ut->plan_id==="PLAN001")
                      <td>RANGE_1</td>
                      @elseif($ut->plan_id==="PLAN002")
                      <td>RANGE_2</td>
                      @elseif($ut->plan_id==="PLAN003")
                      <td>RANGE_3</td>
                      @else
                      <td>RANGE_4</td>
                      @endif
                      <td>{{$ut->profit_amount}}</td>
                      <td>{{$ut->profit_percentage}}</td>
                      <?php $i++; ?>
                    </tr>
                    @endforeach

							</tbody>

						  </table>
						</div>
					  </div>

              </div>

            </div>
          </div>
          <div role="tabpanel" class="tab-pane fade " id="withdraw" aria-labelledby="home-tab">
            <div class="col-md-12 button_set_one two" style="margin-top:20px;">
				<div class="col-md-12">

				<div class="row">
						<div class="col-xs-12" style="font-family:italic;font-size:13px">
						  <table  class="table  table-responsive" >

							<thead>
							  <tr>
								<th>#</th>
								<th>To Address</th>
								<th>Amount</th>
								<th>Start Date</th>
								<th>End Date</th>

								<th>Status</th>
								<!-- <th>Action</th> -->
							  </tr>
							</thead>
							<tbody>
						<?php $i=1; ?>
                    @foreach($withdarws as $ut)
                    <tr>
                      <th scope="row"><?php echo $i ?></th>
                      <td>{{$ut->to_address}}</td>
                      <td>{{$ut->amount}}</td>
                      <td>{{$ut->start}}</td>
                      <td>{{$ut->end}}</td>
                      <td>{{$ut->status}}</td>
                       <?php $i++; ?>
                    </tr>
                    @endforeach

							</tbody>

						  </table>
						</div>
					  </div>

              </div>

            </div>
          </div>

		  <div role="tabpanel" class="tab-pane fade" id="home2" aria-labelledby="home-tab">
            <div class="col-md-12 button_set_one two" style="margin-top:20px;">
				<div class="col-md-12 content-top-2 card">
				<div class="agileinfo-cdr">
					<div class="card-header">
                    </div>

				</div>
				</div>
            </div>
          </div>


          <!-- <div role="tabpanel" class="tab-pane fade in" id="profile" aria-labelledby="profile-tab">
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
          </div> -->
        </div>
      </div>

				  </div>
              </div>

            </div>
          </div>
		<!--trading table ends-->

		<!--trading history table ends-->

		<!--withdraw table ends-->

		<div id="draw" class="modal fade" role="dialog">
						  <div class="modal-dialog modal-sm">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Withdraw Amount</h4>
							  </div>
							  <form action="/crypto_range/wallet_withdraw" method="get">
							{{ csrf_field() }}
							  <div class="modal-body">

								<input type="text" name="amout_usd" placeholder="Enter Amount in $"/>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-success">Withdraw</button>
							  </div>
							</form>

							</div>

						  </div>
						</div>
			    <div class="clearfix"></div>
			</div>


		<div class="promos">



<!---<div class="promo">
  <div class="deal">
    <span>1st Range</span>

  </div>
  <span class="price">$100 - unlimited</span>
  <ul class="features">
    <li>Commission: 0.5%</li>
    <li>Capital lock: 7 days</li>
    <li>Interest: 0% - 3%</li>
  </ul>
  <label style="display:none" class="plan">PLAN001</label>
  <button class="butn" data-toggle="modal" data-target="#inv1" >Invest</button>
</div>
<div class="promo scale">
  <div class="deal">
    <span>3nd Range</span>

  </div>
  <span class="price">$100 - unlimited</span>
  <ul class="features ull">
    <li>Commission: 0.1%</li>
    <li>Capital lock: 90 days</li>
    <li>Interest: 0% - 3%</li>
  </ul>
  <button class="butn" data-toggle="modal" data-target="#inv1">Invest</button>
</div>
<div class="promo">
  <div class="deal">
    <span>2nd Range</span>

  </div>
  <span class="price">$100 - unlimited</span>
  <ul class="features">
    <li>Commission: 0.3%</li>
      <li>Capital lock: 30 days</li>
    <li>Interest: 0% - 3%</li>
  </ul>
  <button class="butn" data-toggle="modal" data-target="#inv1">Invest</button>
</div>--->
</div>
</div>
</div>


			</div>


		</div>
		<div id="inv1" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Plan Investment</h4>
				<label id="avail_bal"><span>Avaliable BTC Balance: </span>{{$available_balance}}</label>
			  </div>
			  <div class="modal-body">
			   <div class="androidTextbox" style="display:none">
				  <input type="text" id="plan_" disabled="">
				</div>

				<div class="androidTextbox">
				  <input type="text" id="amount" placeholder="Amount in $">
				</div>
				<div class="androidTextbox">
				  <input type="text" id="amount_btc" placeholder="Amount in BTC " disabled>
				</div>
				<span style="font-family:italic;color:red;">Note*: Transaction Network Fees 0.0006 BTC</span>
				 <label id="msg"></label>
				<section>
<div>
  <input type="radio" id="pln_1" name="plans" value="PLAN001" checked disabled>
  <label for="pln_1">
    <h2>1st Range</h2>
    <p>Below $ 100</p>
    <p>Capital Lock: 7 Days</p>
    <p>Daily Interest : upto 1.0%</p>

  </label>
</div>
<div>
  <input type="radio" id="pln_2" name="plans" value="PLAN002" disabled>
  <label for="pln_2">
    <h2>2nd Range</h2>
    <p>$ 100 - $ 499</p>
    <p>Capital Lock: 30 Days</p>
    <p>Daily Interest : upto 1.5%</p>
  </label>
</div>
<div>
  <input type="radio" id="pln_3" name="plans" value="PLAN003" disabled>
  <label for="pln_3">
    <h2>3rd Range</h2>
    <p>$ 500 - $ 999</p>
    <p>Capital Lock: 60 Days</p>
    <p>Daily Interest : upto 2.0%</p>
  </label>
</div>
<div>
  <input type="radio" id="pln_4" name="plans" value="PLAN004" disabled>
  <label for="pln_4">
    <h2>4th Range</h2>
    <p>Above $ 1000</p>
    <p>Capital Lock: 90 Days</p>
    <p>Daily Interest : upto 2.5%</p>
  </label>
</div>
</section>

			  </div>
			  <div class="modal-footer">

			  	<form action="/crypto_range/invest" method="post">

							{{ csrf_field() }}
					<input type="text" name="entered_amt" id="entered_amt" hidden>
					<input type="text" name="plan_id" id="plan_id" hidden>
					<input type="text" name="entered_btc" id="entered_btc" hidden>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" id="invest_plan" >Invest</button>

				</form>
			  </div>
			</div>

		  </div>
		</div>
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script>

		$("#amount").keyup(function(){
			$('#amount_btc').val("");

				$("#invest_plan").prop('disabled',true);
				var amt=parseInt($(this).val());
				if(amt>=10 && amt<100){
						$("#pln_1").prop('checked',true);
						$("#pln_2").prop('checked',false);
						$("#pln_3").prop('checked',false);
						$("#pln_4").prop('checked',false);
					}else if(amt>=100 && amt<500){
						$("#pln_1").prop('checked',false);
						$("#pln_2").prop('checked',true);
						$("#pln_3").prop('checked',false);
						$("#pln_4").prop('checked',false);
					}else if(amt>=500 && amt<1000){
						$("#pln_1").prop('checked',false);
						$("#pln_2").prop('checked',false);
						$("#pln_3").prop('checked',true);
						$("#pln_4").prop('checked',false);
					}else if(amt>=1000){
						$("#pln_1").prop('checked',false);
						$("#pln_2").prop('checked',false);
						$("#pln_3").prop('checked',false);
						$("#pln_4").prop('checked',true);
					}else{
						$("#pln_1").prop('checked',false);
						$("#pln_2").prop('checked',false);
						$("#pln_3").prop('checked',false);
						$("#pln_4").prop('checked',false);
					}
					var plan_name='';
					$.each($("[name='plans']"),function(){
						if($(this).prop('checked')==true){
							plan_name=$(this).val();
						}
					 });
					$("#plan_").val(plan_name)
				var settings = {
				  "async": true,
				  "crossDomain": true,
				  "url": "https://blockchain.info/ticker",
				  "method": "GET",
				}
			$.ajax(settings).done(function (response) {
			  //console.log(response);
			  var amount_btc =((1/parseFloat(response.USD.sell)).toFixed(8)*amt).toFixed(8)
			  //console.log(amount_btc);
			  $('#amount_btc').val(amount_btc);
			  if(amt>=10 || amt==''){
			  var  total_btc=(parseFloat(amount_btc)+0.0006).toFixed(8);


			  $.ajax({

		        url:"/crypto_range/estimate_btc_value",
				type: "POST",
				dataType: "json",
				data:"amount="+amount_btc,
				headers: {
        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			}
				}).done(function(data) {
					$("#msg").html("");

					// console.log("data");
					// console.log(data);

                if (data.status == 200) {
                	$("#msg").html(data.message);
					$("#invest_plan").prop('disabled',false);

					$('#entered_amt').val(amt);
					$('#plan_id').val($('#plan_').val());
					$('#entered_btc').val(amount_btc);
					// $('#entered_usd').val(response.USD.sell);

				}else{
					$("#invest_plan").prop('disabled',true);
					$("#msg").html(data.message);
				}
			});
			  }else{
				$("#amount_btc").val('');
				$("#msg").html("Amount cannot be less than 10$");
				$("#invest_plan").prop('disabled',true);
			  }
			});
			});

				//   $.ajax({

		  //       url:"/crypto_range/dashboard_wallet",
				// type: "POST",
				// dataType: "json",
				// headers: {
    //     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    // 			}
				// }).done(function(data) {



				// });


			</script>
@include('crypto_range/footer')
