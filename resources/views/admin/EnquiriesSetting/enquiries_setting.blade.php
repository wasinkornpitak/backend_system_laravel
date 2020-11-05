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

        .card-additional-field {
            background-color: #f7fafc;
            border: 1px solid rgba(0, 0, 0, .1);
            padding-top: 10px;
            padding-right: 10px;
            padding-left: 10px;
            padding-bottom: 10px;
            margin-bottom: 20px;
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
        @php
        if(!empty($Setting)){
        $form = 'Edit';
        $id = $Setting['enquiry_setting_id'];
        }else{
        $form = 'Add';
        $id = '';
        }
        @endphp
        <div class="col-lg-6 col-md-6 col-sm-12">
            <input type="hidden" id="form_type" value="{{ $form }}">
            <input type="hidden" id="edit_id" value="{{ $id }}">
            <form id="FormEmail" class="needs-validation" novalidate>
                <div class="card">
                    <div class="card-body pb-0">
                        <h4 class="card-title">Menu Setting</h4>
                        <div class="form-group row">
                            <label for="add_enquiries_set_menu_name"
                                class="col-sm-3 text-right control-label col-form-label">Menu Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiries_set_menu_name"
                                    name="enquiries_setting_menu_name"
                                    value="{{ $Setting['enquiries_setting_menu_name'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_to_email"
                                class="col-sm-3 text-right control-label col-form-label">To E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_to_email"
                                    name="enquiry_setting_to_email" value="{{ $Setting['enquiry_setting_to_email'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_bcc_email"
                                class="col-sm-3 text-right control-label col-form-label">BCC E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_bcc_email"
                                    name="enquiry_setting_bcc_email" value="{{ $Setting['enquiry_setting_bcc_email'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_cc_email"
                                class="col-sm-3 text-right control-label col-form-label">CC E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_cc_email"
                                    name="enquiry_setting_cc_email" value="{{ $Setting['enquiry_setting_cc_email'] }}">
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_enquiry_setting_contact"
                                class="col-sm-3 text-right control-label col-form-label">Contact Information</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="add_enquiry_setting_contact"
                                    name="enquiry_setting_contact"
                                    rows="4">{{ $Setting['enquiry_setting_contact'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_map_image"
                                class="col-sm-3 text-right control-label col-form-label">Map
                                Image</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upload-news-img form-control"
                                        id="add_enquiry_setting_map_image" accept="image/*">
                                    <label class="custom-file-label" for="add_enquiries_set_map">Choose Image...</label>
                                </div>
                                <div class="card-body">
                                    <img class="img-thumbnail" id="edit_preview_news_category_og_twitter_image"
                                        style="width:40%;"
                                        src="{{ asset('uploads/EnquiriesImage/' . $Setting['enquiry_setting_map_image']) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_enquiry_setting_map_latitude"
                                class="col-sm-3 text-right control-label col-form-label">Google Map</label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" class="form-control" id="add_enquiry_setting_map_latitude"
                                    name="enquiry_setting_map_latitude" placeholder="Latitude"
                                    value="{{ $Setting['enquiry_setting_map_latitude'] }}">
                            </div>
                            <label for="add_enquiry_setting_map_longitude"
                                class="col-sm-3 text-right control-label col-form-label"></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_map_longitude"
                                    name="enquiry_setting_map_longitude" placeholder="Longitude"
                                    value="{{ $Setting['enquiry_setting_map_longitude'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiries_set_form_status"
                                class="col-sm-3 text-right control-label col-form-label">Enquiry Form Status </label>
                            <div class="col-sm-9">
                                <input type="checkbox" class="toggle edit-status" id="add_enquiry_setting_status"
                                    name="enquiry_setting_status"
                                    {{ $Setting['enquiry_setting_status'] == 1 ? 'checked' : '' }} data-toggle="toggle"
                                    data-style="ios" data-on="On" data-off="Off">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group text-center mb-0">
                            <button type="submit" class="btn btn-lg btn-success btn-save-email">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <form id="FormMeta">
                <div class="card">
                    <div class="card-body pb-2">
                        <h4 class="card-title">Meta Setting</h4>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_meta_title"
                                class="col-sm-3 text-right control-label col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_meta_title"
                                    name="enquiry_setting_meta_title" value="{{ $Setting['enquiry_setting_meta_title'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_meta_discription"
                                class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_meta_discription"
                                    name="enquiry_setting_meta_discription"
                                    value="{{ $Setting['enquiry_setting_meta_discription'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_meta_author"
                                class="col-sm-3 text-right control-label col-form-label">Meta Author</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_meta_author"
                                    name="enquiry_setting_meta_author"
                                    value="{{ $Setting['enquiry_setting_meta_author'] }}">
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_enquiries_set_meta_robots"
                                class="col-sm-3 text-right control-label col-form-label">Meta Robots</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1"
                                            id="add_enquiries_set_meta_robots_1" name="enquiry_setting_meta_index"
                                            {{ $Setting['enquiry_setting_meta_index'] == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="add_enquiries_set_meta_robots_1">INDEX</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1"
                                            id="add_enquiries_set_meta_robots_2" name="enquiry_setting_meta_follow"
                                            {{ $Setting['enquiry_setting_meta_follow'] == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="add_enquiries_set_meta_robots_2">FOLLOW</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1"
                                            id="add_enquiries_set_meta_robots_3" name="enquiry_setting_meta_noodp"
                                            {{ $Setting['enquiry_setting_meta_noodp'] == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="add_enquiries_set_meta_robots_3">NOODP</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1"
                                            id="add_enquiries_set_meta_robots_4" name="enquiry_setting_meta_noydir"
                                            {{ $Setting['enquiry_setting_meta_noydir'] == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="add_enquiries_set_meta_robots_4">NOYDIR</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_og_title"
                                class="col-sm-3 text-right control-label col-form-label">Og title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_og_title"
                                    name="enquiry_setting_og_title" value="{{ $Setting['enquiry_setting_og_title'] }}">
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_enquiry_setting_og_descript"
                                class="col-sm-3 text-right control-label col-form-label">Og Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="add_enquiry_setting_og_descript"
                                    name="enquiry_setting_og_descript"
                                    rows="4">{{ $Setting['enquiry_setting_og_descript'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_tw_title"
                                class="col-sm-3 text-right control-label col-form-label">Twitter Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_enquiry_setting_tw_title"
                                    name="enquiry_setting_tw_title" value="{{ $Setting['enquiry_setting_tw_title'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="add_enquiry_setting_tw_descript"
                                class="col-sm-3 text-right control-label col-form-label">Twitter Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="add_enquiry_setting_tw_descript"
                                    name="enquiry_setting_tw_descript"
                                    rows="4">{{ $Setting['enquiry_setting_tw_descript'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="add_enquiry_setting_image"
                                class="col-sm-3 text-right control-label col-form-label">Og/Twitter Image</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upload-news-img form-control"
                                        id="add_enquiry_setting_image" accept="image/*">
                                    <label class="custom-file-label" for="add_enquiry_setting_image">Choose
                                        Image...</label>
                                    <small class="form-text text-muted">Recommended Size: 1200 x 630 pixel</small>
                                </div>
                                <div class="card-body">
                                    <img class="img-thumbnail" id="edit_preview_news_category_og_twitter_image"
                                        style="width:40%;"
                                        src="{{ asset('uploads/EnquiriesImage/' . $Setting['enquiry_setting_image']) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group text-center mb-0">
                            <button type="submit" class="btn btn-lg btn-success btn-save-meta">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <form id="FormField">
                <input type="hidden" id="count_field" value="{{$count_field}}">
                <div class="card">
                    <div class="card-body pb-4">
                        <h4 class="card-title mb-3">Additional Fields</h4>

                        <div class="p-2">

                            <div class="row mb-2">
                                <div class="col-sm-2">
                                    <label class="font-bold control-label col-form-label">Order</label>
                                </div>
                                <div class="col-sm-3">
                                    <label class="font-bold control-label col-form-label">Field Name</label>
                                </div>
                                <div class="col-sm-2">
                                    <label class="font-bold control-label col-form-label">Field Type</label>
                                </div>
                                <div class="col-sm-2">
                                    <label class="font-bold control-label col-form-label">Required</label>
                                </div>
                                <div class="col-sm-2">
                                    <label class="font-bold control-label col-form-label">Active</label>
                                </div>
                                <div class="col-sm-1">
                                    <label class="font-bold control-label col-form-label">Action</label>
                                </div>
                            </div>

                            @foreach ($Field as $keys => $value)
                                <div class="row mb-3 removeclass{{$keys}}">
                                    <input type="hidden" name="field[{{$keys}}][enquiry_fields_id]" value="{{$value['enquiry_fields_id']}}">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="add_enquiries_set_field_order"
                                            name="field[{{$keys}}][enquiry_fields_order_by]" value="{{$value['enquiry_fields_order_by']}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="add_enquiries_set_field_name"
                                                name="field[{{$keys}}][enquiry_fields_name]" value="{{$value['enquiry_fields_name']}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select class="form-control select2" id="add_enquiries_set_field_type"
                                                name="field[{{$keys}}][enquiry_fields_type]">
                                                @foreach ($arr_field_type as $key => $val)
                                                    <option value="{{$key}}" {{($value['enquiry_fields_type'] == $key) ? 'selected' : ''}}>{{$val}}</option>;
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="1"
                                                    id="add_enquiries_set_field_required_{{$keys}}" name="field[{{$keys}}][enquiry_fields_required]"
                                                    {{($value['enquiry_fields_required'] == 1) ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                    for="add_enquiries_set_field_required_{{$keys}}">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="1"
                                                    id="add_enquiries_set_field_active_{{$keys}}" name="field[{{$keys}}][enquiry_fields_status]"
                                                    {{($value['enquiry_fields_status'] == 1) ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                    for="add_enquiries_set_field_active_{{$keys}}">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <button class="btn btn-danger confirm-delete" type="button"
                                                onclick="remove_additional_fields({{$keys}});"><i class="ti-close"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="row mb-3">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="add_enquiries_set_field_order"
                                            name="add_enquiries_set_field_order" value="2">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="add_enquiries_set_field_name"
                                            name="add_enquiries_set_field_name" value="E-mail">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control select2" id="add_enquiries_set_field_type"
                                            name="add_enquiries_set_field_type">
                                            <option>Field type</option>
                                            <option>Text Input</option>
                                            <option>Text Area Input</option>
                                            <option selected>E-mail Input</option>
                                            <option>Numeric Input</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_required_1" name="add_enquiries_set_fieldrequired"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_required_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_active_1" name="add_enquiries_set_fieldactive"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_active_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button class="btn btn-danger confirm-delete" type="button"
                                            onclick="remove_additional_fields(' + field + ');"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="add_enquiries_set_field_order"
                                            name="add_enquiries_set_field_order" value="3">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="add_enquiries_set_field_name"
                                            name="add_enquiries_set_field_name" value="Phone">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control select2" id="add_enquiries_set_field_type"
                                            name="add_enquiries_set_field_type">
                                            <option>Field type</option>
                                            <option selected>Text Input</option>
                                            <option>Text Area Input</option>
                                            <option>E-mail Input</option>
                                            <option>Numeric Input</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_required_1" name="add_enquiries_set_fieldrequired"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_required_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_active_1" name="add_enquiries_set_fieldactive"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_active_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button class="btn btn-danger confirm-delete" type="button"
                                            onclick="remove_additional_fields(' + field + ');"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="add_enquiries_set_field_order"
                                            name="add_enquiries_set_field_order" value="4">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="add_enquiries_set_field_name"
                                            name="add_enquiries_set_field_name" value="Message">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control select2" id="add_enquiries_set_field_type"
                                            name="add_enquiries_set_field_type">
                                            <option>Field type</option>
                                            <option>Text Input</option>
                                            <option selected>Text Area Input</option>
                                            <option>E-mail Input</option>
                                            <option>Numeric Input</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_required_1" name="add_enquiries_set_fieldrequired"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_required_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_active_1" name="add_enquiries_set_fieldactive"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_active_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button class="btn btn-danger confirm-delete" type="button"
                                            onclick="remove_additional_fields(' + field + ');"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                            </div> --}}

                            <div id="additional_fields" class="mb-0 mt-3"></div>
                            </form>
                        </div>

                        <div class="card-additional-field">

                            <form class="row">
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="add_enquiries_set_field_order"
                                        name="add_enquiries_set_field_order" placeholder="Order">

                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="add_enquiries_set_field_name"
                                        name="add_enquiries_set_field_name" placeholder="Field Name">

                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control select2" id="add_enquiries_set_field_type"
                                        name="add_enquiries_set_field_type">
                                        <option>Field type</option>
                                        <option>Text Input</option>
                                        <option>Text Area Input</option>
                                        <option>E-mail Input</option>
                                        <option>Numeric Input</option>
                                    </select>

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_required_1" name="add_enquiries_set_fieldrequired"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_required_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1"
                                                id="add_enquiries_set_field_active_1" name="add_enquiries_set_fieldactive"
                                                checked>
                                            <label class="custom-control-label"
                                                for="add_enquiries_set_field_active_1">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-success" type="button" onclick="additional_fields();"><i
                                            class="ti-plus"></i></button>

                                </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group text-center mb-0">
                            <button type="submit" class="btn btn-lg btn-success btn-save-field">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection @section('modal')

    <div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h4 class="modal-title">View</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
                </div>
                <form action="#" class="needs-validation" novalidate>
                    <div class="card">
                        <div class="form-body">
                            <div class="card-body pb-0">

                                <div class="row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Name</label>
                                    <label class="col-sm-9 control-label col-form-label"> พรพิมล </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                                    <label class="col-sm-9 control-label col-form-label"> phonpimon_yim@gmail.com </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                    <label class="col-sm-9 control-label col-form-label"> 062-8912237 </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Message</label>
                                    <div class="col-sm-9">
                                        <p>
                                            เพลซแฟรี่แมนชั่นเทวาธิราช จตุคามสุริยยาตร์ซิ้มวีซ่าเวณิกา
                                            แบดแมมโบ้ปักขคณนาโรแมนติกบอยคอตต์ เซอร์ไพรส์ปูอัด นินจากู๋บอร์ดแกสโซฮอล์ วิว
                                            อันตรกิริยา
                                            รันเวย์ผิดพลาด ฟลุทแจ็กพ็อตราชานุญาต ไง เอสเปรสโซภารตะโนติส ไวอากร้า
                                            โนติสเคลียร์ฮาลาลจ๊าบ ดีพาร์ตเมนต์คาเฟ่
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Submitted Date</label>
                                    <label class="col-sm-9 control-label col-form-label"> 13/08/2020 10:33 </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Updated Date</label>
                                    <label class="col-sm-9 control-label col-form-label"> 14/08/2020, 09:47:197 </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <label class="col-sm-9 control-label col-form-label"> New </label>
                                </div>

                                <hr class="style-dot">

                                <form id="">
                                    <div class="row">
                                        <!-- <div class="col-md-2"></div> -->
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control form-control-danger" id="add_enquiries_comment"
                                                name="add_enquiries_comment" rows="4" placeholder="Comment..."></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <select class="form-control select2" id="search_news_seo_category"
                                                name="search_news_seo_category">
                                                <option>Choose status</option>
                                                <option value="">Pending</option>
                                                <option value="">Contacted</option>
                                                <option value="">Lost</option>
                                            </select>
                                            <small class="form-text text-muted">Choose an option or skip to the end</small>
                                        </div>
                                        <!-- <div class="col-md-2"></div> -->
                                        <div class="col-md-12 form-group text-center">
                                            <button type="submit" class="btn btn-success waves-effect waves-light" id=""
                                                name="">Post</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title">Comments <small class="">(4 items)</small> </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-normal mb-1"> <i
                                                                class="mdi mdi-autorenew font-20"></i> Change status to
                                                            Contacted </h5>
                                                        <span class="text-muted mr-2 font-12">Posted by: Admin Smile |
                                                            14/08/2020, 09:47:19</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-normal mb-1"> <i
                                                                class="mdi mdi-message-reply-text font-20"></i>
                                                            ติดต่อลูกค้าแล้ว ส่งต่อลูกค้าให้ Sale แล้ว</h5>
                                                        <span class="text-muted mr-2 font-12">Posted by: Admin Smile |
                                                            14/08/2020, 09:47:19</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-normal mb-1"> <i
                                                                class="mdi mdi-autorenew font-20"></i> Change status to
                                                            Pending </h5>
                                                        <span class="text-muted mr-2 font-12">Posted by: Admin Smile |
                                                            13/08/2020, 10:33:12</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-normal mb-1"> <i
                                                                class="mdi mdi-message-reply-text font-20"></i>
                                                            ยังติดต่อลูกค้าไม่ได้ รอติดต่อใหม่วันพรุ่งนี้</h5>
                                                        <span class="text-muted mr-2 font-12">Posted by: Admin Smile |
                                                            13/08/2020, 10:33:12</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="col-md-2"></div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script>

        $(document).ready(function() {
            var formType = $('#form_type').val();
            // ---------------- CkeEditor
            CKEDITOR.replace('add_enquiry_setting_contact', {
                height: 200
            }); // End

            $('body').on('click', '.btn-save-email', function(e) {
                e.preventDefault();
                var form = $('#FormEmail');
                console.log(form.serialize());
                loadingButton(form.find('button[type=submit]'));

                var method = '';
                var id = '';
                var url = '';
                if (formType == 'Add') {
                    method = 'POST';
                    url = url_gb + "/admin/EnquiriesSetting";
                } else {
                    method = 'PUT';
                    id = $('#edit_id').val();
                    url = url_gb + "/admin/EnquiriesSetting/" + id;
                }

                $.ajax({
                    method: method,
                    url: url,
                    data: form.serialize()
                }).done(function(res) {
                    // console.log(res);
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        // form[0].reset();
                        // $('#ModalEdit').modal('hide');
                        // tableFaqs.api().ajax.reload();
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('click', '.btn-save-meta', function(e) {
                e.preventDefault();
                var form = $('#FormMeta');
                loadingButton(form.find('button[type=submit]'));

                var method = '';
                var id = '';
                var url = '';
                if (formType == 'Add') {
                    method = 'POST';
                    url = url_gb + "/admin/EnquiriesSetting";
                } else {
                    method = 'PUT';
                    id = $('#edit_id').val();
                    url = url_gb + "/admin/EnquiriesSetting/" + id;
                }

                $.ajax({
                    method: method,
                    url: url,
                    data: form.serialize()
                }).done(function(res) {
                    console.log(res);
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        // form[0].reset();
                        // $('#ModalEdit').modal('hide');
                        // tableFaqs.api().ajax.reload();
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('click', '.btn-save-field', function(e) {
                e.preventDefault();
                var form = $('#FormField');
                loadingButton(form.find('button[type=submit]'));

                var method = '';
                var id = '';
                var url = '';
                // if (formType == 'Add') {
                method = 'POST';
                url = url_gb + "/admin/EnquiriesSetting/AddFieldInput";
                // } else {
                //     method = 'PUT';
                //     id = $('#edit_id').val();
                //     url = url_gb + "/admin/EnquiriesSetting/" + id;
                // }

                $.ajax({
                    method: method,
                    url: url,
                    data: form.serialize()
                }).done(function(res) {
                    console.log(res);
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        // form[0].reset();
                        // $('#ModalEdit').modal('hide');
                        form.api().ajax.reload();
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('change', '.upload-news-img', function() {
                var ele = $(this);
                $('#' + ele[0].id + '_temp').remove();
                var index = ele.data('index');
                var formData = new FormData();
                formData.append('file', ele[0].files[0]);
                // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/EnquiriesImageTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        $('#' + ele[0].id).append('<input type="hidden" id="' + ele[0].id +
                            '_temp"  name="' + ele[0].id.replace("add_", "") + '" value="' +
                            res.path + '">');
                        setTimeout(function() {}, 100);
                    }
                });
            });

            // $('body').on('submit', '#FormEmail', function(e) {
            //     console.log('formemail');
            //     e.preventDefault();
            //     var form = $(this);
            //     console.log(form);
            //     return;
            //     var id = $('#edit_id').val();
            //     loadingButton(form.find('button[type=submit]'));
            //     $.ajax({
            //         method: "PUT",
            //         url: url_gb + "/admin/Faqs/" + id,
            //         data: form.serialize()
            //     }).done(function(res) {
            //         resetButton(form.find('button[type=submit]'));
            //         if (res.status == 1) {
            //             Swal.fire(res.title, res.content, 'success');
            //             form[0].reset();
            //             $('#ModalEdit').modal('hide');
            //             tableFaqs.api().ajax.reload();
            //         } else {
            //             Swal.fire(res.title, res.content, 'error');
            //         }
            //     }).fail(function(res) {
            //         resetButton(form.find('button[type=submit]'));
            //         Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            //     });
            // });

            // $(".confirm-delete").click(function() {
            //     console.log($(this));
            //     Swal.fire({
            //         title: "Are you sure?",
            //         text: "You will not be able to recover this Field!",
            //         type: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#3085d6",
            //         cancelButtonColor: "#d33",
            //         confirmButtonText: "Yes"
            //     }).then((result) => {
            //         if (result.value) {
            //             Swal.fire(
            //                 "Success!",
            //                 "The Field has been removed.",
            //                 "success"
            //             )
            //         }
            //     })
            // });

            //Success Message
            // $('.btn-save-email').click(function() {
            //     console.log('email');
            //     Swal.fire("Good job!",
            //         "Your work has been saved.",
            //         "success")
            // });

        });

        var field = 0;
        if($('#count_field').val() != 0){
            field = $('#count_field').val();
        }
        function additional_fields() {

            var objTo = document.getElementById('additional_fields');
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + field);
            var rdiv = 'removeclass' + field;
            divtest.innerHTML =
                '<div class="row"> <div class="col-sm-2"> <div class="form-group"> <input type="number" class="form-control" id="add_enquiries_set_field_order" name="field['+field+'][enquiry_fields_order_by]" placeholder="Order"> </div> </div> <div class="col-sm-3"> <div class="form-group"> <input type="text" class="form-control" id="add_enquiries_set_field_name" name="field['+field+'][enquiry_fields_name]" placeholder="Field Name"> </div> </div> <div class="col-sm-2"> <div class="form-group"> <select class="form-control select2" id="add_enquiries_set_field_type" name="field['+field+'][enquiry_fields_type]"> <option value="">Field type</option> <option value="1">Text Input</option> <option value="2">Text Area Input</option> <option value="3">E-mail Input</option> <option value="4">Numeric Input</option> </select> </div> </div> <div class="col-sm-2"> <div class="form-check form-check-inline"> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" value="1" id="add_enquiries_set_field_required_'+field+'" name="field['+field+'][enquiry_fields_required]" checked> <label class="custom-control-label" for="add_enquiries_set_field_required_'+field+'">Yes</label> </div> </div> </div> <div class="col-sm-2"> <div class="form-check form-check-inline"> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" value="1" id="add_enquiries_set_field_active_'+field+'" name="field['+field+'][enquiry_fields_status]" checked> <label class="custom-control-label" for="add_enquiries_set_field_active_'+field+'">Yes</label> </div> </div> </div> <div class="col-sm-1"> <div class="form-group"> <button class="btn btn-danger" type="button" onclick="remove_additional_fields(' +
                field + ');"><i class="ti-minus"></i></button> </div> </div> </div>';

            objTo.appendChild(divtest);
            field++;

        }

        function remove_additional_fields(rid) {
            $('.removeclass' + rid).remove();
        }

    </script>

@endsection
