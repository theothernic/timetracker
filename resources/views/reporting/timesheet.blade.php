@extends('layouts.app')


@section('timesheet.table')
    <table class="table table-striped table-bordered">
        <tbody>
            @if (isset($user) && !is_null($user->timeclocks))

            @foreach($user->timeclocks as $tc)
            <tr class="{{ ($loop->odd) ? 'table-primary' : 'table-secondary' }}">
                <td>{{ $user->name }}</td>
                <td>{{ ucwords($tc->direction) }}
                    <span class="fa
                        {{ ($loop->odd) ? 'text-primary' : 'text-secondary' }}
                        {{ ($tc->direction == 'out') ? 'fa-arrow-circle-right' : 'fa-arrow-circle-left' }}"></span>
                </td>
                <td>{{ $tc->stamp->tz('America/New_York')->format('D M d Y H:i:s O') }}</td>

            </tr>
            @endforeach

            @else
            <tr>
                <td>No timeclock entries are available to view.</td>
            </tr>
            @endif
        </tbody>

        <thead>
            <tr>
                <th>User</th>
                <th>Direction</th>
                <th>Time</th>
            </tr>
    </table>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Timesheet Report</h1>


                @yield('timesheet.table')
            </div>
        </div>
    </div>
@endsection
