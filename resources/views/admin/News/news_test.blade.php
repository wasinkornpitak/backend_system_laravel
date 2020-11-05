@extends('layouts.layout')@section('content')
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
                <select class="form-control select2" id="search_news_seo_category" name="search_news_seo_category">
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
                <input type="date" id="search_news_seo_create_date" name="search_news_seo_created_date" class="form-control search_table" placeholder="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_news_seo_updated_date">Updated Date</label>
                <input type="date" id="search_news_seo_create_date" name="search_news_seo_updated_date" class="form-control search_table" placeholder="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_news_seo_status">Status</label> <br>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" id="search_news_seo_status_1" name="search_news_seo_status" checked>
                    <label class="custom-control-label" for="search_news_seo_status_1">On</label>
                  </div>
                </div>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" id="search_news_seo_status_2" name="search_news_seo_status">
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
          <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
          <button type="button" class="btn btn-success btn-rounded m-t-10 mb-2 newdata" data-toggle="modal" data-target="#ModalAddnew" data-product_id="0">Add New</button>
          <button type="button" class="btn btn-success btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#ModalAddnew1" data-product_id="0">Add New1</button>
        </div>
        <div class="table-responsive">
          <div class="action-tables">
            <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
              <span class="badge badge-secondary"><i class="ti-reload"></i></span> Chang Status
            </a>
            <a href="javascript:void(0)" class="pr-3">
              <span class="badge badge-danger"><i class="ti-trash"></i></span> Delete Selected
            </a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
            <thead>
              <tr class="text-center">
                <th scope="col">Select</th>
                <th scope="col">No.</th>
                <th scope="col">Order</th>
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
              <tr>
                <td scope="row">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews1" required>
                    <label class="custom-control-label" for="SelectNews1"></label>
                  </div>
                </td>
                <th scope="row" class="text-center">1</th>
                <td>2</td>
                <td><img id="preview_img_cover_add" style="width:50%;" src="{{asset('uploads/images/no-image.jpg')}}"></td>
                <td>หวานปนแซ่บ "ปราง กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต</td>
                <td>ข่าวบันเทิง</td>
                <td>5,200</td>
                <td>13/08/2020 10:33 - Admin Smile</td>
                <td>13/08/2020 12:17 - Admin Smile</td>
                <td> </td>
                <td>
                  <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                  <button type="button" data-toggle="tooltip" title="View" class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalView1" data-product_id="0">
                    <i class="ti-eye"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-md" data-toggle="modal" data-target="#ModalAdd" data-product_id="0">
                    <i class="ti-pencil-alt"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                    <i class="ti-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td scope="row">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews2" required>
                    <label class="custom-control-label" for="SelectNews2"></label>
                  </div>
                </td>
                <th scope="row" class="text-center">2</th>
                <td>3</td>
                <td><img id="preview_img_cover_add" style="width:50%;" src="{{asset('uploads/images/no-image.jpg')}}"></td>
                <td>หมู่บ้านต้นแบบ จิตอาสาทำดีด้วยหัวใจ อ.สนม ร่วมกันคิด ร่วมกันสร้าง</td>
                <td>ข่าวในท้องถิ่น</td>
                <td>562</td>
                <td> 01/09/2020 16:40 - Tom & Jerry </td>
                <td></td>
                <td>01/09/2020 18:00</td>
                <td>
                  <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalAdd" data-product_id="0">
                    View
                  </button>
                  <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#ModalAdd" data-product_id="0">
                    Edit
                  </button>
                  <!-- <button type="button" class="btn btn-danger btn-md confirm-delete" data-product_id="0">
                  Delete
                </button> -->
                <button type="button" title="View invoice" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                  Delete
                </button>
                <button type="button" class="btn btn-success confirm-approve" data-product_id="1">Approve</button>
              </td>
            </tr>
            <tr>
              <td scope="row">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews3" required>
                  <label class="custom-control-label" for="SelectNews3"></label>
                </div>
              </td>
              <th scope="row" class="text-center">3</th>
              <td>1</td>
              <td><img id="preview_img_cover_add" style="width:50%;" src="{{asset('uploads/images/no-image.jpg')}}"></td>
              <td>แรงไม่เกรงใจเจ้าบ้าน! เจาะ 5 ประเด็น เลสเตอร์ โหดบุกขย้ำ แมนซิตี้</td>
              <td>ข่าวกีฬา</td>
              <td>562</td>
              <td> 10/08/2020 21:05 - สาธิต กรีฑา </td>
              <td></td>
              <td></td>
              <td>
                <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalAdd" data-product_id="0">
                  View
                </button>
                <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#ModalAdd" data-product_id="0">
                  Edit
                </button>
                <!-- <button type="button" class="btn btn-danger btn-md confirm-delete" data-product_id="0">
                Delete
              </button> -->
              <button type="button" title="View invoice" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                Delete
              </button>
              <button type="button" class="btn btn-success confirm-approve" data-product_id="1">Approve</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

@endsection @section('modal')

<div class="modal fade" id="ModalAddnew" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h4 class="modal-title">Add New</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
      </div>

      <form action="#" class="needs-validation" novalidate>
        <div class="card">
          <div class="form-body">
            <div class="card-body pb-0">
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#th-tab" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down">TH</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#en-tap" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-gb"></i></span> <span class="hidden-xs-down">EN</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#gal-tap" role="tab"><span class="hidden-sm-up"><i class="ti-layers-alt"></i></span> <span class="hidden-xs-down">Gallery</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#set-tap" role="tab"><span class="hidden-sm-up"><i class="ti-settings"></i></span> <span class="hidden-xs-down">Setting</span></a> </li>
                  </ul>
                  <!-- End Nav tabs -->
                  <!-- Tab panes -->
                  <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                    <div class="tab-pane active" id="th-tab" role="tabpanel">
                      <div class="form-horizontal form-upload">
                        <input type="hidden" id="add_news_th" name="add_news_th" value="">
                        <div class="form-group row">
                          <label for="add_news_details_title" class="col-sm-3 text-right control-label col-form-label">News Title</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_title" name="add_news_details_title" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_link" class="col-sm-3 text-right control-label col-form-label">URL Link</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_link" name="add_news_details_link" placeholder="http://" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_category" class="col-sm-3 text-right control-label col-form-label">News Category</label>
                          <div class="col-sm-9">
                            <select class="form-control select2" id="add_news_categor" name="add_news_category">
                              <option value=""> Choose... </option>
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
                        <div class="form-group row pb-3">
                          <label for="add_news_details_description" class="col-sm-3 text-right control-label col-form-label">Short Description</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add_news_details_description" name="add_news_details_description" rows="4"></textarea>
                          </div>
                        </div>
                        <div class="form-group row pb-3">
                          <label for="add_news_details_content" class="col-sm-3 text-right control-label col-form-label">Content Details</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add_news_details_content" name="add_news_details_content" rows="4"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_meta_title" class="col-sm-3 text-right control-label col-form-label">Meta Title</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_meta_title" name="add_news_details_meta_title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_meta_description" class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_meta_description" name="add_news_details_meta_description">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_meta_keywords" class="col-sm-3 text-right control-label col-form-label">Meta Keywords</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_meta_keywords" name="add_news_details_meta_keywords">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_meta_author" class="col-sm-3 text-right control-label col-form-label">Meta Author</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_meta_author" name="add_news_details_meta_author">
                          </div>
                        </div>
                        <div class="form-group row pb-3">
                          <label for="add_news_details_meta_robots" class="col-sm-3 text-right control-label col-form-label">Meta Robots</label>
                          <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="1" id="add_news_details_meta_robots_1" name="add_news_details_meta_robots">
                                <label class="custom-control-label" for="add_news_details_meta_robots_1">INDEX</label>
                              </div>
                            </div>
                            <div class="form-check form-check-inline">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="2" id="add_news_details_meta_robots_2" name="add_news_details_meta_robots">
                                <label class="custom-control-label" for="add_news_details_meta_robots_2">FOLLOW</label>
                              </div>
                            </div>
                            <div class="form-check form-check-inline">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="3" id="add_news_details_meta_robots_3" name="add_news_details_meta_robots">
                                <label class="custom-control-label" for="add_news_details_meta_robots_3">NOODP</label>
                              </div>
                            </div>
                            <div class="form-check form-check-inline">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="4" id="add_news_details_meta_robots_4" name="add_news_details_meta_robots">
                                <label class="custom-control-label" for="add_news_details_meta_robots_4">NOYDIR</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_og_title" class="col-sm-3 text-right control-label col-form-label">Og title</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_og_title" name="add_news_details_og_title">
                          </div>
                        </div>
                        <div class="form-group row pb-3">
                          <label for="add_news_details_og_description" class="col-sm-3 text-right control-label col-form-label">Og Description</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add_news_details_og_description" name="add_news_details_og_description" rows="4"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_twitter_title" class="col-sm-3 text-right control-label col-form-label">Twitter Title</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="add_news_details_twitter_title" name="add_news_details_twitter_title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_news_details_twitter_description" class="col-sm-3 text-right control-label col-form-label">Twitter Description</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add_news_details_twitter_description" name="add_news_details_twitter_description" rows="4"></textarea>
                          </div>
                        </div>
                        <div class="form-group row pb-3">
                          <label for="add_news_details_image" class="col-sm-3 text-right control-label col-form-label">Og/Twitter Image</label>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input upload-news-img form-control" id="add_news_details_image">
                              <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                              <small class="form-text text-muted">Recommended Size: 1200 x 630 pixel</small>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row pb-3">
                          <label for="add_news_details_status" class="col-sm-3 text-right control-label col-form-label">Status</label>
                          <div class="col-sm-9">
                            <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                          </div>
                        </div>

                        <!-- <hr> -->

                        <div class="form-group row">
                          <label for="" class="col-sm-3 text-right control-label col-form-label">Banner Slide</label>
                          <div class="col-sm-9">
                          <a href="javascript:void(0)" class="btn btn-success waves-effect waves-light" id="plus_add_price_structure" name="plus_add_price_structure"> <i class="ti-plus"></i> Banner</a>
                          <!-- <div id="add_banner_slide" class=" mt-3">
                          <div class="row">
                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="Schoolname" name="Schoolname" placeholder="School Name">
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="Age" name="Age" placeholder="Age">
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="Degree" name="Degree" placeholder="Degree">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <select class="form-control" id="educationDate" name="educationDate">
                                          <option>Date</option>
                                          <option value="2015">2015</option>
                                          <option value="2016">2016</option>
                                          <option value="2017">2017</option>
                                          <option value="2018">2018</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          </div> -->
                          <table id="add_banner_slide" width="100%">
                          </table>
                        </div>
                        </div>

                      </div>
                    </div>
                    <div class="tab-pane" id="en-tap" role="tabpanel">2</div>
                    <div class="tab-pane" id="gal-tap" role="tabpanel">gal</div>
                    <div class="tab-pane" id="set-tap" role="tabpanel">
                      <div class="form-group row">
                        <label for="add_news_setting_banner" class="col-sm-3 text-right control-label col-form-label">Banner Slide</label>
                        <div class="col-sm-9">
                          <input type="checkbox" class="toggle edit-status" id="add_news_setting_banner" name="news_setting_banner" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="add_news_setting_gallery" class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                        <div class="col-sm-9">
                          <input type="checkbox" class="toggle edit-status" id="add_news_setting_gallery" name="news_setting_gallery" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="add_news_setting_related_news" class="col-sm-3 text-right control-label col-form-label">Related News</label>
                        <div class="col-sm-9">
                          <input type="checkbox" class="toggle edit-status" id="add_news_setting_related_news" name="news_setting_related_news" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="add_news_setting_related_type" class="col-sm-3 text-right control-label col-form-label">Related News Type</label>
                        <div class="col-sm-9">

                          <div class="form-check pl-0 mt-2">
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="4" id="all" name="news_setting_related_type" checked>
                              <label class="custom-control-label" for="all">Random All</label>
                            </div>
                          </div>
                          <div class="form-check pl-0 mt-2">
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="4" id="category" name="news_setting_related_type">
                              <label class="custom-control-label" for="category">Random Same Category</label>
                            </div>
                          </div>
                          <div class="form-check pl-0 mt-2">
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="4" id="keyword" name="news_setting_related_type">
                              <label class="custom-control-label" for="keyword">Random Same Tag Keyword</label>
                            </div>
                          </div>
                          <div class="form-check pl-0 mt-2">
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="4" id="select" name="news_setting_related_type">
                              <label class="custom-control-label" for="select">Select</label>
                            </div>
                          </div>
                          <div id="dvPinNo" style="display: none;">
                            <div class="row mt-2">
                              <div class="col-md-8">
                                <div class="form-group">
                                  <select class="form-control select2" id="add_news_details_title" name="add_news_details_title">
                                    <option>Choose...</option>
                                    <option value="">หวานปนแซ่บ "ปราง กัญญ์ณรัณ" ควง "โต้ง ทูพี" ล่องทะเลภูเก็ต</option>
                                    <option value="">หมู่บ้านต้นแบบ จิตอาสาทำดีด้วยหัวใจ อ.สนม ร่วมกันคิด ร่วมกันสร้าง</option>
                                    <option value="">แรงไม่เกรงใจเจ้าบ้าน! เจาะ 5 ประเด็น เลสเตอร์ โหดบุกขย้ำ แมนซิตี้</option>
                                  </select>
                                </div>
                              </div>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Tab panes -->
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="form-footer text-center mb-0">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalAddnew1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
      </div>
      <form id="FormAdd" class="needs-validation" novalidate>
        <div class="card">
          <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              @foreach($Language as $val)
              <li class="nav-item">
                <a class="nav-link {{ $val->languages_type == '1' ? 'active' : ''}}" id="{{ $val->languages_name }}" data-toggle="tab" href="#{{ $val->languages_name }}-add" role="tab" aria-controls="{{ $val->languages_name }}-edit" aria-selected="true"><i class="{{ $val->languages_icon }}"></i> {{ $val->languages_name }}</a>
              </li>
              @endforeach
              <li class="nav-item">
                <a class="nav-link" id="setting-tab-edit" data-toggle="tab" href="#setting-edit" role="tab" aria-controls="setting-edit" aria-selected="false"><i class="mdi mdi-settings"></i> Setting</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              @foreach($Language as $val)
              <div class="tab-pane fade {{ $val->languages_type == '1' ? 'show active' : ''}}" id="{{ $val->languages_name }}-add" role="tabpanel" aria-labelledby="{{ $val->languages_name }}">
                <div class="form-body">
                  <div class="card-body">
                    <div class="form-horizontal form-upload">
                      <input type="hidden" id="add_languages_id" name="lang[{{$val->languages_id}}][languages_id]" value="{{ $val->languages_id }}">
                      <div class="form-group row pb-3">
                        <label for="add_news_details_subject" class="col-sm-3 text-right control-label col-form-label">News Subject</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_subject" name="lang[{{$val->languages_id}}][news_details_subject]" required>
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_title" class="col-sm-3 text-right control-label col-form-label">News Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_title" name="lang[{{$val->languages_id}}][news_details_title]" required>
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_image" class="col-sm-3 text-right control-label col-form-label">News Image</label>
                        <div class="col-sm-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input upload-news-img form-control" id="{{$val->languages_id}}">
                            <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                          </div>
                          <div class="card-body">
                            <img class="img-thumbnail" id="preview_img_add{{$val->languages_id}}" style="width:30%;" src="{{asset('uploads/images/no-image.jpg')}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row pb-3 image_alt">
                        <label for="add_news_details_image_alt" class="col-sm-3 text-right control-label col-form-label">News Image Alt</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_image_alt" name="lang[{{$val->languages_id}}][news_details_image_alt]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_description" class="col-sm-3 text-right control-label col-form-label">News Description</label>
                        <div class="col-sm-9">
                          <textarea class="editor" cols="60" id="add_news_details_description_{{$val->languages_id}}" rows="6" data-sample="3" data-sample-short name="lang[{{$val->languages_id}}][news_details_description]"></textarea>

                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_seo_title" class="col-sm-3 text-right control-label col-form-label">News Seo Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_seo_title" name="lang[{{$val->languages_id}}][news_details_seo_title]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_seo_description" class="col-sm-3 text-right control-label col-form-label">News Seo Description</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_seo_description" name="lang[{{$val->languages_id}}][news_details_seo_description]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_seo_keyword" class="col-sm-3 text-right control-label col-form-label">News Seo Keyword</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_seo_keyword" name="lang[{{$val->languages_id}}][news_details_seo_keyword]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_seo_type" class="col-sm-3 text-right control-label col-form-label">News Seo Type</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="add_news_details_seo_type{{$val->languages_name}}" name="lang[{{$val->languages_id}}][news_details_seo_type]">
                            <option>Select Type</option>
                            @foreach($SeoTypes as $key=>$SeoType)
                            <option value="{{ $key }}">{{ $SeoType }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_og_title" class="col-sm-3 text-right control-label col-form-label">News Og Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_og_title" name="lang[{{$val->languages_id}}][news_details_og_title]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_og_description" class="col-sm-3 text-right control-label col-form-label">News Og Description</label>
                        <div class="col-sm-9">
                          <textarea rows="3" type="text" class="form-control" id="add_news_details_og_description" name="lang[{{$val->languages_id}}][news_details_og_description]"></textarea>
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_og_url" class="col-sm-3 text-right control-label col-form-label">News Og Url</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_og_url" name="lang[{{$val->languages_id}}][news_details_og_url]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_og_site_name" class="col-sm-3 text-right control-label col-form-label">News Og Site Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_og_site_name" name="lang[{{$val->languages_id}}][news_details_og_site_name]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_og_image" class="col-sm-3 text-right control-label col-form-label">News Og Image</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_news_details_og_image" name="lang[{{$val->languages_id}}][news_details_og_image]">
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_news_details_status" class="col-sm-3 text-right control-label col-form-label">Display Status</label>
                        <div class="col-sm-9">
                          <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="1" id="add_news_details_status_{{$val->languages_id}}_1" name="lang[{{$val->languages_id}}][news_details_status]" checked>
                              <label class="custom-control-label" for="add_news_details_status_{{$val->languages_id}}_1">Active</label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="0" id="add_news_details_status_{{$val->languages_id}}_2" name="lang[{{$val->languages_id}}][news_details_status]">
                              <label class="custom-control-label" for="add_news_details_status_{{$val->languages_id}}_2">Inactive</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="tab-pane fade" id="setting-edit" role="tabpanel" aria-labelledby="setting-tab-edit">
                <div class="card-body">
                  <div class="form-horizontal form-upload-add">
                    <div class="form-group row pb-3">
                      <label for="add_news_image" class="col-sm-3 text-right control-label col-form-label">News Cover Image</label>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input upload-news-img-setting" id="{{$val->languages_id}}">
                          <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                        </div>
                        <div class="card-body">
                          <img id="preview_img_cover_add" style="width:30%;" src="{{asset('uploads/images/no-image.jpg')}}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_image_alt" class="col-sm-3 text-right control-label col-form-label">News Cover Image Alt</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="add_news_image_alt" name="lang[{{$val->languages_id}}][news_details_image_alt]" required>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="" class="col-sm-3 text-right control-label col-form-label">News Seo Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="add_news_seo_title" name="news[news_seo_title]">
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="" class="col-sm-3 text-right control-label col-form-label">News Seo Keyword</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="add_news_seo_keyword" name="news[news_seo_keyword]">
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="" class="col-sm-3 text-right control-label col-form-label">News Seo Description</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="add_news_seo_description" name="news[news_seo_description]">
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="" class="col-sm-3 text-right control-label col-form-label">News Url Slug</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="add_news_url_slug" name="news[news_url_slug]" placeholder="https://">
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_category_id" class="col-sm-3 text-right control-label col-form-label">News Category</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="add_news_category_id" multiple="" name="news_category_id[]">
                          @foreach($NewsCategory as $val)
                          <option value="{{ $val->news_category_id }}">{{ $val->news_category_seo_title }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_tag_id" class="col-sm-3 text-right control-label col-form-label">News Tag</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="add_news_tag_id" multiple="" name="news_tag_id[]" required>
                          @foreach($NewsTag as $val)
                          <option value="{{ $val->news_tag_id }}">{{ $val->news_tag_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_gallery" class="col-sm-3 text-right control-label col-form-label">News gallery</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <div id="dZUpload" class="dropzone">
                            <div class="dz-default dz-message">
                              Drop files here or click to upload.
                            </div>
                          </div>
                        </div>
                        <select class="form-control select2" id="add_news_gallery_type" name="news_gallery_type">
                          <option value="">select image type</option>
                          @foreach($ImageTypes as $key=>$val)
                          <option value="{{ $key }}">{{ $val }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_sort_order" class="col-sm-3 text-right control-label col-form-label">News Sort Order</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="add_news_sort_order" name="news[news_sort_order]">
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_language_lock_type" class="col-sm-3 text-right control-label col-form-label">News Language Lock</label>
                      <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" value="0" id="add_news_language_lock_type_1" name="news[news_language_lock_type]">
                            <label class="custom-control-label" for="add_news_language_lock_type_1">ล็อกภาษาตามภาษาหลัก</label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" value="1" id="add_news_language_lock_type_2" name="news[news_language_lock_type]">
                            <label class="custom-control-label" for="add_news_language_lock_type_2">ล็อกตามภาษา</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_date_set" class="col-sm-3 text-right control-label col-form-label">News Date Set</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="add_news_date_set" name="news[news_date_set]" required>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="add_news_date_end" class="col-sm-3 text-right control-label col-form-label">News Date End</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="add_news_date_end" name="news[news_date_end]" required>
                      </div>
                    </div>
                    <div class="form-group row pb-3">
                      <label for="Check-Box" class="col-sm-3 text-right control-label col-form-label">Status</label>
                      <div class="col-sm-9">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="add_news_status" name="news[news_status]" value="1">
                          <label class="custom-control-label" for="add_news_status">Action</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="form-footer text-center">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
      </div>
      <form id="FormEdit" class="needs-validation" novalidate>
        <input type="hidden" id="edit_id">
        <div class="card">
          <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              @foreach($Language as $val)
              <li class="nav-item">
                <a class="nav-link {{ $val->languages_type == '1' ? 'active' : ''}}" id="{{ $val->languages_name }}" data-toggle="tab" href="#{{ $val->languages_name }}-edit" role="tab" aria-controls="{{ $val->languages_name }}" aria-selected="true"><i class="{{ $val->languages_icon }}"></i> {{ $val->languages_name }}</a>
              </li>
              @endforeach
              <li class="nav-item">
                <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false"><i class="mdi mdi-settings"></i> Setting</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              @foreach($Language as $val)
              <div class="tab-pane fade {{ $val->languages_type == '1' ? 'show active' : ''}}" id="{{ $val->languages_name }}-edit" role="tabpanel" aria-labelledby="{{ $val->languages_name }}">
                <div class="form-body">
                  <div class="card-body">
                    <div class="form-horizontal form-upload">
                      <input type="hidden" id="add_languages_id" name="lang[{{$val->languages_id}}][languages_id]" value="{{ $val->languages_id }}">
                      <div class="form-group row pb-3">
                        <label for="edit_news_details_subject" class="col-sm-3 text-right control-label col-form-label">News Subject</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="edit_news_details_subject_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_subject]" required>
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="edit_news_details_title" class="col-sm-3 text-right control-label col-form-label">News Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="edit_news_details_title_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_title]" required>
                        </div>
                      </div>
                      <!-- <div class="form-group row pb-3 ">
                      <label for="edit_news_details_image" class="col-sm-3 text-right control-label col-form-label">News Image</label>
                      <div class="col-sm-9">
                      <input type="file" class="form-control upload-news-img" id="{{$val->languages_id}}">
                      <div class="card-body">
                      <img class="img-thumbnail" id="preview_img_{{$val->languages_id}}" style="width:70%;">
                    </div>
                    <input type="hidden" id="edit_old_news_details_image_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_image]" value="">
                  </div>
                </div> -->
                <div class="form-group row pb-3">
                  <label for="edit_news_details_image" class="col-sm-3 text-right control-label col-form-label">News Image</label>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input upload-news-img form-control" id="{{$val->languages_id}}">
                      <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                    </div>
                    <div class="card-body">
                      <img class="img-thumbnail" id="preview_img_{{$val->languages_id}}" style="width:30%;" src="{{asset('uploads/images/no-image.jpg')}}">
                    </div>
                    <!-- <input type="hidden" id="edit_old_news_details_image_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_image]" value=""> -->
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_image_alt" class="col-sm-3 text-right control-label col-form-label">News Image Alt</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_image_alt_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_image_alt]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_description" class="col-sm-3 text-right control-label col-form-label">News Description</label>
                  <div class="col-sm-9">
                    <textarea class="editor-edit" cols="60" id="edit_news_details_description_{{$val->languages_id}}" rows="6" data-sample="3" data-sample-short name="lang[{{$val->languages_id}}][news_details_description]"></textarea>

                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_seo_title" class="col-sm-3 text-right control-label col-form-label">News Seo Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_seo_title_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_seo_title]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_seo_description" class="col-sm-3 text-right control-label col-form-label">News Seo Description</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_seo_description_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_seo_description]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_seo_keyword" class="col-sm-3 text-right control-label col-form-label">News Seo Keyword</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_seo_keyword_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_seo_keyword]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_seo_type" class="col-sm-3 text-right control-label col-form-label">News Seo Type</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="edit_news_details_seo_type_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_seo_type]">
                      <option value="99">Select Type</option>
                      @foreach($SeoTypes as $key=>$SeoType)
                      <option value="{{ $key }}">{{ $SeoType }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_og_title" class="col-sm-3 text-right control-label col-form-label">News Og Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_og_title_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_og_title]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_og_description" class="col-sm-3 text-right control-label col-form-label">News Og Description</label>
                  <div class="col-sm-9">
                    <textarea rows="3" type="text" class="form-control" id="edit_news_details_og_description_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_og_description]"></textarea>
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_og_url" class="col-sm-3 text-right control-label col-form-label">News Og Url</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_og_url_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_og_url]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_og_site_name" class="col-sm-3 text-right control-label col-form-label">News Og Site Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_og_site_name_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_og_site_name]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_og_image" class="col-sm-3 text-right control-label col-form-label">News Og Image</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_news_details_og_image_{{$val->languages_id}}" name="lang[{{$val->languages_id}}][news_details_og_image]">
                  </div>
                </div>
                <div class="form-group row pb-3">
                  <label for="edit_news_details_status" class="col-sm-3 text-right control-label col-form-label">Display Status</label>
                  <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" value="1" id="edit_news_details_status_{{$val->languages_id}}_1" name="lang[{{$val->languages_id}}][news_details_status]">
                        <label class="custom-control-label" for="edit_news_details_status_{{$val->languages_id}}_1">Active</label>
                      </div>
                    </div>
                    <div class="form-check form-check-inline">
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" value="0" id="edit_news_details_status_{{$val->languages_id}}_2" name="lang[{{$val->languages_id}}][news_details_status]">
                        <label class="custom-control-label" for="edit_news_details_status_{{$val->languages_id}}_2">Inactive</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
          <div class="card-body">
            <div class="form-horizontal form-upload-add">
              <div class="form-group row pb-3">
                <label for="edit_news_image" class="col-sm-3 text-right control-label col-form-label">News Cover Image</label>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input upload-news-img-setting form-control" id="{{$val->languages_id}}">
                    <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                  </div>
                  <div class="card-body">
                    <img class="img-thumbnail" id="preview_img_cover_edit" style="width:70%;">
                  </div>
                  <!-- <input type="hidden" id="edit_old_news_cover_image" name="news[news_image]" value=""> -->
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_image_alt" class="col-sm-3 text-right control-label col-form-label">News Cover Image Alt</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="edit_news_image_alt" name="news[news_image_alt]">
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="" class="col-sm-3 text-right control-label col-form-label">News Seo Title</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="edit_news_seo_title" name="news[news_seo_title]">
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="" class="col-sm-3 text-right control-label col-form-label">News Seo Keyword</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="edit_news_seo_keyword" name="news[news_seo_keyword]">
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="" class="col-sm-3 text-right control-label col-form-label">News Seo Description</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="edit_news_seo_description" name="news[news_seo_description]">
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="" class="col-sm-3 text-right control-label col-form-label">News Url Slug</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="edit_news_url_slug" name="news[news_url_slug]">
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_category_id" class="col-sm-3 text-right control-label col-form-label">News Category</label>
                <div class="col-sm-9">
                  <select class="form-control select2" id="edit_news_category_id" multiple="" name="news_category_id[]" required>
                    @foreach($NewsCategory as $val)
                    <option value="{{ $val->news_category_id }}">{{ $val->news_category_seo_title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_tag_id" class="col-sm-3 text-right control-label col-form-label">News Tag</label>
                <div class="col-sm-9">
                  <select class="form-control select2" id="edit_news_tag_id" multiple="" name="news_tag_id[]" required>
                    @foreach($NewsTag as $val)
                    <option value="{{ $val->news_tag_id }}">{{ $val->news_tag_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_gallery" class="col-sm-3 text-right control-label col-form-label">News gallery</label>
                <div class="col-sm-9">
                  <div class="form-group">
                    <div id="dZUploadEdit" class="dropzone">
                      <div class="dz-default dz-message">
                        Drop files here or click to upload.
                      </div>
                    </div>
                  </div>
                  <div class="row" id="show_image">
                  </div>

                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_sort_order" class="col-sm-3 text-right control-label col-form-label">News Sort Order</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="edit_news_sort_order" name="news[news_sort_order]">
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_language_lock_type" class="col-sm-3 text-right control-label col-form-label">News Language Lock</label>
                <div class="col-sm-9">
                  <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" value="0" id="edit_news_language_lock_type_1" name="news[news_language_lock_type]">
                      <label class="custom-control-label" for="edit_news_language_lock_type_1">ล็อกภาษาตามภาษาหลัก</label>
                    </div>
                  </div>
                  <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" value="1" id="edit_news_language_lock_type_2" name="news[news_language_lock_type]">
                      <label class="custom-control-label" for="edit_news_language_lock_type_2">ล็อกตามภาษา</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_date_set" class="col-sm-3 text-right control-label col-form-label">News Date Set</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="edit_news_date_set" name="news[news_date_set]" required>
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="edit_news_date_end" class="col-sm-3 text-right control-label col-form-label">News Date End</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="edit_news_date_end" name="news[news_date_end]" required>
                </div>
              </div>
              <div class="form-group row pb-3">
                <label for="Check-Box" class="col-sm-3 text-right control-label col-form-label">Status</label>
                <div class="col-sm-9">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="edit_news_status" name="news[news_status]" value="1">
                    <label class="custom-control-label" for="edit_news_status">Action</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr><hr>

    <div class="form-footer">
      <button type="submit" class="btn btn-success">Save</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</form>
</div>

</div>
</div>

<div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabelview">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
      </div>
      <div class="card">
        <div class="container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach($Language as $val)
            <li class="nav-item">
              <a class="nav-link {{ $val->languages_type == '1' ? 'active' : ''}}" id="{{ $val->languages_name }}" data-toggle="tab" href="#{{ $val->languages_name }}-view" role="tab" aria-controls="{{ $val->languages_name }}" aria-selected="true"><i class="{{ $val->languages_icon }}"></i> {{ $val->languages_name }}</a>
            </li>
            @endforeach
          </ul>
          <div class="tab-content" id="myTabContentView">
            @foreach($Language as $val)
            <div class="tab-pane fade {{ $val->languages_type == '1' ? 'show active' : ''}}" id="{{ $val->languages_name }}-view" role="tabpanel" aria-labelledby="{{ $val->languages_name }}">
              <div class="form-body form-news-image">
                <div class="card-body">
                  <div class="row pb-3">
                    <h3 class="col-sm-2 control-label col-form-label card-title">News Subject: </h3>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox">
                        <h2 id="show_news_details_subject_{{ $val->languages_id }}"></h2>
                      </div>
                    </div>
                  </div>
                  <div class="row pb-3">
                    <h3 class="col-sm-2 control-label col-form-label card-title">News Title: </h3>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox">
                        <h2 id="show_news_details_title_{{ $val->languages_id }}"></h2>
                      </div>
                    </div>
                  </div>
                  <img class="form-horizontal pb-3" id="show_news_image_{{ $val->languages_id }}" style="width:100%;">
                  <div class="form-horizontal pb-3">
                    <label for="example-text-input" id="show_news_details_description_{{ $val->languages_id }}" class="col-form-label"></label>
                  </div>
                  <div class="row">
                    <h3 class="col-sm-3 control-label col-form-label card-title">News Seo Title: </h3>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox">
                        <label id="show_news_details_seo_title_{{ $val->languages_id }}"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <h3 class="col-sm-3 control-label col-form-label card-title">News Seo Description: </h3>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox">
                        <label id="show_news_details_seo_description_{{ $val->languages_id }}"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <h3 class="col-sm-3 control-label col-form-label card-title">News Seo Keyword: </h3>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox">
                        <label id="show_news_details_seo_keyword_{{ $val->languages_id }}"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <h3 class="col-sm-3 control-label col-form-label card-title">Display Status: </h3>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox">
                        <label id="show_news_details_status_{{ $val->languages_id }}"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalView1" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">View</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
			</div>

			<div class="modal-body form-horizontal">
				<div class="form-group mt-12 row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td> Driver </td>
									<td> สมชาย มุ่งมั่น </td>
								</tr>
								<tr>
									<td>Leave type</td>
									<td>ลาป่วย</td>
								</tr>
								<tr>
									<td>Type</td>
									<td>ลาครึ่งวันเช้า</td>
								</tr>
								<tr>
									<td>Branch name</td>
									<td>ลาดพร้าว</td>
								</tr>
								<tr>
									<td>Leave name</td>
									<td>ท้องเสีย</td>
								</tr>
								<tr>
									<td>Start leave date</td>
									<td>23/04/2563</td>
								</tr>
								<tr>
									<td>End leave date</td>
									<td>23/04/2563</td>
								</tr>
								<tr>
									<td>Number of leave days</td>
									<td>0.5</td>
								</tr>
								<tr>
									<td>Details</td>
									<td>ท้องเสียตั้งแต่เมื่อคืน จนเช้ายังไม่หายเลยครับ</td>
								</tr>
								<tr>
									<td>Days of leave approval</td>
									<td>0.5</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>Active</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script>
$('.image_alt').hide();
$('#preview_img_cover').hide();
Dropzone.autoDiscover = false;
$(document).ready(function() {
  var tableNews = $('#tableNews').dataTable({
    "ajax": {
      "url": url_gb + "/admin/News/Lists",
      "type": "POST",
      "data": function(d) {
        d.news_seo_title = $('#search_news_seo_title').val();
        d.news_seo_keyword = $('#search_news_seo_keyword').val();
        d.news_seo_description = $('#search_news_seo_description').val();
        // etc
      }
    },
    "drawCallback": function(settings) {
      $('[data-toggle="tooltip"]').tooltip();
      $(".change-status").bootstrapToggle();
    },

    "retrieve": true,
    "columns": [
      // {"data" : "checkbox" , "class":"text-center" , "searchable": false, "sortable": false,},
      {
        "data": "checkbox",
        "class": "text-center"
      },
      {
        "data": "DT_RowIndex",
        "class": "text-center",
        "searchable": false,
        "sortable": false,
      },
      {
        "data": "news_order",
        "class": "text-center"
      },
      {
        "data": "news_category",
        "class": "text-center"
      },
      {
        "data": "news_tag",
        "class": "text-center"
      },
      {
        "data": "news_sort_order",
        "class": "text-center"
      },
      {
        "data": "news_date_set",
        "class": "text-center"
      },
      {
        "data": "news_date_end",
        "class": "text-center"
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

  $('body').on('click', '.btn-search', function() {
    tableNews.api().ajax.reload();
  });

  $('body').on('click', '.btn-clear-search', function() {
    $('#search_news_seo_title').val('');
    $('#search_news_seo_description').val('');
    $('#search_news_seo_keyword').val('');
    tableNews.api().ajax.reload();
  });

  $('body').on('click', '.btn-add', function(data) {
    $('#add_news_status').prop('checked', true);
    $('#ModalAdd').modal('show');
  });

  $("#ModalView1").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var recipient = button.data("product_id");
    var modal = $(this);

  })

  $('body').on('click', '.btn-edit', function(data) {
    var id = $(this).data('id');
    var btn = $(this);
    $('#edit_id').val(id);
    $('#show_image').empty();
    loadingButton(btn);
    $.ajax({
      method: "GET",
      url: url_gb + "/admin/News/" + id,
      data: {
        id: id
      }
    }).done(function(res) {
      resetButton(btn);
      var data = res.content;
      var news_category_selected_array = [];
      var news_tag_selected_array = [];

      $.each(data.news_has_news_category, function(k, v) {
        news_category_selected_array[k] = v.news_category_id;
        $("#edit_news_category_id").val(news_category_selected_array);
        $("#edit_news_category_id").trigger('change');
      });


      $('body').on('click', '.btn-search', function() {
        tableFaqs.api().ajax.reload();
    });

      $.each(data.news_has_news_tag, function(k, v) {
        news_tag_selected_array[k] = v.news_tag_id;
        $("#edit_news_tag_id").val(news_tag_selected_array);
        $("#edit_news_tag_id").trigger('change');
      });

      $.each(data.news_detail, function(k, v) {
        url = data.NewsPath + '/' + v.news_details_image;
        $('#edit_news_details_subject_' + v.languages_id).val(v.news_details_subject);
        $('#edit_news_details_title_' + v.languages_id).val(v.news_details_title);
        $('#preview_img_' + v.languages_id).attr('src', url);
        $('#edit_news_details_image_alt_' + v.languages_id).val(v.news_details_image_alt);
        // $('#edit_old_news_details_image_' + v.languages_id).val(v.news_details_image);
        $('#edit_news_details_description_' + v.languages_id).val(v.news_details_description);
        $('#edit_news_details_seo_title_' + v.languages_id).val(v.news_details_seo_title);
        $('#edit_news_details_seo_description_' + v.languages_id).val(v.news_details_seo_description);
        $('#edit_news_details_seo_keyword_' + v.languages_id).val(v.news_details_seo_keyword);
        $('#edit_news_details_og_title_' + v.languages_id).val(v.news_details_og_title);
        $('#edit_news_details_og_description_' + v.languages_id).val(v.news_details_og_description);
        $('#edit_news_details_og_url_' + v.languages_id).val(v.news_details_og_url);
        $('#edit_news_details_og_site_name_' + v.languages_id).val(v.news_details_og_site_name);
        $('#edit_news_details_og_image_' + v.languages_id).val(v.news_details_og_image);
        $('#edit_news_details_seo_type_' + v.languages_id).val(v.news_details_seo_type).change();
        if (v.news_details_status == "1") {
          $('#edit_news_details_status_' + v.languages_id + '_1').prop('checked', true);
        } else if (v.news_details_status == "0") {
          $('#edit_news_details_status_' + v.languages_id + '_2').prop('checked', true);
        }
        // new FroalaEditor('.editor-edit', {
        //     key: "UBB7jD6C5E3A2J3B7aIVLEABVAYFKc1Ce1MYGD1c1NYVMiB3B9B6A5C2C4F4H3G3J3==",
        //     // Set the image upload parameter.
        //     height: 300
        // });

      });
      url_cover = data.NewsCoverPath + '/' + data.news_image;
      $('#preview_img_cover_edit').attr('src', url_cover);
      $('#edit_old_news_cover_image').val(data.news_image);
      $("#edit_news_image_alt").val(data.news_image_alt);
      $("#edit_news_seo_title").val(data.news_seo_title);
      $("#edit_news_seo_keyword").val(data.news_seo_keyword);
      $("#edit_news_seo_description").val(data.news_seo_description);
      $("#edit_news_url_slug").val(data.news_url_slug);
      $("#edit_news_sort_order").val(data.news_sort_order);
      $("#edit_news_date_set").val(data.format_news_date_set);
      $("#edit_news_date_end").val(data.format_news_date_end);
      if (data.news_language_lock_type == "0") {
        $('#edit_news_language_lock_type_1').prop('checked', true);
      } else if (data.news_language_lock_type == "1") {
        $('#edit_news_language_lock_type_2').prop('checked', true);
      }
      if (data.news_status == 1) {
        $('#edit_news_status').prop('checked', true);
      } else {
        $('#edit_news_status').prop('checked', false);
      }
      $.each(data.news_gallery, function(k, v) {
        url = data.url_path + '/' + v.news_gallery_image_gall;
        val_image = '<div id="img_' + v.news_gallery_id + '" class="col-md-2" style="margin-bottom:16px;" align="center">';
        val_image += "<img src='" + url + "' class='img-thumbnail' width='175' height='100'>";
        val_image += "<button type='button' class='btn btn-link remove_image' id='" + v.news_gallery_id + "' data-id='" + v.news_gallery_image_gall + "'><i class='fas fa-trash-alt'></i> Remove</button>";
        val_image += '</div>';

        $('#show_image').append(val_image);
      })
      $('#ModalEdit').modal('show');
    }).fail(function(res) {
      resetButton(form.find('button[type=submit]'));
      swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
    });
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
      var data = res.content;
      var status = '';
      // var news_category_seo_title = [];
      // var news_tag_name = [];
      // if (data.news_status == 1) {
      //     status = "Active";
      // } else {
      //     status = "No Active";
      // }
      $.each(data.news_detail, function(k, v) {
        url = data.NewsPath + '/' + v.news_details_image;
        $('#show_news_details_description_' + v.languages_id).html(v.news_details_description);
        $('#show_news_details_subject_' + v.languages_id).text(v.news_details_subject);
        $('#show_news_details_title_' + v.languages_id).text(v.news_details_title);
        $('#show_news_details_seo_title_' + v.languages_id).text(v.news_details_seo_title);
        $('#show_news_details_seo_keyword_' + v.languages_id).text(v.news_details_seo_keyword);
        $('#show_news_details_seo_description_' + v.languages_id).text(v.news_details_seo_description);
        $('#show_news_image_' + v.languages_id).attr('src', url);
        if (v.news_details_status == 1) {
          details_status = '<h3 class="card-title text-success">Active</h3>';
        } else {
          details_status = '<h3 class="card-title text-danger">Inctive</h3>';
        }
        $('#show_news_details_status_' + v.languages_id).html(details_status);
      });

      $('#ModalView').modal('show');

    }).fail(function(res) {
      resetButton(form.find('button[type=submit]'));
      swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
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
        // swal(res.title, res.content, 'success');
        // tableNews.api().ajax.reload();
      } else {
        swal(res.title, res.content, 'error');
      }
    }).fail(function(res) {
      swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
    });
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
        swal(res.title, res.content, 'success');
        form[0].reset();
        swal(res.title, "Update", "success")
        .then((value) => {
          location.reload();
          // tableNews.api().ajax.reload();
        });
        $('#ModalAdd').modal('hide');
      } else {
        swal(res.title, res.content, 'error');
      }
    }).fail(function(res) {
      resetButton(form.find('button[type=submit]'));
      swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
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
        form[0].reset();
        swal(res.title, "Update", "success")
        .then((value) => {
          location.reload();
          // tableNews.api().ajax.reload();
        });
        $('#ModalEdit').modal('hide');
      } else {
        swal(res.title, res.content, 'error');
      }
    }).fail(function(res) {
      resetButton(form.find('button[type=submit]'));
      swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
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

  $("#dZUploadEdit").dropzone({
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

  $(document).on('click', '.remove_image', function() {
    var id = $(this).attr('id');
    var name = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: url_gb + "/admin/UploadFile/DeleteUploadFileEdit/NewsGallery",
      data: "file_name=" + id + '/' + name,
      success: function(data) {
        $('#img_' + id).remove();
      }
    })
  });
  $('body').on('change', '.upload-news-img', function() {
    var ele = $(this);
    var index = ele.data('index');
    var formData = new FormData();
    var id = $(this).attr('id');
    $('#preview_img_add' + id).attr('src', URL.createObjectURL(event.target.files[0]));
    $('#edit_old_news_details_image_' + id).remove('');
    formData.append('file', ele[0].files[0]);
    $.ajax({
      url: url_gb + '/admin/UploadImage/NewsImageTemp',
      type: 'POST',
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      success: function(res) {
        $('.image_alt').show();
        ele.closest('.form-upload').find('.upload-news-img').append('<input type="hidden" id="edit_news_details_image_' + id + '" name="lang[' + id + '][news_details_image]" value="' + res.path + '">');
        setTimeout(function() {

        }, 100);
      }
    });
  });
  $('body').on('change', '.upload-news-img-setting', function() {
    var ele = $(this);
    var index = ele.data('index');
    var formData = new FormData();
    var id = $(this).attr('id');
    $('#preview_img_cover_add').attr('src', URL.createObjectURL(event.target.files[0]));
    $('#preview_img_cover_edit').attr('src', URL.createObjectURL(event.target.files[0]));
    // $('#edit_old_news_cover_image').remove();
    formData.append('file', ele[0].files[0]);
    $.ajax({
      url: url_gb + '/admin/UploadImage/NewsCoverTemp',
      type: 'POST',
      data: formData,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      success: function(res) {
        ele.closest('.form-upload-add').find('.upload-news-img-setting').append('<input type="hidden" id="add_news_details_image_' + id + '" name="news[news_image]" value="' + res.path + '">');
        setTimeout(function() {

        }, 100);
      }
    });
  });
});
$(".confirm-delete").click(function () {
  Swal.fire({
    title:"Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes"
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        "Success!",
        "Driver's leave has been rejected.",
        "success"
      )
    }
  })
});

$(".confirm-delete2222").on("click touch" , function (event) {

  // alert('test');
  swal('ขออภัย', 'ไม่สามารถดำเนินการได้', 'success');
  return;
  var modal = $(this);
  var product_id = modal.data("product_id");
  swal.fire({
    title: "Are you sure? ID: "+product_id,
    text: "Do you want to cancel this Invoice?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, cancel now"
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        "Success!",
        "Your Invoice has been canceled.",
        "success"
      )
    }
  })
});


$(".confirm-approve").on("click touch" , function (event) {
  var modal = $(this);
  var product_id = modal.data("product_id");
  Swal.fire({
    title: "Are you sure? ID: "+product_id,
    text: "Do you want to approve this driver's leave?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes"
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        "Success!",
        "Driver's leave has been approved.",
        "success"
      )
    }
  })
});

$("#confirm-approve").click(function () {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    }
  })
});

$(document).ready(function() {

var id_add_row = 0;

$("#plus_add_price_structure").on("click touch", function (event) {

  text_table = '<tr id="'+id_add_row+'">';
  text_table += '		<td class="pr-3 pt-5">';
  text_table += '		<div class="row">';
  text_table += '		   <div class="col-md-1">';
  // text_table += '			    <a class="btn btn-danger text-white" onclick="delete_row(\''+id_add_row+'\');" href="javascript:void(0)">';
  // text_table += '				   <i class="ti-close"></i>';
  // text_table += '			    </a>';
  text_table += '			    <a type="button" data-toggle="tooltip" title="Delete this Image" class="btn btn-danger btn-md confirm-delete" onclick="delete_row(\''+id_add_row+'\');" href="javascript:void(0)">';
  text_table += '				   <i class="ti-close"></i>';
  text_table += '			    </a>';
  text_table += '		      </div>';
  text_table += '		   <div class="col-md-11">';
  text_table += '		      <div class="custom-file">';
  text_table += '		         <input type="file" class="custom-file-input upload-news-img form-control" id="add_news_details_image_banner">';
  text_table += '		         <label class="custom-file-label" for="add_news_details_image_banner">Choose Image...</label>';
  text_table += '		      </div>';
  text_table += '		   </div>';
  text_table += '		 </div>';
  text_table += '		</br>';
  text_table += ' 		<input type="text" class="form-control" id="add_news_details_alt_text" name="add_news_details_alt_text" placeholder="Alt Text" required>';
  text_table += '		</br>';
  text_table += ' 		<input type="text" class="form-control" id="add_news_details_alt_text" name="add_news_details_alt_text" placeholder="URL Link (http://)" required>';
  text_table += '		</td>';
  text_table += '	</tr>';

  id_add_row++;

  $("#add_banner_slide").append(text_table);

  });

  $(function() {   // text_table += '		</td>';
    $("input[name='news_setting_related_type']").click(function() {
      if ($("#select").is(":checked")) {
        $("#dvPinNo").show();
      } else {
        $("#dvPinNo").hide();
      }
    });
  });

});

</script>

<script data-sample="1">
    CKEDITOR.replace('add_news_details_content', {
        height: 250
    });
</script>
@endsection
