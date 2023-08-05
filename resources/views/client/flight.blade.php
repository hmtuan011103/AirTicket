@extends('client.app')
@section('content')
    <div class="box-main-content-flight " style="margin-top: 0; !important;">

        <div class="page-box-flight">
            <div class="box-booking">
                <div class="page-box-flight-inner">
                    <div class="clearfix"></div>
                    <div class="box-column-content-flight">
                        <div class="container_12">
                            <div class="box-column-content-flight-content active type-depart type-RT mt-5">
                                <div class="box-system-filter-flight">
                                    <div class="box-item-filter">
                                        <div class="box-info-common type-depart">
                                            <ul>
                                                <li class="title-count"><span>1</span></li>
                                                <li class="box-info">
                                                    <div class="title">Chọn chuyến đi</div>

                                                    <div class="info-name-airport">
                                                        @php
                                                            $arrString = explode('-', request()->place_start);
                                                            $result = $arrString[2] . ' ' .'('.$arrString[1].')';
                                                            echo $result;
                                                        @endphp
                                                        <i
                                                            class="fas fa-long-arrow-alt-right"></i>
                                                        @php
                                                            $arrString = explode('-', request()->place_end);
                                                            $result = $arrString[2] . ' ' .'('.$arrString[1].')';
                                                            echo $result;
                                                        @endphp
                                                    </div>
                                                    <div class="info-code-airport">SGN <i
                                                            class="fas fa-long-arrow-alt-right"></i> HAN</div>
                                                    <div class="info-date">
                                                        @php
                                                            $nowInVietnam = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                            $formattedTime = $nowInVietnam->format('l, d/m/Y');
                                                            $daysOfWeekMapping = [
                                                                'Sunday' => 'Chủ Nhật',
                                                                'Monday' => 'Thứ Hai',
                                                                'Tuesday' => 'Thứ Ba',
                                                                'Wednesday' => 'Thứ Tư',
                                                                'Thursday' => 'Thứ Năm',
                                                                'Friday' => 'Thứ Sáu',
                                                                'Saturday' => 'Thứ Bảy',
                                                            ];
                                                            echo 'Ngày đặt: '.strtr($formattedTime, $daysOfWeekMapping);
                                                        @endphp
                                                    </div>
                                                    <div class="info-date">
                                                        <p>{{ request()->flight_type == 1 ? 'Một chiều' : 'Khứ hồi' }},
                                                            {{ request()->adults > 0 ? request()->adults.' người lớn' : '' }}
                                                            {{ request()->children > 0 ? request()->children.', trẻ em' : '' }}</p>
                                                    </div>
                                                </li>
                                                <li class="box-button-filter">
                                                    <a data-type-name="depart"
                                                        data-type-itinerary="RT"
                                                        class="btn-toggle-price-week type-depart type-RT"
                                                        href="{{ route('home') }}">
                                                        Xem ngày khác
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @forelse($flights as $index => $flight)
                                        <form class="box-column-content-flight-inner type-depart" action="" method="POST">
                                            @csrf
                                            <ul class="list-item-flight desktop type-depart">
                                                <li data-id-flight="QH_0" class="item-flight type-depart ">
                                                    <div class="info-top">
                                                        <div class="info-flight">
                                                            <table class="tlb-info-flight-top">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="box-logo text-center">
                                                                            <img width="100px"
                                                                                src="{{ asset('storage/'.$flight->plane->airline->image) }}"
                                                                                alt="{{ $flight->plane->airline->name }}"
                                                                                title="{{ $flight->plane->airline->name }}"
                                                                            ><span>{{ $flight->plane->name }}</span>
                                                                            <span>{{$flight->flight_date}}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="box-info-depart">
                                                                            <span
                                                                                class="time-start">
                                                                                  @php
                                                                                      $arrString = explode(':', $flight->flight_time_start);
                                                                                      $result = $arrString[0] . ':'.$arrString[1];
                                                                                      echo $result;
                                                                                  @endphp
                                                                            </span>
                                                                            <div class="box-place-depart">
                                                                                @php
                                                                                    $arrString = explode('-', $flight->flightRoute->place_start);
                                                                                    $result = $arrString[2] . ' ' .'('.$arrString[1].')';
                                                                                    echo $result;
                                                                                @endphp
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="box-info-middle">
                                                                            <span class="total-time">
                                                                                <p>
                                                                                    {{ $flight->flight_time_total  }}
                                                                                </p>
                                                                            </span>
                                                                            <div class="bar-plane active"><i
                                                                                    class="fas fa-plane"></i></div>
                                                                            <div class="info-stop">Bay thẳng</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="box-info-return">
                                                                            <span class="time-end">
                                                                                @php
                                                                                    $pattern = '/(\d+|[a-zA-Z])/';
                                                                                    $timeArray = preg_split($pattern, $flight->flight_time_total, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                                                                                    for ($i = 0; $i < count($timeArray); $i++) {
                                                                                        if (is_numeric($timeArray[$i])) {
                                                                                            $timeArray[$i] = intval($timeArray[$i]);
                                                                                        }
                                                                                    }
                                                                                    $hour = str_pad($timeArray[0], 2, "0", STR_PAD_LEFT);
                                                                                    $minute = isset($timeArray[2]) ? str_pad($timeArray[2], 2, "0", STR_PAD_LEFT) : "00";
                                                                                    $startTime = $flight->flight_time_start;
                                                                                    $startTime = Carbon\Carbon::parse($startTime);
                                                                                    $totalTime = $hour . ":" . $minute;
                                                                                    $arrString = explode(':', $totalTime);
                                                                                    $endTime = '';
                                                                                    if($arrString[1] == 0){
                                                                                        $endTime = $startTime->copy()->addHours($arrString[0]);
                                                                                    } else {
                                                                                        $endTime = $startTime->copy()->addHours($arrString[0])->addMinutes($arrString[1]);
                                                                                    }
                                                                                    $formattedTime = \Carbon\Carbon::parse($endTime)->format('H:i');
                                                                                    echo $formattedTime;

                                                                                @endphp
                                                                            </span>
                                                                            <div class="box-place-return">
                                                                                @php
                                                                                    $arrString = explode('-', $flight->flightRoute->place_end);
                                                                                    $result = $arrString[2] . ' ' .'('.$arrString[1].')';
                                                                                    echo $result;
                                                                                @endphp
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="info-price">
{{--                                                            <div title="Hạng vé Bamboo Eco" class="price-show">Class</div>--}}
                                                            <div class="row">
                                                                @foreach($flight->tickets as $ticket)
                                                                    @if($ticket->class == 2)
                                                                        <div class="col-6">
                                                                                <p class="type-ticket">Economy Class</p>
                                                                                <p class="price-show fs-4">{{ number_format($ticket->price) . 'đ'}}</p>
                                                                                <label for="one-way">
                                                                                    <input type="radio" id="" value="1" name="ticket_class[{{$index}}]">
                                                                                    <span></span>
                                                                                </label>
                                                                        </div>
                                                                    @elseif($ticket->class == 1)
                                                                        <div class="col-6">
                                                                            <p class="type-ticket">Business Class</p>
                                                                            <p class="price-show fs-4">{{ number_format($ticket->price) . 'đ'}}</p>
                                                                            <label for="one-way">
                                                                                <input type="radio" id="" value="2" name="ticket_class[{{$index}}]">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
{{--                                            <button type="button">Đặt Vé</button>--}}
                                        </form>
                                    @empty
                                        <div class="bg-white p-5 text-center font-weight-bold ">
                                            No flights found
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- BOX container_12 -->
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div><!-- BOX BOOKING -->
    </div>

    </div>
@endsection
