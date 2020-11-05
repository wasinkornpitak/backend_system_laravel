@extends('layouts.layout')@section('content')

    <style type="text/css">
        hr.style-dot {
            border-top: 1px dashed rgba(0, 0, 0, .2);
            border-bottom: 1px dashed #fff;
            margin-bottom: 30px;
        }

        .card-hover {
            border: 1px dashed rgba(0, 0, 0, .1);
        }

        .card-border {
            border: 1px solid rgba(0, 0, 0, .1);
        }

        .card-footer {
            border-top: 1px solid rgba(120, 130, 140, .13);
            background-color: #f7fafc;
            padding-top: 17px;
            padding-bottom: 17px;
        }

        .head-list {
            border-bottom: 1px solid rgba(0, 0, 0, .1);
            padding-bottom: 20px !important;
            margin-bottom: 20px;
        }

        .inline {
            display: inline;
        }

        .img-responsive {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .img-view {
            width: 250px;
        }

    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-0">
                    <h4 class="card-title">{{ $MainMenus->menu_system_name }}</h4>
                    @php
                    if(!empty($FaqsSetting)){
                        $form = 'FormEdit';
                        $id = $FaqsSetting['ques_setting_id'];
                    }else{
                        $form = 'FormAdd';
                        $id = '';
                    }
                    @endphp
                    <form id="{{ $form }}" class="needs-validation" novalidate>
                        <input type="hidden" id="form_type" value="{{ $form }}">
                        <input type="hidden" id="edit_id" value="{{ $id }}">
                        <div class="form-group row">
                            <label for="add_faqs_setting_menu" class="col-sm-3 text-right control-label col-form-label">Menu
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_faqs_setting_menu" name="ques_title"
                                    value="{{ $FaqsSetting['ques_title'] }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_faqs_meta_title" class="col-sm-3 text-right control-label col-form-label">Meta
                                Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_faqs_meta_title" name="ques_mata_title"
                                    value="{{ $FaqsSetting['ques_mata_title'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_faqs_meta_description"
                                class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_faqs_meta_description"
                                    name="ques_mata_description" value="{{ $FaqsSetting['ques_mata_description'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_faqs_meta_author" class="col-sm-3 text-right control-label col-form-label">Meta
                                Author</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_faqs_meta_author" name="ques_mata_author"
                                    value="{{ $FaqsSetting['ques_mata_author'] }}">
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_faqs_meta_robots" class="col-sm-3 text-right control-label col-form-label">Meta
                                Robots</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1"
                                            id="add_faqs_meta_robots_1" name="ques_mata_robots"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(1, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_1">INDEX</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="2"
                                            id="add_faqs_meta_robots_2" name="ques_mata_robots"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(2, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_2">FOLLOW</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="3"
                                            id="add_faqs_meta_robots_3" name="ques_mata_robots"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(3, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_3">NOODP</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="4"
                                            id="add_faqs_meta_robots_4" name="ques_mata_robots"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(4, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_4">NOYDIR</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row pb-3">
                            <label for="add_faqs_meta_robots" class="col-sm-3 text-right control-label col-form-label">Meta
                                Robots</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1"
                                            id="add_faqs_meta_robots_1" name="ques_mata_robots[]"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(1, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_1">INDEX</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="2"
                                            id="add_faqs_meta_robots_2" name="ques_mata_robots[]"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(2, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_2">FOLLOW</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="3"
                                            id="add_faqs_meta_robots_3" name="ques_mata_robots[]"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(3, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_3">NOODP</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="4"
                                            id="add_faqs_meta_robots_4" name="ques_mata_robots[]"
                                            {{ is_array($FaqsSetting['ques_mata_robots']) && in_array(4, $FaqsSetting['ques_mata_robots']) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_faqs_meta_robots_4">NOYDIR</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="add_faqs_og_title" class="col-sm-3 text-right control-label col-form-label">Og
                                title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_faqs_og_title" name="ques_og_title"
                                    value="{{ $FaqsSetting['ques_og_title'] }}">
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_faqs_og_description" class="col-sm-3 text-right control-label col-form-label">Og
                                Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="add_faqs_og_description" name="ques_og_description"
                                    rows="4">{{ $FaqsSetting['ques_og_description'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_faqs_twitter_title"
                                class="col-sm-3 text-right control-label col-form-label">Twitter Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_faqs_twitter_title"
                                    name="ques_twitter_title" value="{{ $FaqsSetting['ques_twitter_title'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_faqs_twitter_description"
                                class="col-sm-3 text-right control-label col-form-label">Twitter Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="add_faqs_twitter_description"
                                    name="ques_twitter_description"
                                    rows="4">{{ $FaqsSetting['ques_twitter_description'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_faqs_image" class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                Image</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upload-news-img form-control"
                                        id="ques_og_twitter_image" accept="image/*">
                                    <label class="custom-file-label" for="validatedCustomFile" id="ques_og_twitter_image_txt">Choose Image...</label>
                                    <small class="form-text text-muted">Recommended Size: 1200 x 630 pixel</small>
                                </div>
                                <div class="card-body">
                                    <img class="img-thumbnail" id="edit_preview_news_category_og_twitter_image"
                                        style="width:40%;"
                                        src="{{ asset('uploads/FaqsSettingImage/' . $FaqsSetting['ques_og_twitter_image']) }}">
                                </div>
                            </div>
                        </div>
                </div>

                {{-- <div class="card-footer">
                    <div class="form-group text-center mb-0">
                        <button type="submit" class="btn btn-lg btn-success btn-save">Save</button>
                    </div>
                </div> --}}

                </form>

            </div>
        </div>
    </div>


    @endsection @section('modal')
@endsection


@section('scripts')

    <script>
        $(document).ready(function() {

            var delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            $('body').on('keyup', '#add_faqs_setting_menu', function(e) {
                delay(function() {
                    saveData('ques_title', $('#add_faqs_setting_menu').val());
                }, 200)
            });

            $('body').on('keyup', '#add_faqs_meta_title', function(e) {
                delay(function() {
                    saveData('ques_mata_title', $('#add_faqs_meta_title').val());
                }, 200)
            });

            $('body').on('keyup', '#add_faqs_meta_description', function(e) {
                delay(function() {
                    saveData('ques_mata_description', $('#add_faqs_meta_description').val());
                }, 200)
            });

            $('body').on('keyup', '#add_faqs_meta_author', function(e) {
                delay(function() {
                    saveData('ques_mata_author', $('#add_faqs_meta_author').val());
                }, 200)
            });

            $('body').on('keyup', '#add_faqs_og_title', function(e) {
                delay(function() {
                    saveData('ques_og_title', $('#add_faqs_og_title').val());
                }, 200)
            });

            $('body').on('keyup', '#add_faqs_og_description', function(e) {
                delay(function() {
                    saveData('ques_og_description', $('#add_faqs_og_description').val());
                }, 200)
            });

            $('body').on('keyup', '#add_faqs_twitter_title', function(e) {
                delay(function() {
                    saveData('ques_twitter_title', $('#add_faqs_twitter_title').val());
                }, 200)
            });

            $('body').on('keyup', '#add_faqs_twitter_description', function(e) {
                delay(function() {
                    saveData('ques_twitter_description', $('#add_faqs_twitter_description').val());
                }, 200)
            });

            $('body').on('change', '[name="ques_mata_robots"]', function(e) {

                var Status = [];
                $("input:checkbox[name=ques_mata_robots]:checked").each(function(){
                    Status.push($(this).val());
                });

                if(Status.length < 1){
                    Status = 'null';
                }

                delay(function() {
                    saveData('ques_mata_robots', Status);
                }, 200)
            });

            function saveData(item, value) {

                var formType = $('#form_type').val();
                var method = '';
                var id = '';
                var url = '';

                if (formType == 'FormAdd') {
                    method = 'POST';
                    url = url_gb + "/admin/FaqsSetting";
                } else {
                    method = 'PUT';
                    id = $('#edit_id').val();
                    url = url_gb + "/admin/FaqsSetting/" + id;
                }

                $.ajax({
                    method: method,
                    url: url,
                    data: {
                        item: item,
                        data: value
                    }
                }).done(function(res) {
                    // console.log(res);
                    // resetButton(form.find('button[type=submit]'));
                    // if (res.status == 1) {
                    //     Swal.fire(res.title, res.content, 'success');
                    // }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            }

            $('body').on('change', '.upload-news-img', function() {
                var ele = $(this);
                var index = ele.data('index');
                var formData = new FormData();
                var form_type = $('#form_type').val();
                formData.append('file', ele[0].files[0]);
                $('#edit_preview_news_category_og_twitter_image').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/FaqsSettingImageTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        saveData('ques_og_twitter_image', res.path);
                        $('#ques_og_twitter_image_txt').text('Choose Image...');
                        // $('#edit_preview_news_category_og_twitter_image').attr('src', '');
                        // ele.closest('#' + form_type).find('#' + ele[0].id).append(
                        //     '<input type="hidden" id="' + ele[0].id + '"  name="' + ele[0]
                        //     .id + '" value="' + res.path + '">');
                        setTimeout(function() {}, 100);
                    }
                });
            });

            $('body').on('submit', '#FormAdd', function(e) {
                e.preventDefault();
                var form = $(this);
                loadingButton(form.find('button[type=submit]'));
                $.ajax({
                    method: "POST",
                    url: url_gb + "/admin/FaqsSetting",
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('submit', '#FormEdit', function(e) {
                e.preventDefault();
                var form = $(this);
                var id = $('#edit_id').val();
                loadingButton(form.find('button[type=submit]'));
                $.ajax({
                    method: "PUT",
                    url: url_gb + "/admin/FaqsSetting/" + id,
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        location.reload();
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            //Success Message
            // $('.btn-save').click(function () {
            //     Swal.fire("Good job!",
            //     "Your work has been saved.",
            //     "success")
            // });


        });

    </script>
@endsection
