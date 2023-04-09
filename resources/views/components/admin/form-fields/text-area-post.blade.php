<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <textarea name="{{$name}}" id="{{$name}}" class="form-control @error($name) is-valid @enderror" placeholder="{{$label}}" rows="{{$rows}}">{{old($name)}}</textarea>
</div>
