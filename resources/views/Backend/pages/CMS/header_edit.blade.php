@extends('Backend.AdminLayout.app')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Header EDIT</h4>
                <h6>Edit Header</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('admin:header:update', ['id' => $header->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" placeholder="Enter Title..."
                                    value="{{ old('title') ? old('title') : $header->title }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="content">{{ old('content') ? old('content') : $header->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Header Image</label>
                            <div class="form-group">
                                <input type="file" name="header_image" value="" class="form-control" onchange="previewImage(event)">
                            </div>
                            <div id="img_preview">
                                <img src="{{config("services.app_url.domain"). $header->small_image_url}}" width="100%" alt="preview_img">
                            </div>
                            <div id="new_img_preview" style="margin-bottom: 20px;"></div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('admin:header:list') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var input = event.target;
            var file = input.files[0];
            var newImgPreview = document.getElementById('new_img_preview');
            var oldImage = document.getElementById("img_preview");
            var img = document.createElement('img');

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    img.src = e.target.result;
                    img.style.display = 'block';
                    img.setAttribute("width", "100%");
                    oldImage.style.display="none";
                    newImgPreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            } else {
                newImgPreview.innerHTML = '';
            }
        }

        document.addEventListener(DOMContentLoaded, function(){

        });
    </script>
@endsection
