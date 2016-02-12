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

                {{ Form::open(array(
                     'url' => '/admin/newsletters/create',
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
                    {{ Form::file('image_name',['id' => 'image_name']) }}
                </div>

                <br>
                <div class="form-group">
                    {{ Form::label('title', 'Article title', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                            {{ Form::text('article_title', null, array('class' => 'required form-control',
                                                                'style' => 'max-width: 400px;',
                                                                'placeholder' => 'Article title')); }}
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('article_content', 'Article Content', array('class' => 'control-label')); }}
                    <div class="controls">
                        {{ Form::textarea('article_content', null); }}
                    </div>
                </div>


                <hr>

                <div class="form-group">
                    <div class="controls">
                        {{ Form::submit('Save', array('class' => 'btn btn-warning submit')) }}
                        {{ Form::submit('Preview', array('class' => 'btn btn-info submit')) }}
                        {{ Form::submit('Save and Send', array('class' => 'btn btn-primary submit')) }}
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
    </script>
@stop