@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if (Route::has('login'))
                        @auth
                    <div class="panel-heading">Add New Album</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                                    <form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        Cover name:
                                        <br />
                                        <input type="text" name="name" value="{{ old('name') }}" />
                                        <br /><br />
                                        Cover image:
                                        <br />
                                        <input type="text" name="cover_image" value="{{ old('cover_image') }}" />
                                        <input type="file" name="cover_image" class="form-control" value="{{ old('cover_image') }}"/>
                                        <br /><br />
                                        <input type="submit" value="Submit" class="btn btn-default" />
                                    </form>
                                @else
                                    geen toegang
                                @endauth
                            @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection