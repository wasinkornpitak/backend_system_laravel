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
                                    <label class="control-label" for="search_news_title">News Title</label>
                                    <input type="text" id="search_news_title" class="form-control search_table">
                                </div>
                            </div>
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
                                    <label class="control-label" for="search_news_created_date">Created Date</label>
                                    <input type="date" id="search_news_created_date" name="search_news_created_date"
                                        class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_news_updated_date">Updated Date</label>
                                    <input type="date" id="search_news_updated_date" name="search_news_updated_date"
                                        class="form-control search_table" placeholder="">
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
                        <h4 class="card-title">{{ $MainMenus->menu_system_name }} </h4>
                        <button type="button" class="btn btn-success mb-2 float-right newdata btn-add">Add News</button>
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
                        <table class="table" id="tableNew">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"></th>
                                    <th scope="col">No.</th>
                                    {{-- <th scope="col">Order</th>
                                    --}}
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">News Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Views</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Published</th>
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
                                    <td><img id="preview_img_cover_add" style="height:20%;"
                                            src="{{ asset('uploads/images/cms/Banner/24640-45133.jpg') }}"></td>
                                    <td>หวานปนแซ่บ "ปราง กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต</td>
                                    <td>ข่าวบันเทิง</td>
                                    <td>5,200</td>
                                    <td>13/08/2020 10:33 - Admin Smile</td>
                                    <td>13/08/2020 12:17 - Admin Smile</td>
                                    <td> </td>
                                    <td>
                                        <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle"
                                            data-style="ios" data-on="On" data-off="Off">
                                        <button type="button" data-toggle="tooltip" title="View"
                                            class="btn btn-info btn-md btn-view">
                                            <i class="ti-eye"></i>
                                        </button>
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
                    <h4 class="modal-title">Add News</h4>
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
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#gal-tap"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-layers-alt"></i></span>
                                            <span class="hidden-xs-down">Gallery</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#set-tap"
                                                role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span>
                                                <span class="hidden-xs-down">Setting</span></a> </li>
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)

                                        <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="{{ $value['languages_code'] }}_tap" role="tabpanel">
                                            <input type="hidden" id="languages_code"
                                                    name="news_details[{{ $value['languages_code'] }}][news_details_languages_code]"
                                                    value="{{ $value['languages_code'] }}">
                                                <input type="hidden" id="languages_id"
                                                    name="news_details[{{ $value['languages_code'] }}][languages_id]"
                                                    value="{{ $value['languages_id'] }}">
                                            <div class="form-horizontal form-upload">
                                                {{-- <input type="hidden" id="add_news_th" name="add_news_th" value=""> --}}
                                                <div class="form-group row">
                                                    <label for="add_news_details_title"
                                                        class="col-sm-3 text-right control-label col-form-label">News
                                                        Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="add_news_details_title"
                                                            name="news_details[{{ $value['languages_code'] }}][news_details_title]" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row pb-3">
                                                    <label for="add_news_details_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Short
                                                        Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" id="add_news_details_description"
                                                            name="news_details[{{ $value['languages_code'] }}][news_details_short_description]" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row pb-3">
                                                    <label for="add_news_details_content"
                                                        class="col-sm-3 text-right control-label col-form-label">Content
                                                        Details</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" id="add_news_details_content"
                                                            name="news_details[{{ $value['languages_code'] }}][news_details_content_details]" rows="4"></textarea>
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
                                                                id="add_news_banner_slide_image" accept="image/*">
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
                                                            name="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="add_news_banner_slide_url_slug"
                                                        class="col-sm-3 text-right control-label col-form-label">URL
                                                        Link</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="add_news_banner_slide_url_slug_{{ $value['languages_code'] }}"
                                                            name=""
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

                                        <div class="tab-pane" id="gal-tap" role="tabpanel">
                                            <div class="form-horizontal form-upload">
                                                <div class="form-group row">
                                                    <label for="add_news_gallery_image"
                                                        class="col-sm-3 text-right control-label col-form-label">Image</label>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file"
                                                                class="custom-file-input upload-news-img-gal form-control"
                                                                id="add_news_gallery_image" accept="image/*">
                                                            <label class="custom-file-label" id="add_news_gallery_image_txt"
                                                                for="add_news_gallery_image">Choose Image...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="add_news_gallery_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label">Alt
                                                        Text</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="add_news_gallery_alt_text" name=""
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="add_news_details_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label">URL
                                                        Link</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="add_news_gallery_url" name=""
                                                            placeholder="http://">
                                                    </div>
                                                </div>
                                                <div class="form-group row pb-3">
                                                    <label for="add_news_details_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-success btn-rounded waves-effect waves-light"
                                                            id="add_banner_gal"
                                                            name="add_banner_gal">Add more banner</a>
                                                    </div>
                                                </div>

                                                <div class="row draggable-cards" id="draggable-area-gallery">
                                                    {{-- <div class="col-md-6 col-sm-12">
                                                        <div class="card  card-hover">
                                                            <div class="text-right pt-2 pr-2">
                                                                <a href="javascript:void(0)"
                                                                    class="confirm-delete-banner"><i
                                                                        class="ti-close"></i></a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/254.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Cool refreshing shaving
                                                                    foam</h3>
                                                                <p class="card-text"><i class="icon-link"></i>
                                                                    https://intervision.co/en/89643216800</p>

                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tap Gal -->

                                        <div class="tab-pane" id="set-tap" role="tabpanel">
                                            <div class="form-group row">
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
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_details_title"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="add_news_details_title"
                                                        name="news[news_url_slug]" placeholder="http://" required>
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
                                                            id="add_news_og_twitter_image" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile" id="add_news_og_twitter_image_txt">Choose
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
                                                            id="add_news_thumbnail" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile" id="add_news_thumbnail_txt">Choose
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
                                            </div>
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
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#view-gal-tap"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-layers-alt"></i></span>
                                            <span class="hidden-xs-down">Gallery</span></a> </li>
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
                                                            class="col-sm-3 text-right control-label col-form-label">News Title</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_details_title_{{ $value['languages_code'] }}">-

                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label for="add_news_details_link"
                                                            class="col-sm-3 text-right control-label col-form-label">Short Description</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_details_short_description_{{ $value['languages_code'] }}">-

                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label for="add_news"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_details_content_details_{{ $value['languages_code'] }}">-
                                                             </label>
                                                    </div>
                                                    {{-- <div class="row">
                                                        <label for="add_news_details_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_details_status_{{ $value['languages_code'] }}">
                                                            On </label>
                                                    </div>
                                                    <div class="row">
                                                        <label for="add_news_details_content"
                                                            class="col-sm-3 text-right control-label col-form-label">Seo
                                                            Type</label>
                                                        <label class="col-sm-9 control-label col-form-label"
                                                            id="view_news_details_seo_type_{{ $value['languages_code'] }}">
                                                            ใช้ SEO หลัก </label>
                                                    </div>

                                                    <div id="view_seo_{{ $value['languages_code'] }}"
                                                        style="display: none;">
                                                        <div class="row">
                                                            <label for="add_news_details_content"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Title</label>
                                                            <label class="col-sm-9 control-label col-form-label"
                                                                id="view_news_seo_title_{{ $value['languages_code'] }}">
                                                                Seo Title </label>
                                                        </div>

                                                        <div class="row">
                                                            <label for="add_news_details_content"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Keyword</label>
                                                            <label class="col-sm-9 control-label col-form-label"
                                                                id="view_news_seo_keyword_{{ $value['languages_code'] }}">
                                                                Seo Keyword </label>
                                                        </div>

                                                        <div class="row">
                                                            <label for="add_news_details_content"
                                                                class="col-sm-3 text-right control-label col-form-label">Seo
                                                                Description</label>
                                                            <label class="col-sm-9 control-label col-form-label"
                                                                id="view_news_seo_description_{{ $value['languages_code'] }}">
                                                                Seo Description </label>
                                                        </div>
                                                    </div> --}}

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

                                        <div class="tab-pane" id="view-gal-tap" role="tabpanel">
                                            <div class="form-horizontal form-upload">
                                                <div class="row" id="view_banner_gal">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body card-border">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/254.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Cool refreshing shaving
                                                                    foam</h3>
                                                                <p class="card-text"><i class="icon-link"></i> <a
                                                                        href="javascript:void(0)">https://intervision.co/en/89643216800</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body card-border">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/31303.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Clean and fresh Perfume
                                                                </h3>
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
                                                                    src="{{ asset('uploads/images/cms/Banner/32875.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Face care whitening</h3>
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
                                                                    src="{{ asset('uploads/images/cms/Banner/25628.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Thermal Water 30SPF for
                                                                    dry skin </h3>
                                                                <p class="card-text"> <i class="icon-link"></i> <a
                                                                        href="javascript:void(0)">https://intervision.co/en/55262535461</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tap Gal -->

                                        <div class="tab-pane" id="view-set-tap" role="tabpanel">
                                            <div class="row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">News Category
                                                    </label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_category">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_url_slug">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Title</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_mata_title">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Description</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_mata_description">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Keywords</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_mata_keywords">- All</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Robots</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_mata_robots">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    title</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_og_title">-</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_og_description">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_twitter_title">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_twitter_description">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <img class="img-thumbnail" id="view_news_og_twitter_image"
                                                    style="width:30%;" src="{{ asset('uploads/images/no-image.jpg') }}">
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_status">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Public Date</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_public_date">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <img class="img-thumbnail" id="view_news_thumbnail"
                                                    style="width:30%;" src="{{ asset('uploads/images/no-image.jpg') }}">
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Alt
                                                    Text</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_alt">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_banner_status">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Gallery
                                                </label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_gallery_status">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Related News</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_related_news_status">-</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Related News Type</label>
                                                <label class="col-sm-9 control-label col-form-label"
                                                    id="view_news_related_new_type">-</label>
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

    <div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">Edit News</h4>
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
                                                    href="#edit_{{ $value['languages_code'] }}_tap" role="tab"><span
                                                        class="hidden-sm-up"><i
                                                            class="{{ $value['languages_icon'] }}"></i></span> <span
                                                        class="hidden-xs-down">{{ $value['languages_name'] }}</span></a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit-gal-tap"
                                            role="tab"><span class="hidden-sm-up"><i class="ti-layers-alt"></i></span>
                                            <span class="hidden-xs-down">Gallery</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit-set-tap"
                                                role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span>
                                                <span class="hidden-xs-down">Setting</span></a> </li>
                                    </ul>
                                    <!-- End Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                                        @foreach ($Language as $key => $value)
                                            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="edit_{{ $value['languages_code'] }}_tap" role="tabpanel">
                                                <input type="hidden" id="languages_code"
                                                        name="news_details[{{ $value['languages_code'] }}][news_details_languages_code]"
                                                        value="{{ $value['languages_code'] }}">
                                                    <input type="hidden" id="languages_id"
                                                        name="news_details[{{ $value['languages_code'] }}][languages_id]"
                                                        value="{{ $value['languages_id'] }}">
                                                    <input type="hidden" id="edit_news_details_id_{{ $value['languages_code'] }}"
                                                        name="news_details[{{ $value['languages_code'] }}][news_details_id]"
                                                        value="">
                                                <div class="form-horizontal form-upload">
                                                    {{-- <input type="hidden" id="edit_news_th" name="edit_news_th" value=""> --}}
                                                    <div class="form-group row">
                                                        <label for="edit_news_details_title"
                                                            class="col-sm-3 text-right control-label col-form-label">News
                                                            Title</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="edit_news_details_title_{{ $value['languages_code'] }}"
                                                                name="news_details[{{ $value['languages_code'] }}][news_details_title]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="edit_news_details_short_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Short
                                                            Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" id="edit_news_details_short_description_{{ $value['languages_code'] }}"
                                                                name="news_details[{{ $value['languages_code'] }}][news_details_short_description]" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="edit_news_details_content_details"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" id="edit_news_details_content_details_{{ $value['languages_code'] }}"
                                                                name="news_details[{{ $value['languages_code'] }}][news_details_content_details]" rows="4"></textarea>
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
                                                                name="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="edit_news_banner_slide_url_slug"
                                                            class="col-sm-3 text-right control-label col-form-label">URL
                                                            Link</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="edit_news_banner_slide_url_slug_{{ $value['languages_code'] }}"
                                                                name=""
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

                                        <div class="tab-pane" id="edit-gal-tap" role="tabpanel">
                                            <div class="form-horizontal form-upload">
                                                <div class="form-group row">
                                                    <label for="edit_news_gallery_image"
                                                        class="col-sm-3 text-right control-label col-form-label">Image</label>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file"
                                                                class="custom-file-input edit-upload-news-img-gal form-control"
                                                                id="edit_news_gallery_image" accept="image/*">
                                                            <label class="custom-file-label" id="edit_news_gallery_image_txt"
                                                                for="edit_news_gallery_image">Choose Image...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="edit_news_gallery_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label">Alt
                                                        Text</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="edit_news_gallery_alt_text" name=""
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="edit_news_details_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label">URL
                                                        Link</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="edit_news_gallery_url" name=""
                                                            placeholder="http://">
                                                    </div>
                                                </div>
                                                <div class="form-group row pb-3">
                                                    <label for="edit_news_details_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-success btn-rounded waves-effect waves-light"
                                                            id="edit_banner_gal"
                                                            name="edit_banner_gal">Add more banner</a>
                                                    </div>
                                                </div>

                                                <div class="row draggable-cards" id="edit-draggable-area-gallery">
                                                    {{-- <div class="col-md-6 col-sm-12">
                                                        <div class="card  card-hover">
                                                            <div class="text-right pt-2 pr-2">
                                                                <a href="javascript:void(0)"
                                                                    class="confirm-delete-banner"><i
                                                                        class="ti-close"></i></a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/254.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Cool refreshing shaving
                                                                    foam</h3>
                                                                <p class="card-text"><i class="icon-link"></i>
                                                                    https://intervision.co/en/89643216800</p>

                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tap Gal -->

                                        <div class="tab-pane" id="edit-set-tap" role="tabpanel">
                                            <div class="form-group row">
                                                <label for="edit_news_category_th"
                                                    class="col-sm-3 text-right control-label col-form-label">News
                                                    Category</label>
                                                <div class="col-sm-9">

                                                    <select
                                                        class="form-control custom-select select_manager-add select2"
                                                        multiple="" style="height: 36px;width: 100%;"
                                                        id="edit_news_details_category" name="news_category_id[]" placeholder="Select">
                                                        {{-- <input type="hidden" id="ed"> --}}
                                                        @foreach ($NewsCategory as $val)
                                                            <option value="{{$val['news_category_id']}}">{{$val['news_category_mata_title']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_details_title"
                                                    class="col-sm-3 text-right control-label col-form-label">URL
                                                    Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="edit_news_url_slug"
                                                        name="news[news_url_slug]" placeholder="http://">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_mata_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="edit_news_mata_title"
                                                        name="news[news_mata_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_mata_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_mata_description"
                                                        name="news[news_mata_description]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_mata_keywords"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Keywords</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_mata_keywords"
                                                        name="news[news_mata_keywords]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_mata_author"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Author</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_mata_author"
                                                        name="news[news_mata_author]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_details_meta_robots"
                                                    class="col-sm-3 text-right control-label col-form-label">Meta
                                                    Robots</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="1"
                                                                id="edit_news_mata_robots_1"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_mata_robots_1">INDEX</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="2"
                                                                id="edit_news_mata_robots_2"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_mata_robots_2">FOLLOW</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="3"
                                                                id="edit_news_mata_robots_3"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_mata_robots_3">NOODP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="4"
                                                                id="edit_news_mata_robots_4"
                                                                name="news[news_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="edit_news_mata_robots_4">NOYDIR</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_og_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="edit_news_og_title"
                                                        name="news[news_og_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_og_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="edit_news_og_description"
                                                        name="news[news_og_description]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_twitter_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_twitter_title"
                                                        name="news[news_twitter_title]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_twitter_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="edit_news_twitter_description"
                                                        name="news[news_twitter_description]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input edit-upload-news-img form-control"
                                                            id="edit_news_og_twitter_image" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                        <small class="form-text text-muted">Recommended Size: 1200 x 630
                                                            pixel</small>
                                                    </div>
                                                    <div class="card-body">
                                                        <img class="img-thumbnail"
                                                            id="edit_preview_news_og_twitter_image"
                                                            style="width:40%;"
                                                            src="{{ asset('uploads/images/no-image.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="news[news_status]"
                                                        id="edit_news_status"
                                                        checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="edit_news_status"></label>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="edit_news_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" id="edit_news_status" name="news[news_status]" class="toggle edit-status" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div> --}}
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_public_date"
                                                    class="col-sm-3 text-right control-label col-form-label">Public
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" id="edit_news_public_date"
                                                        name="news[news_public_date]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_thumbnail"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input edit-upload-news-img form-control"
                                                            id="edit_news_thumbnail" accept="image/*">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                    </div>
                                                    <div class="card-body">
                                                        <img class="img-thumbnail"
                                                            id="edit_preview_news_thumbnail"
                                                            style="width:40%;"
                                                            src="{{ asset('uploads/images/no-image.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="edit_news_alt"
                                                    class="col-sm-3 text-right control-label col-form-label">Alt
                                                    Text</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="edit_news_alt"
                                                        name="news[news_alt]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner Slide</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="news[news_banner_status]"
                                                        id="edit_news_banner_status"
                                                        checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="edit_news_banner_status"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="news[news_gallery_status]"
                                                        id="edit_news_gallery_status"
                                                        checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="edit_news_gallery_status"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_category_short_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Related
                                                    News</label>
                                                <div class="col-sm-9 custom-switch mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="news[news_related_news_status]"
                                                        id="edit_news_related_news_status"
                                                        checked>
                                                    <label class="custom-control-label control-label col-sm-3"
                                                        for="edit_news_related_news_status"></label>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="edit_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="edit_news_setting_banner" name="news[news_banner_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="edit_news_setting_gallery" name="news[news_gallery_status]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="edit_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Related
                                                    News</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="edit_news_setting_related_news" name="news[news_related_news_status]"
                                                        checked data-toggle="toggle" data-style="ios" data-on="On"
                                                        data-off="Off">
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label for="edit_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Related News
                                                    Type</label>
                                                <div class="col-sm-9">

                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="0"
                                                                id="edit_news_related_new_type_0" name="news[news_related_new_type]" checked>
                                                            <label class="custom-control-label" for="edit_news_related_new_type_0">Random All</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="1"
                                                                id="edit_news_related_new_type_1" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="edit_news_related_new_type_1">Random Same
                                                                Category</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="2"
                                                                id="edit_news_related_new_type_2" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="edit_news_related_new_type_2">Random Same
                                                                Tag Keyword</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="3"
                                                                id="edit_news_related_new_type_3" name="news[news_related_new_type]">
                                                            <label class="custom-control-label" for="edit_news_related_new_type_3">Select</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div id="dvPinNo" style="display: none;">
                                                <div class="form-group row">
                                                    <label for="edit_news_details_title"
                                                        class="col-sm-3 text-right edit_news_details_title">News
                                                        Title</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <select class="form-control select2" id="edit_news_details_title"
                                                                name="edit_news_details_title">
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
                </form>

            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        var languages = <?=$Language?>;
        $(document).ready(function() {

            $.each(languages, function(index, value) {

                // CKEDITOR.replace('add_news_category_content_details_' + value.languages_code, {
                //     height: 250
                // });

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
                                $(item).find('#edit_news_banner_slide_sort')
                                    .val(idx);
                            });

                            $('#draggable-area-gallery .banner-img').each((idx, item) => {
                                $(item).find('#add_news_gallery_sort')
                                    .val(idx);
                            });

                            $('#edit-draggable-area-gallery .banner-img').each((idx, item) => {
                                $(item).find('#edit_news_gallery_sort')
                                    .val(idx);
                            });

                        });
                }, 3000);

                $('body').on('change', '.upload-news-banner-img-' + value.languages_code, function() {
                    var ele = $(this);
                    console.log(ele);
                    var index = ele.data('index');
                    var formData = new FormData();
                    formData.append('file', ele[0].files[0]);
                    // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                    $.ajax({
                        url: url_gb + '/admin/UploadImage/NewsBannerSlideTemp',
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
                        url: url_gb + '/admin/UploadImage/NewsBannerSlideTemp',
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

                // $('body').on('change', '.seo-type-' + value.languages_code + ':checked', function(data) {
                //     if ($(".seo-type-" + value.languages_code + ":checked").val() == '1') {
                //         $("#seo_tap_" + value.languages_code).css("display", "block");
                //     } else {
                //         $("#seo_tap_" + value.languages_code).css("display", "none");
                //     }
                // });

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
                            `][news_banner_slide_languages_code]" value="` + value
                            .languages_code + `">
                                        <input type="hidden" id="languages_id" name="news_category_banner[` + value
                            .languages_code + `][` + key_banner + `][languages_id]" value="` + value
                            .languages_id +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_image" name="news_category_banner[` +
                            value.languages_code + `][` + key_banner +
                            `][news_banner_slide_image]" value="` +
                            news_banner_slide_image +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_alt" name="news_category_banner[` +
                            value.languages_code + `][` + key_banner +
                            `][news_banner_slide_alt]" value="` + news_banner_slide_alt +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_url_slug" name="news_category_banner[` + value.languages_code + `][` +
                            key_banner + `][news_banner_slide_url_slug]" value="` +
                            news_banner_slide_url_slug +
                            `">
                                        <input type="hidden" class="form-control" id="add_news_category_banner_slide_sort" name="news_category_banner[` +
                            value.languages_code + `][` + key_banner +
                            `][news_banner_slide_sort]" value="` + key_banner + `">
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
                            $(item).find('#edit_news_banner_slide_sort')
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
                                            <input type="hidden" id="languages_code" name="news_banner[` + value
                                .languages_code + `][` + key_banner_edit +
                                `][news_banner_slide_languages_code]" value="` +
                                value.languages_code + `">
                                            <input type="hidden" id="languages_id" name="news_banner[` + value
                                .languages_code + `][` + key_banner_edit +
                                `][languages_id]" value="` + value.languages_id +
                                `">
                                            <input type="hidden" class="form-control" id="edit_news_banner_slide_image" name="news_banner[` + value
                                .languages_code + `][` + key_banner_edit +
                                `][news_banner_slide_image]" value="` +
                                news_banner_slide_image +
                                `">
                                            <input type="hidden" class="form-control" id="edit_news_banner_slide_alt" name="news_banner[` +
                                value.languages_code + `][` + key_banner_edit +
                                `][news_banner_slide_alt]" value="` +
                                news_banner_slide_alt +
                                `">
                                            <input type="hidden" class="form-control" id="edit_banner_slide_url_slug" name="news_banner[` +
                                value.languages_code + `][` + key_banner_edit +
                                `][news_banner_slide_url_slug]" value="` +
                                news_banner_slide_url_slug +
                                `">
                                            <input type="hidden" class="form-control" id="edit_news_banner_slide_sort" name="news_banner[` +
                                value.languages_code + `][` + key_banner_edit +
                                `][news_banner_slide_sort]" value="` +
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
                });

                $(function() {
                    var drake = dragula([document.getElementById("draggable-area-" + value
                        .languages_code)]);
                    dragula([document.getElementById("card-colors")]).on("drag", function(e) {
                        e.className = e.className.replace("card-moved", "")
                    }).on("drop", function(e) {
                        e.className += " card-moved"
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
                            $(item).find('#edit_news_banner_slide_sort')
                                .val(idx);
                        });
                    });
                });

            });

            var tableNew = $('#tableNew').dataTable({
                "ajax": {
                    "url": url_gb + "/admin/News/Lists",
                    "type": "POST",
                    "data": function(d) {
                        d.news_title = $('#search_news_title').val();
                        d.news_category_id = $('#search_news_category_id').val();
                        d.create_date = $('#search_news_created_date').val();
                        d.update_date = $('#search_news_updated_date').val();
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
                        "data": "news_thumbnail"
                    },
                    {
                        "data": "news_title"
                    },
                    {
                        "data": "news_tag_category"
                    },
                    {
                        "data": "view"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "updated_at"
                    },
                    {
                        "data": "news_public_date"
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

            $('body').on('change', '.upload-news-img', function() {
                var ele = $(this);
                var index = ele.data('index');
                var formData = new FormData();
                formData.append('file', ele[0].files[0]);
                // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/NewsImageTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        ele.closest('#FormAdd').find('#' + ele[0].id).append(
                            '<input type="hidden" id="' + ele[0].id +
                            '"  name="news[' + ele[0].id.replace("add_", "") +
                            ']" value="' + res.path + '">');
                        setTimeout(function() {}, 100);
                    }
                });
            });

            $('body').on('change', '.edit-upload-news-img', function() {
                var ele = $(this);
                var index = ele.data('index');
                var formData = new FormData();
                formData.append('file', ele[0].files[0]);
                // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/NewsImageTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        ele.closest('#FormEdit').find('#' + ele[0].id).append(
                            '<input type="hidden" id="' + ele[0].id +
                            '"  name="news[' + ele[0].id.replace("edit_", "") +
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
                    url: url_gb + "/admin/News/" + id,
                    data: {
                        id: id
                    }
                }).done(function(res) {
                    resetButton(btn);
                    $.each(res.news, function(index, value) {
                        $('#view_' + index).text(value);
                    });

                    if (res.news.news_status == 1) {
                        $('#view_news_status').text('On');
                    } else {
                        $('#view_news_status').text('Off');
                    }

                    if (res.news.news_banner_status == 1) {
                        $('#view_news_banner_status').text('On');
                    } else {
                        $('#view_news_banner_status').text('Off');
                    }

                    if (res.news.news_related_news_status == 1) {
                        $('#view_news_related_news_status').text('On');
                    } else {
                        $('#view_news_related_news_status').text('Off');
                    }

                    if (res.news.news_gallery_status == 1) {
                        $('#view_news_gallery_status').text('On');
                    } else {
                        $('#view_news_gallery_status').text('Off');
                    }

                    if (res.news.news_related_new_type == 0) {
                        $('#view_news_related_new_type').text('Random All');
                    } else if(res.news.news_related_new_type == 1){
                        $('#view_news_related_new_type').text('Random Same Category');
                    } else if(res.news.news_related_new_type == 2){
                        $('#view_news_related_new_type').text('Random Same Tag Keyword');
                    } else if(res.news.news_related_new_type == 3){
                        $('#view_news_related_new_type').text('Select');
                    }

                    var robots_decode = JSON.parse(res.news.news_mata_robots);
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
                    $('#view_news_mata_robots').text(txt_robots);

                    if (res.news.news_og_twitter_image !== undefined) {
                        const url_news_og_twitter_image = url_gb +
                            '/uploads/NewsImage/' + res.news
                            .news_og_twitter_image;
                        $('#view_news_og_twitter_image').attr('src',
                            url_news_og_twitter_image);
                    }

                    if (res.news.news_thumbnail !== undefined) {
                        const url_news_thumnail_image = url_gb +
                            '/uploads/NewsImage/' + res.news
                            .news_thumbnail;
                        $('#view_news_thumbnail').attr('src',
                            url_news_thumnail_image);
                    }

                    var span_category = '';
                    $.each(res.new_category, function(index, value){
                        span_category += '<span class="badge badge-pill badge-info text-white">' + value.news_category['news_category_mata_title'] + '</span></br>';
                    });
                    $('#view_news_category').html(span_category);

                    $.each(res.news_details, function(index, value) {
                        $.each(value, function(idx, val) {
                            $('#view_' + idx + '_' + value
                                .news_details_languages_code).text(val);
                        });

                        // if (value.news_details_status == 1) {
                        //     $('#view_news_details_status_' + value
                        //         .news_details_languages_code).text('On');
                        // } else {
                        //     $('#view_news_details_status_' + value
                        //         .news_details_languages_code).text('Off');
                        // }

                        // if (value.news_details_seo_type == 0) {
                        //     $('#view_news_details_seo_type_' + value
                        //         .news_details_languages_code).text(
                        //         'ใช้ SEO หลัก');
                        // } else {
                        //     $('#view_news_details_seo_type_' + value
                        //         .news_details_languages_code).text(
                        //         'ใช้ SEO ตามภาษา');
                        //     $('#view_seo_' + value.news_details_languages_code)
                        //         .css('display', 'block');
                        //     $('#view_news_seo_title_' + value
                        //         .news_details_languages_code).text(value
                        //         .news_details_seo_title);
                        //     $('#view_news_seo_keyword_' + value
                        //         .news_details_languages_code).text(value
                        //         .news_details_seo_keyword);
                        //     $('#view_news_seo_description_' + value
                        //         .news_details_languages_code).text(value
                        //         .news_details_short_description);
                        // }

                        var html = '';
                        $.each(value.news_banner_slide, function(idx_banner,
                            val_banner) {
                            if (value.news_details_languages_code ==
                                val_banner.news_banner_slide_languages_code
                                ) {
                                html +=
                                    `<div class="col-md-6 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body card-border">
                                                        <img class="img-responsive w-100 mb-3" id="preview_img_cover_add" src="{{ asset('uploads/NewsBannerSlide/` +
                                    val_banner.news_banner_slide_image + `') }}">
                                                        <h3 class="card-title">Alert Text : ` + val_banner
                                    .news_banner_slide_alt +
                                    `</h3>
                                                        <p class="card-text"><i class="icon-link"></i> <a href="javascript:void(0)">` + val_banner
                                    .news_banner_slide_url_slug + `</a> </p>
                                                    </div>
                                                </div>
                                            </div>`;

                            }
                        });
                        $('#view_banner_slide_' + value
                                .news_details_languages_code)
                            .html(html);

                    });

                    var html = '';
                    $.each(res.news_gallery, function(idx_banner,
                        val_banner) {
                            html +=
                                `<div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-body card-border">
                                                    <img class="img-responsive w-100 mb-3" id="preview_img_cover_add" src="{{ asset('uploads/NewsGallery/` +
                                val_banner.news_gallery_image_gall + `') }}">
                                                    <h3 class="card-title">Alert Text : ` + val_banner
                                .news_gallery_alt +
                                `</h3>
                                                    <p class="card-text"><i class="icon-link"></i> <a href="javascript:void(0)">` + val_banner
                                .news_gallery_url + `</a> </p>
                                                </div>
                                            </div>
                                        </div>`;
                    });
                    $('#view_banner_gal')
                        .html(html);

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
                    url: url_gb + "/admin/News/" + id,
                    data: {
                        id: id
                    }
                }).done(function(res) {
                    console.log(res);
                    // return;
                    resetButton(btn);

                    $.each(res.news, function(index, value) {
                        if (index !== 'news_og_twitter_image' && index !=
                            'news_thumbnail') {
                            $('#edit_' + index).val((value !== null) ? value : '');
                        } else {
                            const url = url_gb + '/uploads/NewsImage/' + res
                                .news[index];
                            $('#edit_preview_' + index).attr('src', url);
                        }
                    });

                    var arr = [];
                    $.each(res.new_category, function(k, v) {
                        console.log(res.new_category);
                        arr[k] = v.news_category.news_category_id;
                        $("#edit_news_details_category").val(arr);
                        $("#edit_news_details_category").trigger('change');
                    });

                    if (res.news.news_banner_status == 1) {
                        $('#edit_news_banner_status').prop('checked',
                            true);
                    } else {
                        $('#edit_news_banner_status').prop('checked',
                            false);
                    }
                    if (res.news.news_gallery_status == 1) {
                        $('#edit_news_gallery_status').prop('checked',
                            true);
                    } else {
                        $('#edit_news_gallery_status').prop('checked',
                            false);
                    }
                    if (res.news.news_related_news_status == 1) {
                        $('#edit_news_related_news_status').prop('checked',
                            true);
                    } else {
                        $('#edit_news_related_news_status').prop('checked',
                            false);
                    }
                    if (res.news.news_status == 1) {
                        $('#edit_news_status').prop('checked',
                            true);
                    } else {
                        $('#edit_news_status').prop('checked',
                            false);
                    }

                    var robots_decode = JSON.parse(res.news.news_mata_robots);
                    $.each(robots_decode, function(idx_robots, val_robots) {
                        $('#edit_news_mata_robots_' + val_robots).prop('checked',
                            true);
                    });

                    if (res.news.news_status == 1) {
                        $('#edit_news_status').prop('checked', true);
                    } else {
                        $('#edit_news_status').prop('checked', false);
                    }

                    if (res.news.news_banner_status == 1) {
                        $('#edit_news_banner_status').prop('checked', true);
                    } else {
                        $('#edit_news_banner_status').prop('checked', false);
                    }

                    if(res.news.news_related_new_type !== null){
                        $('#edit_news_related_new_type_' + res.news.news_related_new_type).prop('checked', true);
                    }

                    $.each(res.news_details, function(index, value) {
                        $.each(value, function(idx, val) {
                            $('#edit_' + idx + '_' + value
                                .news_details_languages_code).val(val);
                        });

                        if (value.news_details_status == 1) {
                            $('#edit_news_details_status_' + value
                                .news_details_languages_code).prop('checked',
                                true);
                        } else {
                            $('#edit_news_details_status_' + value
                                .news_details_languages_code).prop('checked',
                                false);
                        }

                        // CKEDITOR.replace('edit_news_details_details_'+value.news_details_languages_code, {
                        //     height: 250
                        // });

                        if (value.news_details_seo_type == 0) {
                            $('#edit_news_details_seo_type_' + value
                                .news_details_languages_code).attr('checked',
                                'checked');
                            $('#edit_news_details_seo_type_' + value
                                .news_details_languages_code).val(0);
                        } else {
                            $('#edit_news_details_seo_type_' + value
                                .news_details_languages_code).val(0);
                            $('#edit_news_details_seo_type_' + value
                                .news_details_languages_code + '_1').attr(
                                'checked', 'checked');
                            $('#seo_edit_tap_' + value.news_details_languages_code)
                                .css('display', 'block');
                            $('#edit_news_seo_title_' + value
                                .news_details_languages_code).val(value
                                .news_details_seo_title);
                            $('#edit_news_seo_keyword_' + value
                                .news_details_languages_code).val(value
                                .news_details_seo_keyword);
                            $('#edit_news_seo_description_' + value
                                .news_details_languages_code).val(value
                                .news_details_short_description);
                        }

                        $('body').on('change', '.edit-seo-type-' + value
                            .news_details_languages_code + ':checked',
                            function(data) {
                                if ($(".edit-seo-type-" + value
                                        .news_details_languages_code +
                                        ":checked").val() == '1') {
                                    $("#seo_edit_tap_" + value
                                        .news_details_languages_code).css(
                                        "display", "block");
                                } else {
                                    $("#seo_edit_tap_" + value
                                        .news_details_languages_code).css(
                                        "display", "none");
                                }
                            });

                        var html = '';

                        $.each(value.news_banner_slide, function(idx_banner,
                            val_banner) {
                            if (value.news_details_languages_code ==
                                val_banner.news_banner_slide_languages_code
                                ) {
                                html +=
                                    `<div class="col-md-6 col-sm-12 banner-img-` +
                                    val_banner
                                    .news_banner_slide_languages_code + `">
                                                <input type="hidden" id="languages_code" name="news_banner[` +
                                    val_banner
                                    .news_banner_slide_languages_code +
                                    `][` + val_banner.news_banner_slide_sort +
                                    `][news_banner_slide_languages_code]" value="` +
                                    val_banner
                                    .news_banner_slide_languages_code + `">
                                                <input type="hidden" id="languages_id" name="news_banner[` +
                                    val_banner
                                    .news_banner_slide_languages_code +
                                    `][` + val_banner.news_banner_slide_sort +
                                    `][languages_id]" value="` + value
                                    .languages_id +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_banner_slide_image" name="news_banner[` +
                                    val_banner
                                    .news_banner_slide_languages_code +
                                    `][` + val_banner.news_banner_slide_sort +
                                    `][news_banner_slide_image]" value="` +
                                    val_banner.news_banner_slide_image +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_banner_slide_alt" name="news_banner[` +
                                    val_banner
                                    .news_banner_slide_languages_code +
                                    `][` + val_banner.news_banner_slide_sort +
                                    `][news_banner_slide_alt]" value="` +
                                    val_banner.news_banner_slide_alt +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_banner_slide_url_slug" name="news_banner[` +
                                    val_banner
                                    .news_banner_slide_languages_code +
                                    `][` + val_banner.news_banner_slide_sort +
                                    `][news_banner_slide_url_slug]" value="` +
                                    val_banner.news_banner_slide_url_slug +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_banner_slide_sort" name="news_banner[` +
                                    val_banner
                                    .news_banner_slide_languages_code +
                                    `][` + val_banner.news_banner_slide_sort +
                                    `][news_banner_slide_sort]" value="` +
                                    val_banner.news_banner_slide_sort +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_banner_id" name="news_banner[` + val_banner
                                    .news_banner_slide_languages_code +
                                    `][` + val_banner.news_banner_slide_sort +
                                    `][news_banner_slide_id]" value="` +
                                    val_banner.news_banner_slide_id + `">
                                                <div class="card  card-hover">
                                                    <div class="text-right pt-2 pr-2">
                                                        <a href="javascript:void(0)" class="confirm-delete-banner-` + value
                                    .news_details_languages_code +
                                    `"><i class="ti-close"></i></a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <img class="img-responsive w-100 mb-3" id="preview_img_cover_edit_` + val_banner
                                    .news_banner_slide_languages_code +
                                    `" src="{{ asset('uploads/NewsBannerSlide/` +
                                    val_banner.news_banner_slide_image + `') }}">
                                                        <h3 class="card-title">Alert Text : ` + val_banner
                                    .news_banner_slide_alt + `</h3>
                                                        <p class="card-text"><i class="icon-link"></i> ` + val_banner
                                    .news_banner_slide_url_slug + `</p>
                                                    </div>
                                                </div>
                                            </div>`;

                            }
                        });
                        $('#edit-draggable-area-' + value
                            .news_details_languages_code).html(html);
                    });

                    var html = '';
                    $.each(res.news_gallery, function(idx_banner,
                            val_banner) {
                                html +=
                                    `<div class="col-md-6 col-sm-12 banner-img">
                                                <input type="hidden" class="form-control" id="edit_news_gallery_image_gall" name="news_gallery[` + idx_banner +
                                    `][news_gallery_image_gall]" value="` +
                                    val_banner.news_gallery_image_gall +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_gallery_alt" name="news_gallery[` + idx_banner +
                                    `][news_gallery_alt]" value="` +
                                    val_banner.news_gallery_alt +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_gallery_url" name="news_gallery[` + idx_banner +
                                    `][news_gallery_url]" value="` +
                                    val_banner.news_gallery_url +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_gallery_sort" name="news_gallery[` + idx_banner +
                                    `][news_gallery_sort]" value="` +
                                    val_banner.news_gallery_sort +
                                    `">
                                                <input type="hidden" class="form-control" id="edit_news_banner_id" name="news_gallery[` + idx_banner +
                                    `][news_gallery_id]" value="` +
                                    val_banner.news_gallery_id + `">
                                                <div class="card  card-hover">
                                                    <div class="text-right pt-2 pr-2">
                                                        <a href="javascript:void(0)" class="confirm-delete-banner"><i class="ti-close"></i></a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <img class="img-responsive w-100 mb-3" id="preview_img_cover_edit" src="{{ asset('uploads/NewsGallery/` +
                                    val_banner.news_gallery_image_gall + `') }}">
                                                        <h3 class="card-title">Alert Text : ` + val_banner
                                    .news_gallery_alt + `</h3>
                                                        <p class="card-text"><i class="icon-link"></i> ` + val_banner
                                    .news_gallery_url + `</p>
                                                    </div>
                                                </div>
                                            </div>`;


                        });
                        $('#edit-draggable-area-gallery').html(html);

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
                    url: url_gb + "/admin/News",
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        form[0].reset();
                        $("#add_news_details_category").val('').change();
                        $("#add_news_og_twitter_image_txt").text('Choose Image...');
                        $("#add_news_thumbnail_txt").text('Choose Image...');

                        $.each(languages, function(index, value) {
                            $('#draggable-area-'+ value.languages_code).children().remove();
                        });

                        $('#draggable-area-gallery').children().remove();
                        $('#ModalAdd').modal('hide');
                        tableNew.api().ajax.reload();
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
                    url: url_gb + "/admin/News/" + id,
                    data: form.serialize()
                }).done(function(res) {
                    resetButton(form.find('button[type=submit]'));
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        form[0].reset();
                        $('#ModalEdit').modal('hide');
                        tableNew.api().ajax.reload();
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
                    url: url_gb + "/admin/News/ChangeStatus/" + id,
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

            $('body').on('change','.change-status1',function(data){
                var id = $(this).data('id');
                var status = $(this).is(':checked');
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/Faqs/ChangeStatus/"+id,
                    data: {
                        id: id,
                        status: status ? 1 : 0,
                    }
                }).done(function(res) {
                    if(res.status == 1){

                    }else{
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

            $('body').on('change', '.upload-news-img-gal', function() {
                var ele = $(this);
                var index = ele.data('index');
                var formData = new FormData();
                formData.append('file', ele[0].files[0]);
                // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/NewsGalleryTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        ele.closest('#FormAdd').find('#' + ele[0].id).append(
                            '<input type="hidden" id="' + ele[0].id + '_temp"  name="' + ele[0].id.replace("add_", "") + '" value="' + res.path + '">'
                            );
                        setTimeout(function() {}, 100);
                    }
                });
            });

            $('body').on('change', '.edit-upload-news-img-gal', function() {
                var ele = $(this);
                var index = ele.data('index');
                var formData = new FormData();
                formData.append('file', ele[0].files[0]);
                // $('#edit_preview_img').attr('src', URL.createObjectURL(event.target.files[0]));
                $.ajax({
                    url: url_gb + '/admin/UploadImage/NewsGalleryTemp',
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(res) {
                        ele.closest('#FormEdit').find('#' + ele[0].id).append(
                            '<input type="hidden" id="' + ele[0].id + '_temp"  name="' + ele[0].id.replace("edit_", "") + '" value="' + res.path + '">'
                            );
                        setTimeout(function() {}, 100);
                    }
                });
            });

            var key_banner_gal = 0;
            $('body').on('click', '#add_banner_gal', function(e) {
                const news_banner_slide_image = $('#add_news_gallery_image_temp').val();
                const news_banner_slide_alt = $('#add_news_gallery_alt_text').val();
                const news_banner_slide_url_slug = $('#add_news_gallery_url').val();

                if (news_banner_slide_image !== undefined) {

                    let html = `<div class="col-md-6 col-sm-12 banner-img">
                                    <input type="hidden" class="form-control" id="add_news_gallery_image" name="news_banner_gal[` + key_banner_gal +
                        `][news_gallery_image_gall]" value="` +
                        news_banner_slide_image +
                        `">
                                    <input type="hidden" class="form-control" id="add_news_gallery_alt_text" name="news_banner_gal[` + key_banner_gal +
                        `][news_gallery_alt]" value="` + news_banner_slide_alt +
                        `">
                                    <input type="hidden" class="form-control" id="add_news_gallery_url" name="news_banner_gal[` +
                                    key_banner_gal + `][news_gallery_url]" value="` +
                        news_banner_slide_url_slug +
                        `">
                                    <input type="hidden" class="form-control" id="add_news_category_banner_slide_sort" name="news_banner_gal[` + key_banner_gal +
                        `][news_gallery_sort]" value="` + key_banner_gal + `">
                                    <div class="card  card-hover">
                                        <div class="text-right pt-2 pr-2">
                                            <a href="javascript:void(0)" class="confirm-delete-banner"><i class="ti-close"></i></a>
                                        </div>
                                        <div class="card-body pt-0">
                                            <img class="img-responsive w-100 mb-3" id="preview_img_cover_gal" src="{{ asset('uploads/` +
                        news_banner_slide_image + `') }}">
                                            <h3 class="card-title">Alert Text : ` + news_banner_slide_alt + `</h3>
                                            <p class="card-text"><i class="icon-link"></i> ` +
                        news_banner_slide_url_slug + `</p>
                                        </div>
                                    </div>
                                </div>`;

                    $('#draggable-area-gallery').append(html);
                    $('#add_news_gallery_image').val('');
                    $('#add_news_gallery_image_txt').text(
                        'Choose Image...');
                    $('#add_news_gallery_image_temp').remove();
                    $('#add_news_gallery_alt_text').val('');
                    $('#add_news_gallery_url').val('');
                    key_banner_gal++;
                } else {
                    Swal.fire("Please select image!", 'Add unsuccessful', 'error');
                }
            });

            var key_banner_gal_edit = 0;
            $('body').on('click', '#edit_banner_gal', function(e) {

                $('#edit-draggable-area-gallery .banner-img').each((idx, item) => {
                    key_banner_gal_edit = idx + 1;
                    $(item).find('#edit_news_gallery_sort')
                        .val(idx);
                });

                const news_banner_slide_image = $('#edit_news_gallery_image_temp').val();
                const news_banner_slide_alt = $('#edit_news_gallery_alt_text').val();
                const news_banner_slide_url_slug = $('#edit_news_gallery_url').val();

                if (news_banner_slide_image !== undefined) {

                    let html = `<div class="col-md-6 col-sm-12 banner-img">
                                    <input type="hidden" class="form-control" id="edit_news_gallery_image" name="news_gallery[` + key_banner_gal_edit +
                        `][news_gallery_image_gall]" value="` +
                        news_banner_slide_image +
                        `">
                                    <input type="hidden" class="form-control" id="edit_news_gallery_alt_text" name="news_gallery[` + key_banner_gal_edit +
                        `][news_gallery_alt]" value="` + news_banner_slide_alt +
                        `">
                                    <input type="hidden" class="form-control" id="edit_news_gallery_url" name="news_gallery[` +
                                    key_banner_gal_edit + `][news_gallery_url]" value="` +
                        news_banner_slide_url_slug +
                        `">
                                    <input type="hidden" class="form-control" id="edit_news_gallery_sort" name="news_gallery[` + key_banner_gal_edit +
                        `][news_gallery_sort]" value="` + key_banner_gal_edit + `">
                                    <div class="card  card-hover">
                                        <div class="text-right pt-2 pr-2">
                                            <a href="javascript:void(0)" class="confirm-delete-banner"><i class="ti-close"></i></a>
                                        </div>
                                        <div class="card-body pt-0">
                                            <img class="img-responsive w-100 mb-3" id="preview_img_cover_gal" src="{{ asset('uploads/` +
                        news_banner_slide_image + `') }}">
                                            <h3 class="card-title">Alert Text : ` + news_banner_slide_alt + `</h3>
                                            <p class="card-text"><i class="icon-link"></i> ` +
                        news_banner_slide_url_slug + `</p>
                                        </div>
                                    </div>
                                </div>`;

                    $('#edit-draggable-area-gallery').append(html);
                    $('#edit_news_gallery_image').val('');
                    $('#edit_news_gallery_image_txt').text(
                        'Choose Image...');
                    $('#edit_news_gallery_image_temp').remove();
                    $('#edit_news_gallery_alt_text').val('');
                    $('#edit_news_gallery_url').val('');
                    key_banner_gal_edit++;
                } else {
                    Swal.fire("Please select image!", 'Add unsuccessful', 'error');
                }
            });

            $(function() {
                var drake = dragula([document.getElementById("draggable-area-gallery")]);
                dragula([document.getElementById("card-colors")]).on("drag", function(e) {
                    e.className = e.className.replace("card-moved", "")
                }).on("drop", function(e) {
                    e.className += " card-moved"
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
                    $('#draggable-area-gallery .banner-img').each((idx, item) => {
                        $(item).find('#add_news_category_banner_slide_sort')
                            .val(idx);
                    });
                });
            });

            $(function() {
                var drake = dragula([document.getElementById("edit-draggable-area-gallery")]);
                dragula([document.getElementById("card-colors")]).on("drag", function(e) {
                    e.className = e.className.replace("card-moved", "")
                }).on("drop", function(e) {
                    e.className += " card-moved"
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
                    $('#edit-draggable-area-gallery .banner-img').each((idx, item) => {
                        $(item).find('#edit_news_gallery_sort')
                            .val(idx);
                    });
                });
            });

            $('body').on('change', '#edit_news_status', function() {
                if ($(this).is(':checked')) {
                    $('#edit_news_status').val(1);
                } else {
                    $('#edit_news_status').val(0);
                }
            })

            $('body').on('change', '#edit_news_banner_status', function() {
                if ($(this).is(':checked')) {
                    $('#edit_news_banner_status').val(1);
                } else {
                    $('#edit_news_banner_status').val(0);
                }
            })

            $('body').on('change', '#edit_news_gallery_status', function() {
                if ($(this).is(':checked')) {
                    $('#edit_news_gallery_status').val(1);
                } else {
                    $('#edit_news_gallery_status').val(0);
                }
            })

            $('body').on('change', '#edit_news_related_news_status', function() {
                if ($(this).is(':checked')) {
                    $('#edit_news_related_news_status').val(1);
                } else {
                    $('#edit_news_related_news_status').val(0);
                }
            })

            setTimeout(function() {
                $('body').on('click', '.confirm-delete-banner',
                    function() {
                        var ele = $(this);
                        $(ele).closest('div.banner-img').remove();

                        $('#draggable-area-gallery .banner-img').each((idx, item) => {
                            $(item).find('#add_news_gallery_sort')
                                .val(idx);
                        });

                        $('#edit-draggable-area-gallery .banner-img').each((idx, item) => {
                            $(item).find('#edit_news_gallery_sort')
                                .val(idx);
                        });

                    });
            }, 3000);

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
                            url: url_gb + "/admin/News/Delete/" + id,
                            data: {
                                id: id,
                            }
                        }).done(function(res) {
                            if (res.status == 1) {
                                Swal.fire(res.title, res.content, 'success');
                                tableNew.api().ajax.reload();
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
                    url: url_gb+"/admin/News/ChangeStatus/"+ id,
                    data: {
                        id: changStatus,
                        news_status: status ? 1 : 0,
                    }
                }).done(function(res) {
                    if(res.status == 1){
                        tableNew.api().ajax.reload();
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
                            url: url_gb + "/admin/News/Delete/"+ id,
                            data: {
                                id: delStatus,
                            }
                        }).done(function(res) {
                            if (res.status == 1) {
                                Swal.fire(res.title, res.content, 'success');
                                tableNew.api().ajax.reload();
                            }else {
                                Swal.fire(res.title, res.content, 'error');
                            }
                        }).fail(function(res) {
                            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                        });
                    }
                });
            });

            $('body').on('click', '.btn-search', function() {
                tableNew.api().ajax.reload();
            });

            $('body').on('click', '.btn-clear-search', function() {
                $('#search_news_title').val('');
                $('#search_news_category_id').val('').change();
                $('#search_news_created_date').val('');
                $('#search_news_updated_date').val('');
                $('#search_news_status').prop('checked', true);
                tableNew.api().ajax.reload();
            });

        });

    </script>
@endsection
