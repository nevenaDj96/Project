<div class="row">


    @foreach($photos as $image)
        <div class="col-lg-4 col-md-4 col-sm-6">
            <a href="{{url('/image/show/')}}/{{$image['id']}}">
                <img src="{{asset('/')}}images/{{$image->img_name}}" alt="Image" class="img-responsive galery">
                <div class="fh5co-text">
                    <h2>{{$image['heading']}}</h2>

                    <p><strong>Likes: {{$image->likes}}</strong></p>

                    <p><strong>User: {{$image['users']->name}}</strong></p>
                </div>
            </a>
        </div>
    @endforeach
    <br>
    <hr>

</div>
{{$photos->render()}}