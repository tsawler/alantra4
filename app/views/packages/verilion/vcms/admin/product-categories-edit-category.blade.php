@extends('vcms::base')

@section('top-white')
    <h1>Product Category</h1>
@stop


@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    @if ($category_id > 0)
                        Edit Category
                    @else
                        Add Category
                    @endif
                </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                {{ Form::model($category, array(
                                        'role' => 'form',
                                        'name' => 'bookform', 'id' => 'bookform',
                                        'url' => 'admin/product-categories/category'
                                        )
                           )
                }}

                <div role="tabpanel">
                    <br>
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
                                {{ Form::label('category_name', 'Category Name', array('class' => 'control-label')); }}
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {{ Form::text('category_name', null, array('class' => 'required form-control',
                                                                            'style' => 'max-width: 400px;',
                                                                            'placeholder' => 'Category name')); }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('description', 'Description', array('class' => 'control-label')); }}
                                <div class="controls">
                                    {{ Form::textarea('description', null); }}
                                </div>
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="french">
                            <br>
                            @if (Config::get('vcms::use_french'))
                                <div class="form-group">
                                    {{ Form::label('category_name_fr', 'Category Name (French)', array('class' => 'control-label')); }}
                                    <div class="controls">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                            {{ Form::text('category_name_fr', null, array('class' => 'required form-control',
                                                                                'style' => 'max-width: 400px;',
                                                                                'placeholder' => 'Category name')); }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('description_fr', 'Description (French)', array('class' => 'control-label')); }}
                                    <div class="controls">
                                        {{ Form::textarea('description_fr', null); }}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="controls">
                            {{ Form::submit('Save', array('class' => 'btn btn-primary submit')) }}
                            @if ($category_id> 0)
                                <a class="btn btn-danger" href="#!" onclick='confirmDelete({{ $category_id }})'>Delete this item</a>
                            @endif
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    {{ Form::hidden('category_id', $category_id )}}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @stop

        @section('bottom-js')
            <script>
                function confirmDelete(x){
                    bootbox.confirm("Are you sure you want to delete this category?", function(result) {
                        if (result==true)
                        {
                            window.location.href = '/admin/product-categories/deletecategory?id='+x;
                        }
                    });
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

                    CKEDITOR.replace( 'description',
                            {
                                toolbar : 'MyToolbar',
                                forcePasteAsPlainText: true,
                                filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
                                filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
                                filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
                                enterMode : '1'
                            });

                    @if (Config::get('vcms::use_french'))
                    CKEDITOR.replace( 'description_fr',
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