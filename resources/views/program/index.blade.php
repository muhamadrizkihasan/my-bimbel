@extends('layouts.main')

@section('title', 'Program')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Program</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        @if (session('success'))
            <div class="alert alert-primary">{{ session('success') }}</div>
        @endif
        @if (session('updated'))
            <div class="alert alert-success">{{ session('updated') }}</div>
        @endif
        @if (session('deleted'))
            <div class="alert alert-danger">{{ session('deleted') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Program</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ route('add') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Edulevel</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $program->name }}</td>
                                <td>{{ $program->edulevel->name }}</td>
                                <td>{{ $program->info }}</td>
                                <td>
                                    <div class="text-center">
                                        <a href="{{ route('edit', $program->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('delete', $program->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
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
@endsection