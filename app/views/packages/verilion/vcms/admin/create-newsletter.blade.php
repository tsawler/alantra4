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
                    {{ Form::label('image', 'Article Image')}}
                    {{ Form::file('image_name',['class' => 'image_name', 'id' => 'image_name']) }}
                </div>

                @if(strlen($newsletter->image_name) > 0)
                    image
                @endif

                <br>
                <div class="form-group">
                    {{ Form::label('title', 'Article title', array('class' => 'control-label')); }}
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
                    {{ Form::label('article_content', 'Article Content', array('class' => 'control-label')); }}
                    <div class="controls">
                        {{ Form::textarea('article_content', null, ['id' => 'article_content']); }}
                    </div>
                </div>


                <hr>

                <div class="form-group">
                    <div class="controls">
                        <input type="hidden" name="action" id="action">
                        {{ Form::hidden('id', null, ['id' => 'newsletter_id', 'name' => 'id']) }}
                        <a class="btn btn-warning submit" onclick="saveMessage(); return false;" href="#!">Save</a>
                        <a class="btn btn-info submit" onclick="previewMessage(); return false;" href="#!">Preview</a>
                        <a class="btn btn-primary submit" onclick="sendMessage(); return false;" href="#!">Save and Send</a>
                    </div>
                </div>

                <div>&nbsp;</div>

                {{ Form::close() }}

            </div>
        </div>
    </div>

    {{ Form::open(array(
             'url' => '/admin/newsletter/preview',
             'role' => 'form',
             'name' => 'preview_form',
             'id' => 'preview_form',
             'method' => 'post',
             'files' => true,
             'target' => '_blank',
             ))
         }}

    <input type="hidden" name="article_title" id="preview_article_title">
    <input type="hidden" name="article_content" id="preview_article_content">
    <input type="hidden" name="id" id="preview_newsletter_id">

    {{ Form::close() }}
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
//                $("#preview_article_title").val($("#article_title").val());
//                var data = CKEDITOR.instances.article_content.getData();
//                $("#preview_article_content").val(data);
//                $("#preview_newsleter_id").val($("#preview_newsletter_id").val());
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