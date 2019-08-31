<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;
use Carbon\Carbon;
use App\Exports\BorrowExport;
use Maatwebsite\Excel\Facades\Excel;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBorrow()
    {
        $data = Inventory::orderBy('created_at', 'desc')->paginate(10);
        return view('borrows.index', compact('data'));
    }

    public function indexReturn()
    {
        $data = Borrow::where('status', 'borrowed')->orderBy('created_at', 'desc')->paginate(10);
        return view('returns.index', compact('data'));
    }
    public function fBorrow(Request $request, $id)
    {
        $qty = $request->get('qty');
        if (Auth::user()->role == 'borrower') {
            Borrow::create([
                'user_id'       => Auth::user()->id,
                'inventory_id'  => $id,
                'status'        => 'request',
                'qty'           => $qty,
                'desc'          => $request->get('desc')
        ]);
        } else {
            Borrow::create([
                'user_id'       => Auth::user()->id,
                'inventory_id'  => $id,
                'status'        => 'borrowed',
                'qty'           => $qty,
                'desc'          => $request->get('desc')
            ]);
            
        $inventory = Inventory::find($id);
        $inv_qty = Inventory::where('id', $id)->first()->qty;
        $inv_qty = $inv_qty - $qty;
        $inventory->qty = $inv_qty;
        $inventory->save();
        }

        return redirect('/borrows');
    }

    public function fReturn($id)
    {
        $item = Borrow::find($id)->inventory_id;
        $qty = Borrow::find($id)->qty;

        $return = Borrow::find($id);
        $return->status = 'returned';
        $return->returned_at = Carbon::now();
        $return->save();

        $inventory = Inventory::find($item);
        $inv_qty = Inventory::where('id', $item)->first()->qty;
        $inv_qty = $inv_qty + $qty;
        $inventory->qty = $inv_qty;
        $inventory->save();

        return redirect('/returns');
    }

    public function export_excel()
	{
		return Excel::download(new BorrowExport, 'Borrow.xlsx');
	}

}
