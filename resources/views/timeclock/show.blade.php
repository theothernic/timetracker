@extends('layouts.app')

@section('scripts-bottom')
    <script type="text/javascript">
        var tick = setInterval(() => {
            var currentTime = new Date();
            var lblCurrentTime = document.getElementsByClassName('lblCurrentTime')[0];
            var txtStampedTime = document.getElementById('txtStampedTime');

            lblCurrentTime.innerHTML = currentTime.toString();
            txtStampedTime.value = currentTime.getTime()/1000|0;
        }, 1000);
    </script>
@endsection

@section('messages')
    @if ($errors->any() || Session::has('success'))
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


                @if(Session::has('success'))
                <div class="alert alert-success">
                    <h3>Success!</h3>

                    <p>
                        {{ Session::get('success') }}
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
                            <div class="displayTime">Time now is: <strong><span class="lblCurrentTime"></span></strong></div>
                            <input type="hidden" id="txtStampedTime" name="stamp" />
                        </div>

                        <div class="card-footer">
                            <button id="cmdSubmit" name="cmdSubmit" class="btn btn-primary" type="submit">Punch Clock</button>
                        </div>

                    </div>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
