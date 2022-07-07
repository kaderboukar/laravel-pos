@extends('layouts.admin')

@section('content-header', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $orders_count }}</h3>
                        <p>Orders Count</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ number_format($income, 2) }} {{ config('settings.currency_symbol') }}</h3>
                        <p>Income</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ number_format($income_today, 2) }} {{ config('settings.currency_symbol') }}</h3>

                        <p>Income Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $customers_count }}</h3>

                        <p>Customers Count</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('customers.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{ number_format($incomebuying, 2) }} {{ config('settings.currency_symbol') }}</h3>
                        <p>Buying price</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-cart"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-body">
                    <div class="inner">
                        <h3>{{ number_format($buying_today, 2) }} {{ config('settings.currency_symbol') }}</h3>
                        <p>Buying price Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-cart-outline"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-transparent">
                    <div class="inner">
                        <h3>{{ number_format($diver, 2) }} {{ config('settings.currency_symbol') }}</h3>
                        <p>Income</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('divers.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>{{ number_format($diver_today, 2) }} {{ config('settings.currency_symbol') }}</h3>
                        <p>Income</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('divers.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>
                            @if ($income != null)
                                {{ number_format($income - ($incomebuying + $diver), 2) }}
                                {{ config('settings.currency_symbol') }}
                            @else
                                0.00 {{ config('settings.currency_symbol') }}
                            @endif
                        </h3>
                        <p>Profit</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>
                            @if ($income != null)
                                {{ number_format($income_today - ($buying_today + $diver_today), 2) }}
                                {{ config('settings.currency_symbol') }}
                            @else
                                0.00 {{ config('settings.currency_symbol') }}
                            @endif
                        </h3>
                        <p>Profit Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-card"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
@endsection
