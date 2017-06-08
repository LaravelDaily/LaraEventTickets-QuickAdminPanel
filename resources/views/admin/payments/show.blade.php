@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.payments.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.payments.fields.email')</th>
                            <td>{{ $payment->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.payments.fields.merchant')</th>
                            <td>{{ $payment->merchant }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.payments.fields.amount')</th>
                            <td>{{ $payment->amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.payments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop