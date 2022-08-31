      <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">{{$name}}</h2>
                              
                        </div>

<div class="col-md-12 col-lg-6 mx-auto">
    <a href="{{route('user.todo.create')}}" class="btn btn-primary m-4">Create</a>
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
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                           @forelse ($list as $l )
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$l->title}}</td>
                                                <td>{{$l->date}}</td>
                                                <td>
                                                    <a href="{{route('user.todo.edit',['todo'=>$l->id])}}" class="btn btn-secondary">Edit</a>
                                                    <form action="{{route('user.todo.destroy',['todo'=>$l->id])}}" method="post" class="d-inline">
                                                        @csrf
                                                        @method("DELETE")
                                                          <button type="submit" class="btn btn-secondary d-inline">Delete</button>
                                                    </form>
                                                   
                                                  
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