@extends('layouts.admin')
@section('content')
<div class="col-xl-8 order-xl-1">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">ข้อมูลการจอง </h3>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr align="center">
                        <th scope="col" class="sort" data-sort="name">รหัสบัตรประชาชน</th>
                        <th scope="col" class="sort" data-sort="name">ชื่อ</th>
                        <th scope="col" class="sort" data-sort="status">นามสกุล</th>
                        <th scope="col" class="sort" data-sort="status">เลขทะเบียน</th>
                        <th scope="col" class="sort" data-sort="status">ยี่ห้อ</th>
                    
                    </tr>
                </thead>
                <tbody class="list">
                   @foreach($book as $row)
                    <tr class="ss" align="center">
                        <th scope="row">{{$row->idname}}</th>
                        <td>{{$row->fname}}</td>
                        <td>
                            {{$row->lname}}
                        </td>
                        <td>
                            {{$row->car_id}}
                        </td>
                        <td>
                           {{$row->car_brand}}
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