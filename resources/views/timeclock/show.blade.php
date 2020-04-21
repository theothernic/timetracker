@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">


                <form id="frmPunchClock" name="frmPunchClock" method="post" action="{{ route('clock.punch') }}" >
                    @csrf

                    <h1>Time Clock</h1>

                    <fieldset>
                        <legend>Punch Clock</legend>

                        <div class="current_time">Time now is: <strong>{{ (\Carbon\Carbon::now())->format('F d, Y g:i a') }}</strong></div>


                        <div class="actions">
                            <button id="cmdSubmit" name="cmdSubmit" class="btn btn-primary" type="submit">Punch Clock</button>
                        </div>



                    </fieldset>
                </form>

            </div>
        </div>
    </div>
@endsection
