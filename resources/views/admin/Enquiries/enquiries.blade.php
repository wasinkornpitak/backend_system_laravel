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
                                            <input type="radio" class="custom-control-input" value="all"
                                                id="search_enquiries_status" name="search_enquiries_status" checked>
                                            <label class="custom-control-label" for="search_enquiries_status">All</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1"
                                                id="search_enquiries_status_1" name="search_enquiries_status">
                                            <label class="custom-control-label" for="search_enquiries_status_1">Action</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0"
                                                id="search_enquiries_status_2" name="search_enquiries_status">
                                            <label class="custom-control-label"
                                                for="search_enquiries_status_2">No Action</label>
                                        </div>
                                    </div>
                                    {{-- <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="3"
                                                id="search_enquiries_status_3" name="search_enquiries_status">
                                            <label class="custom-control-label"
                                                for="search_enquiries_status_3">Contacted</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="4"
                                                id="search_enquiries_status_4" name="search_enquiries_status">
                                            <label class="custom-control-label" for="search_enquiries_status_4">Lost</label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_enquiries_submit_date">Submitted Date</label>
                                    <input type="date" id="search_enquiries_submit_date" name="search_enquiries_submit_date"
                                        class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_enquiries_updated_date">Updated Date</label>
                                    <input type="date" id="search_enquiries_updated_date"
                                        name="search_enquiries_updated_date" class="form-control search_table"
                                        placeholder="">
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
                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                                <span class="badge badge-secondary"><i class="ti-check"></i></span> Check All
                            </a>
                            <a href="javascript:void(0)" class="pr-3">
                                <span class="badge badge-warning"><i class="icon-refresh"></i></span> Chang Status
                            </a>
                            <a href="javascript:void(0)" class="checkbox-deleteselect pr-3">
                                <span class="badge badge-danger"><i class="ti-trash"></i></span> Delete Selected
                            </a>
                        </div>
                        <table
                            class="table" id="tableEnquiries">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"></th>
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Submitted</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Latest Comment</th>
                                    <th scope="col">Status</th>
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
                                    <td>พรพิมล</td>
                                    <td>phonpimon_yim@gmail.com</td>
                                    <td>062-8912237</td>
                                    <td>13/08/2020 10:33</td>
                                    <td>14/08/2020 09:47</td>
                                    <td>Contacted</td>
                                    <td>Change status to Contacted</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="tooltip" title="View"
                                            class="btn btn-info btn-md btn-view">
                                            <i class="ti-eye"></i>
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
                                    <td>เบส</td>
                                    <td>thanunyaa_pho@gmail.com</td>
                                    <td>0896652360</td>
                                    <td>14/08/2020 17:30</td>
                                    <td></td>
                                    <td>New</td>
                                    <td></td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="tooltip" title="View"
                                            class="btn btn-info btn-md btn-view">
                                            <i class="ti-eye"></i>
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
                                    <td>Apichat</td>
                                    <td>apichat1990@gmail.com</td>
                                    <td>0623356987</td>
                                    <td>14/08/2020 17:32</td>
                                    <td>14/08/2020 18:20</td>
                                    <td>Pending</td>
                                    <td>ยังติดต่อลูกค้าไม่ได้ รอติดต่อใหม่วันพรุ่งนี้</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="tooltip" title="View"
                                            class="btn btn-info btn-md btn-view">
                                            <i class="ti-eye"></i>
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
                                    <td>พี่กุ้ง</td>
                                    <td>lamai_27@gmail.com</td>
                                    <td>0906632300</td>
                                    <td>14/08/2020 15:42</td>
                                    <td></td>
                                    <td>New</td>
                                    <td></td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="tooltip" title="View"
                                            class="btn btn-info btn-md btn-view">
                                            <i class="ti-eye"></i>
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
                                    <td>สมร คงใจดี</td>
                                    <td>samorm.kongjaidee@gmail.com</td>
                                    <td>0895560001</td>
                                    <td>07/02/2020 09:05</td>
                                    <td>10/02/2020 11:17</td>
                                    <td>Lost</td>
                                    <td>Change status to Lost</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="tooltip" title="View"
                                            class="btn btn-info btn-md btn-view">
                                            <i class="ti-eye"></i>
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

    <div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabel">
        <input type="hidden" id="enquiry_id" value="">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">View</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                                class="mdi mdi-close"></i></span></button>
                </div>
                <form action="#" class="needs-validation" novalidate>
                    <div class="form-body">
                        <div class="card-body">

                            <div class="row">
                                <label class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <label class="col-sm-9 control-label col-form-label" id="enquiry_data_input"> - </label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                                <label class="col-sm-9 control-label col-form-label" id="enquiry_data_email"> - </label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <label class="col-sm-9 control-label col-form-label" id="enquiry_data_number"> - </label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 text-right control-label col-form-label">Message</label>
                                <div class="col-sm-9" id="enquiry_data_text">
                                    {{-- <p>
                                        เพลซแฟรี่แมนชั่นเทวาธิราช จตุคามสุริยยาตร์ซิ้มวีซ่าเวณิกา
                                        แบดแมมโบ้ปักขคณนาโรแมนติกบอยคอตต์ เซอร์ไพรส์ปูอัด นินจากู๋บอร์ดแกสโซฮอล์ วิว
                                        อันตรกิริยา
                                        รันเวย์ผิดพลาด ฟลุทแจ็กพ็อตราชานุญาต ไง เอสเปรสโซภารตะโนติส ไวอากร้า
                                        โนติสเคลียร์ฮาลาลจ๊าบ ดีพาร์ตเมนต์คาเฟ่
                                    </p> --}}
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 text-right control-label col-form-label">Submitted Date</label>
                                <label class="col-sm-9 control-label col-form-label" id="created_at"> - </label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 text-right control-label col-form-label">Updated Date</label>
                                <label class="col-sm-9 control-label col-form-label" id="updated_at"> - </label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 text-right control-label col-form-label">Status</label>
                                <label class="col-sm-9 control-label col-form-label" id="enquiry_status"> - </label>
                            </div>

                            <hr class="style-dot">

                            <form id="FormComment">
                                <div class="row">
                                    <!-- <div class="col-md-2"></div> -->
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control form-control-danger" id="enquiry_comment"
                                            name="enquiry_comment" rows="4" placeholder="Comment..." required></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <select class="form-control select2" id="enquiry_comment_status"
                                            name="enquiry_comment_status">
                                            <option value="">Choose status</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Contacted</option>
                                            <option value="3">Lost</option>
                                        </select>
                                        <small class="form-text text-muted">Choose an option or skip to the end</small>
                                    </div>
                                    <!-- <div class="col-md-2"></div> -->
                                    <div class="col-md-12 form-group text-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light btn-add-comment" id="btn_add_comment"
                                            name="btn_add_comment">Post</button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title">Comments </h4>
                                </div>
                                <div class="col-md-12">
                                    <table class="table" id="tableComment">
                                        <tbody>
                                            {{-- <tr>
                                                <td>
                                                    <h5 class="font-normal mb-1"> <i class="mdi mdi-autorenew font-20"></i>
                                                        Change status to Contacted </h5>
                                                    <span class="text-muted mr-2 font-12">Posted by: Admin Smile |
                                                        14/08/2020, 09:47:19</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-normal mb-1"> <i
                                                            class="mdi mdi-message-reply-text font-20"></i> ติดต่อลูกค้าแล้ว
                                                        ส่งต่อลูกค้าให้ Sale แล้ว</h5>
                                                    <span class="text-muted mr-2 font-12">Posted by: Admin Smile |
                                                        14/08/2020, 09:47:19</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-normal mb-1"> <i class="mdi mdi-autorenew font-20"></i>
                                                        Change status to Pending </h5>
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
                                            </tr> --}}
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

            var tableEnquiries = $('#tableEnquiries').dataTable({
                "ajax": {
                    "url": url_gb+"/admin/Enquiries/Lists",
                    "type": "POST",
                    "data": function ( d ) {
                        d.enquiries_name = $('#search_enquiries_name').val();
                        d.enquiries_email = $('#search_enquiries_email').val();
                        d.enquiries_phone = $('#search_enquiries_phone').val();
                        d.create_date = $('#search_enquiries_submit_date').val();
                        d.update_date = $('#search_enquiries_updated_date').val();
                        d.status = $('input[name=search_enquiries_status]:checked').val();
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
                    {"data" : "name"},
                    {"data" : "email"},
                    {"data" : "phone"},
                    {"data" : "created_at"},
                    {"data" : "updated_at"},
                    {"data" : "comment"},
                    {"data" : "status"},
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

            $('body').on('click', '.btn-add-comment', function(e) {
                e.preventDefault();
                var id = $('#enquiry_id').val();
                var commemt = $('#enquiry_comment').val();

                if(commemt === ''){
                    Swal.fire('Plese Comment', 'comment error', 'error');
                    return;
                }

                var status = $('#enquiry_comment_status').val();
                var btn = $(this);
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb + "/admin/Enquiries/AddComment/"+ id,
                    data: {
                        enquiry_comment: commemt,
                        enquiry_comment_status: status
                    }
                }).done(function(res) {
                    console.log(res);
                    resetButton(btn);
                    if (res.status == 1) {
                        Swal.fire(res.title, res.content, 'success');
                        // form[0].reset();
                        $('#enquiry_comment').val('');
                        $('#enquiry_comment_status').val('').change();

                        var html = '';
                        html += `<tr>
                                    <td>
                                        <h5 class="font-normal mb-1">
                                            `+res.data['enquiry_comment_comment']+` </h5>
                                        <span class="text-muted mr-2 font-12">Posted by: `+ res.data['admin_user']['name'] + ' ' + res.data['admin_user']['last_name'] + ` |
                                            `+ res.data['created_at'] +`</span>
                                    </td>
                                </tr>`;

                        $("#tableComment tbody").append(html);
                    } else {
                        Swal.fire(res.title, res.content, 'error');
                    }
                }).fail(function(res) {
                    // resetButton(form.find('button[type=submit]'));
                    Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('click', '.btn-add', function(data) {
                $('#ModalAddnew').modal('show');
            });

            $('body').on('click', '.btn-view', function(data) {
                var id = $(this).data('id');
                var btn = $(this);
                $('#enquiry_id').val(id);
                loadingButton(btn);
                $.ajax({
                    method: "GET",
                    url: url_gb + "/admin/Enquiries/" + id,
                    data: {
                        id: id
                    }
                }).done(function(res) {
                    console.log(res);

                    $.each(res.enquiries.enquiries_data, function(idx, val){
                        if(val.enquiry_data_input !== null){
                            $('#enquiry_data_input').text(val.enquiry_data_input);
                        }
                        if(val.enquiry_data_number !== null){
                            $('#enquiry_data_number').text(val.enquiry_data_number);
                        }
                        if(val.enquiry_data_text !== null){
                            $('#enquiry_data_text').html('<p>'+ val.enquiry_data_text + '</p>');
                        }
                        if(val.enquiry_data_email !== null){
                            $('#enquiry_data_email').text(val.enquiry_data_email);
                        }
                    });

                    var html = '';
                    if(res.enquiries_comment !== ''){
                        $.each(res.enquiries_comment, function(index, value){

                            html += `<tr>
                                        <td>
                                            <h5 class="font-normal mb-1">
                                                `+value['enquiry_comment_comment']+` </h5>
                                            <span class="text-muted mr-2 font-12">Posted by: `+ value['admin_user']['name'] + ' ' + value['admin_user']['last_name'] + ` |
                                                `+ value['created_at'] +`</span>
                                        </td>
                                    </tr>`;
                        });
                    }

                    $("#tableComment tbody").html(html);

                    $('#created_at').text(res.enquiries.created_at);
                    $('#updated_at').text(res.enquiries.updated_at);

                    if(res.enquiries.enquiry_status == 1){
                        $('#enquiry_status').text('Action');
                    }else{
                        $('#enquiry_status').text('No Action');
                    }

                    resetButton(btn);

                    $('#ModalView').modal('show');
                }).fail(function(res) {
                    // resetButton(form.find('button[type=submit]'));
                    swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            });

            $('body').on('click', '.btn-delete', function(data) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Enquiries!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: "POST",
                            url: url_gb + "/admin/Enquiries/Delete/" + id,
                            data: {
                                id: id,
                            }
                        }).done(function(res) {
                            if (res.status == 1) {
                                Swal.fire(res.title, res.content, 'success');
                                tableEnquiries.api().ajax.reload();
                                // location.reload();
                            } else {
                                Swal.fire(res.title, res.content, 'error');
                            }
                        }).fail(function(res) {
                            Swal.fire("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                        });
                    }
                })
            });

            $(".btn-delete1").click(function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Enquiries!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    console.log('test132132');
                    return;
                    if (result.value) {
                        $.ajax({
                            method: "POST",
                            url: url_gb + "/admin/Enquiries/Delete/" + id,
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
                    }
                })
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
                    title: "Are you sure?",
                    text: "You will not be able to recover this Enquiries!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                })
                .then((ConfirmDelete) => {
                    if (ConfirmDelete) {
                        $.ajax({
                            method: "POST",
                            url: url_gb + "/admin/Enquiries/Delete/"+ id,
                            data: {
                                id: delStatus,
                            }
                        }).done(function(res) {
                            if (res.status == 1) {
                                Swal.fire(res.title, res.content, 'success');
                                tableEnquiries.api().ajax.reload();
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
                tableEnquiries.api().ajax.reload();
            });

            $('body').on('click', '.btn-clear-search', function() {
                $('#search_enquiries_name').val('');
                $('#search_enquiries_email').val('');
                $('#search_enquiries_phone').val('');
                $('#search_enquiries_submit_date').val('');
                $('#search_enquiries_updated_date').val('');
                $('#search_enquiries_status').prop('checked', true);
                tableEnquiries.api().ajax.reload();
            });
        });

    </script>

@endsection
