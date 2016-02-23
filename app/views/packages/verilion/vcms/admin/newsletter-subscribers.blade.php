@extends('vcms::base')

@section('top-white')
    <h1>Newsletter Subscribers</h1>
@stop

@section('content-title')

@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Newsletter Subscribers</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="pull-right">
                    <button class="btn btn-primary" href="#!" onclick="addSubscriber()">Add Subscriber</button>
                </div>
                <div class="clearfix"></div>
                <table id="itable" class="table table-compact table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Subscriber</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($subscribers as $item)
                        <tr>
                            <td><a href="#!" onclick="deleteItem({{ $item->id }}, '{{ $item->email }}')"><i
                                            class="fa fa-trash"></i></a> {{ $item->email }}</td>
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
        $(document).ready(function () {
            $('#itable').dataTable({
                responsive: true,
                savestate: true
            });
        });


        function deleteItem(x, y)
        {
            bootbox.confirm("Are you sure you want to remove " + y + " from the mailing list?", function(result) {
                if (result==true)
                {
                    location.href='/admin/newsletter/delete-subscriber?id=' + x;
                }
            });
        }

        function addSubscriber(){
            bootbox.prompt("Enter one email address:", function(result) {
                if (result != null) {
                    location.href="/admin/newsletter/add-subscriber?email=" + result;
                }
            });
        }
    </script>
@stop