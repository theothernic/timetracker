@extends('layouts.app')

@section('timesheet.pages')
    @if (isset($records))
        <div class="page-select"><span>Go to page:</span> {{ $records->links() }}</div>
    @endif
@endsection

@section('timesheet.table')
    <table class="table table-striped table-bordered">
        <tbody>
            @if (isset($records) && !$records->isEmpty())

            @foreach($records as $record)
            <tr class="{{ ($loop->odd) ? 'table-primary' : 'table-secondary' }}">
                <td>{{ $record->user->name }}</td>
                <td>{{ ucwords($record->direction) }}
                    <span class="fa
                        {{ ($loop->odd) ? 'text-primary' : 'text-secondary' }}
                        {{ ($record->direction == 'out') ? 'fa-arrow-circle-right' : 'fa-arrow-circle-left' }}"></span>
                </td>
                <td>{{ $record->stamp->tz('America/New_York')->format('D M d Y H:i:s O') }}</td>

            </tr>
            @endforeach

            @else
            <tr>
                <td colspan="3">No timeclock entries are available to view.</td>
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

                @yield('timesheet.pages')
                @yield('timesheet.table')
                @yield('timesheet.pages')


            </div>
        </div>
    </div>
@endsection
