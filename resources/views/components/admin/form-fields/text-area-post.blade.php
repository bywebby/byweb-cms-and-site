<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <textarea name="{{$name}}" id="{{$name}}" class="form-control @error($name) is-valid @enderror" placeholder="{{$label}}" rows="{{$rows}}">@if(!empty($myData)){{old($name,$myData->content ?? $myData->description)}} @else{{old($name)}}@endif</textarea>
</div>

