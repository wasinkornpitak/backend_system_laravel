@extends('layouts.layout')@section('content')

<style type="text/css">
hr.style-dot {
  border-top: 1px dashed rgba(0,0,0,.2);
  border-bottom: 1px dashed #fff;
  margin-bottom: 30px;
}
.card-hover {
  border: 1px dashed rgba(0,0,0,.1);
}
.card-border {
  border: 1px solid rgba(0,0,0,.1);
}
.card-footer {
  border-top: 1px solid rgba(120,130,140,.13);
  background-color: #f7fafc;
  padding-top: 17px;
  padding-bottom: 17px;
}

.head-list {
  border-bottom: 1px solid rgba(0,0,0,.1);
  padding-bottom: 20px !important;
  margin-bottom: 20px;
}

.inline {
  display:inline;
}
.img-responsive  {
  display:block;
  max-width:100%;
  height:auto;
}
.img-view {
  width:250px;
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
                <input type="text" id="search_faqs_title" class="form-control search_table">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_faqs_created_date">Created Date</label>
                <input type="date" id="search_faqs_create_date" name="search_faqs_created_date" class="form-control search_table" placeholder="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_faqs_updated_date">Updated Date</label>
                <input type="date" id="search_faqs_create_date" name="search_faqs_updated_date" class="form-control search_table" placeholder="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_faqs_status">Status</label> <br>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" id="search_user_status" name="search_user_status" checked>
                    <label class="custom-control-label" for="search_user_status">All</label>
                  </div>
                </div>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" id="search_faqs_status_1" name="search_faqs_status">
                    <label class="custom-control-label" for="search_faqs_status_1">On</label>
                  </div>
                </div>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" id="search_faqs_status_2" name="search_faqs_status">
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
          <h4 class="card-title">{{$MainMenus->menu_system_name}} <small class="">(5 items)</small> </h4>
          <button type="button" class="btn btn-success mb-2 float-right newdata btn-add">Add FAQ</button>
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
          <table class="table table-hover table-striped table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
            <thead>
              <tr class="text-center">
                <th scope="col"></th>
                <th scope="col">No.</th>
                <th scope="col">Order</th>
                <th scope="col">FAQ Title</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" class="text-center">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews1" required >
                    <label class="custom-control-label" for="SelectNews1"></label>
                  </div>
                </td>
                <th scope="row" class="text-center">1</th>
                <td>2</td>
                <td>ฉันสามารถป้อนอะไรลงในกล่องค้นหาได้บ้าง</td>
                <td>13/08/2020 10:33 - Admin Smile</td>
                <td>13/08/2020 12:17 - Admin Smile</td>
                <td>
                  <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                  <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-md btn-add">
                    <i class="ti-pencil-alt"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                    <i class="ti-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td scope="row" class="text-center">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews2" required>
                    <label class="custom-control-label" for="SelectNews2"></label>
                  </div>
                </td>
                <th scope="row" class="text-center">2</th>
                <td>3</td>
                <td>ฉันสามารถขอรับความช่วยเหลือในการค้นหาผลิตภัณฑ์ได้หรือไม่</td>
                <td>01/09/2020 16:40 - Tom & Jerry </td>
                <td></td>
                <td>
                  <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                  <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-md btn-add">
                    <i class="ti-pencil-alt"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                    <i class="ti-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td scope="row" class="text-center">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews3" required>
                    <label class="custom-control-label" for="SelectNews3"></label>
                  </div>
                </td>
                <th scope="row" class="text-center">3</th>
                <td>1</td>
                <td>ฉันจะชำระเงินช่องทางใดได้บ้าง</td>
                <td> 10/08/2020 21:05 - สาธิต กรีฑา </td>
                <td></td>
                <td>
                  <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                  <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-md btn-add">
                    <i class="ti-pencil-alt"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                    <i class="ti-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td scope="row" class="text-center">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews4" required>
                    <label class="custom-control-label" for="SelectNews4"></label>
                  </div>
                </td>
                <th scope="row" class="text-center">4</th>
                <td>5</td>
                <td>ฉันต้องการดูผลงานจริงที่ทางบริษัทผลิตต้องทำอย่างไร</td>
                <td> 10/08/2020 21:05 - สาธิต กรีฑา </td>
                <td></td>
                <td>
                  <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                  <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-md btn-add">
                    <i class="ti-pencil-alt"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                    <i class="ti-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td scope="row" class="text-center">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="SelectNews5" required>
                    <label class="custom-control-label" for="SelectNews5"></label>
                  </div>
                </td>
                <th scope="row" class="text-center">5</th>
                <td>1</td>
                <td>เงื่อนไขในการชำระเงินมีอะไรบ้าง</td>
                <td> 10/08/2020 21:05 - สาธิต กรีฑา </td>
                <td></td>
                <td>
                  <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                  <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-md btn-add">
                    <i class="ti-pencil-alt"></i>
                  </button>
                  <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                    <i class="ti-trash"></i>
                  </button>
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
      <div class="modal-header bg-light">
        <h4 class="modal-title">Add News</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
      </div>

      <form action="#" class="needs-validation" novalidate>
        <div class="form-body">
          <div class="card-body pb-0">
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#th-tab" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down">TH</span></a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#en-tap" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-gb"></i></span> <span class="hidden-xs-down">EN</span></a> </li>
                </ul>
                <!-- End Nav tabs -->
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border pt-4 pr-4 pl-4 pb-0">
                  <div class="tab-pane active" id="th-tab" role="tabpanel">
                    <div class="form-horizontal form-upload">
                      <div class="form-group row">
                        <label for="add_faqs_title_th" class="col-sm-3 text-right control-label col-form-label">FAQ Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_faqs_title_th" name="add_faqs_title_th" value="Th" required>
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_faqs_content_th" class="col-sm-3 text-right control-label col-form-label">Content Details</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" id="add_faqs_content_th" name="add_faqs_content_th" rows="4"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="add_faqs_status" class="col-sm-3 text-right control-label col-form-label">Status</label>
                        <div class="col-sm-9">
                          <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                        </div>
                      </div>
                    </div>
                  </div>  <!-- End Tap TH -->


                  <div class="tab-pane" id="en-tap" role="tabpanel">
                    <div class="form-horizontal form-upload">
                      <div class="form-group row">
                        <label for="add_faqs_title_en" class="col-sm-3 text-right control-label col-form-label">FAQ Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="add_faqs_title_en" name="add_faqs_title_en" value="En" required>
                        </div>
                      </div>
                      <div class="form-group row pb-3">
                        <label for="add_faqs_content_en" class="col-sm-3 text-right control-label col-form-label">Content Details</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" id="add_faqs_content_en" name="add_faqs_content_en" rows="4"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="add_faqs_status" class="col-sm-3 text-right control-label col-form-label">Status</label>
                        <div class="col-sm-9">
                          <input type="checkbox" class="toggle edit-status" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                        </div>
                      </div>
                    </div>
                  </div>  <!-- End Tap EN -->


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

$(document).ready(function() {

  // ---------------- CkeEditor
  CKEDITOR.replace('add_faqs_content_th', {
    height: 250
  });
  CKEDITOR.replace('add_faqs_content_en', {
    height: 250
  });  // End


  $('body').on('click', '.btn-clear-search', function() {
    $('#search_news_seo_title').val('');
    $('#search_news_seo_description').val('');
    $('#search_news_seo_keyword').val('');
    tableNews.api().ajax.reload();
  });

  $('body').on('click', '.btn-add', function(data) {
    $('#ModalAddnew').modal('show');
  });


  $(".confirm-delete").click(function () {
    Swal.fire({
      title:"Are you sure?",
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


});



</script>

@endsection
