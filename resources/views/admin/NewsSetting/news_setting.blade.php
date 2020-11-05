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
                <div class="card-body">
                    <h4 class="card-title">{{ $MainMenus->menu_system_name }}</h4>
                    <form id="FormAdd">
                        <div class="form-group row">
                            <label for="add_news_setting_menu" class="col-sm-3 text-right control-label col-form-label">Menu
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_news_setting_menu"
                                    name="new_setting_manu_name" required value="{{ $NewsSetting->new_setting_manu_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_news_category_short_description"
                                class="col-sm-3 text-right control-label col-form-label">Social Share Button</label>
                            <div class="col-sm-9 custom-switch mb-0" style="padding-left: 50px;">
                                <input type="checkbox" class="custom-control-input" name="new_setting_social_share"
                                    id="add_news_setting_bt_social"
                                    {{ $NewsSetting->new_setting_social_share == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label control-label col-sm-3"
                                    for="add_news_setting_bt_social"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_news_category_short_description"
                                class="col-sm-3 text-right control-label col-form-label">Social Comment Status</label>
                            <div class="col-sm-9 custom-switch mb-0" style="padding-left: 50px;">
                                <input type="checkbox" class="custom-control-input" name="new_setting_social_share"
                                    id="add_news_setting_bt_comment"
                                    {{ $NewsSetting->new_setting_social_comment == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label control-label col-sm-3"
                                    for="add_news_setting_bt_comment"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_news_category_short_description"
                                class="col-sm-3 text-right control-label col-form-label">Default Related News</label>
                            <div class="col-sm-9 custom-switch mb-0" style="padding-left: 50px;">
                                <input type="checkbox" class="custom-control-input" name="new_setting_social_share"
                                    id="add_news_setting_related_news"
                                    {{ $NewsSetting->new_setting_default_related == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label control-label col-sm-3"
                                    for="add_news_setting_related_news"></label>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="add_news_setting_bt_share"
                                class="col-sm-3 text-right control-label col-form-label">Social Share Button</label>
                            <div class="col-sm-9">
                                <input type="checkbox" class="toggle edit-status" id="add_news_setting_bt_social"
                                    name="new_setting_social_share"
                                    {{ $NewsSetting->new_setting_social_share == 1 ? 'checked' : '' }} data-toggle="toggle"
                                    data-style="ios" data-on="On" data-off="Off">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label for="add_news_setting_bt_comment"
                                class="col-sm-3 text-right control-label col-form-label">Social Comment Status</label>
                            <div class="col-sm-9">
                                <input type="checkbox" class="toggle edit-status" id="add_news_setting_bt_comment"
                                    name="new_setting_social_comment"
                                    {{ $NewsSetting->new_setting_social_comment == 1 ? 'checked' : '' }}
                                    data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_news_setting_related_news"
                                class="col-sm-3 text-right control-label col-form-label">Default Related News</label>
                            <div class="col-sm-9">
                                <input type="checkbox" class="toggle edit-status" id="add_news_setting_related_news"
                                    name="new_setting_default_related"
                                    {{ $NewsSetting->new_setting_default_related == 1 ? 'checked' : '' }}
                                    data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="add_news_setting_news_type"
                                class="col-sm-3 text-right control-label col-form-label">Default Related News Type</label>
                            <div class="col-sm-9">
                                <div class="form-check pl-0 mt-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="0"
                                            id="add_news_setting_news_type_1" name="new_setting_default_reated_type"
                                            {{ $NewsSetting->new_setting_default_reated_type == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_news_setting_news_type_1">Random
                                            All</label>
                                    </div>
                                </div>
                                <div class="form-check pl-0 mt-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="1"
                                            id="add_news_setting_news_type_2" name="new_setting_default_reated_type"
                                            {{ $NewsSetting->new_setting_default_reated_type == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_news_setting_news_type_2">Random Same
                                            Category</label>
                                    </div>
                                </div>
                                <div class="form-check pl-0 mt-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="2"
                                            id="add_news_setting_news_type_3" name="new_setting_default_reated_type"
                                            {{ $NewsSetting->new_setting_default_reated_type == 2 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="add_news_setting_news_type_3">Random Same
                                            Tag Keyword</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- <div class="card-footer">
                    <div class="form-group text-center mb-0">
                        <button type="submit" class="btn btn-lg btn-success btn-save">Save</button>
                    </div>
                </div> --}}

            </div>

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

            $('body').on('keyup', '#add_news_setting_menu', function(e) {
                delay(function() {
                    saveData('new_setting_manu_name', $('#add_news_setting_menu').val());
                }, 200)
            });

            $('body').on('change', '#add_news_setting_bt_social', function(e) {
                if ($(this).is(':checked')) {
                    $('#add_news_setting_bt_social').val(1);
                } else {
                    $('#add_news_setting_bt_social').val(0);
                }
                delay(function() {
                    saveData('new_setting_social_share', $('#add_news_setting_bt_social').val());
                }, 100)
            });

            $('body').on('change', '#add_news_setting_bt_comment', function(e) {
                if ($(this).is(':checked')) {
                    $('#add_news_setting_bt_comment').val(1);
                } else {
                    $('#add_news_setting_bt_comment').val(0);
                }
                delay(function() {
                    saveData('new_setting_social_comment', $('#add_news_setting_bt_comment').val());
                }, 100)
            });

            $('body').on('change', '#add_news_setting_related_news', function(e) {
                if ($(this).is(':checked')) {
                    $('#add_news_setting_related_news').val(1);
                } else {
                    $('#add_news_setting_related_news').val(0);
                }
                delay(function() {
                    saveData('new_setting_default_related', $('#add_news_setting_related_news').val());
                }, 100)
            });

            $('body').on('change', '[name="new_setting_default_reated_type"]', function(e) {
                delay(function() {
                    saveData('new_setting_default_reated_type', $(
                        'input[name=new_setting_default_reated_type]:checked').val());
                }, 100)
            });

            function saveData(item, value) {

                $.ajax({
                    method: "PUT",
                    url: url_gb + "/admin/NewsSetting/1",
                    data: {
                        item: item,
                        data: value
                    }
                }).done(function(res) {
                    console.log(res);
                    // resetButton(form.find('button[type=submit]'));
                    // if (res.status == 1) {
                    //     Swal.fire(res.title, res.content, 'success');
                    // }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            }

            //Success Message
            $('.btn-save').click(function(e) {
                // console.log('test12345679');
                e.preventDefault();
                var form = $('#FormAdd');
                loadingButton(form.find('button[type=submit]'));
                $.ajax({
                    method: "PUT",
                    url: url_gb + "/admin/NewsSetting/1",
                    data: form.serialize()
                }).done(function(res) {
                    console.log(res);
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

        });

    </script>
@endsection
