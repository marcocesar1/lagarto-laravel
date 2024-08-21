<x-layout>
    <div class="container px-4 py-5">
        <div>
          <h1>Create Pet</h1>
          <div class="row">
            <div class="col-md-12">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form action={{route('pets.store')}} method="POST">
                @csrf
                <div class="mb-3">
                  <label>Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    value="{{ old('name') }}"
                    required
                  >
                </div>
                <div class="mb-3">
                  <label>Description</label>
                  <input
                    type="text"
                    class="form-control"
                    name="description"
                    value="{{ old('description') }}"
                    required
                  >
                </div>
                <div class="mb-3">
                  <label>Type</label>
                  <select class="form-select" name="type" value="{{ old('type') }}" required>
                    <option selected value="Car">Car</option>
                    <option value="Dog">Dog</option>
                    <option value="Turtle">Turtle</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label>Birthdate</label>
                  <input
                    type="date"
                    class="form-control"
                    name="birthdate"
                    value="{{ old('birthdate') }}"
                    required
                  >
                </div>
                <a href={{route('pets.index')}} class="btn btn-secondary me-3">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>              
            </div>
          </div>
        </div>
    </div>
</x-layout>