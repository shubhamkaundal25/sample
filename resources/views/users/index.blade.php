@extends('sidebar.sidebar')
@section('content')
<div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h2 mb-0 text-white text-uppercase d-inline-block" href="../index.html">User List</a>
        <!-- <a class="btn btn-md btn-success ml-auto" href=""><i class="icon-settings" ></i>  Create Product Category</a> -->
        <!-- Form -->
        
      </div>
    </nav>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        
      </div>
    </div>
   <!--  <ol class="breadcrumb">
        <li class="breadcrumb-item col-md-6 " style="font-size:20px; ">Courses</li>
        
        <li class="breadcrumb-menu d-md-down-none col-md-6" >
            <div class="btn-group" role="group" aria-label="Button group" style="float: right;">
                
            </div>
        </li>
    </ol> -->
<div class="container-fluid mt--7">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr No.</th>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach( $users as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><a href="">{{$data->f_name}} {{$data->l_name}}</a></td>
                            <td></td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->description}}</td>
                            <td><div class="d-inline action_btn"> <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i> Edit</a><a class="btn btn btn-sm btn-success" href=""><i class="fa fa-eye"></i> View</a><form class="d-inline" method="POST" action="">@csrf<input type="hidden" name="_method" value="DELETE"><button class="btn btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button></form></div></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
            </div>
        </div>
       
    </div>
</div>
<div class="col-md-12"></div>
<div class="col-md-6"> 
@if($users->count() > 0)
        <div class="mt-15">
                <span class="font-14"> Showing {{$users->firstItem() .'  to   '.  $users->lastItem() .'   of  '. $users->total() }}
                    entries</span>
        </div>
        <div class="pull-right">
            <nav>
                @if ($users->lastPage() > 1)
                    <ul class="pagination">
                        <li class="page-item {{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $users->url(1) }}">Prev</a>
                        </li>
                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                            <li class="page-item {{ ($users->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link"  href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class=" page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $users->url($users->currentPage()+1) }}" >Next</a>
                        </li>
                    </ul>
                @endif
            </nav>
        </div>
    @endif
</div>
</div>

@endsection