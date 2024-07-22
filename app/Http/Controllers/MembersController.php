<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $claim_intimations = Member::whereNotNull('id');
            return DataTables::of($claim_intimations)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $carbonDate = Carbon::parse($data->created_at);
                    $timestamp = $carbonDate->timestamp;
                    return [
                        'display' => e(dateFormat($data->created_at, 'Y-m-d H:i')),
                        'timestamp' =>  $timestamp
                    ];
                })

                ->addColumn('action', function ($data) {
                    return view('components.member-action-button', compact('data'));
                })
                ->rawColumns(['action',])
                ->make(true);
        }
        return view('admin.members.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
