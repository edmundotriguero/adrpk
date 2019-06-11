<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Product;
use App\Client; 
use Illuminate\Http\Request;
use DB;

use App\Mail\SendReportMonth;
use Illuminate\Support\Facades\Mail;




class ContractController extends Controller
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
        $contracts = Contract::where('state',1)->orderBy('end_date','desc')->get();
        return view('contract.index',['contracts'=>$contracts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('state',1)->get();
        $clients = Client::where('state',1)->get();

        return view('contract.create',[
            'products'=>$products,
            'clients'=>$clients
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $product_list = $request->get('product_list');

        //dd($product_list);

        $validData = $request->validate([
            'client_id' => 'integer',
            'description'=>'min:1',
            'start_date' => 'date',
            'end_date' => 'nullable|date'
        ]);

        $contract = new contract();
        $contract->client_id = $validData['client_id'];
        $contract->start_date = $validData['start_date'];
        $contract->end_date = $validData['end_date'];
        
        $contract->description = $validData['description'];
        $contract->state = 1;
        $contract->save();
        $aux = $contract->id;

         try {
            
            
            $cont = 0;

            while ($cont < count($product_list)) {
                DB::insert('insert into product_contract (product_id, contract_id)values(?,?)',
                 [$product_list[$cont], $aux]);
                $cont = $cont + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect('contract');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::find($id);
        /*$products_assigned = DB::table('product_contract as pc')
        //->join('contracts as c','contract_id','=','pc.id')
        ->join('products as p','pc.product_id','=','p.id')
        ->select('p.name as prodcucto')
        ->where('pc.contract_id','=',4)
        //->groupBy('p.name')
        ->get();*/
        //$aux = Contract::find($id)

       // dd($contract->start_date);
        return view('contract.show',['contract'=>$contract]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = contract::findOrFail($id);
        $products = Product::where('state',1)->get();
        $clients = Client::where('state',1)->get();


        return view('contract.edit', [
            'contract' => $contract,
            'products'=>$products,
            'clients'=>$clients
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        DB::beginTransaction();

        
        $product_list_new = $request->get('product_list');
               
        $validData = $request->validate([
            'client_id' => 'integer',
            'description'=>'min:1',
            'start_date' => 'date',
            'end_date' => 'nullable|date'
            ]);
            
        $contract = contract::find($id);
        
        $contract->client_id = $validData['client_id'];
        $contract->start_date = $validData['start_date'];
        $contract->end_date = $validData['end_date'];
        
        $contract->description = $validData['description'];
        $contract->state = 1;
        $contract->save();
        

         try {
            
            $product_list_origin = DB::table('product_contract')->select('product_id')->where('contract_id','=',$id)->get();
            
            
            $product_list_delete = [];
            $indice = 0;
            $aux = false;

            for ($i=0; $i < count($product_list_origin); $i++) { 
               
                if (in_array($product_list_origin[$i]->product_id, $product_list_new)) {
                    $aux = true;
                    $indice = array_search($product_list_origin[$i]->product_id, $product_list_new, false);
                    array_splice($product_list_new,$indice,1);
                    // dd($indice);
                } else{
                    array_push($product_list_delete, $product_list_origin[$i]->product_id);
                }
            }
            

            $cont = 0;
            $cont2 = 0;

            while ($cont < count($product_list_new)) {
                DB::insert('insert into product_contract (product_id, contract_id)values(?,?)',
                 [$product_list_new[$cont], $id]);
                $cont = $cont + 1;
            }

            while ($cont2 < count($product_list_delete)) {
                DB::delete('delete from product_contract where product_id = ? and  contract_id = ?',
                 [$product_list_delete[$cont2], $id]);
                $cont2 = $cont2 + 1;
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd("".$e);
        }
        return redirect('contract');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
                DB::delete('DELETE FROM product_contract WHERE contract_id = ?',[$id]);
                
                $contract = contract::find($id);
                 $contract->delete();

                return redirect('/contract');
            
                DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        //return redirect('/contract');   
        
    }

    public function sendEmail($message){
       // dd($message);
       Mail::to('etriguero@rpk.com.bo')->send(new SendReportMonth($message));
        dd($message);
    }
}
