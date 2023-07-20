<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_start',
        'place_end'
    ];

    public static array $place= [
        'Sân bay Quốc tế Nội Bài-HAN-Hà Nội',
        'Sân bay Quốc tế Tân Sơn Nhất-SGN-Hồ Chí Minh',
        'Sân bay Quốc tế Đà Nẵng-DAD-Đà Nẵng',
        'Sân bay Quốc tế Vân Đồn-VDO-Quảng Ninh',
        'Sân bay Quốc tế Cát Bi-HPH-Hải Phòng',
        'Sân bay Quốc tế Vinh-VII-Nghệ An',
        'Sân bay Quốc tế Phú Bài-HUI-Huế',
        'Sân bay Quốc tế Cam Ranh-CXR-Khánh Hòa',
        'Sân bay Quốc tế Liên Khương-DLI-Lâm Đồng',
        'Sân bay Quốc tế Phù Cát-UIH-Bình Định',
        'Sân bay Quốc tế Cần Thơ-VCA-Cần Thơ',
        'Sân bay Quốc tế Phú Quốc-PQC-Kiên Giang',
        'Sân bay Điện Biên Phủ-DIN-Điện Biên',
        'Sân bay Thọ Xuân-THD-Thanh Hóa',
        'Sân bay Đồng Hới-VDH-Quảng Bình',
        'Sân bay Chu Lai-VCL-Quảng Nam',
        'Sân bay Tuy Hòa-TBB-Phú Yên',
        'Sân bay Pleiku-PXU-Gia Lai',
        'Sân bay Buôn Mê Thuột-BMV-Đắk Lăk',
        'Sân bay Rạch Giá-VKG-Kiên Giang',
        'Sân bay Cà Mau-CAH-Cà Mau',
        'Sân bay Côn Đảo-VCS-Bà Rịa Vũng Tàu',
    ];
}
