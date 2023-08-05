@extends('client.app')
@section('content')
    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post" action="#">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Đặt chổ của bạn</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2">
                            <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00">
                            <input type="hidden" name="sanphamgiohang[1][soluong]" value="2">

                            <li class="list-group-item d-flex justify-content-between lh-condensed align-items-center">
                                <div>
                                    <h6 class="my-0 fs-1">HAN
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                        HCM
                                    </h6>
                                </div>
                                <span class="text-muted"><img src="../assets/img/apple-icon.png" alt=""></span>
                            </li>
                            <input type="hidden" name="sanphamgiohang[2][sp_ma]" value="4">
                            <input type="hidden" name="sanphamgiohang[2][gia]" value="14990000.00">
                            <input type="hidden" name="sanphamgiohang[2][soluong]" value="8">

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0 fs-3">Vietjet Air</h6>
                                    <small class="text-muted">Sân bay quốc tế Tân Sơn Nhất
                                    </small>
                                </div>
                                <span class="text-muted">20:22 20/8/2024</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong>143520000VNĐ</strong>
                            </li>
                        </ul>


                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Xác nhận</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_gioitinh">Giới tính</label>
                                <input type="text" class="form-control" name="kh_gioitinh" id="kh_gioitinh">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="kh_email" id="kh_email">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_ngaysinh">Ngày sinh</label>
                                <input type="text" class="form-control" name="kh_ngaysinh" id="kh_ngaysinh">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_cmnd">CMND</label>
                                <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd">
                            </div>
                        </div>

                        <h4 class="mb-3">Hình thức thanh toán</h4>

                        <div class="d-flex flex-column mb-3 my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="httt_ma" type="radio" class="form-check-input" required=""
                                    value="1">
                                <label class="custom-control-label ms-5" for="httt-1">Thẻ ATM nội địa</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="httt_ma" type="radio" class="form-check-input"
                                    required="" value="2">
                                <label class="custom-control-label ms-5" for="httt-2">ZaloPay</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-3" name="httt_ma" type="radio" class="form-check-input"
                                    required="" value="3">
                                <label class="custom-control-label ms-5" for="httt-3">Chuyển khoản</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Thanh
                            toán</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- End block content -->
    </main>
@endsection
