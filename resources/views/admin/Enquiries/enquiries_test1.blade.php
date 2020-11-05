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
                <label class="control-label" for="search_enquiries_name">Name</label>
                <input type="text" id="search_enquiries_name" class="form-control search_table">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_enquiries_email">E-mail</label>
                <input type="text" id="search_enquiries_email" class="form-control search_table">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_enquiries_phone">Phone</label>
                <input type="number" id="search_enquiries_phone" class="form-control search_table">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_enquiries_status">Status</label> <br>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" id="search_enquiries_status" name="search_enquiries_status" checked>
                    <label class="custom-control-label" for="search_enquiries_status">All</label>
                  </div>
                </div>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" id="search_enquiries_status_1" name="search_enquiries_status">
                    <label class="custom-control-label" for="search_enquiries_status_1">New</label>
                  </div>
                </div>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" id="search_enquiries_status_2" name="search_enquiries_status">
                    <label class="custom-control-label" for="search_enquiries_status_2">Pending</label>
                  </div>
                </div>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" id="search_enquiries_status_3" name="search_enquiries_status">
                    <label class="custom-control-label" for="search_enquiries_status_3">Contacted</label>
                  </div>
                </div>
                <div class="form-check form-check-inline">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" id="search_enquiries_status_4" name="search_enquiries_status">
                    <label class="custom-control-label" for="search_enquiries_status_4">Lost</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_enquiries_submit_date">Submitted Date</label>
                <input type="date" id="search_enquiries_submit_date" name="search_enquiries_submit_date" class="form-control search_table" placeholder="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label" for="search_enquiries_updated_date">Updated Date</label>
                <input type="date" id="search_enquiries_create_date" name="search_enquiries_updated_date" class="form-control search_table" placeholder="">
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
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Submitted</th>
                <th scope="col">Updated</th>
                <th scope="col">Status</th>
                <th scope="col">Latest Comment</th>
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
                <td>พรพิมล</td>
                <td>phonpimon_yim@gmail.com</td>
                <td>062-8912237</td>
                <td>13/08/2020 10:33</td>
                <td>14/08/2020 09:47</td>
                <td>Contacted</td>
                <td>Change status to Contacted</td>
                <td class="text-center">
                  <button type="button" data-toggle="tooltip" title="View" class="btn btn-info btn-md btn-view">
                    <i class="ti-eye"></i>
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
                <td>เบส</td>
                <td>thanunyaa_pho@gmail.com</td>
                <td>0896652360</td>
                <td>14/08/2020 17:30</td>
                <td></td>
                <td>New</td>
                <td></td>
                <td class="text-center">
                  <button type="button" data-toggle="tooltip" title="View" class="btn btn-info btn-md btn-view">
                    <i class="ti-eye"></i>
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
                <td>Apichat</td>
                <td>apichat1990@gmail.com</td>
                <td>0623356987</td>
                <td>14/08/2020 17:32</td>
                <td>14/08/2020 18:20</td>
                <td>Pending</td>
                <td>ยังติดต่อลูกค้าไม่ได้ รอติดต่อใหม่วันพรุ่งนี้</td>
                <td class="text-center">
                  <button type="button" data-toggle="tooltip" title="View" class="btn btn-info btn-md btn-view">
                    <i class="ti-eye"></i>
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
                <td>พี่กุ้ง</td>
                <td>lamai_27@gmail.com</td>
                <td>0906632300</td>
                <td>14/08/2020 15:42</td>
                <td></td>
                <td>New</td>
                <td></td>
                <td class="text-center">
                  <button type="button" data-toggle="tooltip" title="View" class="btn btn-info btn-md btn-view">
                    <i class="ti-eye"></i>
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
                <td>สมร คงใจดี</td>
                <td>samorm.kongjaidee@gmail.com</td>
                <td>0895560001</td>
                <td>07/02/2020 09:05</td>
                <td>10/02/2020 11:17</td>
                <td>Lost</td>
                <td>Change status to Lost</td>
                <td class="text-center">
                  <button type="button" data-toggle="tooltip" title="View" class="btn btn-info btn-md btn-view">
                    <i class="ti-eye"></i>
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

<div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h4 class="modal-title">View</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
      </div>
      <form action="#" class="needs-validation" novalidate>
          <div class="form-body">
            <div class="card-body">

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
                    เพลซแฟรี่แมนชั่นเทวาธิราช จตุคามสุริยยาตร์ซิ้มวีซ่าเวณิกา แบดแมมโบ้ปักขคณนาโรแมนติกบอยคอตต์ เซอร์ไพรส์ปูอัด นินจากู๋บอร์ดแกสโซฮอล์ วิว อันตรกิริยา
                    รันเวย์ผิดพลาด ฟลุทแจ็กพ็อตราชานุญาต ไง เอสเปรสโซภารตะโนติส ไวอากร้า โนติสเคลียร์ฮาลาลจ๊าบ ดีพาร์ตเมนต์คาเฟ่
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
                  <textarea class="form-control form-control-danger" id="add_enquiries_comment" name="add_enquiries_comment" rows="4" placeholder="Comment..."></textarea>
                </div>
                <div class="col-md-12 form-group">
                  <select class="form-control select2" id="search_news_seo_category" name="search_news_seo_category">
                    <option>Choose status</option>
                    <option value="">Pending</option>
                    <option value="">Contacted</option>
                    <option value="">Lost</option>
                  </select>
                  <small class="form-text text-muted">Choose an option or skip to the end</small>
                </div>
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-12 form-group text-center">
                  <button type="submit" class="btn btn-success waves-effect waves-light" id="" name="">Post</button>
                </div>
              </div>
            </form>

              <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title">Comments <small class="">(4 items)</small> </h4>
                  </div>
                <div class="col-md-12">
                  <table class="table browser no-border card-border table-striped">
                    <tbody>
                      <tr>
                        <td>
                          <h5 class="font-normal mb-1"> <i class="mdi mdi-autorenew font-20"></i> Change status to Contacted </h5>
                          <span class="text-muted mr-2 font-12">Posted by: Admin Smile | 14/08/2020, 09:47:19</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h5 class="font-normal mb-1"> <i class="mdi mdi-message-reply-text font-20"></i> ติดต่อลูกค้าแล้ว ส่งต่อลูกค้าให้ Sale แล้ว</h5>
                          <span class="text-muted mr-2 font-12">Posted by: Admin Smile | 14/08/2020, 09:47:19</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h5 class="font-normal mb-1"> <i class="mdi mdi-autorenew font-20"></i> Change status to Pending </h5>
                          <span class="text-muted mr-2 font-12">Posted by: Admin Smile | 13/08/2020, 10:33:12</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h5 class="font-normal mb-1"> <i class="mdi mdi-message-reply-text font-20"></i> ยังติดต่อลูกค้าไม่ได้ รอติดต่อใหม่วันพรุ่งนี้</h5>
                          <span class="text-muted mr-2 font-12">Posted by: Admin Smile | 13/08/2020, 10:33:12</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- <div class="col-md-2"></div> -->
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



  $('body').on('click', '.btn-clear-search', function() {
    $('#search_news_seo_title').val('');
    $('#search_news_seo_description').val('');
    $('#search_news_seo_keyword').val('');
    tableNews.api().ajax.reload();
  });

  $('body').on('click', '.btn-add', function(data) {
    $('#ModalAddnew').modal('show');
  });

  $('body').on('click', '.btn-view', function(data) {
    $('#ModalView').modal('show');
  });


  $(".confirm-delete").click(function () {
    Swal.fire({
      title:"Are you sure?",
      text: "You will not be able to recover this Enquiries!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          "Success!",
          "The Enquiries has been removed.",
          "success"
        )
      }
    })
  });


});



</script>

@endsection
