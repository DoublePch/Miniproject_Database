@extends('layouts.admin')
@section('content')

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            @if (session('success'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'บันทึกข้อมูลรถเรียบร้อย',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
            @endif
            <div class="card ">
                <div class="card-header">
                    <h3>เพิ่มรถใหม่เข้าระบบ</h3>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <form action="{{route('storecar')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="car_name">ชื่อรถ</label>
                                                    <input type="text" class="form-control" name="car_name">
                                                </div>
                                            </div>

                                            <div class=" col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="car_type">ประเภทรถ
                                                    </label>
                                                    <select type="text " class="form-control " name="car_type" >
                                                        <option value="Automatic">
                                                            เกียร์ออโต้
                                                        </option>
                                                        <option value="GearStick">
                                                            เกียร์กระปุก
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="car_brand">ยี่ห้อ</label>
                                                    <select type="text " class="form-control " name="car_brand" >
                                                        <option value="" class="text-center">---car--</option>
                                                        @foreach($brand as $row)
                                                        <option value="{{$row->nameBrand}}"> {{$row->nameBrand}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="car_price">ราคา</label>
                                                    <input type="text" class="form-control" name="car_price">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="car_id">เลขทะเบียน</label>
                                                    <input type="text" class="form-control" name="car_id">
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="car_image">รูปภาพ</label>
                                                    <input type="file" class="form-control" name="car_image">
                                                </div>
                                            </div>

                                            

                                            
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <input type="submit" value="เพิ่ม" class="btn btn-success " style="margin-left: 40%">
                                    @error('accessories_number')
                                    <div class="my-2">
                                        <span class="text-danger my-2"> {{ $message }} </span>
                                    </div>
                                    @enderror

                                    @error('accessories_name')
                                    <div class="my-2">
                                        <span class="text-danger my-2"> {{ $message }} </span>
                                    </div>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                <th scope="col">จัดการ</th>
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
                                    <a href="{{ url('/addcar/edit/' . $row->id) }}" class="fas fa-edit fa-lg btn btn-primary"> </a>
                                    <a href="{{ url('/addcar/delete/' . $row->id) }}" class="fas fa-trash-alt fa-lg btn btn-danger" onclick="return confirm('ลบหรือไม่ ?')"> </a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection