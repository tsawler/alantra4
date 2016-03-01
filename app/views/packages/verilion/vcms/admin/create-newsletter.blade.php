@extends('vcms::base')

@section('top-white')
    <h1>Create Newsletter</h1>
@stop

@section('content')

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    Create and send Newsletter
                </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">

                {{ Form::model($newsletter,array(
                    'url' => '/admin/newsletter/create',
                    'role' => 'form',
                    'name' => 'bookform',
                    'id' => 'bookform',
                    'method' => 'post',
                    'files' => true,
                    ))
                }}


                <br>
                <div class="form-group">
                    {{ Form::label('image', 'Newsletter Image')}}
                    {{ Form::file('image_name',['class' => 'image_name', 'id' => 'image_name']) }}
                </div>

                @if(strlen($newsletter->image_name) > 0)
                    <img src="/newsletter_images/{{ $newsletter->image_name }}">
                @endif

                <br>
                <div class="form-group">
                    {{ Form::label('title', 'Newsletter title', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                            {{ Form::text('article_title', null, array('class' => 'required form-control',
                                                                'style' => 'max-width: 400px;',
                                                                'id' => 'article_title',
                                                                'placeholder' => 'Article title')); }}
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('article_content', 'Newsletter Content', array('class' => 'control-label')); }}
                    <div class="controls">
                        {{ Form::textarea('article_content', null, ['id' => 'article_content']); }}
                    </div>
                </div>


                <hr>

                <div class="form-group">
                    <div class="controls">
                        <input type="hidden" name="action" id="action">
                        {{ Form::hidden('id', null, ['id' => 'newsletter_id', 'name' => 'id']) }}
                        @if($newsletter->sent == 0)
                        <a class="btn btn-warning submit" onclick="saveMessage(); return false;" href="#!">Save</a>
                        @endif
                        <a class="btn btn-info submit" onclick="previewMessage(); return false;" href="#!">Preview</a>
                        @if($newsletter->sent == 0)
                        <a class="btn btn-primary submit" onclick="sendMessage(); return false;" href="#!">Save and Send</a>
                        @endif
                    </div>
                </div>

                <div>&nbsp;</div>

                {{ Form::close() }}

            </div>
        </div>
    </div>

@stop


@section('bottom-js')
    <script>
        $(document).ready(function () {
            $("#bookform").validate({
                errorClass: 'has-error',
                validClass: 'has-success',
                errorElement: 'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
                }
            });

            CKEDITOR.replace('article_content',
                    {
                        toolbar: 'MyToolbar',
                        forcePasteAsPlainText: true,
                        filebrowserBrowseUrl: '/filemgmt/browse.php?type=files',
                        filebrowserImageBrowseUrl: '/filemgmt/browse.php?type=images',
                        filebrowserFlashBrowseUrl: '/filemgmt/browse.php?type=flash',
                        enterMode: '1'
                    });
        });

        function saveMessage() {
            var okay = false;
            okay = $("#bookform").validate({
                errorClass: 'has-error',
                validClass: 'has-success',
                errorElement: 'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
                }
            }).form();

            if (okay) {
                $("#action").val('save');
                $("#bookform").submit();
            }
        }

        $(".image_name").change(function(){


        });

        function previewMessage() {
            var okay = false;
            okay = $("#bookform").validate({
                errorClass: 'has-error',
                validClass: 'has-success',
                errorElement: 'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
                }
            }).form();

            if (okay) {
                $("#bookform").attr('target', '_blank');
                $("#action").val('preview');
                $("#bookform").submit();
                $('#bookform').attr('target', '');
            }
        }

        function sendMessage() {
            var okay = false;
            okay = $("#bookform").validate({
                errorClass: 'has-error',
                validClass: 'has-success',
                errorElement: 'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
                }
            }).form();

            if (okay) {
                bootbox.confirm("Are you sure you want to save and send this newsletter to the distribution list?", function(result) {
                    if (result==true)
                    {
                        $("#action").val('send');
                        $("#bookform").submit();
                    }
                });
            }
        }
    </script>
@stop