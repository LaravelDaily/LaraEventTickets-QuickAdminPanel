@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tickets.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.event')</th>
                            <td>{{ $ticket->event->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.title')</th>
                            <td>{{ $ticket->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.amount')</th>
                            <td>{{ $ticket->amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.available-from')</th>
                            <td>{{ $ticket->available_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.available-to')</th>
                            <td>{{ $ticket->available_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.price')</th>
                            <td>{{ $ticket->price }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tickets.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop