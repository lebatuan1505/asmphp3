@extends('admin.index')

@section('content')
<h2>Cập nhật sách</h2>
<div class="container">
    <form action="{{route('book.update', $book->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$book->id}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tiêu đề sách</label>
            <input type="text" name="title" class="form-control border" id="exampleFormControlInput1" placeholder="Tiêu đề sách" value="{{$book->title}}">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bìa sách</label>
            <input type="text" name="thumbnail" class="form-control border" id="exampleFormControlInput1" placeholder="Ảnh bìa sách" value="{{$book->thumbnail}}">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tác giả</label>
            <input type="text" name="author"  class="form-control border" id="exampleFormControlInput1" placeholder="Tác giả" value="{{$book->author}}">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nhà xuất bản</label>
            <input type="text" name="publisher" class="form-control border" id="exampleFormControlInput1" placeholder="Nhà xuất bản" value="{{$book->publisher}}">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ngày xuất bản</label>
            <input type="date" name="publication" class="form-control border" id="exampleFormControlInput1" placeholder="Ngày xuất bản" value="{{$book->Publication}}">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Giá bán</label>
            <input type="number" name="price" step="0.1" class="form-control border" id="exampleFormControlInput1" placeholder="Giá bán" value="{{$book->Price}}">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
            <input type="number" name="quantity" class="form-control border" id="exampleFormControlInput1" placeholder="Số lượng" value="{{$book->Quantity}}">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
            <Select name="category_id" class="form-control" >
                @foreach ($categories as  $cat)
                    <option value="{{$cat->id}}"  @if ($cat->id === $book->Category_id)
                        selected
                    @endif >
                       
                        {{$cat->name}}</option>
                @endforeach
            </Select>
          </div>
          <button type="submit" class="btn btn-danger">Cập nhật</button>
          @csrf
    </form>
</div>
@endsection