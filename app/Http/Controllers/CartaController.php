<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartaRequest;
use App\Http\Requests\UpdateCartaRequest;
use App\Repositories\CartaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Flash;
use Response;

class CartaController extends AppBaseController
{
    /** @var CartaRepository $cartaRepository*/
    private $cartaRepository;

    public function __construct(CartaRepository $cartaRepo)
    {
        $this->cartaRepository = $cartaRepo;
    }

    /**
     * Display a listing of the Carta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cartas = $this->cartaRepository->all();

        return view('cartas.index')
            ->with('cartas', $cartas);
    }

    /**
     * Show the form for creating a new Carta.
     *
     * @return Response
     */
    public function create()
    {
        $locales = \App\Models\Local::all();
        $productos = \App\Models\Producto::all();
        return view('cartas.create')->with('locales', $locales)->with('productos', $productos);
    }

    /**
     * Store a newly created Carta in storage.
     *
     * @param CreateCartaRequest $request
     *
     * @return Response
     */
    public function store(CreateCartaRequest $request)
    {
        $input = $request->all();
        $carta = \App\Models\Carta::create([
            'nombre' => $input['nombre'],
            'id_local' => $input['id_local']
        ]);
        // $carta = $this->cartaRepository->create($input);
        if(isset($input['productos'])){
            $carta->productos()->attach($input['productos']);

        }

        Flash::success('Carta saved successfully.');

        return redirect(route('cartas.index'));
    }

    /**
     * Display the specified Carta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carta = $this->cartaRepository->find($id);
        if (empty($carta)) {
            Flash::error('Carta not found');

            return redirect(route('cartas.index'));
        }

        return view('cartas.show')->with('carta', $carta);
    }

    /**
     * Show the form for editing the specified Carta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carta = $this->cartaRepository->find($id);
        $locales = \App\Models\Local::all();
        $productos = \App\Models\Producto::all();
        if (empty($carta)) {
            Flash::error('Carta not found');

            return redirect(route('cartas.index'));
        }

        return view('cartas.edit')->with('carta', $carta)->with('locales', $locales)->with('productos', $productos);
    }

    /**
     * Update the specified Carta in storage.
     *
     * @param int $id
     * @param UpdateCartaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartaRequest $request)
    {
        $input = $request->all();
        $carta = $this->cartaRepository->find($id);

        if (empty($carta)) {
            Flash::error('Carta not found');

            return redirect(route('cartas.index'));
        }

        $carta->nombre = $input['nombre'];
        $carta->id_local = $input['id_local'];
        $carta->save();

        $carta->productos()->sync($request->all()['productos']);

        Flash::success('Carta updated successfully.');

        return redirect(route('cartas.index'));
    }

    /**
     * Remove the specified Carta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carta = $this->cartaRepository->find($id);

        if (empty($carta)) {
            Flash::error('Carta not found');

            return redirect(route('cartas.index'));
        }

        $this->cartaRepository->delete($id);

        Flash::success('Carta deleted successfully.');

        return redirect(route('cartas.index'));
    }

    public function mostrarCarta($id, Request $request){
        // dd(str_repeat(".", 20 - strlen('Papas Fritas') - strlen('$5.00')));
        // dd($request->all());
        $carta = \App\Models\Carta::find($id);
        $categorias = \App\Models\Categoria_producto::whereHas('productos')->get();
        // dd('stop');
        if(isset($request->all()['desktop'])){
            return view('carta1_desktop')->with('carta', $carta)->with('categorias', $categorias);    
        }
        if(isset($request->all()['pdf'])){
            $dompdf = new \Dompdf\Dompdf();
            $html = view('carta1_pdf')->with('carta', $carta)->with('categorias', $categorias)->render();
            $options = new \Dompdf\Options();
            $options->setIsHtml5ParserEnabled(true);
            $dompdf->setOptions($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $dompdf->stream();
        }
        $visitas = \App\Models\VisitaCarta::all();
        // dd($visitas);
        $visitas[0]->visitas++;
        $visitas[0]->save();

        return view('carta1')->with('carta', $carta)->with('categorias', $categorias); 
    }

    public function visitasCarta(){
        $vistas = \App\Models\VisitaCarta::all();
        return view('vistas')->with('vistas', $vistas);
    }

    // public function mostrarCarta($id){
    //     // dd(str_repeat(".", 20 - strlen('Papas Fritas') - strlen('$5.00')));
    //     $carta = \App\Models\Carta::find($id);
    //     $categorias = \App\Models\Categoria_producto::whereHas('productos')->get();
    //     return view('carta1')->with('carta', $carta)->with('categorias', $categorias); 
    // }
}
