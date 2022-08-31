      <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">{{$name}}</h2>
                              
                        </div>

<div class="col-md-12 col-lg-12">
    <a href="{{route('superadmin.user.create')}}" class="btn btn-primary m-4">Create</a>
 </di>
                         <div class="col-md-12 col-lg-12">
                 
                            <div class="card">
                                <div class="card-header">{{$name}}</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                           @forelse ($list as $l )
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$l->name}}</td>
                                                <td>{{$l->email}}</td>
                                                <td>
                                                    <a href="{{route('superadmin.user.edit',['user'=>$l->id])}}" class="btn btn-secondary">Edit</a>
                                                    <form action="{{route('superadmin.user.destroy',['user'=>$l->id])}}" method="post" class="d-inline">
                                                        @csrf
                                                        @method("DELETE")
                                                          <button type="submit" class="btn btn-secondary d-inline">Delete</button>
                                                    </form>
                                                    @if ($name == "User")
                                                          <a href="{{route('superadmin.todo.show',['todo'=>$l->id])}}" class="btn btn-secondary">Todo</a>
                                                    @endif
                                                  
                                                </td>
                                            
                                            </tr>
                                           @empty
                                               <tr>No Data</tr>
                                           @endforelse
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>