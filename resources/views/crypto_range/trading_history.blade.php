@include('crypto_range/header')
<div id="page-wrapper">
  <div class="main-page">
    <div class="row">
      <div class="col-md-12 widget-shadow">
        <ul id="myTabs" class="nav nav-tabs" role="tablist" style="margin-top: 10px;">
          <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Trading History</a></li>
          <!-- <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Profile</a></li> -->
        </ul>
        <div id="myTabContent" class="tab-content scrollbar1">
          <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
            <div class="col-md-12 button_set_one two" style="margin-top:20px;">
             <div class="col-md-12">
                <table class="table" style="margin-top:40px;">
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
            <div class="col-md-12">
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
@include('crypto_range/footer')
