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
            /* border-top: 1px solid rgba(120,130,140,.13); */
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
                                    <label class="control-label" for="search_news_seo_title">News Title</label>
                                    <input type="text" id="search_news_seo_title" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_news_seo_category">News Category</label>
                                    <select class="form-control select2" id="search_news_seo_category"
                                        name="search_news_seo_category">
                                        <option>Select Type</option>
                                        <option value="">ข่าวในพระราชสำนัก</option>
                                        <option value="">ข่าวในท้องถิ่น</option>
                                        <option value="">ข่าวในต่างประเทศ</option>
                                        <option value="">ข่าวในประเทศ</option>
                                        <option value="">ข่าวเศรษฐกิจ</option>
                                        <option value="">ข่าวกีฬา</option>
                                        <option value="">ข่าวอาชญากรรม</option>
                                        <option value="">ข่าวเกษตร</option>
                                        <option value="">ข่าวบันเทิง</option>
                                        <option value="">ข่าวอากาศ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_news_seo_created_date">Created Date</label>
                                    <input type="date" id="search_news_seo_create_date" name="search_news_seo_created_date"
                                        class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_news_seo_updated_date">Updated Date</label>
                                    <input type="date" id="search_news_seo_create_date" name="search_news_seo_updated_date"
                                        class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_news_seo_status">Status</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1"
                                                id="search_user_status" name="search_user_status" checked>
                                            <label class="custom-control-label" for="search_user_status">All</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1"
                                                id="search_news_seo_status_1" name="search_news_seo_status">
                                            <label class="custom-control-label" for="search_news_seo_status_1">On</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0"
                                                id="search_news_seo_status_2" name="search_news_seo_status">
                                            <label class="custom-control-label" for="search_news_seo_status_2">Off</label>
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
                        <h4 class="card-title">{{ $MainMenus->menu_system_name }} <small class="">(3 items)</small> </h4>
                        <button type="button" class="btn btn-success mb-2 float-right newdata btn-add">Add News</button>
                        <!-- <button type="button" class="btn btn-success btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#ModalAddnew1" data-product_id="0">Add New1</button> -->
                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                                <span class="badge badge-secondary"><i class="ti-check"></i></span> Check All
                            </a>
                            <a href="javascript:void(0)" class="pr-3">
                                <span class="badge badge-warning"><i class="icon-refresh"></i></span> Chang Status
                            </a>
                            <a href="javascript:void(0)" class="pr-3">
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
                                {{-- <tr>
                                    <td scope="row" class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table"
                                                id="SelectNews2" required>
                                            <label class="custom-control-label" for="SelectNews2"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">2</th>
                                    <td>3</td>
                                    <td><img id="preview_img_cover_add" style="height:20%;"
                                            src="{{ asset('uploads/images/no-image.jpg') }}"></td>
                                    <td>หมู่บ้านต้นแบบ จิตอาสาทำดีด้วยหัวใจ อ.สนม ร่วมกันคิด ร่วมกันสร้าง</td>
                                    <td>ข่าวในท้องถิ่น</td>
                                    <td>562</td>
                                    <td> 01/09/2020 16:40 - Tom & Jerry </td>
                                    <td></td>
                                    <td>01/09/2020 18:00</td>
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
                                    <td><img id="preview_img_cover_add" style="height:20%;"
                                            src="{{ asset('uploads/images/no-image.jpg') }}"></td>
                                    <td>แรงไม่เกรงใจเจ้าบ้าน! เจาะ 5 ประเด็น เลสเตอร์ โหดบุกขย้ำ แมนซิตี้</td>
                                    <td>ข่าวกีฬา</td>
                                    <td>562</td>
                                    <td> 10/08/2020 21:05 - สาธิต กรีฑา </td>
                                    <td></td>
                                    <td></td>
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

                <form id="" class="needs-validation" novalidate>
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
                                                        name="news_details[{{ $value['languages_code'] }}][news_category_details_languages_code]"
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
                                                    <div class="form-group row">
                                                        <label for="add_news_details_title"
                                                            class="col-sm-3 text-right control-label col-form-label">URL
                                                            Link</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="add_news_details_title"
                                                                name="news_details[{{ $value['languages_code'] }}][news_details_title]" placeholder="http://" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="add_news_category_th"
                                                            class="col-sm-3 text-right control-label col-form-label">News
                                                            Category</label>
                                                        <div class="col-sm-9">
                                                            
                                                            <select
                                                                class="form-control custom-select select_manager-add select2"
                                                                multiple="" style="height: 36px;width: 100%;"
                                                                id="add_manager_id_{{ $value['languages_code'] }}" name="news_details[{{ $value['languages_code'] }}][news_details_title]" placeholder="Select">
                                                                @foreach ($NewsCategory as $val)
                                                                    <option value="{{$val['news_category_id']}}">{{$val['news_category_mata_title']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_details_description"
                                                            class="col-sm-3 text-right control-label col-form-label">Short
                                                            Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" id="add_news_details_description"
                                                                name="news_details[{{ $value['languages_code'] }}][news_details_title]" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_details_content"
                                                            class="col-sm-3 text-right control-label col-form-label">Content
                                                            Details</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" id="add_news_details_content"
                                                                name="news_details[{{ $value['languages_code'] }}][news_details_title]" rows="4"></textarea>
                                                        </div>
                                                    </div>

                                                    <hr class="style-dot">

                                                    <div class="form-group row">
                                                        <label for="add_news_details_image_banner"
                                                            class="col-sm-3 text-right control-label col-form-label">Banner
                                                            Slide</label>
                                                        <div class="col-sm-9">
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                    class="custom-file-input upload-news-img form-control"
                                                                    id="add_news_details_image_banner">
                                                                <label class="custom-file-label"
                                                                    for="add_news_details_image_banner">Choose Image...</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="add_news_details_alt_text"
                                                            class="col-sm-3 text-right control-label col-form-label">Alt
                                                            Text</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="add_news_details_alt_text" name=""
                                                                placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="add_news_details_alt_text"
                                                            class="col-sm-3 text-right control-label col-form-label">URL
                                                            Link</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="add_news_details_alt_text" name=""
                                                                placeholder="http://" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row pb-3">
                                                        <label for="add_news_details_alt_text"
                                                            class="col-sm-3 text-right control-label col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-success btn-rounded waves-effect waves-light"
                                                                id="btn_add_banner_{{ $value['languages_code'] }}"
                                                                name="plus_add_price_structure">Add more banner</a>
                                                        </div>
                                                    </div>

                                                    <div class="row draggable-cards" id="draggable-area-{{ $value['languages_code'] }}">
                                                        {{-- <div class="col-md-6 col-sm-12">
                                                            <div class="card  card-hover">
                                                                <!-- <a href="javascript:void(0)" class="btn btn-danger confirm-delete-banner"> <i class="ti-trash"></i> </a> -->
                                                                <div class="text-right pt-2 pr-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="confirm-delete-banner"><i
                                                                            class="ti-close"></i></a>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <img class="img-responsive w-100 mb-3"
                                                                        id="preview_img_cover_add"
                                                                        src="{{ asset('uploads/images/cms/Banner/2506.jpg') }}">
                                                                    <h3 class="card-title">Alert Text : Cool refreshing shaving
                                                                        foam</h3>
                                                                    <p class="card-text"><i class="icon-link"></i>
                                                                        https://intervision.co/en/89643216800</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="card  card-hover">
                                                                <div class="text-right pt-2 pr-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="confirm-delete-banner"><i
                                                                            class="ti-close"></i></a>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <img class="img-responsive w-100 mb-3"
                                                                        id="preview_img_cover_add"
                                                                        src="{{ asset('uploads/images/cms/Banner/2220.jpg') }}">
                                                                    <h3 class="card-title">Alert Text : Clean and fresh Perfume
                                                                    </h3>
                                                                    <p class="card-text"><i class="icon-link"></i>
                                                                        https://intervision.co/en/00695656526</p>
                                                                    <!-- <a href="javascript:void(0)" class="btn btn-danger confirm-delete-banner"> <i class="ti-trash"></i> </a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="card  card-hover">
                                                                <div class="text-right pt-2 pr-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="confirm-delete-banner"><i
                                                                            class="ti-close"></i></a>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <img class="img-responsive w-100 mb-3"
                                                                        id="preview_img_cover_add"
                                                                        src="{{ asset('uploads/images/cms/Banner/2705.jpg') }}">
                                                                    <h3 class="card-title">Alert Text : Face care whitening</h3>
                                                                    <p class="card-text"><i class="icon-link"></i>
                                                                        https://intervision.co/en/98850213405</p>
                                                                    <!-- <a href="javascript:void(0)" class="btn btn-danger confirm-delete-banner"> <i class="ti-trash"></i> </a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="card  card-hover">
                                                                <div class="text-right pt-2 pr-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="confirm-delete-banner"><i
                                                                            class="ti-close"></i></a>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <img class="img-responsive w-100 mb-3"
                                                                        id="preview_img_cover_add"
                                                                        src="{{ asset('uploads/images/cms/Banner/2951.jpg') }}">
                                                                    <h3 class="card-title">Alert Text : Thermal Water 30SPF for
                                                                        dry skin </h3>
                                                                    <p class="card-text"> <i class="icon-link"></i>
                                                                        https://intervision.co/en/55262535461</p>
                                                                    <!-- <a href="javascript:void(0)" class="btn btn-danger confirm-delete-banner"> <i class="ti-trash"></i> </a> -->
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Tap TH -->

                                        <div class="tab-pane" id="gal-tap" role="tabpanel">
                                            <div class="form-horizontal form-upload">
                                                <div class="form-group row">
                                                    <label for="add_news_details_image_banner"
                                                        class="col-sm-3 text-right control-label col-form-label">Image</label>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file"
                                                                class="custom-file-input upload-news-img form-control"
                                                                id="add_news_details_image_banner">
                                                            <label class="custom-file-label"
                                                                for="add_news_details_image_banner">Choose Image...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="add_news_details_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label">Alt
                                                        Text</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="add_news_details_alt_text" name="add_news_details_alt_text"
                                                            placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="add_news_details_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label">URL
                                                        Link</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="add_news_details_alt_text" name="add_news_details_alt_text"
                                                            placeholder="http://" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row pb-3">
                                                    <label for="add_news_details_alt_text"
                                                        class="col-sm-3 text-right control-label col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-success btn-rounded waves-effect waves-light"
                                                            id="plus_add_price_structure"
                                                            name="plus_add_price_structure">Add more banner</a>
                                                    </div>
                                                </div>

                                                <div class="row draggable-cards" id="draggable-area-gallery">
                                                    <div class="col-md-6 col-sm-12">
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
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="card  card-hover">
                                                            <div class="text-right pt-2 pr-2">
                                                                <a href="javascript:void(0)"
                                                                    class="confirm-delete-banner"><i
                                                                        class="ti-close"></i></a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/31303.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Clean and fresh Perfume
                                                                </h3>
                                                                <p class="card-text"><i class="icon-link"></i>
                                                                    https://intervision.co/en/00695656526</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="card  card-hover">
                                                            <div class="text-right pt-2 pr-2">
                                                                <a href="javascript:void(0)"
                                                                    class="confirm-delete-banner"><i
                                                                        class="ti-close"></i></a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/32875.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Face care whitening</h3>
                                                                <p class="card-text"><i class="icon-link"></i>
                                                                    https://intervision.co/en/98850213405</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="card  card-hover">
                                                            <div class="text-right pt-2 pr-2">
                                                                <a href="javascript:void(0)"
                                                                    class="confirm-delete-banner"><i
                                                                        class="ti-close"></i></a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/25628.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Thermal Water 30SPF for
                                                                    dry skin </h3>
                                                                <p class="card-text"> <i class="icon-link"></i>
                                                                    https://intervision.co/en/55262535461</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tap Gal -->

                                        <div class="tab-pane" id="set-tap" role="tabpanel">
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
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_1">INDEX</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="2"
                                                                id="add_news_meta_robots_2"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_2">FOLLOW</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="3"
                                                                id="add_news_meta_robots_3"
                                                                name="news_category[news_category_mata_robots][]">
                                                            <label class="custom-control-label"
                                                                for="add_news_meta_robots_3">NOODP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="4"
                                                                id="add_news_meta_robots_4"
                                                                name="news_category[news_category_mata_robots][]">
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
                                                        name="news_category[news_category_mata_robots]">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_details_og_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Og
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="add_news_details_og_description"
                                                        name="news_category[news_category_mata_robots]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_details_twitter_title"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="add_news_details_twitter_title"
                                                        name="news_category[news_category_mata_robots]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_details_twitter_description"
                                                    class="col-sm-3 text-right control-label col-form-label">Twitter
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="add_news_details_twitter_description"
                                                        name="news_category[news_category_mata_robots]" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_details_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-img form-control"
                                                            id="add_news_details_image">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                            Image...</label>
                                                        <small class="form-text text-muted">Recommended Size: 1200 x 630
                                                            pixel</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_details_status"
                                                    class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row pb-3">
                                                <label for="add_news_details_public"
                                                    class="col-sm-3 text-right control-label col-form-label">Public
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" id="add_news_details_public"
                                                        name="news_category[news_category_mata_robots]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_details_thumbnail_image"
                                                    class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                    Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input upload-news-img form-control"
                                                            id="add_news_details_thumbnail_image">
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
                                                        name="news_category[news_category_mata_robots]">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_banner"
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_banner" name="news_category[news_category_mata_robots]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_gallery" name="news_category[news_category_mata_robots]" checked
                                                        data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Related
                                                    News</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="toggle edit-status"
                                                        id="add_news_setting_related_news" name="news_category[news_category_mata_robots]"
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
                                                            <input type="radio" class="custom-control-input" value="4"
                                                                id="all" name="news_category[news_category_mata_robots]" checked>
                                                            <label class="custom-control-label" for="all">Random All</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="4"
                                                                id="category" name="news_category[news_category_mata_robots]">
                                                            <label class="custom-control-label" for="category">Random Same
                                                                Category</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="4"
                                                                id="keyword" name="news_category[news_category_mata_robots]">
                                                            <label class="custom-control-label" for="keyword">Random Same
                                                                Tag Keyword</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check pl-0 mt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="4"
                                                                id="select" name="news_category[news_category_mata_robots]">
                                                            <label class="custom-control-label" for="select">Select</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="dvPinNo" style="display: none;">
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
                </form>

            </div>
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
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab"
                                                href="#view-th-tab" role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-th"></i></span> <span
                                                    class="hidden-xs-down">TH</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#view-en-tap"
                                                role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-gb"></i></span> <span
                                                    class="hidden-xs-down">EN</span></a> </li>
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
                                        <div class="tab-pane active" id="view-th-tab" role="tabpanel">
                                            <div class="form-horizontal form-upload">
                                                <input type="hidden" id="add_news_th" name="add_news_th" value="">
                                                <div class="row">
                                                    <label for="add_news_details_title"
                                                        class="col-sm-3 text-right control-label col-form-label">News
                                                        Title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_link"
                                                        class="col-sm-3 text-right control-label col-form-label">URL
                                                        Link</label>
                                                    <label class="col-sm-9 control-label col-form-label"> <a
                                                            href="javascript:void(0)">https://intervision.co/en/00695656526</a>
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_category"
                                                        class="col-sm-3 text-right control-label col-form-label">News
                                                        Category</label>
                                                    <label class="col-sm-9 control-label col-form-label"> ข่าวบันเทิง
                                                    </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Short
                                                        Description</label>
                                                    <div class="col-sm-9">
                                                        เซลส์ปิกอัพผลักดันคอลัมน์หลินจือ แฟกซ์ แชมพูแคมป์
                                                        มายองเนสเอาท์ดอกเตอร์โฟนซีเนียร์ สป็อตรัม
                                                        มิวสิคเคลื่อนย้ายเรซิ่นแทกติค ยอมรับทรูเกย์สังโฆ
                                                        คอนแทคเวเฟอร์แบคโฮเอ็กซ์โป
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_content"
                                                        class="col-sm-3 text-right control-label col-form-label">Content
                                                        Details</label>
                                                    <div class="col-sm-9">
                                                        <p>
                                                            ราเมนลิมูซีนพรีเมียมตู้เซฟแคร์ เฉิ่มไฮไลท์ไวอะกร้า
                                                            เปียโนอุปสงค์แดรี่แชมพู น็อคเกรดแชเชือนดั๊มพ์
                                                            ซาฟารีซูชิโหลนบูติกแมกกาซีน แมกกาซีน เซ็นเซอร์ว่ะเซ็กซี่
                                                            แหววเทรดบ๊อบสตรอว์เบอร์รีฮัลโหล ด็อกเตอร์ ฟรุต
                                                            ชีสเรตติ้งเพลย์บอยอิมพีเรียล ฮองเฮาเทปแอคทีฟ แจ็กพ็อต
                                                            บ๊วยแอลมอนด์ วีเจหลวงพี่ปอดแหก โยโย่
                                                        </p>

                                                        <p>
                                                            ฮาลาลเฟรชชี่ อัลไซเมอร์สารขัณฑ์ แคทวอล์คแอพพริคอทโอเพ่น
                                                            แมชีนวโรกาสสปอร์ตฟลุทออร์แกนิค มหาอุปราชา
                                                            วิกซัมเมอร์เสือโคร่งบาร์บี้ ฟีดฟินิกซ์ดิกชันนารี กู๋
                                                            สะเด่าซี้แบดครูเสดวีไอพี ม็อบคำสาปหลินจือ
                                                            คอร์ปอเรชั่นธุหร่ำชัวร์ ไหร่อัลไซเมอร์สตรอว์เบอร์รี
                                                            ศิลปวัฒนธรรมเวอร์บ๋อย อินเตอร์คอนโทรล เกรดโฮมทริป
                                                            ไมค์คีตปฏิภาณโปรเจ็คท์มายาคติแดรี่
                                                        </p>

                                                        <p>
                                                            ไลน์ เที่ยงวัน ไทม์ เพลย์บอย คาร์พุทโธโดนัท คาวบอยทัวร์นาเมนท์
                                                            แบนเนอร์โพลารอยด์แพนด้าสมาพันธ์ คอนเซ็ปต์ ออดิทอเรียมสต็อก
                                                            คอนแท็คบุญคุณบรรพชนแบรนด์ สเต็ปสี่แยกแฟรีเทรด
                                                            สต๊อกเทปเวิร์ลด์คีตปฏิภาณ ฮาร์ดฟาสต์ฟู้ด พฤหัสโยโย่
                                                            บ๋อยซีรีส์สตริง อุด้งซูโม่เฮียอัลไซเมอร์
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_title"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Description</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_keywords"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Keywords</label>
                                                    <label class="col-sm-9 control-label col-form-label">ปราง กัญญ์ณรัณโต้ง
                                                        ทูพี ล่องเรือ ทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_author"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Author</label>
                                                    <label class="col-sm-9 control-label col-form-label"> Admin Smile
                                                    </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_meta_robots"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Robots</label>
                                                    <label class="col-sm-9 control-label col-form-label">noodp,follow
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_og_title"
                                                        class="col-sm-3 text-right control-label col-form-label">Og
                                                        title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_og_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Og
                                                        Description</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_twitter_title"
                                                        class="col-sm-3 text-right control-label col-form-label">Twitter
                                                        Title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_twitter_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Twitter
                                                        Description</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for=""
                                                        class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                        Image</label>
                                                    <div class="col-sm-9 pt-3">
                                                        <img class="img-responsive img-view"
                                                            src="{{ asset('uploads/images/cms/Banner/24640-45133.jpg') }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_status"
                                                        class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                    <label class="col-sm-9 control-label col-form-label">On </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_public"
                                                        class="col-sm-3 text-right control-label col-form-label">Public
                                                        Date</label>
                                                    <label class="col-sm-9 control-label col-form-label">01/09/2020 18:00
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <label for=""
                                                        class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                        Image</label>
                                                    <div class="col-sm-9 pt-3">
                                                        <img class="img-responsive img-view"
                                                            src="{{ asset('uploads/images/cms/Banner/24640-45133.jpg') }}">
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_thumbnail_text"
                                                        class="col-sm-3 text-right control-label col-form-label">Alt
                                                        Text</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>

                                                <hr class="style-dot">

                                                <div class="row">

                                                    <div class="col-md-12 mb-3">
                                                        <h3 class="card-title">Banner Slide</h3>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body card-border">
                                                                <img class="img-responsive w-100 mb-3"
                                                                    id="preview_img_cover_add"
                                                                    src="{{ asset('uploads/images/cms/Banner/2506.jpg') }}">
                                                                <h3 class="card-title">Alert Text : Cool refreshing shaving
                                                                    foam</h3>
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
                                                                    src="{{ asset('uploads/images/cms/Banner/2705.jpg') }}">
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
                                                                    src="{{ asset('uploads/images/cms/Banner/2951.jpg') }}">
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
                                        <!-- End Tap TH -->

                                        <div class="tab-pane" id="view-en-tap" role="tabpanel">
                                            <div class="form-horizontal form-upload">
                                                <input type="hidden" id="add_news_th" name="add_news_th" value="">
                                                <div class="row">
                                                    <label for="add_news_details_title"
                                                        class="col-sm-3 text-right control-label col-form-label">News
                                                        Title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_link"
                                                        class="col-sm-3 text-right control-label col-form-label">URL
                                                        Link</label>
                                                    <label class="col-sm-9 control-label col-form-label"> <a
                                                            href="javascript:void(0)">https://intervision.co/en/00695656526</a>
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_category"
                                                        class="col-sm-3 text-right control-label col-form-label">News
                                                        Category</label>
                                                    <label class="col-sm-9 control-label col-form-label"> ข่าวบันเทิง
                                                    </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Short
                                                        Description</label>
                                                    <div class="col-sm-9">
                                                        เซลส์ปิกอัพผลักดันคอลัมน์หลินจือ แฟกซ์ แชมพูแคมป์
                                                        มายองเนสเอาท์ดอกเตอร์โฟนซีเนียร์ สป็อตรัม
                                                        มิวสิคเคลื่อนย้ายเรซิ่นแทกติค ยอมรับทรูเกย์สังโฆ
                                                        คอนแทคเวเฟอร์แบคโฮเอ็กซ์โป
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_content"
                                                        class="col-sm-3 text-right control-label col-form-label">Content
                                                        Details</label>
                                                    <div class="col-sm-9">
                                                        <p>
                                                            ราเมนลิมูซีนพรีเมียมตู้เซฟแคร์ เฉิ่มไฮไลท์ไวอะกร้า
                                                            เปียโนอุปสงค์แดรี่แชมพู น็อคเกรดแชเชือนดั๊มพ์
                                                            ซาฟารีซูชิโหลนบูติกแมกกาซีน แมกกาซีน เซ็นเซอร์ว่ะเซ็กซี่
                                                            แหววเทรดบ๊อบสตรอว์เบอร์รีฮัลโหล ด็อกเตอร์ ฟรุต
                                                            ชีสเรตติ้งเพลย์บอยอิมพีเรียล ฮองเฮาเทปแอคทีฟ แจ็กพ็อต
                                                            บ๊วยแอลมอนด์ วีเจหลวงพี่ปอดแหก โยโย่
                                                        </p>

                                                        <p>
                                                            ฮาลาลเฟรชชี่ อัลไซเมอร์สารขัณฑ์ แคทวอล์คแอพพริคอทโอเพ่น
                                                            แมชีนวโรกาสสปอร์ตฟลุทออร์แกนิค มหาอุปราชา
                                                            วิกซัมเมอร์เสือโคร่งบาร์บี้ ฟีดฟินิกซ์ดิกชันนารี กู๋
                                                            สะเด่าซี้แบดครูเสดวีไอพี ม็อบคำสาปหลินจือ
                                                            คอร์ปอเรชั่นธุหร่ำชัวร์ ไหร่อัลไซเมอร์สตรอว์เบอร์รี
                                                            ศิลปวัฒนธรรมเวอร์บ๋อย อินเตอร์คอนโทรล เกรดโฮมทริป
                                                            ไมค์คีตปฏิภาณโปรเจ็คท์มายาคติแดรี่
                                                        </p>

                                                        <p>
                                                            ไลน์ เที่ยงวัน ไทม์ เพลย์บอย คาร์พุทโธโดนัท คาวบอยทัวร์นาเมนท์
                                                            แบนเนอร์โพลารอยด์แพนด้าสมาพันธ์ คอนเซ็ปต์ ออดิทอเรียมสต็อก
                                                            คอนแท็คบุญคุณบรรพชนแบรนด์ สเต็ปสี่แยกแฟรีเทรด
                                                            สต๊อกเทปเวิร์ลด์คีตปฏิภาณ ฮาร์ดฟาสต์ฟู้ด พฤหัสโยโย่
                                                            บ๋อยซีรีส์สตริง อุด้งซูโม่เฮียอัลไซเมอร์
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_title"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Description</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_keywords"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Keywords</label>
                                                    <label class="col-sm-9 control-label col-form-label">ปราง กัญญ์ณรัณโต้ง
                                                        ทูพี ล่องเรือ ทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_meta_author"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Author</label>
                                                    <label class="col-sm-9 control-label col-form-label"> Admin Smile
                                                    </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_meta_robots"
                                                        class="col-sm-3 text-right control-label col-form-label">Meta
                                                        Robots</label>
                                                    <label class="col-sm-9 control-label col-form-label">noodp,follow
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_og_title"
                                                        class="col-sm-3 text-right control-label col-form-label">Og
                                                        title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_og_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Og
                                                        Description</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_twitter_title"
                                                        class="col-sm-3 text-right control-label col-form-label">Twitter
                                                        Title</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_twitter_description"
                                                        class="col-sm-3 text-right control-label col-form-label">Twitter
                                                        Description</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for=""
                                                        class="col-sm-3 text-right control-label col-form-label">Og/Twitter
                                                        Image</label>
                                                    <div class="col-sm-9 pt-3">
                                                        <img class="img-responsive w-100"
                                                            src="{{ asset('uploads/images/cms/Banner/24640-45133.jpg') }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="add_news_details_status"
                                                        class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                    <label class="col-sm-9 control-label col-form-label">On </label>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_public"
                                                        class="col-sm-3 text-right control-label col-form-label">Public
                                                        Date</label>
                                                    <label class="col-sm-9 control-label col-form-label">01/09/2020 18:00
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <label for=""
                                                        class="col-sm-3 text-right control-label col-form-label">Thumbnail
                                                        Image</label>
                                                    <div class="col-sm-9 pt-3">
                                                        <img class="img-responsive w-100"
                                                            src="{{ asset('uploads/images/cms/Banner/24640-45133.jpg') }}">
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <label for="add_news_details_thumbnail_text"
                                                        class="col-sm-3 text-right control-label col-form-label">Alt
                                                        Text</label>
                                                    <label class="col-sm-9 control-label col-form-label"> หวานปนแซ่บ "ปราง
                                                        กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต </label>
                                                </div>


                                            </div>
                                        </div>
                                        <!-- End Tap EN -->

                                        <div class="tab-pane" id="view-gal-tap" role="tabpanel">
                                            <div class="form-horizontal form-upload">
                                                <div class="row">
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
                                                    class="col-sm-3 text-right control-label col-form-label">Banner
                                                    Slide</label>
                                                <label class="col-sm-9 control-label col-form-label">On</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_gallery"
                                                    class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                                                <label class="col-sm-9 control-label col-form-label">On</label>
                                            </div>
                                            <div class="row">
                                                <label for="add_news_setting_related_news"
                                                    class="col-sm-3 text-right control-label col-form-label">Related
                                                    News</label>
                                                <label class="col-sm-9 control-label col-form-label">On</label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add_news_setting_related_type"
                                                    class="col-sm-3 text-right control-label col-form-label">Related News
                                                    Type</label>
                                                <label class="col-sm-9 control-label col-form-label">Random All</label>
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
        $(document).ready(function() {

            $.each(languages, function(index, value) {
                
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

            var tableNew = $('#tableNew').dataTable({
                "ajax": {
                    "url": url_gb + "/admin/News/Lists",
                    "type": "POST",
                    "data": function(d) {
                        d.faqs_question = $('#search_faqs_question').val();
                        d.faqs_create_date = $('#search_faqs_create_date').val();
                        d.faqs_update_date = $('#search_faqs_update_date').val();
                        d.faqs_status = $('input[name=search_faqs_status]:checked').val();
                        // d.faqs_status = $('[name="search_faqs_status"]').val();
                        // d.faqs_status_1 = $('#search_faqs_status_1').val();
                        // d.faqs_status_2 = $('#search_faqs_status_2').val();
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

            $('body').on('click', '.btn-add', function(data) {
                $('#ModalAdd').modal('show');
            });

            $('body').on('click', '.btn-view', function(data) {
                $('#ModalView').modal('show');
            });

        });

    </script>

@endsection
