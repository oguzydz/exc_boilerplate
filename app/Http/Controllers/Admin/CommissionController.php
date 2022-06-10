<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommissionRequest;
use App\Http\Requests\SearchRequest;
use App\Models\CommissionFee;
use Inertia\Inertia;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $comission = CommissionFee::where(function ($query) use ($request) {
            $query->where('price', 'like', "%$request->search%");
        })->paginate(10);

        return Inertia::render('Admin/Commission/Index', [
            'data' => $comission,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Commission/Create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SearchRequest $request)
    {

        $data = [
            'price'                         => $request->price,
            'finish_price'                  => $request->finish_price,
            'percent'                       => $request->percent,
            'local_processing_fee'          => $request->local_processing_fee,
            'foreign_proccessing_fee'       => $request->foreign_proccessing_fee,
        ];

        try {
            CommissionFee::create($data);

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $commissionId)
    {
        $commission = CommissionFee::findOrFail($commissionId);

        $data = [
            'price'                   => $commission->price,
            'finish_price'            => $commission->finish_price,
            'percent'                 => $commission->percent,
            'local_processing_fee'    => $commission->local_processing_fee,
            'foreign_proccessing_fee' => $commission->foreign_proccessing_fee,
        ];

        return Inertia::render('Admin/Commission/Edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CommissionRequest $request)
    {
        try {
            $commissionUpdate = CommissionFee::firstOrFail();

            $data = [
                'price'                   => $request->price,
                'finish_price'            => $request->finish_price,
                'percent'                 => $request->percent,
                'local_processing_fee'    => $request->local_processing_fee,
                'foreign_proccessing_fee' => $request->foreign_proccessing_fee,
            ];

            $commissionUpdate->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Komisyon ayarları güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
