<div class="col-md-8 col-md-offset-2">
    <ul class="fh5co-faq-list">
        @foreach($questions as $q)
            <li>
                <h2>{{$q->question}}</h2>
                <p>{{$q->answer}}</p>
            </li>
        @endforeach

    </ul>
    {{$questions->render()}}
</div>