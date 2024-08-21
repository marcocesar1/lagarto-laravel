<x-layout>
    <div class="container px-4 py-5">
        <div>
            <h1>Pets</h1>
            <div class="text-end py-4">
                <a href={{route('pets.create')}} type="button" class="btn btn-primary">Add New Pet</a>
            </div>
            @if(Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success')}}
              </div>
            @endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Number of days old</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pets as $pet)
                    <tr>
                        <th scope="row">{{$pet->id}}</th>
                        <td>{{$pet->description}}</td>
                        <td>{{$pet->type}}</td>
                        <td>{{$pet->number_of_days_old}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>