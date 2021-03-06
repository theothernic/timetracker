@extends('layouts.app')


@section('messages')
    @if ($errors->any() || session('success'))
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @if ($errors->any())
                <div class="alert alert-warning">
                    <h3>Oh, no...</h3>

                    <ul>
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                @if(session('success'))
                <div class="alert alert-success">
                    <h3>Success!</h3>

                    <p>
                        {{ session('success') }}
                    </p>
                </div>
                @endif
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    @endif
@endsection


@section('content')

    @yield('messages')


    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">


                <form id="frmPunchClock" name="frmPunchClock" method="post" action="{{ route('timeclock.punch') }}" >
                    @csrf

                    <h1>Time Clock</h1>

                    <div class="card">
                        <div class="card-header">
                            Clock In/Out
                        </div>

                        <div class="card-body">
                            <div class="displayTime">Time now is: <strong><span class="lblCurrentTime">(one moment, please...)</span></strong></div>
                            <input type="hidden" id="txtStampedTime" name="stamp" />

                            <script type="text/javascript">
                                var tick = setInterval(() => {
                                    var currentTime = new Date();
                                    var lblCurrentTime  = document.getElementsByClassName('lblCurrentTime')[0];
                                    var txtStampedTime  = document.getElementById('txtStampedTime');
                                    var cmdSubmit       = document.getElementById('cmdSubmit');

                                    lblCurrentTime.innerHTML = currentTime.toString();
                                    txtStampedTime.value = currentTime.getTime()/1000|0;


                                    // 20200422, nbarr: enable the punch clock button now that the stamp has
                                    //   been properly initiated.
                                    if (typeof(cmdSubmit) !== "undefined" && cmdSubmit.disabled)
                                    {
                                        cmdSubmit.disabled = false;
                                    }


                                }, 1000);
                            </script>
                        </div>

                        <div class="card-footer">
                            <button id="cmdSubmit" name="cmdSubmit" disabled class="btn btn-primary" type="submit">
                                <span class="fa fa-clock"></span> Punch Clock</button>

                            <a id="cmdClose" title="Close clock and return to dashboard" href="{{ route('home') }}"
                               class="btn btn-outline-dark"><span class="fa fa-times"></span> Close</a>
                        </div>

                    </div>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
