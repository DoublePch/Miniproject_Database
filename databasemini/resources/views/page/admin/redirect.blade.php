@extends('Layouts.admin')
@section('content')
<div class="col-xl-8 order-xl-1">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">ข้อมูลรถ </h3>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr align="center">
                        <th scope="col" class="sort" data-sort="name">ชื่อรถ</th>
                        <th scope="col" class="sort" data-sort="name">ภาพ</th>
                        <th scope="col" class="sort" data-sort="status">เลขทะเบียน</th>
                        <th scope="col" class="sort" data-sort="status">ประเภทเกียร์</th>
                        <th scope="col" class="sort" data-sort="status">ยี่ห้อ</th>
                        <th scope="col" class="sort" data-sort="status">ราคา</th>
                        <th scope="col">สถานะ</th>
                    </tr>
                </thead>
                <tbody class="list">
                   @foreach($car as $row)
                    <tr class="ss" align="center">
                        <th scope="row">{{$row->car_name}}</th>
                        <td class="budget">
                            <img src="{{asset($row->car_image)}}" alt="" width="60vh" height="60vh">
                        </td>
                        <td>{{$row->car_id}}</td>
                        <td>
                            {{$row->car_type}}
                        </td>
                        <td>
                            {{$row->car_brand}}
                        </td>
                        <td>
                           {{$row->car_price}}
                        </td>
                       <td>
                           @if($row->car_status == '0')
                               ว่าง
                           @else
                               ไม่ว่าง
                           @endif

                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection