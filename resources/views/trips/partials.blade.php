<div class="mb-3">
    <label for="name" class="form-label">Trip Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $trip->name) }}" required>
</div>

<div class="mb-3">
    <label for="destination" class="form-label">Destination</label>
    <input type="text" name="destination" class="form-control" value="{{ old('destination', $trip->destination) }}" required>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $trip->price) }}" required>
</div>

<div class="mb-3">
    <label for="start_date" class="form-label">Start Date</label>
    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $trip->start_date) }}" required>
</div>

<div class="mb-3">
    <label for="end_date" class="form-label">End Date</label>
    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $trip->end_date) }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $trip->description) }}</textarea>
</div>
<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" step="0.01" class="form-control" name="price" id="price" required>
</div>
