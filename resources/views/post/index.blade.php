@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Посты</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            
        @if(count($posts))
        <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>Views</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>{{ $post->description }}</td>
                      <td>{{ $post->category->title }}</td>
                      <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                      <td>{{ $post->views }}</td>
                        <td>
                          <a href="{{ route('posts.edit', ['post' => $post->id ]) }}" class="btn btn-info btn-sm float-left mr-1">
                          <i class="fas fa-pencil-alt"></i>
                          </a>
                          <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id ]) }}">
                        @csrf
                        @method('Delete')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
                          <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                       </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        @else 
            <p>Постов пока нет...</p>
        @endif

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</div>
@endsection