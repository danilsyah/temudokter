<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use everything here
use Gate;
use Auth;

// use model here
use App\Models\Operational\Transaction;
use App\Models\Operational\Appointment;
use App\Models\Operational\Doctor;
use App\Models\User;
use App\Models\ManagementAccess\DetailUser;
use App\Models\MasterData\Consultation;
use App\Models\MasterData\Specialist;
use App\Models\MasterData\ConfigPayment;

// thirdparty package

class ReportTransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type_user_condition = Auth::user()->detail_user->type_user_id;

        if($type_user_condition == 1){
            // for admin
            $transaction = Transaction::orderBy('created_at', 'desc')->get();
        }else{
            // other admin for doctor & patient ( task for everyone here )
            $transaction = Transaction::orderBy('created_at', 'desc')->get();
        }

        return view('pages.backsite.operational.transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
