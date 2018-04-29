<?php


namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function dailyReport(Request $request)
    {
        if ($request->input('selectBy') === "all"){
            return $this->allReport();
        }else{
            $validatedData = $request->validate([
                'date' => 'required|date'
            ]);
            
            $orders = \App\Order::whereDate('created_at', '=', date($request->input('date')))->get();
            return $this->createChart($orders);
        }
    }

    public function allReport()
    {
        $orders = \App\Order::all();
        return $this->createChart($orders);
        
    }
    
    function createChart($orders){
        $categories_count = [0,0,0,0];
        /*
        อาหารแต่ละประเภทคือ
        1.อาหารรองท้อง 
        2.อาหารจานหลัก 
        3.เครื่องดื่ม 
        4.ของหวาน
        */

        foreach ($orders as $order) {
            if ($order->menus->category_id === 1){
                $categories_count[0] += 1;
            }elseif ($order->menus->category_id === 2) {
                $categories_count[1] += 1;
            }elseif ($order->menus->category_id === 3) {
                $categories_count[2] += 1;
            }elseif ($order->menus->category_id === 4) {
                $categories_count[3] += 1;
            }

        }
        // print_r ($categories_count) ;
        $table = \Lava::DataTable();
        $table->addStringColumn('ประเภทอาหาร')
            ->addNumberColumn('จำนวนที่ขายได้');
            
        $categories = \App\Category::all();
        foreach ($categories as $category) {
            $table->addRow(array($category->name, $categories_count[$category->id-1]));
        }


        $donutchart = \Lava::DonutChart('cate_num', $table, [
                    'title' => 'จำนวนอาหารที่ขายได้ในแต่ละประเภททั้งหมด'
                ]);

        return view('owner.report.report');
        
    }

    
}



