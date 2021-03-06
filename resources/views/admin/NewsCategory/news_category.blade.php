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

        .dt-buttons {
            display: none;
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
                    <h4 class="card-title">Search</h4>
                    <form id="FormSearch">
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_news_seo_category">News Category</label>
                                    <select
                                        class="form-control custom-select select_manager-add select2"
                                        multiple="" style="height: 36px;width: 100%;"
                                        id="search_news_category_id" name="news_category_id[]" placeholder="Select">
                                        @foreach ($NewsCategory as $val)
                                            <option value="{{$val['news_category_id']}}">{{$val['news_category_mata_title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_news_seo_status">Status</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="all"
                                                id="search_news_status" name="search_news_status" checked>
                                            <label class="custom-control-label" for="search_news_status">All</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1"
                                                id="search_news_status_1" name="search_news_status">
                                            <label class="custom-control-label" for="search_news_status_1">On</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0"
                                                id="search_news_status_2" name="search_news_status">
                                            <label class="custom-control-label" for="search_news_status_2">Off</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="row pb-3">
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="button" class="btn btn-info btn-search">Search</button>
                            <button type="button" class="btn btn-secondary clear-search btn-clear-search">Clear</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $MainMenus->menu_system_name }}</h4>
                        <button type="button" class="btn btn-success m-t-10 mb-2 float-right newdata btn-add">Add News
                            Category</button>
                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                                <span class="badge badge-secondary"><i class="ti-check"></i></span> Check All
                            </a>
                            <a href="javascript:void(0)" class="checkbox-changstatus pr-3">
                                <span class="badge badge-warning"><i class="icon-refresh"></i></span> Chang Status
                            </a>
                            <a href="javascript:void(0)" class="checkbox-deleteselect pr-3">
                                <span class="badge badge-danger"><i class="ti-trash"></i></span> Delete Selected
                            </a>
                        </div>
                        <table class="table" id="tableNewCategory">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"></th>
                                    <th scope="col">No.</th>
                                    <th scope="col">News Category</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td scope="row" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table"
                                                id="SelectNews1" required>
                                            <label class="custom-control-label" for="SelectNews1"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">1</th>
                                    <td>2</td>
                                    <td>ข่าวบันเทิง</td>
                                    <td>1,523,690</td>
                                    <td>13/08/2020 10:33 - Admin Smile</td>
                                    <td>13/08/2020 12:17 - Admin Smile</td>
                                    <td>
                                        <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle"
                                            data-style="ios" data-on="On" data-off="Off">
                                        <button type="button" data-toggle="tooltip" title="Edit"
                                            class="btn btn-warning btn-md btn-add">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="Delete"
                                            class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table"
                                                id="SelectNews2" required>
                                            <label class="custom-control-label" for="SelectNews2"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">2</th>
                                    <td>3</td>
                                    <td>ข่าวในท้องถิ่น</td>
                                    <td>78,549</td>
                                    <td> 01/09/2020 16:40 - Tom & Jerry </td>
                                    <td></td>
                                    <td>
                                        <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle"
                                            data-style="ios" data-on="On" data-off="Off">
                                        <button type="button" data-toggle="tooltip" title="Edit"
                                            class="btn btn-warning btn-md btn-add">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="Delete"
                                            class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table"
                                                id="SelectNews3" required>
                                            <label class="custom-control-label" for="SelectNews3"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">3</th>
                                    <td>1</td>
                                    <td>ข่าวกีฬา</td>
                                    <td>152,003</td>
                                    <td> 10/08/2020 21:05 - สาธิต กรีฑา </td>
                                    <td></td>
                                    <td>
                                        <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle"
                                            data-style="ios" data-on="On" data-off="Off">
                                        <button type="button" data-toggle="tooltip" title="Edit"
                                            class="btn btn-warning btn-md btn-add">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="Delete"
                                            class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection @section('modal')

    <div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">Add News Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                                class="mdi mdi-close"></i></span></button>
                </div>
                <form id="FormAdd" class="needs-validation" novalidate>
                    <div class="form-body">
                        <div class="card-body pb-0">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach ($Language as $key => $value)
                                            <li class="nav-item"> <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                    aria-selected="{{ $key == 0 ? true : false }}" data-toggle="tab"
                                                    href="#{{ $value['languages_code'] }}_tap" role="tab"><span
                                                        class="hidden-sm-up"><i
                                                            class="{{ $value['languages_icon'] }}"></i></span> <span
                                                        class="hidden-xs-down">{{ $value['languages_name'] }}</span></a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#set-tap"
                                                role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span>
                                                <span class="hidden-xs-down">Setting</span></a> </li>
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)

                                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                                id="{{ $value['languages_code'] }}_tap" role="tabpanel">
                                                <div class="form-horizontal form-upload">
                                                    <input type="hidden" id="languages_code"
                                                        name="news_category_details[{{ $value['languages_code'] }}][news_category_details_languages_code]"
                                                        value="{{ $value['languages_code'] }}">
                                                    <input type="hidden" id="languages_id"
                                                        name="news_category_details[{{ $value['languages_code'] }}][languages_id]"
                                                        value="{{ $value['languages_id'] }}">
                                                    <div class="form-group row">
                                                        <label for="add_news_category_name"
                                                            class="col-sm-3 text-right control-label col-form-label">News
                                                            Category Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="add_news_category_name"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_name]"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Short
                                                            Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                id="add_news_category_short_description"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_short_description]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_category_content_details"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                id="add_news_category_content_details_{{ $value['languages_code'] }}"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_details]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <input type="checkbox" class="toggle edit-status"
                                                                id="add_news_category_details_status"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_status]"
                                                                checked data-toggle="toggle" data-style="ios" data-on="On"
                                                                data-off="Off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Seo
                                                            Type</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio"
                                                                        class="custom-control-input seo-type-{{ $value['languages_code'] }}"
                                                                        value="0"
                                                                        id="add_news_category_details_seo_type_{{ $value['languages_code'] }}"
                                                                        name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_type]"
                                                                        checked>
                                                                    <label class="custom-control-label"
                                                                        for="add_news_category_details_seo_type_{{ $value['languages_code'] }}">ใช้
                                                                        SEO หลัก</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio"
                                                                        class="custom-control-input seo-type-{{ $value['languages_code'] }}"
                                                                        value="1"
                                                                        id="add_news_category_details_seo_type_{{ $value['languages_code'] }}_1"
                                                                        name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_type]">
                                                                    <label class="custom-control-label"
                                                                        for="add_news_category_details_seo_type_{{ $value['languages_code'] }}_1">ใช้
                                                                        SEO ตามภาษา</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="seo_tap_{{ $value['languages_code'] }}" style="display: none;">
                                                        <div class="form-group row pb-3">
                                                            <label for="add_news_category_short_description"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Title</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="add_news_category_details_seo_title"
                                                                    name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_title]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row pb-3">
                                                            <label for="add_news_category_short_description"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Keyword</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="add_news_category_details_seo_keyword"
                                                                    name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_keyword]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row pb-3">
                                                            <label for="add_news_category_short_description"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Description</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="add_news_category_details_seo_description"
                                                                    name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_description]">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr class="style-dot">

                                                    <div class="form-group row">
                                                        <label for="add_news_banner_slide_image"
                                                            class="col-sm-3 text-right control-label col-form-label">Banner
                                                            Slide</label>
                                                        <div class="col-sm-9">
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                    class="custom-file-input upload-news-banner-img-{{ $value['languages_code'] }} form-control"
                                                                    id="add_news_banner_slide_image" name="news_banner_slide_image[]" accept="image/*" multiple>
                                                                <label class="custom-file-label"
                                                                    id="add_news_banner_slide_image_txt_{{ $value['languages_code'] }}"
                                                                    for="add_news_banner_slide_image">Choose
                                                                    Image...</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="add_news_banner_slide_alt"
                                                            class="col-sm-3 text-right control-label col-form-label">Alt
                                                            Text</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="add_news_banner_slide_alt_{{ $value['languages_code'] }}"
                                                                name="news_category[news_banner_slide_alt]" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="add_news_banner_slide_url_slug"
                                                            class="col-sm-3 text-right control-label col-form-label">URL
                                                            Link</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="add_news_banner_slide_url_slug_{{ $value['languages_code'] }}"
                                                                name="news_category[news_banner_slide_url_slug]"
                                                                placeholder="http://">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_details_alt_text"
                                                            class="col-sm-3 text-right control-label col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-success btn-rounded waves-effect waves-light"
                                                                id="btn_add_banner_{{ $value['languages_code'] }}"
                                                                name="btn_add_banner">Add more banner</a>
                                                        </div>
                                                    </div>

                                                    <div class="row draggable-cards"
                                                        id="draggable-area-{{ $value['languages_code'] }}">

                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach
                                        <!-- End Tap TH -->

                                        <div class="tab-pane" id="set-tap" role="tabpanel">

                                            {{-- <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div id="dZUpload" class="dropzone">
                                                        <div class="dz-default dz-message">
                                                            Drop files here or click to upload.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="show_image">
                                                </div>

                                            </div> --}}

                                            <div class="form-group row">
                                                <label for="add_news_category_url_slug"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_category_url_slug"
                                                        name="news_category[news_category_url_slug]" placeholder="http://"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_mata_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_category_mata_title"
                                                        name="news_category[news_category_mata_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_mata_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_category_mata_description"
                                                        name="news_category[news_category_mata_description]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_mata_keyword"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Keywords</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_category_mata_keyword"
                                                        name="news_category[news_category_mata_keyword]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_mata_author"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Author</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_category_mata_author"
                                                        name="news_category[news_category_mata_author]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_category_mata_robots"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Robots</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="1"
                                                                id="add_news_category_mata_robots_1"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_category_mata_robots_1">INDEX</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="2"
                                                                id="add_news_category_mata_robots_2"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_category_mata_robots_2">FOLLOW</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="3"
                                                                id="add_news_category_mata_robots_3"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_category_mata_robots_3">NOODP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="4"
                                                                id="add_news_category_mata_robots_4"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_category_mata_robots_4">NOYDIR</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_og_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_category_og_title"
                                                        name="news_category[news_category_og_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_category_og_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="add_news_category_og_description"
                                                        name="news_category[news_category_og_description]"
                                                        rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_twitter_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_category_twitter_title"
                                                        name="news_category[news_category_twitter_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_twitter_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control"
                                                        id="add_news_category_twitter_description"
                                                        name="news_category[news_category_twitter_description]"
                                                        rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_category_og_twitter_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-category-img form-control"
                                                            id="add_news_category_og_twitter_image" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile" id="add_news_category_og_twitter_image_txt">Choose
                                                            Image...</label>
                                                        <small class="form-text text-muted">Recommended Size: 1200 x 630
                                                            pixel</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_category_status"
                                                        name="news_category[news_category_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_category_thumnail_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-category-img form-control"
                                                            id="add_news_category_thumnail_image" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile" id="add_news_category_thumnail_image_txt">Choose
                                                            Image...</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_category_alt_text"
                                                    class="col-sm-3 text-right control-label col-form-label">Alt
                                                    Text</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_category_alt_text"
                                                        name="news_category[news_category_alt_text]">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="add_news_category_banner_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_category_banner_status"
                                                        name="news_category[news_category_banner_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                        </div> <!-- End Tap Setting -->

                                    </div> <!-- End Tab panes -->

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-lg btn-success">Save</button>
                                <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">Edit News Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                                class="mdi mdi-close"></i></span></button>
                </div>
                <form id="FormEdit" class="needs-validation" novalidate>
                    <input type="hidden" id="edit_id">
                    <div class="form-body">
                        <div class="card-body pb-0">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach ($Language as $key => $value)
                                            <li class="nav-item"> <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                    aria-selected="{{ $key == 0 ? true : false }}" data-toggle="tab"
                                                    href="#{{ $value['languages_code'] }}_tap_edit" role="tab"><span
                                                        class="hidden-sm-up"><i
                                                            class="{{ $value['languages_icon'] }}"></i></span> <span
                                                        class="hidden-xs-down">{{ $value['languages_name'] }}</span></a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#set-tap-edit"
                                                role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span>
                                                <span class="hidden-xs-down">Setting</span></a> </li>
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)

                                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                                id="{{ $value['languages_code'] }}_tap_edit" role="tabpanel">
                                                <div class="form-horizontal form-upload">
                                                    <input type="hidden" id="languages_code"
                                                        name="news_category_details[{{ $value['languages_code'] }}][news_category_details_languages_code]"
                                                        value="{{ $value['languages_code'] }}">
                                                    <input type="hidden" id="languages_id"
                                                        name="news_category_details[{{ $value['languages_code'] }}][languages_id]"
                                                        value="{{ $value['languages_id'] }}">
                                                    <input type="hidden"
                                                        id="edit_news_category_details_id_{{ $value['languages_code'] }}"
                                                        name="news_category_details[{{ $value['languages_code'] }}][news_category_details_id]"
                                                        value="">
                                                    <div class="form-group row">
                                                        <label for="edit_news_category_name"
                                                            class="col-sm-3 text-right control-label col-form-label">News
                                                            Category Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="edit_news_category_details_name_{{ $value['languages_code'] }}"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_name]"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="edit_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Short
                                                            Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                id="edit_news_category_details_short_description_{{ $value['languages_code'] }}"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_short_description]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="edit_news_category_content_details"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                id="edit_news_category_details_details_{{ $value['languages_code'] }}"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_details]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group row">
                                                        <label for="edit_page_meta_robots_th"
                                                            class="col-sm-3 text-right  col-form-label">Banner Slide</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-group row custom-switch  mb-0 ">
                                                                <input type="checkbox" class="custom-control-input  "
                                                                    id="status-share_bt-edit" checked>
                                                                <label class="custom-control-label control-label col-sm-3"
                                                                    for="status-share_bt-edit"></label>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    <div class="form-group row">
                                                        <label for="edit_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <div class="col-sm-9 custom-switch mb-0">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_status]"
                                                                id="edit_news_category_details_status_{{ $value['languages_code'] }}"
                                                                checked>
                                                            <label class="custom-control-label control-label col-sm-3"
                                                                for="edit_news_category_details_status_{{ $value['languages_code'] }}"></label>
                                                            {{-- <input type="checkbox"
                                                                class="toggle edit-status"
                                                                id="edit_news_category_details_status_{{ $value['languages_code'] }}"
                                                                name="news_category_details[{{ $value['languages_code'] }}][news_category_details_status]"
                                                                data-toggle="toggle" data-style="ios" data-on="On"
                                                                data-off="Off"> --}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="edit_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Seo
                                                            Type</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio"
                                                                        class="custom-control-input edit-seo-type-{{ $value['languages_code'] }}"
                                                                        value="0"
                                                                        id="edit_news_category_details_seo_type_{{ $value['languages_code'] }}"
                                                                        name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_type]"
                                                                        checked>
                                                                    <label class="custom-control-label"
                                                                        for="edit_news_category_details_seo_type_{{ $value['languages_code'] }}">ใช้
                                                                        SEO หลัก</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio"
                                                                        class="custom-control-input edit-seo-type-{{ $value['languages_code'] }}"
                                                                        value="1"
                                                                        id="edit_news_category_details_seo_type_{{ $value['languages_code'] }}_1"
                                                                        name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_type]">
                                                                    <label class="custom-control-label"
                                                                        for="edit_news_category_details_seo_type_{{ $value['languages_code'] }}_1">ใช้
                                                                        SEO ตามภาษา</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="seo_edit_tap_{{ $value['languages_code'] }}"
                                                        style="display: none;">
                                                        <div class="form-group row pb-3">
                                                            <label for="edit_news_category_short_description"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Title</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="edit_news_category_details_seo_title_{{ $value['languages_code'] }}"
                                                                    name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_title]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row pb-3">
                                                            <label for="edit_news_category_short_description"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Keyword</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="edit_news_category_details_seo_keyword_{{ $value['languages_code'] }}"
                                                                    name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_keyword]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row pb-3">
                                                            <label for="edit_news_category_short_description"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Description</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="edit_news_category_details_seo_description_{{ $value['languages_code'] }}"
                                                                    name="news_category_details[{{ $value['languages_code'] }}][news_category_details_seo_description]">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr class="style-dot">

                                                    <div class="form-group row">
                                                        <label for="edit_news_banner_slide_image"
                                                            class="col-sm-3 text-right control-label col-form-label">Banner
                                                            Slide</label>
                                                        <div class="col-sm-9">
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                    class="custom-file-input edit-upload-news-banner-img-{{ $value['languages_code'] }} form-control"
                                                                    id="edit_news_banner_slide_image" accept="image/*">
                                                                <label class="custom-file-label"
                                                                    id="edit_news_banner_slide_image_txt_{{ $value['languages_code'] }}"
                                                                    for="edit_news_banner_slide_image">Choose
                                                                    Image...</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="edit_news_banner_slide_alt"
                                                            class="col-sm-3 text-right control-label col-form-label">Alt
                                                            Text</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="edit_news_banner_slide_alt_{{ $value['languages_code'] }}"
                                                                name="news_category[news_banner_slide_alt]" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="edit_news_banner_slide_url_slug"
                                                            class="col-sm-3 text-right control-label col-form-label">URL
                                                            Link</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="edit_news_banner_slide_url_slug_{{ $value['languages_code'] }}"
                                                                name="news_category[news_banner_slide_url_slug]"
                                                                placeholder="http://">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="edit_news_details_alt_text"
                                                            class="col-sm-3 text-right control-label col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-success btn-rounded waves-effect waves-light"
                                                                id="btn_edit_banner_{{ $value['languages_code'] }}"
                                                                name="btn_edit_banner">Add more banner</a>
                                                        </div>
                                                    </div>

                                                    <div class="row draggable-cards"
                                                        id="edit-draggable-area-{{ $value['languages_code'] }}">

                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach
                                        <!-- End Tap TH -->

                                        <div class="tab-pane" id="set-tap-edit" role="tabpanel">
                                            <div class="form-group row">
                                                <label for="edit_news_category_url_slug"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="edit_news_category_url_slug"
                                                        name="news_category[news_category_url_slug]" placeholder="http://"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_mata_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_category_mata_title"
                                                        name="news_category[news_category_mata_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_mata_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_category_mata_description"
                                                        name="news_category[news_category_mata_description]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_mata_keyword"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Keywords</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_category_mata_keyword"
                                                        name="news_category[news_category_mata_keyword]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_mata_author"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Author</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_category_mata_author"
                                                        name="news_category[news_category_mata_author]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_category_mata_robots"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Robots</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="1"
                                                                id="edit_news_category_mata_robots_1"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_category_mata_robots_1">INDEX</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="2"
                                                                id="edit_news_category_mata_robots_2"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_category_mata_robots_2">FOLLOW</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="3"
                                                                id="edit_news_category_mata_robots_3"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_category_mata_robots_3">NOODP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="4"
                                                                id="edit_news_category_mata_robots_4"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_category_mata_robots_4">NOYDIR</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_og_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="edit_news_category_og_title"
                                                        name="news_category[news_category_og_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_category_og_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="edit_news_category_og_description"
                                                        name="news_category[news_category_og_description]"
                                                        rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_twitter_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_category_twitter_title"
                                                        name="news_category[news_category_twitter_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_twitter_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control"
                                                        id="edit_news_category_twitter_description"
                                                        name="news_category[news_category_twitter_description]"
                                                        rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_category_og_twitter_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input edit-upload-news-category-img form-control"
                                                            id="edit_news_category_og_twitter_image" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                        <small class="form-text text-muted">Recommended Size: 1200 x 630
                                                            pixel</small>
                                                    </div>
                                                    <div class="card-body">
                                                        <img class="img-thumbnail"
                                                            id="edit_preview_news_category_og_twitter_image"
                                                            style="width:40%;"
                                                            src="{{ asset('uploads/images/no-image.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="edit_news_category_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="edit_news_category_status"
                                                        name="news_category[news_category_status]" data-toggle="toggle"
                                                        data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="edit_news_category_status"
                                                        name="news_category[news_category_status]" checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="edit_news_category_status"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_thumnail_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input edit-upload-news-category-img form-control"
                                                            id="edit_news_category_thumnail_image" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                    </div>
                                                    <div class="card-body">
                                                        <img class="img-thumbnail"
                                                            id="edit_preview_news_category_thumnail_image"
                                                            style="width:40%;"
                                                            src="{{ asset('uploads/images/no-image.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_category_alt_text"
                                                    class="col-sm-3 text-right control-label col-form-label">Alt
                                                    Text</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="edit_news_category_alt_text"
                                                        name="news_category[news_category_alt_text]">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row mb-3">
                                                <label for="edit_news_category_banner_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="edit_news_category_banner_status"
                                                        name="news_category[news_category_banner_status]"
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="edit_news_category_banner_status"
                                                        name="news_category[news_category_banner_status]" checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="edit_news_category_banner_status"></label>
                                                </div>
                                            </div>
                                        </div> <!-- End Tap Setting -->

                                    </div> <!-- End Tab panes -->

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-lg btn-success">Save</button>
                                <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">View</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                                class="mdi mdi-close"></i></span></button>
                </div>

                <form action="#" class="needs-validation" novalidate>
                    <div class="form-body">
                        <div class="card-body pb-0">
                            <div class="form-row">
                                <div class="col-md-12">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach ($Language as $key => $value)
                                            <li class="nav-item"> <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                    aria-selected="{{ $key == 0 ? true : false }}" data-toggle="tab"
                                                    href="#view_{{ $value['languages_code'] }}_tap" role="tab"><span
                                                        class="hidden-sm-up"><i
                                                            class="{{ $value['languages_icon'] }}"></i></span> <span
                                                        class="hidden-xs-down">{{ $value['languages_name'] }}</span></a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#view-set-tap"
                                                role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span>
                                                <span class="hidden-xs-down">Setting</span></a> </li>
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)
                                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                                id="view_{{ $value['languages_code'] }}_tap" role="tabpanel">
                                                <div class="form-horizontal form-upload">
                                                    <div class="row">
                                                        <label for="add_news_details_title"
                                                            class="col-sm-3 text-right control-label col-form-label">News
                                                            Category Name</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_category_details_name_{{ $value['languages_code'] }}"> -
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label for="add_news_details_link"
                                                            class="col-sm-3 text-right control-label col-form-label">Short
                                                            Description</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_category_details_short_description_{{ $value['languages_code'] }}"> -
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label for="add_news_category"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_category_details_details_{{ $value['languages_code'] }}"> -
                                                             </label>
                                                    </div>
                                                    <div class="row">
                                                        <label for="add_news_details_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_category_details_status_{{ $value['languages_code'] }}"> -
                                                             </label>
                                                    </div>
                                                    <div class="row">
                                                        <label for="add_news_details_content"
                                                            class="col-sm-3 text-right control-label col-form-label">Seo
                                                            Type</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_category_details_seo_type_{{ $value['languages_code'] }}"> -</label>
                                                    </div>

                                                    <div id="view_seo_{{ $value['languages_code'] }}"
                                                        style="display: none;">
                                                        <div class="row">
                                                            <label for="add_news_details_content"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Title</label>
                                                            <label class="col-sm-9 control-label col-form-label"
                                                                id="view_news_category_seo_title_{{ $value['languages_code'] }}">
                                                                Seo Title </label>
                                                        </div>

                                                        <div class="row">
                                                            <label for="add_news_details_content"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Keyword</label>
                                                            <label class="col-sm-9 control-label col-form-label"
                                                                id="view_news_category_seo_keyword_{{ $value['languages_code'] }}">
                                                                Seo Keyword </label>
                                                        </div>

                                                        <div class="row">
                                                            <label for="add_news_details_content"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Description</label>
                                                            <label class="col-sm-9 control-label col-form-label"
                                                                id="view_news_category_seo_description_{{ $value['languages_code'] }}">
                                                                Seo Description </label>
                                                        </div>
                                                    </div>

                                                    <hr class="style-dot">

                                                    <div class="row">

                                                        <div class="col-md-12 mb-3">
                                                            <h3 class="card-title">Banner Slide</h3>
                                                        </div>

                                                        <div id="view_banner_slide_{{ $value['languages_code'] }}">

                                                            {{-- <div
                                                                class="col-md-6 col-sm-12">
                                                                <div class="card">
                                                                    <div class="card-body card-border">
                                                                        <img class="img-responsive w-100 mb-3"
                                                                            id="preview_img_cover_add"
                                                                            src="{{ asset('uploads/images/cms/Banner/2506.jpg') }}">
                                                                        <h3 class="card-title">Alert Text : Cool refreshing
                                                                            shaving foam</h3>
                                                                        <p class="card-text"><i class="icon-link"></i> <a
                                                                                href="javascript:void(0)">https://intervision.co/en/89643216800s</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="card">
                                                                    <div class="card-body card-border">
                                                                        <img class="img-responsive w-100 mb-3"
                                                                            id="preview_img_cover_add"
                                                                            src="{{ asset('uploads/images/cms/Banner/2220.jpg') }}">
                                                                        <h3 class="card-title">Alert Text : Clean and fresh
                                                                            Perfume</h3>
                                                                        <p class="card-text"><i class="icon-link"></i> <a
                                                                                href="javascript:void(0)">https://intervision.co/en/00695656526</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="card">
                                                                    <div class="card-body card-border">
                                                                        <img class="img-responsive w-100 mb-3"
                                                                            id="preview_img_cover_add"
                                                                            src="{{ asset('uploads/images/cms/Banner/2705.jpg') }}">
                                                                        <h3 class="card-title">Alert Text : Face care
                                                                            whitening</h3>
                                                                        <p class="card-text"><i class="icon-link"></i> <a
                                                                                href="javascript:void(0)">https://intervision.co/en/98850213405</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="card">
                                                                    <div class="card-body card-border">
                                                                        <img class="img-responsive w-100 mb-3"
                                                                            id="preview_img_cover_add"
                                                                            src="{{ asset('uploads/images/cms/Banner/2951.jpg') }}">
                                                                        <h3 class="card-title">Alert Text : Thermal Water
                                                                            30SPF for dry skin </h3>
                                                                        <p class="card-text"> <i class="icon-link"></i> <a
                                                                                href="javascript:void(0)">https://intervision.co/en/55262535461</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div> --}}

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Tap TH -->

                                        <div class="tab-pane" id="view-set-tap" role="tabpanel">
                                            <div class="row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_url_slug">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Title</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_mata_title">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Description</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_mata_description">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Keywords</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_mata_keyword">- All</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Robots</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_mata_robots">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    title</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_og_title">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_og_description">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_twitter_title">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_twitter_description">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <img class="img-thumbnail" id="view_news_category_og_twitter_image"
                                                    style="width:30%;" src="{{ asset('uploads/images/no-image.jpg') }}">
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_status">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <img class="img-thumbnail" id="view_news_category_thumnail_image"
                                                    style="width:30%;" src="{{ asset('uploads/images/no-image.jpg') }}">
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Alt
                                                    Text</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_alt_text">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category_banner_status">-</label>
                                            </div>
                                        </div>
                                        <!-- End Tap Setting -->
                                    </div>
                                    <!-- End Tab panes -->
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group text-center mb-0">
                                <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
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
        var languages = <?=$Language?>;
        Dropzone.autoDiscover = false;
        $(document).ready(function() {

            $.each(languages, function(index, value) {

                CKEDITOR.replace('add_news_category_content_details_' + value.languages_code, {
                    height: 250
                });

                setTimeout(function() {
                    $('body').on('click', '.confirm-delete-banner-' + value.languages_code,
                        function() {
                            var ele = $(this);
                            $(ele).closest('div.banner-img-' + value.languages_code).remove();

                            $('#draggable-area-' + value.languages_code + ' .banner-img-' +
                                value.languages_code).each((idx, item) => {
                                $(item).find('#add_news_category_banner_slide_sort')
                                    .val(idx);
                            });

                            $('#edit-draggable-area-' + value.languages_code + ' .banner-img-' +
                                value.languages_code).each((idx, item) => {
                                $(item).find('#edit_news_category_banner_slide_sort')
                                    .val(idx);
                            });
                        });
                }, 3000);

                // $('body').on('change', '.upload-news-banner-img-' + value.languages_code, function() {
                //     var ele = $(this);
                //     var index = ele.data('index');
                //     var formData = new FormData();


                //     var totalfiles = document.getElementById('add_news_banner_slide_image').files.length;
                //     for (var index = 0; index < totalfiles; index++) {
                //         formData.append("files[]", document.getElementById('add_news_banner_slide_image').files[index]);
                //     }

                //     $.ajax({
                //         url: url_gb + '/admin/UploadImageMultiple/NewsCategoryBannerSlideTemp',
                //         type: 'POST',
                //         data: formData,
                //         processData: false, // tell jQuery not to process the data
                //         contentType: false, // tell jQuery not to set contentType
                //         success: function(res) {
                //             console.log(res);
                //             ele.closest('#FormAdd').find('#' + ele[0].id).append(
                //                 '<input type="hidden" id="' + ele[0].id + '_temp_' +
                //                 value.languages_code + '"  name="' + ele[0].id
                //                 .replace("add_", "") + '" value="' + res.path + '">'
                //                 );
                //             setTimeout(function() {}, 100);
                //         }
                //     });
                // });

                $('body').on('change', '.upload-news-banner-img-' + value.languages_code, function() {
                    var ele = $(this);
                    var index = ele.data('index');
                    var formData = new FormData();
                    formData.append('file', ele[0].files[0]);
                    // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                    $.ajax({
                        url: url_gb + '/admin/UploadImage/NewsCategoryBannerSlideTemp',
                        type: 'POST',
                        data: formData,
                        processData: false, // tell jQuery not to process the data
                        contentType: false, // tell jQuery not to set contentType
                        success: function(res) {
                            ele.closest('#FormAdd').find('#' + ele[0].id).append(
                                '<input type="hidden" id="' + ele[0].id + '_temp_' +
                                value.languages_code + '"  name="' + ele[0].id
                                .replace("add_", "") + '" value="' + res.path + '">'
                                );
                            setTimeout(function() {}, 100);
                        }
                    });
                });

                $('body').on('change', '.edit-upload-news-banner-img-' + value.languages_code, function() {
                    var ele = $(this);
                    var index = ele.data('index');
                    var formData = new FormData();
                    formData.append('file', ele[0].files[0]);
                    // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                    $.ajax({
                        url: url_gb + '/admin/UploadImage/NewsCategoryBannerSlideTemp',
                        type: 'POST',
                        data: formData,
                        processData: false, // tell jQuery not to process the data
                        contentType: false, // tell jQuery not to set contentType
                        success: function(res) {
                            ele.closest('#FormEdit').find('#' + ele[0].id).append(
                                '<input type="hidden" id="' + ele[0].id + '_temp_' +
                                value.languages_code + '"  name="' + ele[0].id
                                .replace("edit_", "") + '" value="' + res.path +
                                '">');
                            setTimeout(function() {}, 100);
                        }
                    });
                });

                $('body').on('change', '.seo-type-' + value.languages_code + ':checked', function(data) {
                    if ($(".seo-type-" + value.languages_code + ":checked").val() == '1') {
                        $("#seo_tap_" + value.languages_code).css("display", "block");
                    } else {
                        $("#seo_tap_" + value.languages_code).css("display", "none");
                    }
                });

                var key_banner = 0;
                $('body').on('click', '#btn_add_banner_' + value.languages_code, function(e) {
                    const news_banner_slide_image = $('#add_news_banner_slide_image_temp_' + value
                        .languages_code).val();
                    const news_banner_slide_alt = $('#add_news_banner_slide_alt_' + value
                        .languages_code).val();
                    const news_banner_slide_url_slug = $('#add_news_banner_slide_url_slug_' + value
                        .languages_code).val();

                    if (news_banner_slide_image !== undefined) {

                        let html = `<div class="col-md-6 col-sm-12 banner-img-` + value
                            .languages_code + `">
                                        <input type="hidden" id="languages_code" name="news_category_banner[` + value
                            .languages_code + `][` + key_banner +
                            `][news_category_banner_slide_languages_code]" value="` + value
                            .languages_code + `">
                                        <input type="hidden" id="languages_id" name="news_category_banner[` + value
                            .languages_code + `][` + key_banner + `][languages_id]" value="` + value
                            .languages_id +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_image" name="news_category_banner[` +
                            value.languages_code + `][` + key_banner +
                            `][news_category_banner_slide_image]" value="` +
                            news_banner_slide_image +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_alt" name="news_category_banner[` +
                            value.languages_code + `][` + key_banner +
                            `][news_category_banner_slide_alt]" value="` + news_banner_slide_alt +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_url_slug" name="news_category_banner[` + value.languages_code + `][` +
                            key_banner + `][news_category_banner_slide_url_slug]" value="` +
                            news_banner_slide_url_slug +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_sort" name="news_category_banner[` +
                            value.languages_code + `][` + key_banner +
                            `][news_category_banner_slide_sort]" value="` + key_banner + `">
                                        <div class="card  card-hover">
                                            <div class="text-right pt-2 pr-2">
                                                <a href="javascript:void(0)" class="confirm-delete-banner-` + value
                            .languages_code + `"><i class="ti-close"></i></a>
                                            </div>
                                            <div class="card-body pt-0">
                                                <img class="img-responsive w-100 mb-3" id="preview_img_cover_add_` + value
                            .languages_code + `" src="{{ asset('uploads/` +
                            news_banner_slide_image + `') }}">
                                                <h3 class="card-title">Alert Text : ` + news_banner_slide_alt + `</h3>
                                                <p class="card-text"><i class="icon-link"></i> ` +
                            news_banner_slide_url_slug + `</p>
                                            </div>
                                        </div>
                                    </div>`;

                        $('#draggable-area-' + value.languages_code).append(html);
                        $('#add_news_banner_slide_image_' + value.languages_code).val('');
                        $('#add_news_banner_slide_image_txt_' + value.languages_code).text(
                            'Choose Image...');
                        $('#add_news_banner_slide_image_temp_' + value.languages_code).remove();
                        $('#add_news_banner_slide_alt_' + value.languages_code).val('');
                        $('#add_news_banner_slide_url_slug_' + value.languages_code).val('');
                        key_banner++;
                    } else {
                        Swal.fire("Please select image!", 'Add unsuccessful', 'error');
                    }
                });

                setTimeout(function() {
                    var key_banner_edit = 0;
                    $('body').on('click', '#btn_edit_banner_' + value.languages_code, function(e) {

                        $('#edit-draggable-area-' + value.languages_code + ' .banner-img-' +
                            value.languages_code).each((idx, item) => {
                            key_banner_edit = idx + 1;
                            $(item).find('#edit_news_category_banner_slide_sort')
                                .val(idx);
                        });

                        const news_banner_slide_image = $(
                            '#edit_news_banner_slide_image_temp_' + value.languages_code
                            ).val();
                        const news_banner_slide_alt = $('#edit_news_banner_slide_alt_' +
                            value.languages_code).val();
                        const news_banner_slide_url_slug = $(
                                '#edit_news_banner_slide_url_slug_' + value.languages_code)
                            .val();

                        if (news_banner_slide_image !== undefined) {

                            let html = `<div class="col-md-6 col-sm-12 banner-img-` + value
                                .languages_code + `">
                                            <input type="hidden" id="languages_code" name="news_category_banner[` + value
                                .languages_code + `][` + key_banner_edit +
                                `][news_category_banner_slide_languages_code]" value="` +
                                value.languages_code + `">
                                            <input type="hidden" id="languages_id" name="news_category_banner[` + value
                                .languages_code + `][` + key_banner_edit +
                                `][languages_id]" value="` + value.languages_id +
                                `">
                                            <input type="hidden" class="form-control" id="edit_news_category_banner_slide_image" name="news_category_banner[` + value
                                .languages_code + `][` + key_banner_edit +
                                `][news_category_banner_slide_image]" value="` +
                                news_banner_slide_image +
                                `">
                                            <input type="hidden" class="form-control" id="edit_news_category_banner_slide_alt" name="news_category_banner[` +
                                value.languages_code + `][` + key_banner_edit +
                                `][news_category_banner_slide_alt]" value="` +
                                news_banner_slide_alt +
                                `">
                                            <input type="hidden" class="form-control" id="edit_news_category_banner_slide_url_slug" name="news_category_banner[` +
                                value.languages_code + `][` + key_banner_edit +
                                `][news_category_banner_slide_url_slug]" value="` +
                                news_banner_slide_url_slug +
                                `">
                                            <input type="hidden" class="form-control" id="edit_news_category_banner_slide_sort" name="news_category_banner[` +
                                value.languages_code + `][` + key_banner_edit +
                                `][news_category_banner_slide_sort]" value="` +
                                key_banner_edit + `">
                                            <div class="card  card-hover">
                                                <div class="text-right pt-2 pr-2">
                                                    <a href="javascript:void(0)" class="confirm-delete-banner-` + value
                                .languages_code + `"><i class="ti-close"></i></a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <img class="img-responsive w-100 mb-3" id="preview_img_cover_edit_` +
                                value.languages_code + `" src="{{ asset('uploads/` +
                                news_banner_slide_image + `') }}">
                                                    <h3 class="card-title">Alert Text : ` + news_banner_slide_alt + `</h3>
                                                    <p class="card-text"><i class="icon-link"></i> ` +
                                news_banner_slide_url_slug + `</p>
                                                </div>
                                            </div>
                                        </div>`;

                            $('#edit-draggable-area-' + value.languages_code).append(html);
                            $('#edit_news_banner_slide_image_' + value.languages_code).val(
                                '');
                            $('#edit_news_banner_slide_image_txt_' + value.languages_code)
                                .text('Choose Image...');
                            $('#edit_news_banner_slide_image_temp_' + value.languages_code)
                                .remove();
                            $('#edit_news_banner_slide_alt_' + value.languages_code).val(
                            '');
                            $('#edit_news_banner_slide_url_slug_' + value.languages_code)
                                .val('');
                            key_banner_edit++;
                        } else {
                            Swal.fire("Please select image!", 'Add unsuccessful', 'error');
                        }
                    });
                }, 3000);

                $('body').on('change', '#edit_news_category_details_status_' + value.languages_code,
                    function() {
                        if ($(this).is(':checked')) {
                            $('#edit_news_category_details_status_' + value.languages_code).val(1);
                        } else {
                            $('#edit_news_category_details_status_' + value.languages_code).val(0);
                        }
                    })

                $(function() {
                    var drake = dragula([document.getElementById("draggable-area-" + value
                        .languages_code)]);
                    dragula([document.getElementById("card-colors")]).on("drag", function(e) {
                        e.className = e.className.replace("card-moved", "")
                    }).on("drop", function(e) {
                        e.className += " card-moved"
                        console.log('moved');
                    }).on("over", function(e, t) {
                        t.className += " card-over"
                    }).on("out", function(e, t) {
                        t.className = t.className.replace("card-over", "")
                    }), dragula([document.getElementById("copy-left"), document.getElementById(
                        "copy-right")], {
                        copy: !0
                    }), dragula([document.getElementById("left-handles"), document
                        .getElementById("right-handles")
                    ], {
                        moves: function(e, t, n) {
                            console.log('moved');
                            return n.classList.contains("handle")
                        }
                    }), dragula([document.getElementById("left-titleHandles"), document
                        .getElementById("right-titleHandles")
                    ], {
                        moves: function(e, t, n) {
                            return n.classList.contains("titleArea")
                        }
                    })

                    drake.on('drop', function(el, target, source, sibling) {
                        $('#draggable-area-' + value.languages_code + ' .banner-img-' +
                            value.languages_code).each((idx, item) => {
                            $(item).find('#add_news_category_banner_slide_sort')
                                .val(idx);
                        });
                    });
                });

                $(function() {
                    var drake = dragula([document.getElementById("edit-draggable-area-" + value
                        .languages_code)]);
                    dragula([document.getElementById("card-colors")]).on("drag", function(e) {
                        e.className = e.className.replace("card-moved", "")
                    }).on("drop", function(e) {
                        e.className += " card-moved"
                        console.log('moved');
                    }).on("over", function(e, t) {
                        t.className += " card-over"
                    }).on("out", function(e, t) {
                        t.className = t.className.replace("card-over", "")
                    }), dragula([document.getElementById("copy-left"), document.getElementById(
                        "copy-right")], {
                        copy: !0
                    }), dragula([document.getElementById("left-handles"), document
                        .getElementById("right-handles")
                    ], {
                        moves: function(e, t, n) {
                            console.log('moved');
                            return n.classList.contains("handle")
                        }
                    }), dragula([document.getElementById("left-titleHandles"), document
                        .getElementById("right-titleHandles")
                    ], {
                        moves: function(e, t, n) {
                            return n.classList.contains("titleArea")
                        }
                    })

                    drake.on('drop', function(el, target, source, sibling) {
                        $('#edit-draggable-area-' + value.languages_code + ' .banner-img-' +
                            value.languages_code).each((idx, item) => {
                            $(item).find('#edit_news_category_banner_slide_sort')
                                .val(idx);
                        });
                    });
                });

            });

            var tableNewCategory = $('#tableNewCategory').dataTable({
                "ajax": {
                    "url": url_gb + "/admin/NewsCategory/Lists",
                    "type": "POST",
                    "data": function(d) {
                        d.news_category_id = $('#search_news_category_id').val();
                        d.news_status = $('input[name=search_news_status]:checked').val();
                    }
                },
                "drawCallback": function(settings) {
                    $('[data-toggle="tooltip"]').tooltip();
                    $(".change-status").bootstrapToggle();
                },
                "retrieve": true,
                "columns": [{
                        "data": "checkbox"
                    },
                    {
                        "data": "DT_RowIndex",
                        "class": "text-center",
                        "searchable": false,
                        "sortable": false
                    },
                    {
                        "data": "news_category_name"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "updated_at"
                    },
                    {
                        "data": "action",
                        "name": "action",
                        "searchable": false,
                        "sortable": false,
                        "class": "text-center"
                    },

                ],
                "select": true,
                "dom": 'Bfrtip',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                "columnDefs": [{
                    className: 'noVis',
                    visible: false
                }],
                "buttons": [
                    'pageLength',
                    'colvis',
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ],
                processing: true,
                serverSide: true,
            });

            $('body').on('change', '.upload-news-category-img', function() {
                var ele = $(this);
                var index = ele.data('index');
                var formData = new FormData();
                formData.append('file', ele[0].files[0]);
                // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/NewsCategoryImageTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        ele.closest('#FormAdd').find('#' + ele[0].id).append(
                            '<input type="hidden" id="' + ele[0].id +
                            '"  name="news_category[' + ele[0].id.replace("add_", "") +
                            ']" value="' + res.path + '">');
                        setTimeout(function() {}, 100);
                    }
                });
            });

            $('body').on('change', '.edit-upload-news-category-img', function() {
                var ele = $(this);
                var index = ele.data('index');
                var formData = new FormData();
                formData.append('file', ele[0].files[0]);
                // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/NewsCategoryImageTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        ele.closest('#FormEdit').find('#' + ele[0].id).append(
                            '<input type="hidden" id="' + ele[0].id +
                            '"  name="news_category[' + ele[0].id.replace("edit_", "") +
                            ']" value="' + res.path + '">');
                        setTimeout(function() {}, 100);
                    }
                });
            });

            $('body').on('click', '.btn-add', function(data) {
                $('#ModalAdd').modal('show');
            });

            $('body').on('click', '.btn-view', function(data) {
                var id = $(this).data('id');
                var btn = $(this);
                loadingButton(btn);
                $.ajax({
                    method: "GET",
                    url: url_gb + "/admin/NewsCategory/" + id,
                    data: {
                        id: id
                    }
                }).done(function(res) {
                    resetButton(btn);

                    $.each(res.new_category, function(index, value) {
                        $('#view_' + index).text(value);
                    });

                    if (res.new_category.news_category_status == 1) {
                        $('#view_news_category_status').text('On');
                    } else {
                        $('#view_news_category_status').text('Off');
                    }

                    if (res.new_category.news_category_banner_status == 1) {
                        $('#view_news_category_banner_status').text('On');
                    } else {
                        $('#view_news_category_banner_status').text('Off');
                    }

                    if (res.new_category.news_category_banner_status == 1) {
                        $('#view_news_category_banner_status').text('On');
                    } else {
                        $('#view_news_category_banner_status').text('Off');
                    }

                    var robots_decode = JSON.parse(res.new_category.news_category_mata_robots);
                    var txt_robots = '';
                    $.each(robots_decode, function(idx_robots, val_robots) {
                        if (val_robots == 1) {
                            txt_robots = 'INDEX ';
                        } else if (val_robots == 2) {
                            txt_robots += 'FOLLOW ';
                        } else if (val_robots == 3) {
                            txt_robots += 'NOODP ';
                        } else if (val_robots == 4) {
                            txt_robots += 'NOYDIR';
                        }
                    });
                    $('#view_news_category_mata_robots').text(txt_robots);

                    if (res.new_category.news_category_og_twitter_image !== undefined) {
                        const url_news_category_og_twitter_image = url_gb +
                            '/uploads/NewsCategoryImage/' + res.new_category
                            .news_category_og_twitter_image;
                        $('#view_news_category_og_twitter_image').attr('src',
                            url_news_category_og_twitter_image);
                    }

                    if (res.new_category.news_category_thumnail_image !== undefined) {
                        const url_news_category_thumnail_image = url_gb +
                            '/uploads/NewsCategoryImage/' + res.new_category
                            .news_category_thumnail_image;
                        $('#view_news_category_thumnail_image').attr('src',
                            url_news_category_thumnail_image);
                    }

                    $.each(res.new_category_details, function(index, value) {
                        $.each(value, function(idx, val) {
                            $('#view_' + idx + '_' + value
                                .news_category_details_languages_code).text(val);
                            if(idx == 'news_category_details_details'){
                                $('#view_' + idx + '_' + value
                                .news_category_details_languages_code).html(val);
                            }
                        });

                        if (value.news_category_details_status == 1) {
                            $('#view_news_category_details_status_' + value
                                .news_category_details_languages_code).text('On');
                        } else {
                            $('#view_news_category_details_status_' + value
                                .news_category_details_languages_code).text('Off');
                        }

                        if (value.news_category_details_seo_type == 0) {
                            $('#view_news_category_details_seo_type_' + value
                                .news_category_details_languages_code).text(
                                'ใช้ SEO หลัก');
                        } else {
                            $('#view_news_category_details_seo_type_' + value
                                .news_category_details_languages_code).text(
                                'ใช้ SEO ตามภาษา');
                            $('#view_seo_' + value.news_category_details_languages_code)
                                .css('display', 'block');
                            $('#view_news_category_seo_title_' + value
                                .news_category_details_languages_code).text(value
                                .news_category_details_seo_title);
                            $('#view_news_category_seo_keyword_' + value
                                .news_category_details_languages_code).text(value
                                .news_category_details_seo_keyword);
                            $('#view_news_category_seo_description_' + value
                                .news_category_details_languages_code).text(value
                                .news_category_details_short_description);
                        }

                        $.each(value.news_category_banner_slide, function(idx_banner,
                            val_banner) {
                            if (value.news_category_details_languages_code ==
                                val_banner.news_category_banner_slide_languages_code
                                ) {
                                let html =
                                    `<div class="col-md-6 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body card-border">
                                                        <img class="img-responsive w-100 mb-3" id="preview_img_cover_add" src="{{ asset('uploads/NewsCategoryBannerSlide/` +
                                    val_banner.news_category_banner_slide_image + `') }}">
                                                        <h3 class="card-title">Alert Text : ` + val_banner
                                    .news_category_banner_slide_alt +
                                    `</h3>
                                                        <p class="card-text"><i class="icon-link"></i> <a href="javascript:void(0)">` + val_banner
                                    .news_category_banner_slide_url_slug + `</a> </p>
                                                    </div>
                                                </div>
                                            </div>`;

                                $('#view_banner_slide_' + value
                                        .news_category_details_languages_code)
                                    .append(html);
                            }
                        });

                    });

                    $('#ModalView').modal('show');
                }).fail(function(res) {
                    // resetButton(form.find('button[type=submit]'));
                    swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('click', '.btn-edit', function(data) {
                var id = $(this).data('id');
                var btn = $(this);
                $('#edit_id').val(id);
                loadingButton(btn);
                $.ajax({
                    method: "GET",
                    url: url_gb + "/admin/NewsCategory/" + id,
                    data: {
                        id: id
                    }
                }).done(function(res) {
                    resetButton(btn);

                    $.each(res.new_category, function(index, value) {
                        if (index !== 'news_category_og_twitter_image' && index !=
                            'news_category_thumnail_image') {
                            $('#edit_' + index).val((value !== null) ? value : '');
                        } else {
                            const url = url_gb + '/uploads/NewsCategoryImage/' + res
                                .new_category[index];
                            $('#edit_preview_' + index).attr('src', url);
                        }
                    });

                    var robots_decode = JSON.parse(res.new_category.news_category_mata_robots);
                    $.each(robots_decode, function(idx_robots, val_robots) {
                        $('#edit_news_category_mata_robots_' + val_robots).prop('checked',
                            true);
                    });

                    if (res.new_category.news_category_status == 1) {
                        $('#edit_news_category_status').prop('checked', true);
                    } else {
                        $('#edit_news_category_status').prop('checked', false);
                    }

                    if (res.new_category.news_category_banner_status == 1) {
                        $('#edit_news_category_banner_status').prop('checked', true);
                    } else {
                        $('#edit_news_category_banner_status').prop('checked', false);
                    }

                    $.each(res.new_category_details, function(index, value) {
                        $.each(value, function(idx, val) {
                            $('#edit_' + idx + '_' + value
                                .news_category_details_languages_code).val(val);
                        });

                        if (value.news_category_details_status == 1) {
                            $('#edit_news_category_details_status_' + value
                                .news_category_details_languages_code).prop('checked',
                                true);
                        } else {
                            $('#edit_news_category_details_status_' + value
                                .news_category_details_languages_code).prop('checked',
                                false);
                        }

                        // CKEDITOR.replace('edit_news_category_details_details_'+value.news_category_details_languages_code, {
                        //     height: 250
                        // });

                        if (value.news_category_details_seo_type == 0) {
                            $('#edit_news_category_details_seo_type_' + value
                                .news_category_details_languages_code).attr('checked',
                                'checked');
                            $('#edit_news_category_details_seo_type_' + value
                                .news_category_details_languages_code).val(0);
                        } else {
                            $('#edit_news_category_details_seo_type_' + value
                                .news_category_details_languages_code + '_1').attr(
                                'checked', 'checked');
                            $('#edit_news_category_details_seo_type_' + value
                                .news_category_details_languages_code).val(0);
                            $('#seo_edit_tap_' + value.news_category_details_languages_code)
                                .css('display', 'block');
                            $('#edit_news_category_seo_title_' + value
                                .news_category_details_languages_code).val(value
                                .news_category_details_seo_title);
                            $('#edit_news_category_seo_keyword_' + value
                                .news_category_details_languages_code).val(value
                                .news_category_details_seo_keyword);
                            $('#edit_news_category_seo_description_' + value
                                .news_category_details_languages_code).val(value
                                .news_category_details_short_description);
                        }

                        $('body').on('change', '.edit-seo-type-' + value
                            .news_category_details_languages_code + ':checked',
                            function(data) {
                                if ($(".edit-seo-type-" + value
                                        .news_category_details_languages_code +
                                        ":checked").val() == '1') {
                                    $("#seo_edit_tap_" + value
                                        .news_category_details_languages_code).css(
                                        "display", "block");
                                } else {
                                    $("#seo_edit_tap_" + value
                                        .news_category_details_languages_code).css(
                                        "display", "none");
                                }
                            });

                        var html = '';
                        $.each(value.news_category_banner_slide, function(idx_banner,
                            val_banner) {
                            if (value.news_category_details_languages_code ==
                                val_banner.news_category_banner_slide_languages_code
                                ) {
                                html +=
                                    `<div class="col-md-6 col-sm-12 banner-img-` +
                                    val_banner
                                    .news_category_banner_slide_languages_code + `">
                                                <input type="hidden" id="languages_code" name="news_category_banner[` +
                                    val_banner
                                    .news_category_banner_slide_languages_code +
                                    `][` + val_banner
                                    .news_category_banner_slide_sort +
                                    `][news_category_banner_slide_languages_code]" value="` +
                                    val_banner
                                    .news_category_banner_slide_languages_code + `">
                                                <input type="hidden" id="languages_id" name="news_category_banner[` +
                                    val_banner
                                    .news_category_banner_slide_languages_code +
                                    `][` + val_banner
                                    .news_category_banner_slide_sort +
                                    `][languages_id]" value="` + value
                                    .languages_id +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_category_banner_slide_image" name="news_category_banner[` +
                                    val_banner
                                    .news_category_banner_slide_languages_code +
                                    `][` + val_banner
                                    .news_category_banner_slide_sort +
                                    `][news_category_banner_slide_image]" value="` +
                                    val_banner.news_category_banner_slide_image +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_category_banner_slide_alt" name="news_category_banner[` +
                                    val_banner
                                    .news_category_banner_slide_languages_code +
                                    `][` + val_banner
                                    .news_category_banner_slide_sort +
                                    `][news_category_banner_slide_alt]" value="` +
                                    val_banner.news_category_banner_slide_alt +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_category_banner_slide_url_slug" name="news_category_banner[` +
                                    val_banner
                                    .news_category_banner_slide_languages_code +
                                    `][` + val_banner
                                    .news_category_banner_slide_sort +
                                    `][news_category_banner_slide_url_slug]" value="` +
                                    val_banner.news_category_banner_slide_url_slug +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_category_banner_slide_sort" name="news_category_banner[` +
                                    val_banner
                                    .news_category_banner_slide_languages_code +
                                    `][` + val_banner
                                    .news_category_banner_slide_sort +
                                    `][news_category_banner_slide_sort]" value="` +
                                    val_banner.news_category_banner_slide_sort +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_category_banner_id" name="news_category_banner[` + val_banner
                                    .news_category_banner_slide_languages_code +
                                    `][` + val_banner
                                    .news_category_banner_slide_sort +
                                    `][news_category_banner_slide_id]" value="` +
                                    val_banner.news_category_banner_slide_id + `">
                                                <div class="card  card-hover">
                                                    <div class="text-right pt-2 pr-2">
                                                        <a href="javascript:void(0)" class="confirm-delete-banner-` + value
                                    .news_category_details_languages_code +
                                    `"><i class="ti-close"></i></a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <img class="img-responsive w-100 mb-3" id="preview_img_cover_edit_` + val_banner
                                    .news_category_banner_slide_languages_code +
                                    `" src="{{ asset('uploads/NewsCategoryBannerSlide/` +
                                    val_banner.news_category_banner_slide_image + `') }}">
                                                        <h3 class="card-title">Alert Text : ` + val_banner
                                    .news_category_banner_slide_alt + `</h3>
                                                        <p class="card-text"><i class="icon-link"></i> ` + val_banner
                                    .news_category_banner_slide_url_slug + `</p>
                                                    </div>
                                                </div>
                                            </div>`;

                            }
                        });
                        $('#edit-draggable-area-' + value
                            .news_category_details_languages_code).html(html);
                    });

                    $('#ModalEdit').modal('show');

                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $(".confirm-delete").click(function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Category!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            "Success!",
                            "The Category has been removed.",
                            "success"
                        )
                    }
                })
            });

            $('body').on('submit', '#FormAdd', function(e) {
                e.preventDefault();
                var form = $(this);
                loadingButton(form.find('button[type=submit]'));
                $.ajax({
                    method: "POST",
                    url: url_gb + "/admin/NewsCategory",
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        form[0].reset();
                        $("#add_news_category_og_twitter_image_txt").text('Choose Image...');
                        $("#add_news_category_thumnail_image_txt").text('Choose Image...');
                        $.each(languages, function(index, value) {
                            $('#draggable-area-'+ value.languages_code).children().remove();
                            CKEDITOR.instances['add_news_category_content_details_'+value.languages_code].setData('');
                            $('#add_news_category_details_seo_type_'+ value.languages_code).prop('checked', true);
                            $('#seo_tap_'+ value.languages_code).css('display', 'none');
                        });
                        $('#ModalAdd').modal('hide');
                        tableNewCategory.api().ajax.reload();
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
                    url: url_gb + "/admin/NewsCategory/" + id,
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        form[0].reset();
                        $('#ModalEdit').modal('hide');
                        tableNewCategory.api().ajax.reload();
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('change', '.change-status', function(data) {
                var id = $(this).data('id');
                var status = $(this).is(':checked');
                $.ajax({
                    method: "POST",
                    url: url_gb + "/admin/NewsCategory/ChangeStatus/" + id,
                    data: {
                        id: id,
                        status: status ? 1 : 0,
                    }
                }).done(function(res) {
                    if (res.status == 1) {

                    } else {
                        swal(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('change', '#edit_news_category_status', function() {
                if ($(this).is(':checked')) {
                    $('#edit_news_category_status').val(1);
                } else {
                    $('#edit_news_category_status').val(0);
                }
            });

            $('body').on('change', '#edit_news_category_banner_status', function() {
                if ($(this).is(':checked')) {
                    $('#edit_news_category_banner_status').val(1);
                } else {
                    $('#edit_news_category_banner_status').val(0);
                }
            });

            $('body').on('click', '.btn-search', function() {
                tableNewCategory.api().ajax.reload();
            });

            $('body').on('click', '.checkbox-changstatus', function(data){
                var changStatus = [];
                $("input:checkbox[name=select-news]:checked").each(function(){
                    changStatus.push($(this).val());
                });

                var id = '';
                if (changStatus.length !== 0) {
                    id = 'multi';
                }else{
                    id = 'null';
                }

                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/NewsCategory/ChangeStatus/"+ id,
                    data: {
                        id: changStatus,
                        news_status: status ? 1 : 0,
                    }
                }).done(function(res) {
                    if(res.status == 1){
                        tableNewCategory.api().ajax.reload();
                    }else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('click', '.btn-clear-search', function() {
                $("#search_news_category_id").val('').change();
                // $("#search_news_category_id").val('');
                $('#search_news_status').prop('checked', true);
                tableNewCategory.api().ajax.reload();
            });

            $('body').on('click', '.checkbox-deleteselect', function(data){

                var delStatus = [];
                $("input:checkbox[name=select-news]:checked").each(function(){
                    delStatus.push($(this).val());
                });

                console.log(delStatus);

                var id = '';
                if (delStatus.length !== 0) {
                    id = 'multi';
                }else{
                    id = 'null';
                }

                Swal.fire({
                    title: "Are you sure ?",
                    icon: "warning",
                    buttons: true,
                })
                .then((ConfirmDelete) => {
                    if (ConfirmDelete) {
                        $.ajax({
                            method: "POST",
                            url: url_gb + "/admin/NewsCategory/Delete/"+ id,
                            data: {
                                id: delStatus,
                            }
                        }).done(function(res) {
                            if (res.status == 1) {
                                Swal.fire(res.title, res.content, 'success');
                                tableNewCategory.api().ajax.reload();
                            }else {
                                Swal.fire(res.title, res.content, 'error');
                            }
                        }).fail(function(res) {
                            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                        });
                    }
                });
            });

            $("#dZUpload").dropzone({
                url: url_gb + "/admin/UploadFile/NewsGalleryTemp",
                addRemoveLinks: true,
                removedfile: function(file) {
                    var name = file.name;
                    $.ajax({
                        type: 'POST',
                        url: url_gb + "/admin/UploadFile/DeleteUploadFile/NewsGalleryTemp",
                        data: "file_name=" + name,
                        dataType: 'html'
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                sending: function(file, xhr, formData) {
                    formData.append("_token", "{{ csrf_token() }}");
                },
            });

        });

    </script>
@endsection
