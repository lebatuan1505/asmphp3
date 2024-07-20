@extends('admin.index')

@section('content')
<h2>Thêm mới sách</h2>
<div class="container">
    <form action="{{route('book.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tiêu đề sách</label>
            <input type="text" name="title" class="form-control border" id="exampleFormControlInput1" placeholder="Tiêu đề sách">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bìa sách</label>
            <input type="text" name="thumbnail" class="form-control border" id="exampleFormControlInput1" placeholder="Ảnh bìa sách">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tác giả</label>
            <input type="text" name="author"  class="form-control border" id="exampleFormControlInput1" placeholder="Tác giả">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nhà xuất bản</label>
            <input type="text" name="publisher" class="form-control border" id="exampleFormControlInput1" placeholder="Nhà xuất bản">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ngày xuất bản</label>
            <input type="date" name="publication" class="form-control border" id="exampleFormControlInput1" placeholder="Ngày xuất bản">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Giá bán</label>
            <input type="number" name="price" step="0.1" class="form-control border" id="exampleFormControlInput1" placeholder="Giá bán">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
            <input type="number" name="quantity" class="form-control border" id="exampleFormControlInput1" placeholder="Số lượng">
          </div>
        
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
            <Select name="category_id" class="form-control">
                @foreach ($categories as  $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </Select>
          </div>
          <button type="submit" class="btn btn-danger">Thêm vào danh sách</button>
          @csrf
    </form>
</div>
@endsection