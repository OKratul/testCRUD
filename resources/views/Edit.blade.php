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
    <div class="text-left p-5">
        <div class="row">

            <div class="col-12 p-3">
                @include('error')

                <form class="form-group" action="{{ route('contactEdit',$contact->id) }}" method="POST" >

                    {{ csrf_field() }}

                    <input value="{{$contact->Name}}" type="name" name="name" class="form-control mt-3" placeholder="Your Name" />
                    <input value="{{$contact->Email}}" type="email" name="email" class="form-control mt-3" placeholder="E-mail" />
                    <input value="{{$contact->Number}}" type="number" name="contact" class="form-control mt-3" placeholder="Number" />
                    <button class="btn btn-info btn-block mt-3" name="update" type="submit" >update</button>
                </form>
            </div>
        </div>

    </div>
</div>

</body>

</html>
