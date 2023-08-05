@extends('client.app')
@section('content')
    <form>
        <div class="container border border-1">
            <div class="row justify-content-center">
                <h2 class="text-center">Thanh toán trong vòng 03:00:00</h1>
            </div>
            <div class="row mx-5 my-5 justify-content-center">
                <h3>Thanh toán qua thẻ ATM nội địa</h2>
                    <h3>Lưu ý trước khi thanh toán</h2>
            </div>
            <div class="row mx-5 my-5">
                <div class="col-md-6 mx-5 rounded-5 border border-light-subtle ">
                    <ul class="list-group ">
                        <li class="my-3 mx-5">Thẻ thanh toán phải do ngân hàng nội địa phát hành và đã được kích hoạt chức
                            năng
                            thanh toán
                            trực tuyến
                        </li>
                        <li class="my-3 mx-5">Vui lòng xem hướng dẫn chi tiết tại đây
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mx-5 mt-5">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Nhập mã giảm giá</label>
                </div>
            </div>
            <div class="row mx-5 mt-2" id="secondDiv" style="display: none;">
                <div class="input-group col-md-12 d-flex" style="padding-left: 8.8px">
                    <input type="text" class="border border-1" placeholder="Hãy nhập mã giảm giá" style="outline: none;"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-success" type="button" id="button-addon2">Áp dụng</button>
                </div>
            </div>
            <div class="bg-transparent">
                <div class="row mx-5 mt-5 bg-body-tertiary">
                    <span><strong>Chi tiết giá</strong></span><br>
                    <div class="d-flex justify-content-between my-3">
                        <span>Tổng (x1 người lớn)</span>
                        <span>2,578,944 VND</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mx-5 mt-2">
                    <span>Số tiền bạn sẽ thanh toán
                    </span>
                    <span class="text-danger"><strong>2,578,944 VND</strong></span>
                </div>
            </div>
            <div class="row mx-5 mt-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Tôi đồng ý với các điều khoản đặt chỗ của Việt Nam Booking
                    </label>
                </div>
            </div>
            <div class="row col-md-3 mx-5 my-5">
                <button type="button" class="btn btn-success">Xác nhận</button>
            </div>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        const checkbox = document.getElementById('flexSwitchCheckDefault');
        const secondDiv = document.getElementById('secondDiv');

        checkbox.addEventListener('click',function(){
            if (checkbox.checked) {
                secondDiv.style.display = 'block';
            }else{
                secondDiv.style.display = 'none';
            }
        });
    </script>
@endsection