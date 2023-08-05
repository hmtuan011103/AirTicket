<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FlightRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_start',
        'place_end'
    ];

    public static array $place = [
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

    public function flight(): HasOne {
        return $this->hasOne(Flight::class);
    }


    public static array $theCity = [
        'HAN-Hà Nội',
        'SGN-Hồ Chí Minh',
        'DAD-Đà Nẵng',
        'VDO-Quảng Ninh',
        'HPH-Hải Phòng',
        'VII-Nghệ An',
        'HUI-Huế',
        'CXR-Khánh Hòa',
        'DLI-Lâm Đồng',
        'UIH-Bình Định',
        'VCA-Cần Thơ',
        'PQC-Kiên Giang',
        'DIN-Điện Biên',
        'THD-Thanh Hóa',
        'VDH-Quảng Bình',
        'VCL-Quảng Nam',
        'TBB-Phú Yên',
        'PXU-Gia Lai',
        'BMV-Đắk Lăk',
        'VKG-Kiên Giang',
        'CAH-Cà Mau',
        'VCS-Bà Rịa Vũng Tàu',
    ];

}
