@extends('vcms::base')

@section('top-white')
    <h1>Product</h1>
@stop


@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    @if ($product_id > 0)
                        Edit Product
                    @else
                        Add Product
                    @endif
                </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                {{ Form::model($product, array(
                                        'role' => 'form',
                                        'name' => 'bookform', 'id' => 'bookform',
                                        'url' => 'admin/products/product',
                                        'files' => true
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
                                {{ Form::label('title', 'Title', array('class' => 'control-label')); }}
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {{ Form::text('title', null, array('class' => 'required form-control',
                                                                            'style' => 'max-width: 400px;',
                                                                            'placeholder' => 'Page title')); }}
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

                        @if (Config::get('vcms::use_french'))
                            <div role="tabpanel" class="tab-pane fade" id="french">
                                <br>
                                @if (Config::get('vcms::use_french'))
                                    <div class="form-group">
                                        {{ Form::label('title_fr', 'Title (French)', array('class' => 'control-label')); }}
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                                {{ Form::text('title_fr', null, array('class' => 'required form-control',
                                                                                    'style' => 'max-width: 400px;',
                                                                                    'placeholder' => 'Page title')); }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('description_fr', 'Description (French)', array('class' => 'control-label')); }}
                                        <div class="controls">
                                            {{ Form::textarea('description_fr', null ); }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('active', 'Product active?', array('class' => 'control-label')); }}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {{ Form::select('active', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        1,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) }}
                            </div>
                        </div>
                    </div>



                    <hr>
                    <div class="form-group">
                        <div class="controls">
                            {{ Form::submit('Save', array('class' => 'btn btn-primary submit')) }}
                            @if ($product_id > 0)
                            <a class="btn btn-danger" href="#!" onclick='confirmDelete({{$product_id}})'>Delete this product</a>
                            @endif
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    {{ Form::hidden('product_id', $product_id )}}

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
                            window.location.href = '/admin/products/deleteproduct?id='+x;
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