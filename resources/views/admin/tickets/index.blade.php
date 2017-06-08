@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tickets.title')</h3>
    @can('ticket_create')
    <p>
        <a href="{{ route('admin.tickets.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tickets) > 0 ? 'datatable' : '' }} @can('ticket_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('ticket_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('ticket_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('ticket_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.tickets.mass_destroy') }}';
        @endcan

    </script>
@endsection