@extends('layouts.master')
@section('content')

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="col-sm-6">
        <h1>Buy Package to join us now!</h1>
      </div>
    </section>

    <body class="hold-transition login-page">
      <div class="login-box">

        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Buy</b>Package</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Buy package to enjoy your challenge</p>
            <form action="../../index3.html" method="post">
              <div class="input-group mb-3">
                <select class="form-control" aria-label=".form-select-md example">
                  <option hidden>Choose Training Package you want to buy</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>

              </div>
              <div class="input-group mb-3">
                <select class="form-control" aria-label=".form-select-md example">
                  <option hidden>Choose user you want to buy package for</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>

              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">

                    <select class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                      <option hidden>Choose Gym</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Agree on terms
                    </label>
                  </div>
                </div>

                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                </div>

              </div>
            </form>



          </div>

        </div>

      </div>




      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
  $(function() {


    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('buy-package.index') }}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'city',
          name: 'name'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },


      ]

    });
  });
</script>

@endsection