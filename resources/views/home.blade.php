@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello, {{ explode(' ', Auth::user()->name)[0] }}. You are logged in!

                    <div class="punch-status bg-primary text-light">
                        <h4>Current Punch Status</h4>


                        Currently punched <span class="badge badge-{{ ($record->direction == 'in') ? 'success' : 'dark' }}">{{ ucwords($record->direction) }}</span>
                        at <span class="stamp">{{ $record->stamp->tz('America/New_York')->format('D M d Y H:i:s O')  }}</span>

                        <div class="actions">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('timeclock.show') }}"><span class="fa fa-clock"></span> Punch Clock</a>
                            <a class="btn btn-sm btn-light text-secondary" href="{{ route('reporting.timesheet') }}"><span class="fa fa-table"></span> View Timesheet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
