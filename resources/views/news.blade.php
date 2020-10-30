<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>News Feed</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="container">
            <nav class="nav nav-pills nav-justified pb-4">
                <a class="nav-link active" href="#">Rss Feed</a>
                
              </nav>
            <div class="row">
                @foreach($news as $b)
                <div class="col-sm-6 pb-3">
                <div class="card" >
                    <div class="card-header">
                    <img src="{{$b->media}}" alt="" width="70" height="70">
                    </div>
                    <div class="card-body" onclick="showBtn({{$b->id}})">
                    <h5 class="card-title">{{$b->title}}</h5>
                    <p class="card-text">{{$b->description}}</p>
                </div>
                <a href="{{$b->link}}" style="display: none;" class="pl-4 btn btn-primary btnread-{{$b->id}} hidebtn">Read more</a>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
<script>
    function showBtn(id){
        var element = document.getElementsByClassName("btnread-"+id);
        for(var i = 0; i < element.length; i++){
            $(element[i]).toggle();
        }
    }
</script>