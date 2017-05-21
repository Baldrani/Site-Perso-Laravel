<div>
    <h2>Derniers articles postés :</h2>

    @foreach($lastArticles as $lastArticle)
        <a href="/blog/{{$lastArticle->id}}">
            <h4>{{$lastArticle->title}}</h4>
        </a>
    @endforeach
</div>
