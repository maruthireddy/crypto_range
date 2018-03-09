@include('/admin/header')
<div id="page-wrapper">
  <div class="main-page">
    <div class="row">

      <div class="container">

          <div  style="margin-top:10%" class="col-md-3"></div>
        <div style="margin-top:10%" class="col-md-6">
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
        <form action="/admin/transctions" method="GET">
            {{ csrf_field() }}
          <center><h2>Update Profit</h2></center>
          <div class="form-group">
            <select class="form-control" name="plans" required="Select Plan">
              <option value=''>Select Plan </option>
              <option value="PLAN001">Range 1 - PLAN001</option>
              <option value="PLAN002">Range 2 - PLAN002</option>
              <option value="PLAN003">Range 3 - PLAN003</option>
              <option value="PLAN004">Range 4 - PLAN004</option>
            </select>
          </div>

          <div class="form-group">
            <input type="text" name="percentage" id="percentage" placeholder="Daliy Profit Percentage" required="" class="form-control">
          <div></br>
            </br>
          <div class="form-group">
              <input type="submit" value="Update Profit" class="btn btn-success pull-right">
          </div>
        </form>
      </div>
    </div>
  </div>
    <div  style="margin-top:10%" class="col-md-3"></div>
</div>
</div>



<div class="col-md-12 table-responsive">
  <table class="table" style="margin-top:40px;">
    <thead>
      <tr>
        <th>#</th>
        <th>Plan ID </th>
        <th>Profit Percentage</th>
        <th>Description</th>
        <th>Date</th>
        <th>Admin</th>
      </tr>
    </thead>
    <tbody>
      @foreach($admin_trades as $at)
      
      <tr>
        <td>#</td>
        <td>{{$at->plan_id}}</td>
        <td>{{$at->profit_percentage}}</td>
        <td>{{$at->description}}</td>
        <td>{{$at->created_at}}</td>
        <td>{{$at->admin_name}}</td>
      </tr>

     @endforeach
    </tbody>
  </table>
</div>

</div>
</div>
</div>
</div>
@include('/admin/footer')
