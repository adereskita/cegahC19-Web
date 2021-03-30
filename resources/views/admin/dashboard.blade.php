@extends('admin.master_admin')

@section('content')

    <section class="top-70">
        <div class="container">
            <h3 class="mb-4">Data Artikel</h3>
            <div class="card shadow">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modalPost">Tambah</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <div class="text-md-right dataTables_filter">
                                <form><label><input class="form-control form-control-sm" type="text"
                                            placeholder="Search"></label></form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle img-profil"
                                                src="{{ asset('storage/' . $post->image) }}" />
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->body }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-info btn-sm">Update</button>
                                                <a href="/post/destroy/{{ $post->id }}"><button type="button"
                                                        class="btn btn-danger btn-sm">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div role="dialog" tabindex="-1" class="modal fade" id="modalPost">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/post/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Titile</label>
                            <input type="text" class="form-control" name="title" />
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" rows="10" name="body"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="image" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
