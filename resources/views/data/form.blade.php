<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<script>
$(function() {
    $("#dob").datepicker({
        dateFormat: "yy-mm-dd"
    });
});
</script>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control"
        value="{{ old('first_name', $data->first_name ?? '') }}">
    @error('first_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" class="form-control"
        value="{{ old('last_name', $data->last_name ?? '') }}">
    @error('last_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email Id</label>
    <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $data->email ?? '') }}">
    @error('email')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $data->phone ?? '') }}">
    @error('phone')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="dob">DOB</label>
    <input type="text" name="dob" id="dob" class="form-control" value="{{ old('dob', $data->dob ?? '') }}">
    @error('dob')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control">
        <option value="male" {{ old('gender', $data->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender', $data->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
    </select>
    @error('gender')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Profile Picture</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
    @if(isset($data->image))
    <div
        style="background-image: url({{ asset('storage/'.str_replace('public/', '', $data->image)) }}); height: 100px; width: 100px;">
    </div>
    @endif
    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="street">Street</label>
    <input type="text" name="street" id="street" class="form-control" value="{{ old('street', $data->street ?? '') }}">
    @error('street')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="location">Location</label>
    <input type="text" name="location" id="location" class="form-control"
        value="{{ old('location', $data->location ?? '') }}">
    @error('location')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $data->city ?? '') }}">
    @error('city')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="state">State</label>
    <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $data->state ?? '') }}">
    @error('state')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="zip">Zip</label>
    <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip', $data->zip ?? '') }}">
    @error('zip')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="country">Country</label>
    <select name="country" id="country" class="form-control"></select>
    @error('country')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<script>
fetch("https://restcountries.com/v2/all")
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById("country");
        data.forEach(country => {
            const option = document.createElement("option");
            option.value = country.name;
            option.text = country.name;
            select.add(option);
        });
        // Set the selected option if a value is already set
        const selectedCountry = "{{ old('country', $data->country ?? '') }}";
        if (selectedCountry) {
            select.value = selectedCountry;
        }
    })
    .catch(error => console.error(error));
</script>


<div class="form-group">
    <label for="lat">Lat</label>
    <input type="text" name="lat" id="lat" class="form-control" value="{{ old('lat', $data->lat ?? '') }}">
    @error('lat')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="lang">Lang</label>
    <input type="text" name="lang" id="lang" class="form-control" value="{{ old('lang', $data->lang ?? '') }}">
    @error('lang')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="comment">Comment</label>
    <textarea name="comment" id="comment" class="form-control">{{ old('comment', $data->comment ?? '') }}</textarea>
    @error('comment')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

</div>