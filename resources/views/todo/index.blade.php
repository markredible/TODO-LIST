<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
  
  <div class="container my-5 bg-light p-3 rounded-1" style="width: 400px;">
  <h3 class="text-center mb-3">TODO LIST</h3>
        <div>
          @if(session()->has('success'))
          <div>
            {{session('success')}}
          </div>
          @endif
        </div>
        <!-- Displaying adding successfully -->
         <div>
            @if($errors->any())
              @foreach($errors->all() as $error)
              <p class="bg-warning text-decoration-none p-2 rounded-2">{{$error}}</p>
              @endforeach
            @endif
         </div>
        <form action="{{Route('todo.store')}}" method="post">
            @csrf
            @method('post')
            <div class="input-group flex-nowrap mb-2">
              <input type="text" class="form-control" placeholder="Add Tasks" aria-label="Username" aria-describedby="addon-wrapping" name="task">
              <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
  <table class="table table-striped text-center">
        <tr>
            <th>Tasks</th>
            <th>Action</th>
        </tr>
        @foreach($todos as $todo)
        @if(!empty($todo))
            <tr>
                <td>{{$todo->task}}</td>
                <td>
                    <form action="{{route('todo.destroy', ['todo' => $todo])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-success" type="submit">Done</button>
                    </form>
                </td>
            </tr>
          @endif 
        @endforeach
        </table>
  </div>
</body>
</html>