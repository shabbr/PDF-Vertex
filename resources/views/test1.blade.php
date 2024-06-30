@elseif($format=='oup')
@foreach ($citations as $citation)
<div class="response" >
    <div  style="margin-right: 5px;">
    <input type="checkbox" name="" class="checkbox1">
    </div>



    <a href="{{$citation->url}}"><img src="./images/language-svgrepo-com.svg" alt="url" width="25"></a>
    <a href="{{route('citationEdit',['id'=>$citation->id,'projectId'=>$citation->project_id])}}"><img src="./images/edit-svgrepo-com.svg" width="25" alt="edi"></a>
    <a href="{{route('citationDelete',['id'=>$citation->id])}}"><img src="./images/delete-48.png" alt="" width="20"></a>
    </div>
    @endforeach
