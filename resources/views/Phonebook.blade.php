<html>
    <head>


        <title>
            Phone Book
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div class="container text-center">
            <h2>
                Phone Book
            </h2>
            <button class="btn btn-danger" type="button">
                <a href="{{route('logout')}}" class="text-light">Log Out</a>
            </button>
            <div class="text-left p-5">
                <div class="row">

                    <div class="col-12 p-3">
                        @include('error')
                        @if(session('success'))
                            <li class="alert alert-success">{{session('success')}}</li>
                        @endif
                        <form class="form-group" action="{{ route('createContact') }}" method="POST" >

                            {{ csrf_field() }}

                            <input type="name" name="name" class="form-control mt-3" placeholder="Your Name" />
                            <input type="email" name="email" class="form-control mt-3" placeholder="E-mail" />
                            <input type="number" name="contact" class="form-control mt-3" placeholder="Number" />
                            <button class="btn btn-info btn-block mt-3" name="submit" type="submit" >Submit</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($contacts as $contact)
                                <tr>
                                    <td>{{$contact->Name}}</td>
                                    <td>{{$contact->Email}}</td>
                                    <td>{{$contact->Number}}</td>
                                    <td>
                                        <a onclick="return confirm('Are You Sure?')" href="{{ route('deleteContact',$contact->id) }}">
                                            DELETE
                                        </a>|
                                        <a href="{{ route('showEdit',$contact->id) }}">
                                            UPDATE
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        NO DATA
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </body>

</html>
