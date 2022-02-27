@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-8">

    <form method="post" clas="mb-5" action="/dashboard/posts/{{ $post->slug }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title')
            is-invalid
          @enderror" id="title" name="title" autofocus required value="{{ old('title',$post->title) }}">
          @error('title')
            <div class="ivalid-feedback text-danger">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">slug</label>
          <input type="text" class="form-control @error('slug')
          is-invalid
        @enderror" id="slug" name="slug" required value="{{ old('slug',$post->slug) }}">
          @error('slug')
          <div class="ivalid-feedback text-danger">
              {{ $message }}
          </div>
        @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Title</label>
          <select class="form-select" name='category_id'>
            <option selected>Category</option>
            @foreach ($categories as $category)
                @if(old('category_id',$post->category_id) == $category->id)
                    <option value="{{ $category->id }}"selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Body</label>
          @error('body')
            <p class="text-danger">{{ $message }}</p>
          @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Update Posts</button>
      </form>

</div>
<script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')
    // title.onkeyup = function(){
    //     slug.value = title.value.toLowerCase().replace(/ /g,'-');
    //     slug.innerHTML = slug.value;
    // }
    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    })
</script>
@endsection
