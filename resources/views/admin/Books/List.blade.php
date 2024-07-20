@extends('admin.index')


@section('content')
<h2 class="text-center">Danh sách sách</h2>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tiêu đề </th>
        <th scope="col">Ảnh bìa</th>
        <th scope="col">Tác giả</th>
        <th scope="col">Nhà xuất bản</th>
        <th scope="col">Giá bán</th>
        <th scope="col">Danh mục</th>
        <th scope="col"><a href="{{route('book.create')}}" class="text-white btn btn-success  ">Thêm sách</a>
        </th>
      </tr>
    </thead>
    <tbody>
     @foreach ($books as $book )
     <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{$book->title}}</td>
        <td><img src="{{$book->thumbnail}}" alt="" width="50px"></td>
        <td>{{$book->author}}</td>
        <td>{{$book->publisher}}</td>
        <td>{{$book->Price}}</td>
        <td>{{$book->name}}</td>
        <td>
<a href="{{route('book.edit', $book->id)}}" class="text-white btn btn-warning  ">Sửa</a>
<form action=" {{route('book.destroy', $book->id)}}" method="post">
@csrf
@method('DELETE')
<button type="submit" class=" btn btn-danger" onclick="confirm('Bạn có muốn xóa không ?')">Xóa</button>
</form>            
        </td>
      </tr>
     @endforeach
    
    </tbody>
  </table>
  <div class="text-center ">
    {{$books->links()}}
  </div>
@endsection