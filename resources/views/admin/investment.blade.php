@include('admin/header')
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




                  <div class="col-md-3" ></div>
    <div class="col-md-6" style="margin-top:10%">
      <center><h2>Reports</h2></center>
      <form action="/admin/investmentLogs" method="GET">
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



      <div class="col-md-12 widget-shadow">
        <ul id="myTabs" class="nav nav-tabs" role="tablist" style="margin-top: 35px;">
          <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Investment</a></li>

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
            <th>#</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Investment ID</th>
            <th>Plan name</th>          
            <th>Start Date</th>
            <th>End Date</th>
            <th>From Address</th>
            <th>To Address</th>
            <th>Profit Earned</th>
            <th>Status</th>
            <th>Created at</th>
          </tr>
        </thead>
        <tbody>
          @foreach($investments as $w)
        <tr>
          <td>#</td>
          <td>{{$w->name}}</td>
          <td>{{$w->amount_usd}}</td>
          <td>{{$w->investment_id}}</td>
          <td>{{$w->plan_name}}</td>
          <td>{{$w->start_date}}</td>
          <td>{{$w->end_date}}</td>
          <td>{{$w->from_address}}</td>
          <td>{{$w->to_address}}</td>
          <td>{{$w->profit_earned}}</td>
          <td>{{$w->status}}</td>
          <td>{{$w->created_at}}</td>
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
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@include('admin/footer')