@extends('vcms::base')

@section('top-white')
    <h1>Site Page</h1>
@stop


@section('content')
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>
            @if ($page_id > 0)
                Edit Page
            @else
                Add Page
            @endif
            </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">
            {{ Form::model($page, array(
                                    'role' => 'form',
                                    'name' => 'bookform', 'id' => 'bookform',
                                    'url' => 'admin/page/page',
                                    'files' => 'true'
                                    )
                       )
            }}

            <div role="tabpanel">
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#english" aria-controls="english" role="tab" data-toggle="tab">English</a>
                </li>
                @if (Config::get('vcms::use_french'))
                    <li role="presentation">
                        <a href="#french" aria-controls="french" role="tab" data-toggle="tab">French</a>
                    </li>
                @endif
            </ul>

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane fade in active" id="english">
                    <br>
                    <div class="form-group">
                    {{ Form::label('page_title', 'Page title', array('class' => 'control-label')); }}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                {{ Form::text('page_title', null, array('class' => 'required form-control',
                                                                    'style' => 'max-width: 400px;',
                                                                    'placeholder' => 'Page title')); }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    {{ Form::label('page_content', 'Page Content', array('class' => 'control-label')); }}
                    <div class="controls">
                    {{ Form::textarea('page_content', null); }}
                    </div>
                    </div>
                </div>

                @if (Config::get('vcms::use_french'))
                    <div role="tabpanel" class="tab-pane fade" id="french">
                        <br>
                        @if (Config::get('vcms::use_french'))
                            <div class="form-group">
                                {{ Form::label('page_title_fr', 'Page title (French)', array('class' => 'control-label')); }}
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {{ Form::text('page_title_fr', null, array('class' => 'required form-control',
                                                                            'style' => 'max-width: 400px;',
                                                                            'placeholder' => 'Page title')); }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('page_content_fr', 'Page Content (French)', array('class' => 'control-label')); }}
                                <div class="controls">
                                    {{ Form::textarea('page_content_fr', null ); }}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

                <div class="form-group">
                    {{ Form::label('image_name', 'Page Images (header)', ['class' => 'control-label']) }}
                    <br>
                    @if (sizeof($page->images) > 0)
                        @foreach($page->images as $image)
                            <img alt="image" class="img-thumbnail"
                                 src="/page_images/thumbs/{{ $image->image_name }}" />
                            &nbsp;
                            <a href="#!" onclick="confirmDeleteImage({{ $image->id }})">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endforeach
                    @else
                        <img class="img-thumbnail" src="http://placehold.it/140x100&text=No+Image">
                    @endif
                    <br><br>
                    <div class="controls">
                        {{ Form::file('image_name',['id' => 'image_name']) }}
                    </div>
                </div>

                <div class="form-group">
                {{ Form::label('active', 'Page active?', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
                            {{ Form::select('active', array(
                                    '1' => 'Yes',
                                    '0' => 'No'),
                                    null,
                                    array('class' => 'form-control',
                                        'style' => 'max-width: 400px;')) }}
                        </div>
                    </div>
                </div>


                <div class="form-group">
                {{ Form::label('meta_tags', 'Meta Keywords', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            {{ Form::text('meta_tags', null, array('class' => 'required form-control',
                                                                'style' => 'max-width: 400px;',
                                                                'placeholder' => 'keyword, keyword')); }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                {{ Form::label('meta', 'Meta Description', array('class' => 'control-label')); }}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            {{ Form::text('meta', null, array('class' => 'required form-control',
                                                                'style' => 'max-width: 400px;',
                                                                'placeholder' => 'Description')); }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                <div class="controls">
                    {{ Form::submit('Save', array('class' => 'btn btn-primary submit')) }}
                    <a class="btn btn-info" href="#!" onclick="saveContinue()">Save and Continue</a>
                    @if ($page_id > 0)
                    <a class="btn btn-danger" href="#!" onclick='confirmDelete({{$page_id}})'>Delete this page</a>
                    @endif
                </div>
            </div>
            <div>&nbsp;</div>
            {{ Form::hidden('page_id', $page_id )}}
            {{ Form::hidden('action', 0, ['id' => 'action'] )}}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop

@section('bottom-js')
<script>
function confirmDelete(x){
	bootbox.confirm("Are you sure you want to delete this page? This will "
	    + "also delete any menu items referencing this page.", function(result) {
		if (result==true)
		{
			window.location.href = '/admin/page/deletepage?id='+x;
		}
	});
}
function confirmDeleteImage(x){
    bootbox.confirm("Are you sure you want to delete this image?", function(result) {
        if (result==true)
        {
            window.location.href = '/admin/page/deletepageimage?pid={{ $page_id }}&id='+x;
        }
    });
}
function saveContinue(){
    $("#action").val(1);
    $("#bookform").submit();
}
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

	CKEDITOR.replace( 'page_content',
	{
		toolbar : 'MyToolbar',
		forcePasteAsPlainText: true,
		filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
		filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
		filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
		enterMode : '1'
	});

	@if (Config::get('vcms::use_french'))
	    CKEDITOR.replace( 'page_content_fr',
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