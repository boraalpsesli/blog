@extends('layouts.app')
@section('content')
<div class="container">
  
  <h1 class="text-center mb-4 text-primary font-weight-bold">Add Post</h1>

  
  <section class="mt-3">
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      @csrf

     
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

    
      <div class="card p-4 shadow-lg">
        
       
        <div class="mb-3">
          <label for="floatingInput" class="form-label">Title</label>
          <input class="form-control border-primary" type="text" name="title" id="floatingInput" placeholder="Enter post title" required>
        </div>

        
        <div class="mb-3">
          <label for="floatingTextarea" class="form-label">Description</label>
          <textarea class="form-control border-primary" name="description" id="floatingTextarea" placeholder="Enter post description" cols="30" rows="10" required></textarea>
        </div>

       
        <div class="mb-3">
          <label for="formFile" class="form-label">Add Image</label>
          <div class="d-flex flex-column align-items-center">
            <img src="" alt="Image Preview" class="img-fluid img-blog mb-2" id="imagePreview" style="max-height: 200px; object-fit: cover; display: none;">
            <input class="form-control border-primary" type="file" name="image" id="formFile" onchange="previewImage(event)">
          </div>
        </div>

      
        <button class="btn btn-primary btn-lg w-100 mt-3">Post!</button>
      </div>
    </form>
  </section>
</div>

<script>

  function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function() {
      const imgElement = document.getElementById('imagePreview');
      imgElement.src = reader.result;
      imgElement.style.display = 'block';
    };
    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection
