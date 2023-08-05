@extends('client.app')
@section('content')
    <div class="container">
        <form action="" class="" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Họ tên</label>
                    <select class="form-select fs-5" aria-label="Default select example" style="height: 34px;">
                        <option value="Ông">Ông </option>
                        <option value="Bà">Bà</option>
                        <option value="Anh">Anh</option>
                        <option value="Chị">Chị</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Họ tên</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Thành phố</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Tiếp tục</button>
            </div>
        </form>

    </div>
@endsection
