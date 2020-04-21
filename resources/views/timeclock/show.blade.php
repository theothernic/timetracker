@extends('layouts.app')

@section('scripts-bottom')
    <script type="text/javascript">
        var tick = setInterval(() => {
            var currentTime = new Date();
            var lblCurrentTime = document.getElementsByClassName('lblCurrentTime')[0];
            var txtStampedTime = document.getElementById('txtStampedTime');

            lblCurrentTime.innerHTML = currentTime.toString();
            txtStampedTime.value = currentTime.getTime();
        }, 1000);
    </script>
@endsection

@section('messages')
    @if ($errors->any())
    <div class="container">
        <div class="row">
            <div class="alert-warning">
                <h3>Oh, no...</h3>

                <ul>
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
@endsection


@section('content')

    @yield('messages')


    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">


                <form id="frmPunchClock" name="frmPunchClock" method="post" action="{{ route('timeclock.punch') }}" >
                    @csrf

                    <h1>Time Clock</h1>

                    <fieldset>
                        <h2>Clock In/Out</h2>

                        <div class="current_time">Time now is: <strong><span class="lblCurrentTime"></span></strong></div>
                        <input type="hidden" id="txtStampedTime" name="stamp" />


                        <div class="actions">
                            <button id="cmdSubmit" name="cmdSubmit" class="btn btn-primary" type="submit">Punch Clock</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
@endsection
