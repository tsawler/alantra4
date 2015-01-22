@extends('vcms::base')

@section('top-white')
    <h1>Event Calendar</h1>
@stop

@section('content')
    <div id="calendar"></div>
    @if ((Auth::user()) && (Auth::user()->hasRole('events')))
        <!-- Add/Edit Event Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Event</h4>
                    </div>
                    <div class="modal-body">
                        {{ Form::open(array(
                                            'url' => '/events/save_event',
                                            'role' => 'form',
                                            'name' => 'event_form',
                                            'id' => 'event_form',
                                            'method' => 'post'
                                            ))
                                        }}
                        <!-- Event_title form input -->
                        <div class="form-group">
                            {{ Form::label('event_title','Event title:') }}
                            {{ Form::text('event_title', null, ['id' => 'event_title', 'class' => 'form-control required']) }}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Start_date form input -->
                                <div class="form-group">
                                    {{ Form::label('start_date','Start date:') }}
                                    {{ Form::text('start_date', null, ['class' => 'form-control datepick required', 'id' => 'start_date', ]) }}
                                </div>
                            </div>

                            <div class="col-md-6"><!-- End_date form input -->
                                <div class="form-group">
                                    {{ Form::label('end_date','End date:') }}
                                    {{ Form::text('end_date', null, ['class' => 'form-control datepick required', 'id' => 'end_date', ]) }}
                                </div>
                            </div>
                        </div>
                        <!-- All_day form input -->
                        <div class="form-group">
                            {{ Form::label('all_day','All day event:') }}
                            {{ Form::select('all_day', ['0' => 'No', '1' => 'Yes'], ['class' => 'form-control', 'id' => 'all_day']) }}
                        </div>

                        <div class="row" id="timediv">
                            <div class="col-md-6">
                                <!-- Start_time form input -->
                                <div class="form-group">
                                    {{ Form::label('start_time','Start time:') }}
                                    {{ Form::text('start_time', null, ['class' => 'form-control', 'id' => 'start_time']) }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- End_time form input -->
                                <div class="form-group">
                                    {{ Form::label('end_time','End time:') }}
                                    {{ Form::text('end_time', null, ['class' => 'form-control', 'id' => 'end_time']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('event_text','Event description:') }}
                            {{ Form::textarea('event_text', null, ['class' => 'form-control required', 'id' => 'event_text'])}}
                        </div>

                        {{ Form::hidden('event_id', null, ['id' => 'event_id'])}}
                        {{ Form::close() }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" id='delbtn' class="btn btn-danger pull-left" onclick="deleteEvent($('#event_id').val()); return false;">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return false;">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="submitEvent(); return false;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop

@section('bottom-js')
    <script src="/packages/verilion/vcms/js/jquery.form.min.js"></script>
    <script src="/packages/verilion/vcms/js/jquery.contextMenu.min.js"></script>
    <script>
        function statusMsg(responseText) {
            new PNotify({
                icon: false,
                type: 'success',
                text: responseText,
                close: true
            });
        }

        var calendar;
        $(document).ready(function() {
            $(".datepick").datepicker({format: 'yyyy-mm-dd', autoclose: true });
            calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '/events/jsonevents',
                @if ((Auth::user()) && (Auth::user()->hasRole('events')))
                selectable: true,
                select: function(start, end, allDay) {
                    $("#start_date").val(start.format('YYYY[-]MM-DD'));
                    end = end.subtract(1, 'days');
                    $("#end_date").val(end.format('YYYY[-]MM-DD'));
                    $("#event_id").val(0);
                    $("#delbtn").addClass('hidden');
                    $('#eventModal').modal().show();
                },
                eventClick: function(calEvent, jsEvent, view) {

                },
                eventDragStart: function(calEvent, jsEvent, view){
                    $('.popover').destroy();
                },
                eventDrop: function(event,delta,revertFunc) {
                    start = event.start.format();
                    $.ajax({
                        type: "GET",
                        dataType: "text",
                        url: "/events/movedate",
                        data: "delta="
                        + delta.get('days')
                        + "&id="
                        + event.id
                        + '&deltaminutes='
                        + delta.asMinutes(),
                        cache: false,
                        success: function(html){
                            if (html == 'true') {
                                statusMsg('Changes saved');
                            } else {
                                alert(html);
                                revertFunc();
                            }
                        }
                    }) .done(function( data ) {
                        calendar.fullCalendar('refetchEvents');
                        calendar.fullCalendar( 'rerenderEvents');
                    });;
                },
                eventResizeStop: function() {
                    $(".popover").popover('hide');
                },
                eventResize: function(event,delta,revertFunc) {
                    $.ajax({
                        type: "GET",
                        dataType: "text",
                        url: "/events/moveenddates",
                        data: "delta="
                        + delta.get('days')
                        + "&id="
                        + event.id
                        + '&deltaminutes='
                        + delta.asMinutes(),
                        cache: false,
                        success: function(html){
                            if (html == 'true') {
                                statusMsg('Changes saved');
                            } else {
                                revertFunc();
                            }
                        }
                    });

                },
                @endif
                eventRender: function(event, element) {
                    element.attr('data-content', event.tooltip);
                    element.attr('data-id', event.id);
                    element.popover({container: 'body', 'trigger': 'hover', placement: 'bottom',
                        html: true, delay: {show: 500, hide: 0}});
                }
            })
        });

        @if ((Auth::user()) && (Auth::user()->hasRole('calendars')))
        function submitEvent(){
            var okay = $("#event_form").validate({
                errorClass:'text-danger',
                validClass:'text-success',
                errorElement:'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".text-danger").removeClass(errorClass).addClass(validClass);
                }
            }).form();
            if (okay){
                var options = { target: '#theeditmsg', success: statusMsg };
                $("#event_form").unbind('submit').ajaxSubmit(options);
                $("#eventModal").hide();
                $("#start_date").val('');
                $("#end_date").val('');
                $("#event_title").val('');
                $('#event_text').val('');
                $('.form-group').removeClass('text-danger');
                $('.form-group').find('span').remove()
                calendar.fullCalendar('refetchEvents');
                calendar.fullCalendar( 'rerenderEvents');
                $('#event_text').ckeditorGet().destroy();
                $('body').removeClass('modal-open');
            }
        }

        $('#eventModal').on('hidden.bs.modal', function (e) {
            $("#start_date").val('');
            $("#end_date").val('');
            $("#event_title").val('');
            $('#event_text').val('');
            $('.form-group').removeClass('text-danger');
            $('.form-group').find('span').remove();
            //$('#event_text').ckeditorGet().destroy();;
            $("#event_text").ckeditor(function(){
                this.destroy();
            });
            $("#timediv").addClass("hidden");
            $("#start_time").val('');
            $("#end_time").val();
            $("#all_day").val(1);
        });


        $("#eventModal").on('show.bs.modal', function(e){
            var config = {
                toolbar : 'CompactToolbar',
                height : '150px',
                width : '100%',
                toolbar : 'MiniToolbar',
                forcePasteAsPlainText: true,
                filebrowserBrowseUrl : '/packages/verilion/vcms/filemgmt/browse.php?type=files',
                filebrowserImageBrowseUrl : '/packages/verilion/vcms/filemgmt/browse.php?type=images',
                filebrowserFlashBrowseUrl : '/packages/verilion/vcms/filemgmt/browse.php?type=flash',
                enterMode : '1'
            };
            $('#event_text').ckeditor(config);
        });

        $("#all_day").change(function(){
            if ($("#all_day").val() == 1){
                $("#timediv").addClass('hidden');
                $("#start_time").removeClass('required');
                $("#end_time").removeClass("required");
            } else {
                $("#timediv").removeClass('hidden');
                $("#start_time").addClass('required');
                $("#end_time").addClass("required");
            }
        });

        $(function(){
            $.contextMenu({
                selector: '.citem',
                callback: function(key, options) {
                    // set the values of the form to retrieved event, and show the form for edit
                    editEvent($(this).data('id'));
                },
                items: {
                    "edit": {name: " Edit", icon: ""}
                }
            });
        });

        function editEvent(i) {
            var event_id = i;
            $.get('/events/retrieve_event?id=' + event_id, function(data, textStatus) {
                var theEvent = JSON.parse(data);
                var curEvent = theEvent[0];
                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                $("#event_title").val(curEvent.title_fr);
                $("#event_text").val(curEvent.event_text_fr);
                @else
                    $("#event_title").val(curEvent.title);
                $("#event_text").val(curEvent.event_text);
                @endif
                $("#all_day").val(curEvent.all_day);
                if (curEvent.all_day == 1){
                    $("#timediv").addClass('hidden');
                    $("#start_time").removeClass('required');
                    $("#end_time").removeClass('required');
                } else {
                    $("#timediv").removeClass('hidden');
                    $("#start_time").addClass('required');
                    $("#end_time").addClass('required');
                    $("#start_time").val(curEvent.start_time);
                    $("#end_time").val(curEvent.end_time);
                }
                $("#event_id").val(curEvent.id);
                $("#start_date").val(curEvent.start_date);
                $("#end_date").val(curEvent.end_date);
            }, 'text');
            $("#delbtn").removeClass("hidden");
            $("#eventModal").modal().show();

        }

        function deleteEvent(x) {
            bootbox.confirm("Are you sure?", function(result) {
                if (result==true)
                {
                    $.ajax({
                        type: "GET",
                        dataType: "text",
                        url: "/events/delete_event",
                        data: {id: x},
                        cache: false,
                        success: function(html){
                            if (html == 'deleted') {
                                statusMsg('Event deleted');
                            }
                        }
                    }) .done(function( data ) {
                        calendar.fullCalendar('refetchEvents');
                        calendar.fullCalendar( 'rerenderEvents');
                        $("#eventModal").hide();
                    });;
                }
            });
        }
        @endif
    </script>
@stop