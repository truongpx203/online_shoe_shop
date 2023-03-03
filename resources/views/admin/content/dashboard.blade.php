
@extends('admin.app')

@section('title', 'product')

@section('header')
    @include('admin.content_head', [
        'pageTitle' => 'Dashboard',
    ])
@endsection


@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $invoice }}</h3>
        <p>New Orders</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{ route('invoices.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $users }}</h3>

        <p>Users Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $products }}</h3>
        <p>ALL Products</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ route('product.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $category }}</h3>

        <p>Category Product</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<div class="card ">
    <div class="card-header">
        <h3 class="card-title">Revenue</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
        <div class="card-body" >
            <div style="height: 400px;">
                <canvas id="ChartDashboard" ></canvas>
            </div>
        </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">


    $(document).ready(function () {
        const CHART_COLORS = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };

        const ctx = document.getElementById('ChartDashboard');
        var invoiceTotal = {!! json_encode($invoiceTotal) !!};
        var invoiceCreatedAt = {!! json_encode($invoiceCreatedAt) !!};
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: invoiceCreatedAt,
                datasets: [{
                    label: 'Total Revenue',
                    data: invoiceTotal,
                    borderColor: CHART_COLORS['red'],
                    backgroundColor:CHART_COLORS['red'],
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>
@endsection
