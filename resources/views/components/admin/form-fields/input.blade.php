<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control @error($name) is-valid @enderror" placeholder="{{$label}}"
           value="@if(!empty($myData)) {{old($name, $myData->title)}} @else {{old($name)}} @endif">
</div>
