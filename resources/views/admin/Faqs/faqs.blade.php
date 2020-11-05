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
                    <h4 class="card-title">Search</h4>
                    <form id="FormSearch">
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_faqs_title">FAQ Title</label>
                                    <input type="text" id="search_faqs_question" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_faqs_created_date">Created Date</label>
                                    <input type="date" id="search_faqs_create_date" name="search_faqs_created_date"
                                        class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_faqs_updated_date">Updated Date</label>
                                    <input type="date" id="search_faqs_update_date" name="search_faqs_updated_date"
                                        class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_faqs_status">Status</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="all"
                                                id="search_faqs_status" name="search_faqs_status" checked>
                                            <label class="custom-control-label" for="search_faqs_status">All</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1"
                                                id="search_faqs_status_1" name="search_faqs_status">
                                            <label class="custom-control-label" for="search_faqs_status_1">On</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0"
                                                id="search_faqs_status_2" name="search_faqs_status">
                                            <label class="custom-control-label" for="search_faqs_status_2">Off</label>
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
                        <h4 class="card-title">{{ $MainMenus->menu_system_name }} <small class="">(5 items)</small> </h4>
                        <button type="button" class="btn btn-success mb-2 float-right newdata btn-add">Add FAQ</button>
                        <!-- <button type="button" class="btn btn-success btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#ModalAddnew1" data-product_id="0">Add New1</button> -->
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
                        <table class="table" id="tableFaqs">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"></th>
                                    <th scope="col">No.</th>
                                    <th scope="col">FAQ Title</th>
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
                                    <td>ฉันสามารถป้อนอะไรลงในกล่องค้นหาได้บ้าง</td>
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
                                    <td>ฉันสามารถขอรับความช่วยเหลือในการค้นหาผลิตภัณฑ์ได้หรือไม่</td>
                                    <td>01/09/2020 16:40 - Tom & Jerry </td>
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
                                    <td>ฉันจะชำระเงินช่องทางใดได้บ้าง</td>
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
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table"
                                                id="SelectNews4" required>
                                            <label class="custom-control-label" for="SelectNews4"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">4</th>
                                    <td>5</td>
                                    <td>ฉันต้องการดูผลงานจริงที่ทางบริษัทผลิตต้องทำอย่างไร</td>
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
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table"
                                                id="SelectNews5" required>
                                            <label class="custom-control-label" for="SelectNews5"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">5</th>
                                    <td>1</td>
                                    <td>เงื่อนไขในการชำระเงินมีอะไรบ้าง</td>
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
                    <h4 class="modal-title">Add Faqs</h4>
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
                                                    href="#{{ $value['languages_code'] }}_tap" role="tab">
                                                    <span class="hidden-sm-up"><i
                                                            class="{{ $value['languages_icon'] }}"></i></span> <span
                                                        class="hidden-xs-down">{{ $value['languages_name'] }}</span></a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#set-tap"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span>
                                            <span class="hidden-xs-down">Setting</span></a> </li>
                                        {{-- <li class="nav-item"> <a class="nav-link active"
                                                data-toggle="tab" href="#th-tab" role="tab">
                                                <span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span>
                                                <span class="hidden-xs-down">TH</span></a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#en-tap"
                                                role="tab">
                                                <span class="hidden-sm-up"><i class="flag-icon flag-icon-gb"></i></span>
                                                <span class="hidden-xs-down">EN</span></a>
                                        </li> --}}
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)
                                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                                id="{{ $value['languages_code'] }}_tap" role="tabpanel">
                                                <div class="form-horizontal form-upload">
                                                    <input type="hidden" id="add_languages_id"
                                                        name="faqs_details[{{ $value['languages_code'] }}][languages_id]"
                                                        value="{{ $value['languages_id'] }}">
                                                    <input type="hidden" id="add_languages_code"
                                                        name="faqs_details[{{ $value['languages_code'] }}][ques_lang_languages_code]"
                                                        value="{{ $value['languages_code'] }}">
                                                    <div class="form-group row">
                                                        <label for="add_faqs_title_{{ $value['languages_code'] }}"
                                                            class="col-sm-3 text-right control-label col-form-label">FAQ
                                                            Title</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="add_faqs_title_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_question]"
                                                                value="{{ $value['languages_code'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_faqs_content_{{ $value['languages_code'] }}"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                id="add_faqs_content_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_details]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group row">
                                                        <label for="add_faqs_status"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <input type="checkbox" class="toggle edit-status" checked
                                                                data-toggle="toggle" data-style="ios" data-on="On"
                                                                data-off="Off"
                                                                id="add_faqs_status_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_status]">
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Tap TH -->

                                        <div class="tab-pane" id="set-tap" role="tabpanel">
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="faqs[ques_status]"
                                                        value="1"
                                                        id="add_ques_status"
                                                        checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="add_ques_status"></label>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="add_news_category_th"
                                                    class="col-sm-3 text-right control-label col-form-label">News
                                                    Category</label>
                                                <div class="col-sm-9">

                                                    <select
                                                        class="form-control custom-select select_manager-add select2"
                                                        multiple="" style="height: 36px;width: 100%;"
                                                        id="add_news_details_category" name="news_category_id[]" placeholder="Select">
                                                        @foreach ($NewsCategory as $val)
                                                            <option value="{{$val['news_category_id']}}">{{$val['news_category_mata_title']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="form-group row">
                                                <label for="add_news_details_title"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_details_title"
                                                        name="news[news_url_slug]" placeholder="http://">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_mata_title"
                                                        name="news[news_mata_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_mata_description"
                                                        name="news[news_mata_description]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_keywords"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Keywords</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_mata_keywords"
                                                        name="news[news_mata_keywords]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_author"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Author</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_mata_author"
                                                        name="news[news_mata_author]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_details_meta_robots"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Robots</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="1"
                                                                id="add_news_meta_robots_1"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_1">INDEX</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="2"
                                                                id="add_news_meta_robots_2"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_2">FOLLOW</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="3"
                                                                id="add_news_meta_robots_3"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_3">NOODP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="4"
                                                                id="add_news_meta_robots_4"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_4">NOYDIR</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_og_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_og_title"
                                                        name="news[news_og_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_og_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="add_news_og_description"
                                                        name="news[news_og_description]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_twitter_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_twitter_title"
                                                        name="news[news_twitter_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_twitter_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="add_news_twitter_description"
                                                        name="news[news_twitter_description]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-img form-control"
                                                            id="add_news_og_twitter_image">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                        <small class="form-text text-muted">Recommended Size: 1200 x 630
                                                            pixel</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" id="add_news_status" name="news[news_status]" class="toggle edit-status" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_public"
                                                    class="col-sm-3 text-right control-label col-form-label">Public
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" id="add_news_public"
                                                        name="news[news_public_date]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_thumbnail"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-img form-control"
                                                            id="add_news_thumbnail">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_details_thumbnail_text"
                                                    class="col-sm-3 text-right control-label col-form-label">Alt
                                                    Text</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_details_thumbnail_text"
                                                        name="news[news_alt]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_banner" name="news[news_banner_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_gallery" name="news[news_gallery_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Related
                                                    News</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_related_news" name="news[news_related_news_status]"
                                                        checked data-toggle="toggle" data-style="ios" data-on="On"
                                                        data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Related News
                                                    Type</label>
                                                <div class="col-sm-9">

                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="0"
                                                                id="all" name="news[news_related_new_type]" checked>
                                                            <label class="custom-control-label" for="all">Random All</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="1"
                                                                id="category" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="category">Random Same
                                                                Category</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="2"
                                                                id="keyword" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="keyword">Random Same
                                                                Tag Keyword</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="3"
                                                                id="select" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="select">Select</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div id="dvPinNo" style="display: none;">
                                                <div class="form-group row">
                                                    <label for="add_news_details_title"
                                                        class="col-sm-3 text-right add_news_details_title">News
                                                        Title</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <select class="form-control select2" id="add_news_details_title"
                                                                name="add_news_details_title">
                                                                <option>Choose...</option>
                                                                <option value="">หวานปนแซ่บ "ปราง กัญญ์ณรัณ" ควง "โต้ง ทูพี"
                                                                    ล่องทะเลภูเก็ต</option>
                                                                <option value="">หมู่บ้านต้นแบบ จิตอาสาทำดีด้วยหัวใจ อ.สนม
                                                                    ร่วมกันคิด ร่วมกันสร้าง</option>
                                                                <option value="">แรงไม่เกรงใจเจ้าบ้าน! เจาะ 5 ประเด็น
                                                                    เลสเตอร์ โหดบุกขย้ำ แมนซิตี้</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
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

            </div>
            </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="ModalEdit1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">Edit Faqs</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                                class="mdi mdi-close"></i></span></button>
                </div>

                <form id="FormEdit1" class="needs-validation" novalidate>
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
                                                    href="#{{ $value['languages_code'] }}_tap" role="tab">
                                                    <span class="hidden-sm-up"><i
                                                            class="{{ $value['languages_icon'] }}"></i></span> <span
                                                        class="hidden-xs-down">{{ $value['languages_name'] }}</span></a>
                                            </li>

                                        @endforeach
                                        {{-- <li class="nav-item"> <a class="nav-link active"
                                                data-toggle="tab" href="#th-tab" role="tab">
                                                <span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span>
                                                <span class="hidden-xs-down">TH</span></a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#en-tap"
                                                role="tab">
                                                <span class="hidden-sm-up"><i class="flag-icon flag-icon-gb"></i></span>
                                                <span class="hidden-xs-down">EN</span></a>
                                        </li> --}}
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)
                                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                                id="{{ $value['languages_code'] }}_tap" role="tabpanel">
                                                <div class="form-horizontal form-upload">
                                                    <div class="form-group row">
                                                        <label for="edit1_ques_lang_question_{{ $value['languages_code'] }}"
                                                            class="col-sm-3 text-right control-label col-form-label">FAQ
                                                            Title</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="edit1_ques_lang_question_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_question]"
                                                                value="{{ $value['languages_code'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="edit1_ques_lang_details_{{ $value['languages_code'] }}"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                id="edit1_ques_lang_details_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_details]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group row">
                                                        <label for="edit_faqs_status"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <input type="checkbox" class="toggle edit-status" checked
                                                                data-toggle="toggle" data-style="ios" data-on="On"
                                                                data-off="Off"
                                                                id="edit_faqs_status_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_status]">
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group row">
                                                        <label for="edit_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <div class="col-sm-9 custom-switch mb-0">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_status]"
                                                                id="edit1_ques_lang_status_{{ $value['languages_code'] }}"
                                                                checked>
                                                            <label class="custom-control-label control-label col-sm-3"
                                                                for="edit1_ques_lang_status_{{ $value['languages_code'] }}"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Tap TH -->

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

            </div>
            </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">Edit Faqs</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                                class="mdi mdi-close"></i></span></button>
                </div>

                <form id="FormEdit" class="needs-validation" novalidate>
                    <div class="form-body">
                        <div class="card-body pb-0">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach ($Language as $key => $value)
                                            <li class="nav-item"> <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                    aria-selected="{{ $key == 0 ? true : false }}" data-toggle="tab"
                                                    href="#edit_{{ $value['languages_code'] }}_tap" role="tab">
                                                    <span class="hidden-sm-up"><i
                                                            class="{{ $value['languages_icon'] }}"></i></span> <span
                                                        class="hidden-xs-down">{{ $value['languages_name'] }}</span></a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit-set-tap"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span>
                                            <span class="hidden-xs-down">Setting</span></a> </li>
                                        {{-- <li class="nav-item"> <a class="nav-link active"
                                                data-toggle="tab" href="#th-tab" role="tab">
                                                <span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span>
                                                <span class="hidden-xs-down">TH</span></a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#en-tap"
                                                role="tab">
                                                <span class="hidden-sm-up"><i class="flag-icon flag-icon-gb"></i></span>
                                                <span class="hidden-xs-down">EN</span></a>
                                        </li> --}}
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)
                                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                                id="edit_{{ $value['languages_code'] }}_tap" role="tabpanel">
                                                <div class="form-horizontal form-upload">
                                                    <input type="hidden" id="edit_languages_id"
                                                        name="faqs_details[{{ $value['languages_code'] }}][languages_id]"
                                                        value="{{ $value['languages_id'] }}">
                                                    <input type="hidden" id="edit_languages_code"
                                                        name="faqs_details[{{ $value['languages_code'] }}][ques_lang_languages_code]"
                                                        value="{{ $value['languages_code'] }}">
                                                    <input type="hidden" id="edit_ques_lang_id_{{ $value['languages_code'] }}"
                                                        name="faqs_details[{{ $value['languages_code'] }}][ques_lang_id]"
                                                        value="">
                                                    <div class="form-group row">
                                                        <label for="edit_ques_lang_question_{{ $value['languages_code'] }}"
                                                            class="col-sm-3 text-right control-label col-form-label">FAQ
                                                            Title</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="edit_ques_lang_question_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_question]"
                                                                value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="edit_ques_lang_details_{{ $value['languages_code'] }}"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                id="edit_ques_lang_details_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_details]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group row">
                                                        <label for="edit_faqs_status"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <input type="checkbox" class="toggle edit-status" checked
                                                                data-toggle="toggle" data-style="ios" data-on="On"
                                                                data-off="Off"
                                                                id="edit_faqs_status_{{ $value['languages_code'] }}"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_status]">
                                                        </div>
                                                    </div> --}}
                                                    {{-- <div class="form-group row">
                                                        <label for="edit_news_category_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <div class="col-sm-9 custom-switch mb-0">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="faqs_details[{{ $value['languages_code'] }}][ques_lang_status]"
                                                                id="edit_ques_lang_status_{{ $value['languages_code'] }}"
                                                                checked>
                                                            <label class="custom-control-label control-label col-sm-3"
                                                                for="edit_ques_lang_status_{{ $value['languages_code'] }}"></label>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Tap TH -->

                                        <div class="tab-pane" id="edit-set-tap" role="tabpanel">
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="faqs[ques_status]"
                                                        id="edit_ques_status"
                                                        value="1"
                                                        checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="edit_ques_status"></label>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="add_news_category_th"
                                                    class="col-sm-3 text-right control-label col-form-label">News
                                                    Category</label>
                                                <div class="col-sm-9">

                                                    <select
                                                        class="form-control custom-select select_manager-add select2"
                                                        multiple="" style="height: 36px;width: 100%;"
                                                        id="add_news_details_category" name="news_category_id[]" placeholder="Select">
                                                        @foreach ($NewsCategory as $val)
                                                            <option value="{{$val['news_category_id']}}">{{$val['news_category_mata_title']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="form-group row">
                                                <label for="add_news_details_title"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_details_title"
                                                        name="news[news_url_slug]" placeholder="http://">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_mata_title"
                                                        name="news[news_mata_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_mata_description"
                                                        name="news[news_mata_description]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_keywords"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Keywords</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_mata_keywords"
                                                        name="news[news_mata_keywords]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_mata_author"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Author</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_mata_author"
                                                        name="news[news_mata_author]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_details_meta_robots"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Robots</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="1"
                                                                id="add_news_meta_robots_1"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_1">INDEX</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="2"
                                                                id="add_news_meta_robots_2"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_2">FOLLOW</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="3"
                                                                id="add_news_meta_robots_3"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_3">NOODP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="4"
                                                                id="add_news_meta_robots_4"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_4">NOYDIR</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_og_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_og_title"
                                                        name="news[news_og_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_og_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="add_news_og_description"
                                                        name="news[news_og_description]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_twitter_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_twitter_title"
                                                        name="news[news_twitter_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_twitter_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="add_news_twitter_description"
                                                        name="news[news_twitter_description]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-img form-control"
                                                            id="add_news_og_twitter_image">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                        <small class="form-text text-muted">Recommended Size: 1200 x 630
                                                            pixel</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" id="add_news_status" name="news[news_status]" class="toggle edit-status" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_public"
                                                    class="col-sm-3 text-right control-label col-form-label">Public
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" id="add_news_public"
                                                        name="news[news_public_date]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_thumbnail"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-img form-control"
                                                            id="add_news_thumbnail">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_details_thumbnail_text"
                                                    class="col-sm-3 text-right control-label col-form-label">Alt
                                                    Text</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_details_thumbnail_text"
                                                        name="news[news_alt]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_banner" name="news[news_banner_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_gallery" name="news[news_gallery_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Related
                                                    News</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_related_news" name="news[news_related_news_status]"
                                                        checked data-toggle="toggle" data-style="ios" data-on="On"
                                                        data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Related News
                                                    Type</label>
                                                <div class="col-sm-9">

                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="0"
                                                                id="all" name="news[news_related_new_type]" checked>
                                                            <label class="custom-control-label" for="all">Random All</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="1"
                                                                id="category" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="category">Random Same
                                                                Category</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="2"
                                                                id="keyword" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="keyword">Random Same
                                                                Tag Keyword</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="3"
                                                                id="select" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="select">Select</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div id="dvPinNo" style="display: none;">
                                                <div class="form-group row">
                                                    <label for="add_news_details_title"
                                                        class="col-sm-3 text-right add_news_details_title">News
                                                        Title</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <select class="form-control select2" id="add_news_details_title"
                                                                name="add_news_details_title">
                                                                <option>Choose...</option>
                                                                <option value="">หวานปนแซ่บ "ปราง กัญญ์ณรัณ" ควง "โต้ง ทูพี"
                                                                    ล่องทะเลภูเก็ต</option>
                                                                <option value="">หมู่บ้านต้นแบบ จิตอาสาทำดีด้วยหัวใจ อ.สนม
                                                                    ร่วมกันคิด ร่วมกันสร้าง</option>
                                                                <option value="">แรงไม่เกรงใจเจ้าบ้าน! เจาะ 5 ประเด็น
                                                                    เลสเตอร์ โหดบุกขย้ำ แมนซิตี้</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
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

            </div>
            </form>
        </div>
    </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.image_alt').hide();
        $('#preview_img_cover').hide();
        Dropzone.autoDiscover = false;
        var languages = <?=$Language?>;

        $(document).ready(function() {

            $.each(languages, function(index, value) {

                CKEDITOR.replace('add_faqs_content_' + value.languages_code, {
                    height: 250
                });

                CKEDITOR.replace('edit_ques_lang_details_' + value.languages_code, {
                    height: 250
                });

                // $('body').on('change', '#edit_ques_lang_status_'+ value.languages_code, function() {
                //     if ($(this).is(':checked')) {
                //         $('#edit_ques_lang_status_'+ value.languages_code).val(1);
                //     } else {
                //         $('#edit_ques_lang_status_'+ value.languages_code).val(0);
                //     }
                // })
            });

            var tableFaqs = $('#tableFaqs').dataTable({
                "ajax": {
                    "url": url_gb+"/admin/Faqs/Lists",
                    "type": "POST",
                    "data": function ( d ) {
                        d.faqs_question = $('#search_faqs_question').val();
                        d.faqs_create_date = $('#search_faqs_create_date').val();
                        d.faqs_update_date = $('#search_faqs_update_date').val();
                        d.faqs_status = $('input[name=search_faqs_status]:checked').val();
                        // d.faqs_status = $('[name="search_faqs_status"]').val();
                        // d.faqs_status_1 = $('#search_faqs_status_1').val();
                        // d.faqs_status_2 = $('#search_faqs_status_2').val();
                    }
                },
                "drawCallback": function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip();
                    $(".change-status").bootstrapToggle();
                },
                "retrieve": true,
                "columns": [
                    {"data" : "checkbox"},
                    {"data" : "DT_RowIndex", "class":"text-center", "searchable": false, "sortable": false},
                    {"data" : "faqs_title"},
                    {"data" : "created_at"},
                    {"data" : "updated_at"},
                    {
                        "data" : "action" ,
                        "name" : "action",
                        "searchable": false,
                        "sortable": false,
                        "class" : "text-center"
                    },

                ],
                "select": true,
                "dom": 'Bfrtip',
                    "lengthMenu": [
                            [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                "columnDefs": [{
                    className: 'noVis', visible: false
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

            $('body').on('click', '.btn-search', function() {
                tableFaqs.api().ajax.reload();
            });

            $('body').on('click', '.btn-clear-search', function() {
                $('#search_faqs_question').val('');
                $('#search_faqs_create_date').val('');
                $('#search_faqs_update_date').val('');
                $('#search_faqs_status').prop('checked', true);
                tableFaqs.api().ajax.reload();
            });

            $('body').on('click', '.btn-add', function(data) {
                $('#ModalAdd').modal('show');
            });

            $('body').on('click', '.btn-edit', function(data) {
                var id = $(this).data('id');
                var btn = $(this);
                $('#edit_id').val(id);
                loadingButton(btn);
                $.ajax({
                    method: "GET",
                    url: url_gb + "/admin/Faqs/" + id,
                    data: {
                        id: id
                    }
                }).done(function(res) {
                    console.log(res);
                    // return;
                    resetButton(btn);
                    if(res.faqs){

                        if (res.faqs.ques_status == 1) {
                            $('#edit_ques_status').prop('checked',
                                true);
                        } else {
                            $('#edit_ques_status').prop('checked',
                                false);
                        }

                        $.each(res.faqs_detail, function(index, value){

                            // $.each(value, function(idx, val) {
                            //     $('#edit_' + idx + '_' + value.ques_lang_languages_code).val(val);
                            // });

                            $('#edit_ques_lang_question_'+ value.ques_lang_languages_code).val(value.ques_lang_question);
                            $('#edit_ques_lang_id_'+ value.ques_lang_languages_code).val(value.ques_lang_id);

                            CKEDITOR.instances['edit_ques_lang_details_'+value.ques_lang_languages_code].setData(value.ques_lang_details);

                            // if (value.ques_lang_status == 1) {
                            //     $('#edit_ques_lang_status_'+ value.ques_lang_languages_code).prop('checked',
                            //         true);
                            // } else {
                            //     $('#edit_ques_lang_status_'+ value.ques_lang_languages_code).prop('checked',
                            //         false);
                            // }

                        });
                    }
                    $('#ModalEdit').modal('show');

                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $(".confirm-delete").click(function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to recover this FAQ!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            "Success!",
                            "The FAQ has been removed.",
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
                    url: url_gb + "/admin/Faqs",
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        form[0].reset();
                        $.each(languages, function(index, value) {
                            CKEDITOR.instances['add_faqs_content_'+value.languages_code].setData('');
                        });
                        $('#ModalAdd').modal('hide');
                        tableFaqs.api().ajax.reload();
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
                    url: url_gb + "/admin/Faqs/" + id,
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        form[0].reset();
                        $('#ModalEdit').modal('hide');
                        tableFaqs.api().ajax.reload();
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('click', '.btn-delete', function(data) {
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure ?",
                    icon: "warning",
                    buttons: true,
                })
                .then((ConfirmDelete) => {
                    if (ConfirmDelete) {
                        $.ajax({
                            method: "POST",
                            url: url_gb + "/admin/Faqs/Delete/" + id,
                            data: {
                                id: id,
                            }
                        }).done(function(res) {
                            if (res.status == 1) {
                                Swal.fire(res.title, res.content, 'success');
                                tableFaqs.api().ajax.reload();
                                // location.reload();
                            } else {
                                Swal.fire(res.title, res.content, 'error');
                            }
                        }).fail(function(res) {
                            Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                        });
                    }else{
                        console.log(ConfirmDelete);
                    }
                });
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
                    url: url_gb+"/admin/Faqs/ChangeStatus/"+ id,
                    data: {
                        id: changStatus,
                        news_status: status ? 1 : 0,
                    }
                }).done(function(res) {
                    if(res.status == 1){
                        tableFaqs.api().ajax.reload();
                    }else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
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
                            url: url_gb + "/admin/Faqs/Delete/"+ id,
                            data: {
                                id: delStatus,
                            }
                        }).done(function(res) {
                            if (res.status == 1) {
                                Swal.fire(res.title, res.content, 'success');
                                tableFaqs.api().ajax.reload();
                            }else {
                                Swal.fire(res.title, res.content, 'error');
                            }
                        }).fail(function(res) {
                            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                        });
                    }
                });
            });

            $('body').on('change', '#edit_ques_status', function() {
                if ($(this).is(':checked')) {
                    $('#edit_ques_status').val(1);
                } else {
                    $('#edit_ques_status').val(0);
                }
            });

            $('body').on('change', '#add_ques_status', function() {
                if ($(this).is(':checked')) {
                    $('#add_ques_status').val(1);
                } else {
                    $('#add_ques_status').val(0);
                }
            });

            $('body').on('change', '.change-status', function(data) {
                var id = $(this).data('id');
                var status = $(this).is(':checked');
                $.ajax({
                    method: "POST",
                    url: url_gb + "/admin/Faqs/ChangeStatus/" + id,
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

        });

    </script>

@endsection
