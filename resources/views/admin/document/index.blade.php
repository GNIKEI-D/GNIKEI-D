@extends('admin.layout.base')

@section('title', 'დოკუმენტები ')

@section('content')


        <div class="container-fluid">
            
            <div class="card">
                <div class="card-header card-header-primary">
             @if(Setting::get('demo_mode', 0) == 1)
                <div class="col-md-12" style="height:50px;color:red;">
                    ** Demo Mode : @lang('admin.demomode')
                </div>
             @endif
                <h5 class="card-title">@lang('admin.document.document')</h5>
                @can('documents-create')
                <a href="{{ route('admin.document.create') }}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> @lang('admin.document.add_Document')</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.document.document_name')</th>
                            <th>@lang('admin.type')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $index => $document)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$document->name}}</td>
                            <td>{{$document->type == "ავტომობილი" ? "VEÍCULO" : "მძღოლი"}}</td>
                            <td>
                                <form action="{{ route('admin.document.destroy', $document->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="წაშლა">
                                    @if( Setting::get('demo_mode', 0) == 0)
                                    @can('documents-edit')
                                    <a href="{{ route('admin.document.edit', $document->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> @lang('admin.edit')</a>
                                    @endcan
                                    @can('documents-delete')
                                    <button class="btn btn-danger" onclick="return confirm('დარწმუნებული ხარ?')"><i class="fa fa-trash"></i> @lang('admin.delete')</button>
                                    @endcan
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.document.document_name')</th>
                            <th>@lang('admin.type')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>

@endsection