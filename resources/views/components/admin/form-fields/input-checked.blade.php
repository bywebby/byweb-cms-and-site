<div class="form-check">


    <input type="checkbox" name="{{$name}}" class="form-check-input @error($name) is-valid @enderror" placeholder="{{$label}}"
        {{(isset($checked->$name) ? $checked->$name : $checked) ? 'checked' : ''}}
    >
    <label class='form-check-label' for="checked">{{$label}}</label>
</div>
