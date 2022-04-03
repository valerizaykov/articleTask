<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Article</div>
                    <br/>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ url('article/articleStore') }}">
                            {{ csrf_field() }}
                             
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Article Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Categories</label>
                                <div class="col-md-6">
                                    <select name="category" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                                        @endforeach
                                    </select>
                                    <a class="btn btn-primary" href="{{ URL::to('category/create') }}">Add New</a>
                                </div>

                            </div>
                            <div class="form-group{{ $errors->has('artImage') ? ' has-error' : '' }}">
                                <label for="artImage" class="col-md-4 control-label">Image</label>

                                <div class="col-md-6">
                                    <input id="artImage" type="file" class="form-control" name="artImage" value="{{ old('artImage') }}">

                                    @if ($errors->has('artImage'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('artImage') }}</strong>
                                    </span>
                                    @endif
									
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                                <label for="summary" class="col-md-4 control-label">Summary</label>

                                <div class="col-md-6">
                                    <input id="summary" type="text" class="form-control" name="summary" value="{{ old('summary') }}">

                                    @if ($errors->has('summary'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('summary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
							<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
