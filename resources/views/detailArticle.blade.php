@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Article Detail Page') }}</div>

                <div class="card-body">    
				    <div class="form-group row">
                        <label for="created-at" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                        <div class="col-md-6">
                                <input id="created-at" type="text" name="created-at" value=" {{$article->created_at->format('j F Y')}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="art-name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                                <input id="art-name" type="text" name="art-name" value="{{$article->name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cat" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                        <div class="col-md-6">
                                <input id="cat" type="text" name="cat" value="{{$article->articleCat['name']}}" disabled>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                        <div class="col-md-6">
							<img src="{{asset($article->image)}}">
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="summary" class="col-md-4 col-form-label text-md-right">{{ __('Summary') }}</label>

                        <div class="col-md-6">
                                <input id="summary" type="text" name="summary" value="{{$article->summary}}" disabled>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                                <input id="desc" type="text" name="desc" value="{{$article->description}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a class="btn btn-link" href="{{url('article')}}">
                                {{ __('back') }}
                             </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
