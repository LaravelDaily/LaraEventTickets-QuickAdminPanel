@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.events.fields.title')</th>
                            <td>{{ $event->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.description')</th>
                            <td>{!! $event->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.start-time')</th>
                            <td>{{ $event->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.venue')</th>
                            <td>{!! $event->venue !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#tickets" aria-controls="tickets" role="tab" data-toggle="tab">Tickets</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="tickets">
<table class="table table-bordered table-striped {{ count($tickets) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.tickets.fields.event')</th>
                        <th>@lang('quickadmin.tickets.fields.title')</th>
                        <th>@lang('quickadmin.tickets.fields.amount')</th>
                        <th>@lang('quickadmin.tickets.fields.available-from')</th>
                        <th>@lang('quickadmin.tickets.fields.available-to')</th>
                        <th>@lang('quickadmin.tickets.fields.price')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($tickets) > 0)
            @foreach ($tickets as $ticket)
                <tr data-entry-id="{{ $ticket->id }}">
                    <td>{{ $ticket->event->title or '' }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->amount }}</td>
                                <td>{{ $ticket->available_from }}</td>
                                <td>{{ $ticket->available_to }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>
                                    @can('ticket_view')
                                    <a href="{{ route('admin.tickets.show',[$ticket->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('ticket_edit')
                                    <a href="{{ route('admin.tickets.edit',[$ticket->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('ticket_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tickets.destroy', $ticket->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.events.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop