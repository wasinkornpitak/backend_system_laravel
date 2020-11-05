@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <form id="FormSearch">
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <input type="text" id="search_username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Firstname</label>
                                <input type="text" id="search_first_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Lastname</label>
                                <input type="text" id="search_last_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">IP</label>
                                <input type="text" id="search_ip" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">E-mail</label>
                                <input type="email" id="search_email" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input search_gender" value="all" id="search_gender_id_all" name="search_gender_id">
                                    <label class="custom-control-label" for="search_gender_id_all">All</label>
                                </div>
                                @foreach($Genders as $val)
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input search_gender" value="{{$val->gender_id}}" id="search_gender_id_{{$val->gender_id}}" name="search_gender_id">
                                        <label class="custom-control-label" for="search_gender_id_{{$val->gender_id}}">{{$val->gender_name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Department</label>
                                @foreach($AdminUserGroups as $val)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input search_admin_user_group" value="{{$val->admin_user_group_id}}" id="search_admin_user_group_id_{{$val->admin_user_group_id}}">
                                        <label class="custom-control-label" for="search_admin_user_group_id_{{$val->admin_user_group_id}}">{{$val->admin_user_group_name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search btn-clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenu->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('AdminUser' , 2))
                        <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableAdminUser" class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Color Code</th>
                                <th scope="col">IP</th>
                                <th scope="col">Username</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Nick name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Latest Login</th>
                                <th scope="col">Department</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormAdd" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="control-label">Position</label>
                                        <select class="form-control select2" name="dev_position_id" id="add_dev_position_id" required>
                                            <option value="">----Select----</option>
                                            @foreach($DevPositions as $val)
                                                <option value="{{$val->dev_position_id}}">{{$val->dev_position_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="control-label" for="add_name_prefix_id">Name prefix</label><br>
                                        <select class="form-control select2" name="name_prefix_id" id="add_name_prefix_id" required>
                                          <option value="">----Select----</option>
                                            @foreach($NamePrefixs as $val)
                                                <option value="{{$val->name_prefix_id}}">{{$val->name_prefix_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" id="add_first_name" name="first_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" id="add_last_name" name="last_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Nick name</label>
                                    <input type="text" class="form-control" id="add_nick_name" name="nick_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Gender</label> <br />
                                    @foreach($Genders as $val)
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="{{$val->gender_id}}" id="add_gender_id_{{$val->gender_id}}" name="gender_id" required>
                                                <label class="custom-control-label" for="add_gender_id_{{$val->gender_id}}">{{$val->gender_name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="add_email" name="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pin">PIN</label>
                                    <input type="text" class="form-control number-only" id="add_pin" name="pin">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="add_username" name="username" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="add_password" name="password" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Department</label> <br />
                                    @foreach($AdminUserGroups as $val)
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="{{$val->admin_user_group_id}}" id="add_admin_user_group_id_{{$val->admin_user_group_id}}" name="admin_user_group_id[]">
                                                <label class="custom-control-label" for="add_admin_user_group_id_{{$val->admin_user_group_id}}">{{$val->admin_user_group_name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="color_code">Color Code</label>
                                    <input type="color" class="form-control" id="add_color_code" name="color_code">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_status" name="status" value="1" checked />
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="control-label">Position</label>
                                        <select class="form-control select2" name="dev_position_id" id="edit_dev_position_id" required>
                                            <option value="">----Select----</option>
                                            @foreach($DevPositions as $val)
                                                <option value="{{$val->dev_position_id}}">{{$val->dev_position_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="control-label" for="add_name_prefix_id">Name prefix</label><br>
                                        <select class="form-control select2" name="name_prefix_id" id="edit_name_prefix_id" required>
                                          <option value="">----Select----</option>
                                            @foreach($NamePrefixs as $val)
                                                <option value="{{$val->name_prefix_id}}">{{$val->name_prefix_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" id="edit_first_name" name="first_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" id="edit_last_name" name="last_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Nick name</label>
                                    <input type="text" class="form-control" id="edit_nick_name" name="nick_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Gender</label> <br />
                                    @foreach($Genders as $val)
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="{{$val->gender_id}}" id="edit_gender_id_{{$val->gender_id}}" name="gender_id">
                                                <label class="custom-control-label" for="edit_gender_id_{{$val->gender_id}}">{{$val->gender_name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="edit_email" name="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pin">PIN</label>
                                    <input type="text" class="form-control number-only" id="edit_pin" name="pin">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="edit_username" name="username" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="edit_password" name="password" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Department</label> <br />
                                    @foreach($AdminUserGroups as $val)
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="{{$val->admin_user_group_id}}" id="edit_admin_user_group_id_{{$val->admin_user_group_id}}" name="admin_user_group_id[]">
                                                <label class="custom-control-label" for="edit_admin_user_group_id_{{$val->admin_user_group_id}}">{{$val->admin_user_group_name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="color_code">Color Code</label>
                                    <input type="color" class="form-control" id="edit_color_code" name="color_code">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_status" name="status" value="1" checked />
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 row">
                    <label for="example-text-input" class="col-md-6 col-form-label">IP :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_ip"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Username :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_username"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Name prefix :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_name_prefix_name"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">First name :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_first_name"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Last name :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_last_name"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Nick name :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_nick_name"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Gender :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="gender_name"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">E-mail :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_email"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Position :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_dev_position_name"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Department :</label>
                    <div class="col-md-6" id="show_admin_user_grop">

                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Create Date :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_created_at"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Latest Login :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_last_login"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">PIN :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_pin"></label>
                    </div>
                    <label for="example-text-input" class="col-md-6 col-form-label">Status :</label>
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-form-label" id="show_status"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Admin.AdminUser.Modal.modal_permission')
@include('Admin.AdminUser.Modal.modal_reset_password')
@endsection
@section('scripts')
<script>
    var admin_user_group_id = [];
    var tableAdminUser = $('#tableAdminUser').dataTable({
        "ajax": {
            "url": url_gb+"/admin/AdminUser/Lists",
            "data": function ( d ) {
                d.username = $('#search_username').val();
                d.first_name = $('#search_first_name').val();
                d.last_name = $('#search_last_name').val();
                d.ip = $('#search_ip').val();
                d.email = $('#search_email').val();
                d.gender_id = $("input[name='search_gender_id']:checked").val();
                d.admin_user_group_id = admin_user_group_id;
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {"data" : "DT_RowIndex", "class":"text-center", "searchable": false, "sortable": false},
            {"data" : "color_code", "class":"text-center", "searchable": false, "sortable": false},
            {"data" : "ip", "class":"text-center"},
            {"data" : "username"},
            {"data" : "admin_name", "name": 'first_name'},
            {"data" : "last_name", visible:false},
            {"data" : "nick_name"},
            {"data" : "gender_name", "name": "gender.gender_name"},
            {"data" : "email"},
            {"data" : "created_at" , "class":"text-center"},
            {"data" : "last_login" , "class":"text-center"},
            {"data" : "admin_user_group", "searchable": false, "sortable": false,},
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

    $('body').on('click','.btn-search',function(data){
        admin_user_group_id = [];
        $(".search_admin_user_group:checked").each(function() {
            admin_user_group_id.push(this.value);
        });
        tableAdminUser.api().ajax.reload();
    });

    $('body').on('click','.btn-clear-search',function(data){
        $('#search_username').val('');
        $('#search_first_name').val('');
        $('#search_last_name').val('');
        $('#search_ip').val('');
        $('#search_email').val('');
        $("input[name='search_gender_id']:checked").val('');
        $('.search_admin_user_group').prop('checked', false);
        admin_user_group_id = [];
        tableAdminUser.api().ajax.reload();
    });

    $('body').on('click','.btn-add',function(data){
        $('#ModalAdd').modal('show');
    });

    $('body').on('click','.btn-edit',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/AdminUser/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $('#edit_dev_position_id').val(data.dev_position_id).change();
            $('#edit_name_prefix_id').val(data.name_prefix_id).change();
            $('#edit_first_name').val(data.first_name);
            $('#edit_last_name').val(data.last_name);
            $('#edit_nick_name').val(data.nick_name);
            $('#edit_email').val(data.email);
            $('#edit_pin').val(data.pin);
            $('#edit_username').val(data.username);
            $('#edit_admin_user_group_id_').val(data.admin_user_group_id_);
            $('#edit_color_code').val(data.color_code);
            $('#edit_gender_id_'+data.gender_id).prop('checked', true);
            $.each(data.admin_group, function(k,v) {
                $('#edit_admin_user_group_id_'+v.admin_user_group_id).prop('checked', true);
            });
            if(data.status == 1){
              $('#edit_status').prop('checked', true);
            }else{
              $('#edit_status').prop('checked', false);
            }
            $('#ModalEdit').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click','.btn-view',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#show_admin_user_grop').html('');
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/AdminUser/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var gender_name = data.gender ? data.gender.gender_name : '';
            var prefix_name = data.name_prefix ? data.name_prefix.name_prefix_name : '';
            var dev_position_name = data.dev_position ? data.dev_position.dev_position_name : '';
            var admin_groups = data.admin_group;
            var status = '';
            var html = '';
            if(data.status == 1){
                status = 'Active'
            }else{
                status = 'No Active'
            }
            $.each(admin_groups, function(k,v) {
                var admin_user_group_name = v.admin_user_group ? v.admin_user_group.admin_user_group_name : '';
                var color_code = v.admin_user_group ? v.admin_user_group.admin_user_group_color_code : '';
                html += ' <span class="badge badge-pill" style="color: white; background-color: '+color_code+';">'+admin_user_group_name+'</span>';
            });
            $('#show_ip').text(data.ip);
            $('#show_username').text(data.username);
            $('#show_first_name').text(data.first_name);
            $('#show_last_name').text(data.last_name);
            $('#show_nick_name').text(data.nick_name);
            $('#gender_name').text(gender_name);
            $('#show_email').text(data.email);
            $('#show_created_at').text(data.format_created_at);
            $('#show_last_login').text(data.format_last_login);
            $('#show_pin').text(data.pin);
            $('#show_name_prefix_name').text(prefix_name);
            $('#show_dev_position_name').text(dev_position_name);
            $('#show_status').text(status);
            $('#show_admin_user_grop').append(html);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });


    $('body').on('change','.change-status',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/AdminUser/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableAdminUser.api().ajax.reload();
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
            url: url_gb+"/admin/AdminUser",
            data: form.serialize(),
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_image').closest('.form-body').find('.preview-img').attr('src', '');
                tableAdminUser.api().ajax.reload();
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
            url: url_gb+"/admin/AdminUser/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableAdminUser.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

</script>
@include('Admin.AdminUser.Script.script_permission')
@include('Admin.AdminUser.Script.script_reset_password')
@endsection
