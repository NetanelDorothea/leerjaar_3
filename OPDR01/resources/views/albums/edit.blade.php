@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Album</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                                    <form action="{{ route('albums.update', $album->id) }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        Cover name:
                                        <br />
                                        <input type="text" name="name" value="{{ $album->name }}" />
                                        <br /><br />
                                        Cover image:
                                        <br />
                                        <input type="hidden" name="cover_image" value="{{ $album->cover_image }}" />
                                        <input type="file" name="cover_image" class="form-control" value="{{ $album->cover_image }}"/>
                                        <br /><br />
                                        <input type="submit" value="Submit" class="btn btn-default" />
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection