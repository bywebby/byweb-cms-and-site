    <div class="form-group p-3">
        <label for="{{$name}}">{{$title}}</label>
        <select name="{{$name}}" class="form-control @error($name) is-valid @enderror" id="{{$name}}">

{{--            {{dd($data)}}--}}

            @foreach($datatype as $item)
                <option value="{{$item}}">{{$item}}</option>
            @endforeach

        </select>
    </div>
