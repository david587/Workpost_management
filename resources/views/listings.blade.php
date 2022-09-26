
 @foreach($listings as $listing)
 <h2>
    <a href="/listings/{{$listing["id"]}}">
        {{$listing["title"]}}
    </a>
 </h2>
 <p>
    {{$listing["discription"]}}
 </p>
 @endforeach