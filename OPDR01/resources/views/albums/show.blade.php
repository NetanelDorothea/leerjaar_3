@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if (session('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif
                    <div class="panel-heading">{{$albums->name}}
                        <a href="{{ route( 'photos.show', $albums->id  ) }}" class="btn btn-default">Add New Photo +</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Cover</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($albums->photo as $photo)
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/' . $photo->photo) }}" width="60px" height="60px">
                                    </td>

                                    @if (Route::has('login'))
                                        @auth
                                            <td>
                                                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST"
                                                      style="display: inline"
                                                      onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        @else
                                        @endauth
                                    @endif

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No entries found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection