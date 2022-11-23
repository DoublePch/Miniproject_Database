@extends('layouts.admin')
@section('content')
    <div class="container mt--6 ">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 ">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อย',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">แก้ไขข้อมูลรถ </h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('/addcar/update/' . $car->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label class="form-control-label" for="car_name">ชื่อรถ</label>
                                            <input type="text" class="form-control" name="car_name"
                                                value="{{$car->car_name}}">
                                        </div>
                                    </div>

                                    <div class=" col-lg-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="car_type">ประเภทรถ
                                            </label>
                                            <select type="text " class="form-control " name="car_type"
                                                style="width: 100%;">

                                                <option value="{{$car->car_type}}">
                                                    <b>ประเภทประจุบัน: </b>
                                                </option>

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
                                            <select type="text " class="form-control " name="car_brand"
                                            style="width: 100%;">

                                            <option value="{{$car->car_brand}}">
                                                <b>ยี่ห้อรถประจุบัน: </b>
                                            </option>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Isuzu">Isuzu</option>
                                            <option value="Honda">Honda</option>
                                            <option value="Mitsubishi">Mitsubishi</option>
                                            <option value="Ford">Ford</option>
                                            <option value="Nissan">Nissan</option>
                                            <option value="Mazda">Mazda</option>
                                            <option value="Suzuki">Suzuki</option>
                                            <option value="MG">MG</option>
                                            <option value="Chevrolet">Chevrolet</option>

                                        </select>
                                                
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="car_price">ราคา</label>
                                            <input type="text" class="form-control" name="car_price"
                                                value="{{$car->car_price}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="car_id">เลขทะเบียน</label>
                                            <input type="text" class="form-control" name="car_id"
                                                value="{{$car->car_id}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="car_image">รูปภาพ</label>
                                            <input type="file" class="form-control" name="car_image"
                                                value="{{$car->car_image}}">
                                        </div>
                                    </div>

                                    

                            
                                </div>

                            </div>
                            <hr class="my-4" />

                            <input type="hidden" name="old_image" value="{{$car->car_image}}">
                            <div class="form-group">

                                <img src="{{asset($car->car_image)}}" alt="" width="300px" height="300px"
                                    style="margin-left: 30%">
                            </div>
                            <br>

                            @error('car_name')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('car_type')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('car_price')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('car_brand')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror
                            @error('car_id')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('car_image')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            

                            <input type="submit" value="บันทึก" class="btn btn-success">
                            <a href="{{ URL::Route('addcar') }}" class="btn btn-danger">กลับ</a>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
@endsection