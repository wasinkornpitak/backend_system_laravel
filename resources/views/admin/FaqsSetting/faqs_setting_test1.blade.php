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
        <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
        <form id="">
          <div class="form-group row">
            <label for="add_faqs_setting_menu" class="col-sm-3 text-right control-label col-form-label">Menu Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="add_faqs_setting_menu" name="add_faqs_setting_menu" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="add_faqs_meta_title" class="col-sm-3 text-right control-label col-form-label">Meta Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="add_faqs_meta_title" name="add_faqs_meta_title">
            </div>
          </div>
          <div class="form-group row">
            <label for="add_faqs_meta_description" class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="add_faqs_meta_description" name="add_faqs_meta_description">
            </div>
          </div>
          <div class="form-group row">
            <label for="add_faqs_meta_author" class="col-sm-3 text-right control-label col-form-label">Meta Author</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="add_faqs_meta_author" name="add_faqs_meta_author">
            </div>
          </div>
          <div class="form-group row pb-3">
            <label for="add_faqs_meta_robots" class="col-sm-3 text-right control-label col-form-label">Meta Robots</label>
            <div class="col-sm-9">
              <div class="form-check form-check-inline">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="1" id="add_faqs_meta_robots_1" name="add_faqs_meta_robots">
                  <label class="custom-control-label" for="add_faqs_meta_robots_1">INDEX</label>
                </div>
              </div>
              <div class="form-check form-check-inline">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="2" id="add_faqs_meta_robots_2" name="add_faqs_meta_robots">
                  <label class="custom-control-label" for="add_faqs_meta_robots_2">FOLLOW</label>
                </div>
              </div>
              <div class="form-check form-check-inline">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="3" id="add_faqs_meta_robots_3" name="add_faqs_meta_robots">
                  <label class="custom-control-label" for="add_faqs_meta_robots_3">NOODP</label>
                </div>
              </div>
              <div class="form-check form-check-inline">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="4" id="add_faqs_meta_robots_4" name="add_faqs_meta_robots">
                  <label class="custom-control-label" for="add_faqs_meta_robots_4">NOYDIR</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="add_faqs_og_title" class="col-sm-3 text-right control-label col-form-label">Og title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="add_faqs_og_title" name="add_faqs_og_title">
            </div>
          </div>
          <div class="form-group row pb-3">
            <label for="add_faqs_og_description" class="col-sm-3 text-right control-label col-form-label">Og Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="add_faqs_og_description" name="add_faqs_og_description" rows="4"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="add_faqs_twitter_title" class="col-sm-3 text-right control-label col-form-label">Twitter Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="add_faqs_twitter_title" name="add_faqs_twitter_title">
            </div>
          </div>
          <div class="form-group row">
            <label for="add_faqs_twitter_description" class="col-sm-3 text-right control-label col-form-label">Twitter Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="add_faqs_twitter_description" name="add_faqs_twitter_description" rows="4"></textarea>
            </div>
          </div>
          <div class="form-group row pb-3">
            <label for="add_faqs_image" class="col-sm-3 text-right control-label col-form-label">Og/Twitter Image</label>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input upload-news-img form-control" id="add_faqs_image">
                <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                <small class="form-text text-muted">Recommended Size: 1200 x 630 pixel</small>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="form-group text-center mb-0">
            <button type="submit" class="btn btn-lg btn-success btn-save">Save</button>
          </div>
        </div>

      </form>

    </div>
  </div>
</div>


@endsection @section('modal')
@endsection


@section('scripts')

<script>

$(document).ready(function() {

  //Success Message
  $('.btn-save').click(function () {
      Swal.fire("Good job!",
      "Your work has been saved.",
      "success")
  });


});

</script>
@endsection
