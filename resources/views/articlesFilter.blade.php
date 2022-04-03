@extends('layouts.app')

@section('content')
	<head>
        <title>view Events</title>
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
    {{ csrf_field() }}
    <div class="container">
	 @auth
            <div class="content">
                <div class="linkstyle">
                    <h1>Article Page</h1>
                    <table>
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="{{ url('article/create') }}">Add new</a>
                            </td>
                            <td>
                                <form  action="{{ url('/article') }}" method="get">
                                    <input type="text" name="searchValue" id="searchValue"
                                        placeholder="Search by category ..." >
                                    <input type="submit" name="submit" value="ok" id="submit" class="btn btn-primary">
                                   
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>

                <table border='1'>
                    <tr>
                        <th>Date</th>
                        <th>Article name</th>
                        <th>Category</th>
                        <th>Display</th>
                        @foreach ($articles as $article)
                        <tr>
                            <td>
                                {{$article->created_at->format('j F Y')}}
                            </td>
                            <td>
                                {{$article->name}}
                            </td>
							<td>
                                {{$article->articleCat['name']}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ URL::to('article/' . $article->id).'/show' }}">View</a>
                            </td>
                        </tr>
                        @endforeach
                        </tr>
                </table>
            </div>
	 @endauth
    </div>

    </body>
@endsection