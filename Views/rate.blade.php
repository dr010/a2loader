@extends('layouts.app')

@section('title', 'A2Loader - Rate')

@section('otherStyles')
    <style>
        .row {
            margin: 0px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rate parameters</h1>
            @if(isset($msg))
                <div class="alert alert-danger">{{$msg}}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
{{--                <div class="panel-heading">--}}
{{--                    Rate parameters--}}
{{--                </div>--}}
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
{{--                                <div class="col-lg-1 text-justify">--}}
{{--                                    Prefix:--}}
{{--                                </div>--}}
                                <div class="col-lg-12 text-primary">
                                    <h3>{{$rate[0]->destination}}</h3>
                                </div>
                                <div class="col-lg-1">
                                    Country:
                                </div>
                                <div class="col-lg-11">
                                    {{$rate[0]->country}}
                                </div>
                                <div class="col-lg-1">
                                    Zone:
                                </div>
                                <div class="col-lg-11">
                                    {{$rate[0]->area}}
                                </div>
                                <div class="col-lg-1">
                                    <br>Buyrate:
                                </div>
                                <div class="col-lg-12 text-danger">
                                    <h3>{{$rate[0]->buyrate}}</h3>
                                </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            @if (!$rate[0]->new)
                                <br>
                                This Rate present in <b>a2billing</b> base.<br>
                                Sellrate:
                                <h3 class="text-danger">{{$rate[0]->rateinitial}}</h3>
                                <br><br>
                            @elseif ($rate[0]->nrst_rateinitial != -1)
                                <br>
                                This Rate not found in <b>a2billing</b> base. <br>Nearest Rate found:
                                <h3 class="text-primary">{{$rate[0]->nrst_dialprefix}} </h3>
                                Sellrate:
                                <h3 class="text-danger">{{$rate[0]->nrst_rateinitial}}</h3>
                                <br>
                                <br>
                            @else
                                <br>
                                This Rate not found in <b>a2billing</b> base. <br>Nearest Rate not found.
                                <h3 class="text-danger">Enter sellrate for this Rate!</h3>
                                <br>
                                <br>
                            @endif

                        </div>
                    </div>

                    <div class="form-group  col-lg-12">

                        <form method="post" enctype="multipart/form-data" action="/a2loader/updaterate">

                            <div class="form-group  col-lg-4">
                                <label>Sell Rate</label>
                                <input type="text" name="initrate" class="form-control" value={{$rate[0]->rateinitial}}>
                                <p class="help-block">Enter new sellrate for this Rate.</p>
                            </div>
                            <div class="form-group  col-lg-8">
                                <input type="hidden" name="rateid" value={{$rate[0]->id}}>
                                &nbsp;
                            </div>

                            <div class="form-group  col-lg-12">
                                <button type="submit" class="btn btn-success">Save</button>
{{--                                    <button class="btn btn-default">Cancel</button>--}}
                            </div>
                        </form>
                    </div>
                    <div class="form-group  col-lg-12">
                        <form method="POST" enctype="multipart/form-data" action="/a2loader/viewrates">
                            <input type="hidden" name="tariffid" value={{$rate[0]->idtariffplan}}>
                            <button type="submit" class="btn btn-default"><< Back to list</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
