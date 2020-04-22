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

                    <div class="punch-status">
                        <strong>Punch status:</strong>
                        <span class="badge badge-{{ ($record->direction == 'in') ? 'success' : 'warning' }}">{{ ucwords($record->direction) }}</span>
                        at <span class="stamp">{{ $record->stamp->tz('America/New_York')->format('D M d Y H:i:s O')  }}</span>

                        <div class="actions">
                            <a class="btn btn-sm btn-primary" href="{{ route('timeclock.show') }}"><span class="fa fa-clock"></span> Punch Clock</a>
                            <a class="btn btn-sm btn-light" href="{{ route('reporting.timesheet') }}"><span class="fa fa-table"></span> View Timesheet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
