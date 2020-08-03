@extends('layouts.app')


@section('title', 'A2Loader')

@section('otherStyles')
    <style>
        .row {
            margin: 0px;
        }

        .table-my {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }
        .table-my > thead > tr > th {
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 8px;
            padding-right: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }
        .table-my > tbody > tr > th,
        .table-my > tfoot > tr > th,
        .table-my > thead > tr > td,
        .table-my > tbody > tr > td,
        .table-my > tfoot > tr > td {
            padding-top: 2px;
            padding-bottom: 2px;
            padding-left: 8px;
            padding-right: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }
    </style>
@endsection

@section('scripts')
    <script>
        App.Controllers.A2Loader = function() {
            return {
                'timer': null,

                'selectTab': function() {
                    if(window.location.hash !== ''){
                        let activeTab = window.location.hash;
                        $('.nav-tabs a[href="' + activeTab + '"]').trigger('click');
                    }
                },

                'int': function() {
                    App.Controllers.A2Loader().selectTab();
                },
            };
        };

        $(document).ready(function() {
            App.Controllers.A2Loader().int();
        });
    </script>

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">A2Loader</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Rate analyzer & loader</h4>
                </div>
                    <div class="panel-heading">
                    <form method="POST" enctype="multipart/form-data" action="/a2loader/viewrates">
                        <div class="form-group col-lg-12">
                            <h5>Available updates:</h5>
                        </div>
                        <div class="form-group col-lg-12">
                            {!! Form::select('tariffid', $tariffplanlist, $tariffid) !!}
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-success">SHOW <i class="fa fa-paper-plane fa-fw"></i></button>
                        </div>
                    </form>
                        &nbsp;
                    </div>
                <div class="panel-heading">
                    <h4>Rates:</h4>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
{{--                                <table width="100%" class="dataTable" id="dataTables-example">--}}
                                <table width="100%" class="table-my table-bordered" id="dataTables-example">
                                    <thead>
                                    <tr bgcolor="#f0ad4d">
                                        <th>Country</th>
                                        <th>Zone</th>
                                        <th>Prefix</th>
                                        <th>Buy Rate old</th>
                                        <th>Buy Rate</th>
                                        <th>Sell Rate</th>
                                        <th>Sell suggestion</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rates as $rate)
                                        @if($rate->new)
                                            <tr class="small" bgcolor="#ffc4bd">
                                        @elseif($rate->buyrate > $rate->rateinitial)
                                            <tr class="small" padding-top='2px' padding-bottom='2px' bgcolor="#73d0f9">
                                        @else
                                            <tr class="small">
                                        @endif
                                            <td>{{$rate->country}}</td>
                                            <td>{{$rate->area}}</td>
                                            <td>{{$rate->destination}}</td>
                                            @if($rate->old_buyrate == -1)
                                                <td></td>
                                            @else
                                                <td>{{$rate->old_buyrate}}</td>
                                            @endif
                                            @if($rate->buyrate == -1)
                                                <td></td>
                                            @else
                                                <td>{{$rate->buyrate}}</td>
                                            @endif
                                            @if($rate->rateinitial == -1)
                                                <td></td>
                                            @else
                                                <td>{{$rate->rateinitial}}</td>
                                            @endif
                                            @if($rate->nrst_rateinitial == -1)
                                                <td></td>
                                            @else
                                                <td>{{$rate->nrst_rateinitial}}</td>
                                            @endif
                                            <td></td>
                                            <td>
                                                <a href="{{App::make('url')->to('/a2loader/viewrate/'.$rate->id)}}" class="btn btn-success btn-xs">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                                <a href="" class="btn btn-info">Accsept</a>
{{--                                <a href="{{App::make('url')->to('/rates/accept')}}" class="btn btn-info">Accsept</a>--}}
                            </div>
                            <!-- /.panel-body -->
                    </div>
                </div>


                <!-- /.panel-heading -->
{{--                <div class="panel-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <ul class="nav nav-tabs standard">--}}
{{--                                <li class="active"> <a data-toggle="tab" href="#AllRates">All Rates</a></li>--}}
{{--                                <li>                <a data-toggle="tab" href="#NewRates">New Rates</a></li>--}}
{{--                                <li>                <a data-toggle="tab" href="#ZeroRates">Zero Rates</a></li>--}}
{{--                                <li>                <a data-toggle="tab" href="#NegativeRates">Negative Rates</a></li>--}}
{{--                            </ul>--}}

{{--                            <div class="tab-content">--}}
{{--                                <div id="AllRates" class="tab-pane fade in active">--}}
{{--                                    <h5>All rates from last update</h5>--}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                    --}}
{{--                                </div>--}}
{{--                                <div id="NewRates" class="tab-pane fade">--}}
{{--                                    <h5>New rates from last update</h5>--}}
{{--                                </div>--}}
{{--                                <div id="ZeroRates" class="tab-pane fade">--}}
{{--                                    <h5>Zero rates from last update</h5>--}}
{{--                                </div>--}}
{{--                                <div id="NegativeRates" class="tab-pane fade">--}}
{{--                                    <h5>Negative rates from last update</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="panel-footer">--}}

{{--                </div>--}}
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@endsection

