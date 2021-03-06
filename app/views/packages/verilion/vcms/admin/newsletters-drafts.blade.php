@extends('vcms::base')

@section('top-white')
    <h1>Draft Newsletters</h1>
@stop

@section('content-title')

@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Draft Newsletters</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="clearfix"></div>
                <table id="itable" class="table table-compact table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Newsletter</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($newsletters as $item)
                        <tr>
                            <td><a href="/admin/newsletter/create?id={{ $item->id}}&src=all">{{ $item->article_title }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('bottom-js')
    <script>
        $(document).ready(function() {
            $('#itable').dataTable({
                responsive: true,
                savestate: true
            });
        });
    </script>
@stop