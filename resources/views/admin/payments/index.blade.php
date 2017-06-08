@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.payments.title')</h3>
    @can('payment_create')
    <p>
        <a href="{{ route('admin.payments.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($payments) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('quickadmin.payments.fields.email')</th>
                        <th>@lang('quickadmin.payments.fields.merchant')</th>
                        <th>@lang('quickadmin.payments.fields.amount')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($payments) > 0)
                        @foreach ($payments as $payment)
                            <tr data-entry-id="{{ $payment->id }}">
                                
                                <td>{{ $payment->email }}</td>
                                <td>{{ $payment->merchant }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>
                                    @can('payment_view')
                                    <a href="{{ route('admin.payments.show',[$payment->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection