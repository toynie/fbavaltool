<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = Setting::all();
        return view('admin.settings', compact('settings'));
    }
    public function updateSettings(Request $request){
        // return 'fdf';
        // dd($request->request);
        // print_r($request->request);

        // Setting::where('name', 'project_aronym')->update(
        //     [
        //         'value'=>$request->project_aronym,
        //     ]
        // );
        Setting::where('name',  'total_revenue_12_months')->update(
            [
                'value'=>$request->total_revenue_12_months,
            ]
        );
        Setting::where('name',  'total_cost_goods_sold_12_months')->update(
            [
                'value'=>$request->total_cost_goods_sold_12_months,
            ]
        );
        Setting::where('name',  'total_operating_expense_12_months')->update(
            [
                'value'=>$request->total_operating_expense_12_months,
            ]
        );
        Setting::where('name',  'valuation_range')->update(
            [
                'value'=>$request->valuation_range,
            ]
        );
        // Setting::where('name',  'business_type_question')->update(
        //     [
        //         'value'=>$request->business_type_question,
        //     ]
        // );
        Setting::where('name',  'confidenceBase')->update(
            [
                'value'=>$request->confidenceBase,
            ]
        );
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    // public function edit(Setting $setting)
    public function edit($id){
        // return $this->qset->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Setting $setting)
    public function update(Request $request)
    {
        //
    }
    // public function updateSetting()
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
