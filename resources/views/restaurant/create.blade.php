 @extends('layouts.app')

 @section('title')
     Добавление
 @endsection
 <!-- create -->
 @section('content')
     <div class="container">
         @if(session('message'))
             <div class="alert alert-success">
                 {{session('message')}}
             </div>
         @endif
         <form action="{{route('restaurant.store')}}" method="post" enctype="multipart/form-data">
             @csrf
             <label for="">name : </label>
             <input type="text" name="name" class="form-control">
             <label for="">address : </label>
             <input type="text" name="address" class="form-control">
             <label for="">phone : </label>
             <input type="text" name="phone" class="form-control">
             <label for="">email : </label>
             <input type="email" name="email" class="form-control">
             <label for="">rest_id : </label>
             <select name="rest_category_id" id="" class="form-control">
                 @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
             </select><br>
             <input type="submit" value="Добавить" class="btn btn-primary form-control">
         </form>
     </div>
 @endsection

 @section('footer')
 @endsection
