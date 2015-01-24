@extends('vcms::base')

<?php
$active = array('Inactive', 'Active');
?>

@section('top-white')
    <h1>Blog Post</h1>
@stop

@section('content')
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>
            @if ($post_id > 0)
                Edit Blog Post
            @else
                Add Blog Post
            @endif
            </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            {{ Form::model($post,array(
                'url' => '/admin/blogs/post',
                'role' => 'form',
                'name' => 'bookform',
                'id' => 'bookform',
                'method' => 'post',
                'files' => true,
                ))
            }}

            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#english" aria-controls="english" role="tab" data-toggle="tab">English</a>
                    </li>
                    <li role="presentation">
                        <a href="#french" aria-controls="french" role="tab" data-toggle="tab">French</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in active" id="english">
                        <br>
                        <div class="form-group">
                        {{ Form::label('title', 'Post title', array('class' => 'control-label')); }}
                            <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                    {{ Form::text('title', null, array('class' => 'required form-control',
                                                                        'style' => 'max-width: 400px;',
                                                                        'placeholder' => 'Post title')); }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('summary', 'Post Summary', array('class' => 'control-label')); }}
                            <div class="controls">
                                {{ Form::textarea('summary', null); }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('content', 'Post', array('class' => 'control-label')); }}
                            <div class="controls">
                                {{ Form::textarea('content', null); }}
                            </div>
                        </div>

                     </div>

                    <div role="tabpanel" class="tab-pane fade" id="french">
                        <br>
                        @if (Config::get('vcms::use_french'))
                            <div class="form-group">
                            {{ Form::label('title_fr', 'Post title (French)', array('class' => 'control-label')); }}
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {{ Form::text('title_fr', null, array('class' => 'required form-control',
                                                                            'style' => 'max-width: 400px;',
                                                                            'placeholder' => 'Post title')); }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                {{ Form::label('summary_fr', 'Post Summary (French)', array('class' => 'control-label')); }}
                                <div class="controls">
                                    {{ Form::textarea('summary_fr', null); }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('content_fr', 'Post (French)', array('class' => 'control-label')); }}
                                <div class="controls">
                                    {{ Form::textarea('content_fr', null); }}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('post_date', 'Post Date', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::text('post_date', null, array('class' => 'required form-control datepicker',
                                                                'style' => 'max-width: 400px;',
                                                                'placeholder' => 'YYYY-MM-DD')); }}
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('blog_id', 'Post in Blog', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
                            {{ Form::select('blog_id', $blogs,
                                    null,
                                    array('class' => 'form-control',
                                        'style' => 'max-width: 400px;')) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                {{ Form::label('active', 'Post active?', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
                            {{ Form::select('active', array(
                                    '1' => 'Yes',
                                    '0' => 'No'),
                                    $post->active,
                                    array('class' => 'form-control',
                                        'style' => 'max-width: 400px;')) }}
                        </div>
                    </div>
                </div>

                @if($post_id > 0)
                    @if (($post->image != null) && (strlen($post->image) > 0))
                    <img class="img img-responsive img-thumbnail" src="/blog/{{ $blog_id }}/thumbs/{{ $post->image}}">
                    @else
                        <img class="img img-responsive img-thumbnail" src="http://placehold.it/200x200&text=No+Image">
                    @endif
                @endif

                <div class="form-group">
                    {{ Form::label('image', 'Post Image')}}
                    {{ Form::file('image_name',['id' => 'image_name']) }}
                </div>

                <hr>

                <div class="form-group">
                <div class="controls">
                    {{ Form::submit('Save', array('class' => 'btn btn-primary submit')) }}
                    @if ($post_id > 0)
                    <a class="btn btn-danger" href="#!" onclick='confirmDelete({{$post->id}})'>Delete this post</a>
                    @endif
                    @if (strlen($src) == 0)
                    <a class="btn btn-info" href="/admin/blogs/blog?id={{ $blog_id }}">Cancel</a>
                    @else
                    <a class="btn btn-info" href="/admin/blogs/posts">Cancel</a>
                    @endif
                </div>
            </div>

            <div>&nbsp;</div>

            {{ Form::hidden('post_id', $post_id )}}
            {{ Form::hidden('src', $src) }}
            {{ Form::close() }}

        </div>
    </div>
</div>
@stop

@section('bottom-js')
<script>
@if ($post_id > 0)
function confirmDelete(x){
	bootbox.confirm("Are you sure you want to delete this post?", function(result) {
		if (result==true)
		{
			window.location.href = '/admin/blogs/deletepost?id=' + x + '&bid=' + {{ $blog_id }};
		}
	});
}
@endif
$(document).ready(function () {
	$("#bookform").validate({
		errorClass:'has-error',
		validClass:'has-success',
    	errorElement:'span',
    	highlight: function (element, errorClass, validClass) {
        $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
	    }
	});

    $(".datepicker").datepicker({format: 'yyyy-mm-dd', autoclose: true});

	CKEDITOR.replace( 'content',
	{
		toolbar : 'MyToolbar',
		forcePasteAsPlainText: true,
		filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
		filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
		filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
		enterMode : '1'
	});

	CKEDITOR.replace( 'summary',
    {
        toolbar : 'MyToolbar',
        forcePasteAsPlainText: true,
        filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
        filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
        filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
        enterMode : '1'
    });

	@if (Config::get('vcms::use_french'))
	    CKEDITOR.replace( 'content_fr',
        {
            toolbar : 'MyToolbar',
            forcePasteAsPlainText: true,
            filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
            filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
            filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
            enterMode : '1'
        });
        CKEDITOR.replace( 'summary_fr',
        {
            toolbar : 'MyToolbar',
            forcePasteAsPlainText: true,
            filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
            filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
            filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
            enterMode : '1'
        });
	@endif
});
</script>
@stop