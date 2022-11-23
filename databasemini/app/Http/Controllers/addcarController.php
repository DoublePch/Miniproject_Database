<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\brandcar;
use Carbon\Carbon;

class addcarController extends Controller
{
    public function index(){
        //ดึงข้อมูลจาก ผ่าน model
        $car = car::all();
        //retunr view เข้าถึงข้อมูลผ่านการ forech

        $brand = brandcar::all();
        return view('page.admin.addcar',compact('car','brand'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'car_name' => 'required|max:255',
            'car_type' => 'required|max:255',
            'car_image' => 'required|mimes:jpg,jpeg,png',
            'car_price' => 'required|max:255',

            'car_brand' => 'required|max:255',
            'car_id' => 'required|max:255',

        ],
            ['car_name.required' => "กรุณาป้อนชื่อรถ",
                'car_type.required' => "กรุณาป้อนประเภทรถ",
                'car_image.required' => "กรุณาใส่ภาพ",
                'car_price.required' => "กรุณาเพิ่มราคา",
                'car_brand.required' => "กรุณาเพิ่มยี้ห่อ",

                'car_registration.required' => "กรุณาใส่หมายเลขทะเบียน",

            ]

        );
        //เข้ารหัสรูปภาพ
        $car_image = $request->file('car_image');
        //gennerat ชื่อภาพ
        $name_gen = hexdec(uniqid());
        //ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($car_image->getClientOriginalExtension());
//รวมชื่อไฟล์กับนามสกุล
        $img_name = $name_gen . '.' . $img_ext;

        //อัพโหลดและบันทึกข้อมูล

        //สร้างไดเรกทอรี่
        $upload_location = 'image/Car/';
        $full_path = $upload_location . $img_name;
        //อัพโหลดลงดาต้าเบส ด้วย model

        // Location::insert([

        //     'location_name' => $request->location_name,
        //     'number_seatss' => $request->number_seatss,
        //     'location_cost' => $request->location_cost,
        //     'location_image' => $full_path,
        //     'created_at' => Carbon::now(),
        // ]);

        $addcal = new car;
        $addcal->car_name = $request->car_name;
        $addcal->car_type = $request->car_type;
        $addcal->car_price = $request->car_price;
        $addcal->car_brand = $request->car_brand;

        $addcal->car_id = $request->car_id;
       

        $addcal->car_image = $full_path;

        $addcal->created_at = Carbon::now();

        $addcal->save();
        //อัพโหลดภาพไปไดเรกทอรี่
        $car_image->move($upload_location, $img_name);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    public function delete($id)
    {
        //ลบภ่าพ

        $img = car::findorfail($id)->car_image;
        unlink($img);

        //ลบข้อมูล

        $delete = car::find($id);

        if (empty($delete)) {
            return redirect()->back();
        }

        $delete->delete();
        return redirect()->route('addcar');

    }

    public function edit($id)
    {

        $car = car::find($id);
        return view('page.admin.edit',compact('car'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'car_name' => 'required',
            'car_type' => 'required',
            'car_price' => 'required',
            'car_brand' => 'required',
            'car_id' => 'required',
            'car_image' => 'required',

        ],

            ['car_name.required' => "กรุณาป้อนชื่อรถ",
                'car_type.required' => "กรุณาป้อนประเภทรถ",
                'car_price.required' => "กรุณาป้อนราคารถ",
                'car_brand.required' => "กรุณาป้อนยี่ห้อ",
                'car_ncar_id.required' => "กรุณาป้อนหมายเลขทะเบียน",
                'car_image.required' => "กรุณาเพิ่มรูป",
               

            ]
        );

        $car_image = $request->file('car_image');

        if ($car_image) {
            //อัพเดทภาพและชื่อ
            $name_gen = hexdec(uniqid());

            $img_ext = strtolower($car_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            $upload_location = 'image/Car/';
            //ลบภาพเก่าและอัพภาพใหม่

            //อัพเดทข้อมูล

            $full_path = $upload_location . $img_name;

            car::find($id)->update([
                'car_name' => $request->car_name,
                'car_type' => $request->car_type,
                'car_price' => $request->car_price,
                'car_brand' => $request->car_brand,
                'car_id' => $request->car_id,
                'car_image' => $full_path,
            ]);

            //ลบภาพเก่าและอัพภาพใหม่
            $old_image = $request->old_image;
            unlink($old_image);
            $car_image->move($upload_location, $img_name);
            return redirect()->back()->with('success', "อัพเดตข้อมูลเรียบร้อย");

        } else {

        }

        return redirect()->back()->with('success', "อัพเดตข้อมูลเรียบร้อย");
        // return redirect()->route('usermanager')->with('success',"อัพเดตข้อมูลเรียบร้อย");
    }
}
