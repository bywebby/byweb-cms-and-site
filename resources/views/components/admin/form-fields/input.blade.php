<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control @error($name) is-valid @enderror" placeholder="{{$label}}" value="{{old($name)}}">
</div>
