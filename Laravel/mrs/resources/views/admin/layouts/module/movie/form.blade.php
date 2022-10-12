<div class="row">
    <div class="col-lg-6">
        <label for="name">Movie Name <span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" name="name" id="name" class="form-control" value="{{$movie->name ?? old('name')}}"
                placeholder="Movie Name">
        </div>
    </div>
    <div class="col-lg-2">
        <label for="duration">Movie Duration</label>
        <div class="input-group">
            <input type="number" name="duration" id="duration" class="form-control"
                value="{{$movie->duration ?? old('duration')}}" min="0" placeholder="Movie Duration">
            <span class="input-group-text">mins</span>
        </div>
    </div>
    <div class="col-lg-2">
        <label for="year">Year</label>
        <div class="input-group">
            <input type="number" name="year" id="year" class="form-control" value="{{$movie->year ?? old('year')}}"
                placeholder="Year">
        </div>
    </div>
    <div class="col-lg-2">
        <label for="country">Country</label>
        <div class="input-group">
            <input type="text" name="country" id="country" class="form-control"
                value="{{$movie->country ?? old('country')}}" placeholder="Country">
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="description">Movie Description</label>
        <textarea name="description" id="description" rows="10" cols="80">
            @if (isset($movie->description))
                {!! $movie->description !!}
            @endif
        </textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-3">
        <label for="trailer">Movie Trailer</label>
        <div class="input-group">
            <input type="text" name="trailer" id="trailer" class="form-control"
                value="{{$movie->trailer ?? old('trailer')}}">
        </div>
    </div>
    <div class="col-lg-3">
        <label for="source">Movie Source URL <span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" name="source" id="source" class="form-control"
                value="{{$movie->source ?? old('source')}}">
        </div>
    </div>
    <div class="col-lg-3">
        <label for="categories">Movie Category <span class="text-danger">*</span></label>
        <div class="input-group">
            <select name="categories[]" id="categories" class="form-control" multiple>
                @isset($categories)
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{isset($movie->categories) ?
                    (in_array($category->id,$movie->categories->pluck('id')->toArray()) ? 'selected' : '') :
                    ''}}>{{$category->name}}</option>
                @endforeach
                @endisset
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <label for="actors">Movie Actors <span class="text-danger">*</span></label>
        <div class="input-group">
            <select name="actors[]" id="actors" class="form-control" multiple>
                @isset($actors)
                @foreach ($actors as $actor)
                <option value="{{$actor->id}}" {{isset($movie->actors) ?
                    (in_array($actor->id,$movie->actors->pluck('id')->toArray()) ? 'selected' : '') :
                    ''}}>{{$actor->name}}</option>
                @endforeach
                @endisset
            </select>
        </div>
    </div>
</div>
<br>`
<div class="row">
    <div class="col-lg-3">
        <label for="quality">Quality</label>
        <div class="input-group">
            <select name="quality" id="quality" class="form-control">
                <option selected disabled>Movie Quality</option>
                <option value="1" {{isset($movie->quality) ? ($movie->quality == 1 ? 'selected' : '') : ''}}>HD</option>
                <option value="2" {{isset($movie->quality) ? ($movie->quality == 2 ? 'selected' : '') : ''}}>CAM
                </option>
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <label for="featured">Is Featured ? </label>
        <div class="input-group">
            <select name="featured" id="featured" class="form-control">
                <option value="0" {{isset($movie->featured) ? ($movie->featured ? 'selected' : '') : 'select'}}>Not
                    Featured
                </option>
                <option value="1" {{isset($movie->featured) ? ($movie->featured ? 'selected' : '') : ''}}>Featured
                </option>
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <label for="release_date">Release Date</label>
        <div class="input-group">
            <input type="text" name="release_date" class="form-control" id="release_date" {{$movie->release_date ??
            old('release_date')}}>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <label for="image">Image Thumbnail</label>
        <input type="file" name="image" id="image">
    </div>
    <div class="col-lg-6">
        @isset($movie->image)
        <img src="{{asset('storage/'. $movie->image)}}" alt="{{$movie->name}}" width="250">
        @endisset
    </div>
</div>