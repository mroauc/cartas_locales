<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Repositories\ProductoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductoController extends AppBaseController
{
    /** @var ProductoRepository $productoRepository*/
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * Display a listing of the Producto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productos = $this->productoRepository->all();

        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new Producto.
     *
     * @return Response
     */
    public function create()
    {
        $locales = \App\Models\Local::all();
        $categorias = \App\Models\Categoria_producto::all();
        $productos = \App\Models\Producto::all();
        return view('productos.create')->with('locales', $locales)->with('categorias', $categorias)->with('productos', $productos);
    }

    /**
     * Store a newly created Producto in storage.
     *
     * @param CreateProductoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoRequest $request)
    {
        $input = $request->all();
        $producto = \App\Models\Producto::create([
            'nombre' => $input['nombre'],
            'descripcion' => $input['descripcion'],
            'precio' => $input['precio'],
            'disponible' => isset($input['disponible']) ? $input['disponible'] : 0,
            'stock' => isset($input['stock']) ? $input['stock'] : 0,
            'id_local' => $input['id_local'],
            'id_categoria' => $input['id_categoria']
        ]);

        if(isset($input['productos_hijos'])){
            foreach ($input['productos_hijos'] as $key => $id_producto) {
                $producto_h = \App\Models\Producto::find($id_producto);
                $producto_h->id_producto_padre = $producto->id;
                $producto_h->save();
            }
        }

        Flash::success('Producto saved successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified Producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified Producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $producto = $this->productoRepository->find($id);
        $categorias = \App\Models\Categoria_producto::all();
        $locales = \App\Models\Local::all();

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }
        $productos = \App\Models\Producto::all();
        return view('productos.edit')->with('producto', $producto)
        ->with('categorias', $categorias)
        ->with('locales', $locales)
        ->with('productos', $productos);
    }

    /**
     * Update the specified Producto in storage.
     *
     * @param int $id
     * @param UpdateProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoRequest $request)
    {
        $input = $request->all();
        $producto = \App\Models\Producto::find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        $producto->nombre = $input['nombre'];
        $producto->descripcion = $input['descripcion'];
        $producto->precio =  $input['precio'];
        $producto->disponible = isset($input['disponible']) ? $input['disponible'] : 0;
        $producto->stock = isset($input['stock']) ? $input['stock'] : 0;
        $producto->id_local = $input['id_local'];
        $producto->id_categoria = $input['id_categoria'];
        $producto->save();

        $producto->productos_hijos()->update(['id_producto_padre' => null]);
        if(isset($input['productos_hijos'])){
            foreach ($input['productos_hijos'] as $key => $id_producto) {
                $producto_h = \App\Models\Producto::find($id_producto);
                $producto_h->id_producto_padre = $producto->id;
                $producto_h->save();
            }
        }

        Flash::success('Producto updated successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified Producto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        $this->productoRepository->delete($id);

        Flash::success('Producto deleted successfully.');

        return redirect(route('productos.index'));
    }
}
