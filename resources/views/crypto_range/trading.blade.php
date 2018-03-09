@include('crypto_range/header')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<style>

table caption {
	padding: .5em 0;
}

table.dataTable th,
table.dataTable td {
  white-space: nowrap;
}
</style>
<div id="page-wrapper">
  <div class="main-page">
    <div class="row">
      <div class="col-md-12 widget-shadow">
        <ul id="myTabs" class="nav nav-tabs" role="tablist" style="margin-top: 35px;">
          <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Tradings</a></li>

          <!-- <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Profile</a></li> -->
        </ul>
        <div id="myTabContent" class="tab-content scrollbar1">
          <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
            <div class="col-md-12 button_set_one two" style="margin-top:20px;">
				<div class="col-md-12">

				<div class="row">
    <div class="col-xs-12" style="font-family:italic;font-size:13px">
      <table  class="table  table-responsive" >

        <thead>
          <tr>
            <th>Trading ID</th>
            <th>Plan</th>
            <th>Amount</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Profit Earned</th>
			<th>Balance</th>
			<!-- <th>Withdrawn Amount</th> -->
			<th>Status</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
        	@foreach($investment as $i)
				<tr>
					<td>{{$i->investment_id}}</td>
					<td>{{$i->plan_name}}</td>
					<td>{{$i->amount_usd}}</td>
					<td>{{$i->start_date}}</td>
					<td>{{$i->end_date}}</td>
					<td>{{$i->profit_earned}}</td>
					<td>{{$i->balance_amount}}</td>
					<!-- <td>{{$i->witdraw_amount}}</td> -->
					<td>{{$i->status}}</td>
					<!-- <td><button class="btn-sm btn-success show_bal">Withdraw</button></td> -->
				</tr>
        	@endforeach

        </tbody>

      </table>
    </div>
  </div>

              </div>

            </div>
          </div>
		  <div id="withdraw" class="modal fade" role="dialog" >
		  <div class="modal-dialog modal-sm" style="width:30%">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Withdraw Balance</h4>
				<label id="avail_bal"></label>
			  </div>
			  <div class="modal-body">
			   <label id="amt_usd"></label>
			   <div class="androidTextbox" style="display:block">
				  <input type="number" id="wihtdraw_amt" placeholder="Amount in $">
				  <span style="color:red" id="bal_msg"></span>
				</div>
				<span style="color:red">Note* : Minimum Withdrawable amount $10</span>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="withdraw_balance" disabled>
				Withdraw</button>

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
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
$('table').DataTable({
	'searching': true
});

	$(".show_bal").click(function(){
		var trading_id=$(this).parent().parent().children('.trading_id').html();
		 $.ajax({
             url:"http://localhost/coin_web1/api/register_api.php",
                data: "action=show_inv_bal&trading_id=" + trading_id,
                method: "POST",
                type: "POST",
                dataType: "json"
            }).done(function(data) {
				console.log(data);
                if (data.status == "success") {
				var currdate=new Date(data.response.disp[0].date);
				var end_date=new Date(data.response.disp[0].end_date);

					if(currdate>=end_date){
					$("#amt_usd").html('Eligible Wihdrawable Amount in USD $'+(parseFloat(data.response.disp[0].balance)+parseFloat(data.response.disp[0].principle)));
					}else{
					$("#amt_usd").html('Eligible Wihdrawable Amount in USD $'+(parseFloat(data.response.disp[0].balance)));
					}
					} else {

                }

            }).always(function(data){
						console.log(data);
			});

			$("#wihtdraw_amt").keyup(function(){
				var wihtdraw_amt=$("#wihtdraw_amt").val();
				if(wihtdraw_amt>=10 && wihtdraw_amt!=NaN){
				$.ajax({
				 url:"http://localhost/coin_web1/api/register_api.php",
					data: "action=show_inv_bal&trading_id=" + trading_id,
					method: "POST",
					type: "POST",
					dataType: "json"
				}).done(function(data) {
					console.log(data);
					if (data.status == "success") {
					var currdate=new Date(data.response.disp[0].date);
					var end_date=new Date(data.response.disp[0].end_date);
					if(currdate>=end_date){
					if((parseFloat(data.response.disp[0].balance)+parseFloat(data.response.disp[0].principle))>=10 && parseFloat(wihtdraw_amt)<=(parseFloat(data.response.disp[0].balance)+parseFloat(data.response.disp[0].principle))){
							$("#withdraw_balance").prop('disabled',false);
							$("#bal_msg").html("");
						} else {

							$("#bal_msg").html("You cannot wihdraw more than available balance");
							$("#withdraw_balance").prop('disabled',true);
						}

					}else{
						/*if((parseFloat(data.response.disp[0].balance))>=10){
							$("#withdraw_balance").prop('disabled',false);
						} else {
							$("#bal_msg").html("You cannot wihdraw less than $10");
						}*/

					}

					}

				}).always(function(data){
					console.log(data);
				});
				}else{
						if(wihtdraw_amt==NaN || wihtdraw_amt==""){
						$("#bal_msg").html("");
						}else{
						$("#bal_msg").html("You cannot wihdraw less than $10");
						}
				}
			});
			var settings = {
			  "async": true,
			  "crossDomain": true,
			  "url": "https://blockchain.info/ticker",
			  "method": "GET",
			}
			$.ajax(settings).done(function (response) {
			  console.log(response);
		});

})
});
</script>
@include('crypto_range/footer')
