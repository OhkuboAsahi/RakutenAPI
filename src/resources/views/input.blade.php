<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body class="antialiased">
        <article class="container">
            <h1  class="text-danger">Games</h1>

            <form method="get" action="/search/keyword">
                <div class="input-group">
                    <input type="text" id="txt-search" name="keyword" class="form-control input-group-prepend" placeholder="キーワードから探す" style="margin-right:5px" value={{ $keyword }}>
                    <span class="input-group-btn input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </span>
                </div>

                <div class="btn-groupーlg" role="group" aria-label="Basic example">
                    <div class="mt-3">
                    <a href="/search/genre/Top" class="btn btn-primary">Top</a>
                    <a href="/search/genre/NintendoSwitch" class="btn btn-primary mx-1">NintendoSwitch</a>
                    <a href="/search/genre/PS5" class="btn btn-primary">PS5</a>
                    <a href="/search/genre/PS4" class="btn btn-primary mx-1">PS4</a>
                    <a href="/search/genre/XboxSeriesXS" class="btn btn-primary">XboxSeriesXS</a>
                    <div class="mt-3">
                </div>
                    
                <h1>{{ $page_title }}</h1>
                <table class="table table-bordered">
                    <div class="mt-3">
                    <thead class="table-danger">
                        <th scope="col" class="text-center" style="width:5%">順位</th>
                        <th scope="col" class="text-center" style="width:70%">商品名</th>
                        <th scope="col" class="text-center" style="width:10%">価格</th>
                        <th scope="col" class="text-center" style="width:15%">販売元</th>
                    </thead>
                    <tbody class="text-center">
                        @foreach($items as $item) 
                            <tr>
                                <td>{{ $item['ranking'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['price'] }}円</td>
                                <td>{{ $item['shop'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            </form>
        </article>
    </body>
</html>
