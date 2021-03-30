@extends('admin.master_admin')

@section('content')

    <section class="top-70">
        <div class="container">
            <h3 class="mb-4">Category</h3>
            <div class="card shadow">
                <div class="card-header py-3">
                    <a href="" data-toggle="modal" data-target="#categoryModal">
                        <span class="badge badge-primary">Tambah data</span></h1>
                    </a>
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
                                    <th>No.</th>
                                    <th>Title Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($category as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <button type="button" class="btn btn-info">Update</button>
                                                <a href="/category/{{ $row->id }}"><button type="button"
                                                        class="btn btn-danger">Delete</button></a>
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

    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/store" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category">Nama Category</label>
                            <input id="category" class="form-control" type="text" name="title">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
