<?php

namespace App\Http\Controllers;

use App\Models\historico;
use Illuminate\Http\Request;

class sadRiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cenarios = $request->cenarios;
        $investimentos = $request->investimentos;



        return view('risco.parte2', ['cenarios' => $cenarios, 'investimentos' => $investimentos]);
    }



    public function parte3create(Request $request)
    {
        $cenarios = $request->cenarios;
        $cenario = $request->cenario;
        $investimentos = $request->investimentos;

        // dd($cenario_valores);

        return view('risco.parte3', ['cenarios' => $cenarios, 'investimentos' => $investimentos, 'cenario' => $cenario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tabela(Request $request)
    {
        // dd($request->all());

        $cenarios = $request->cenarios;
        $cenario = $request->cenario;
        $investimentos = $request->investimentos;
        $investimento = $request->investimento;



        //MaxiMax
        for($k = 0; $k < $investimentos; $k++){
            $maximax[$k] = -999999;
        }

        for($i=1; $i<=$investimentos;$i++){
            for($j=1; $j<=$cenarios;$j++){
                if(intval($investimento[$j-1][$i-1]) >= $maximax[$i-1]){
                    $maximax[$i-1] = intval($investimento[$j-1][$i-1]);

                }
                // dd(intval($investimento[$i-1][$j-1]));

            }
        }
        //MaxiMin
        for($k = 0; $k < $investimentos; $k++){
            $maximin[$k] = 999999;
        }

        for($i=1; $i<=$investimentos;$i++){
            for($j=1; $j<=$cenarios;$j++){
                if(intval($investimento[$j-1][$i-1]) <= $maximin[$i-1]){
                    $maximin[$i-1] = intval($investimento[$j-1][$i-1]);

                }
                // dd(intval($investimento[$i-1][$j-1]));

            }
        }
        // //Laplace
        // for($k = 0; $k < $investimentos; $k++){
        //     $laplace[$k] = 0;
        // }

        // for($i=1; $i<=$investimentos;$i++){
        //     for($j=1; $j<=$cenarios;$j++){

        //             $laplace[$i-1] += intval($investimento[$j-1][$i-1]);


        //         // dd(intval($investimento[$i-1][$j-1]));

        //     }
        //     $laplace[$i-1] = $laplace[$i-1] / $cenarios;
        // }
        //VME
        for($k = 0; $k < $investimentos; $k++){
            $vme[$k] = 0;
        }

        for($i=1; $i<=$investimentos;$i++){
            for($j=1; $j<=$cenarios;$j++){

                    $vme[$i-1] += intval($investimento[$j-1][$i-1]) * ($cenario[$j-1]/100);


                // dd(intval($investimento[$i-1][$j-1]));

            }

        }
        //Maiores
        for($k = 0; $k < $investimentos; $k++){
            $maiores_tabela[$k] = -999999;
        }

        for($i=1; $i<=$cenarios;$i++){
            for($j=1; $j<=$investimentos;$j++){
                if(intval($investimento[$i-1][$j-1]) >= $maiores_tabela[$i-1]){
                    if(!(intval($investimento[$i-1][$j-1]) == $maximax[$i-1])){
                        $maiores_tabela[$i-1] = intval($investimento[$i-1][$j-1]);
                    }



                }
                // dd(intval($investimento[$i-1][$j-1]));

            }
        }




        return view('risco.tabela', ['cenarios' => $cenarios, 'investimentos' => $investimentos, 'cenario' => $cenario, 'investimento' => $investimento, 'maximax' => $maximax, 'maximin' => $maximin, 'maiores_tabela' => $maiores_tabela, 'vme' => $vme]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

        historico::create($request->all());

        dd(1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
