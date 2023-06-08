{{--{{dd($mydata->category_id)}}--}}
<div class="form-group">
    <label for="{{$name}}">{{$title}}</label>
    <select name="{{$name}}" class="form-control @error($name) is-valid @enderror" id="{{$name}}">
        @foreach($datacategory as $k => $v)
            @if (!empty($mydata))
                     <option value="{{$k}}" {{$k == $mydata->$name ? 'selected' : ''}}>{{$v}}</option>
                @else
                    <option value="{{$k}}">{{$v}}</option>
            @endif
        @endforeach
    </select>



</div>
