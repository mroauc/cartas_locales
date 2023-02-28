<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoria_productoRequest;
use App\Http\Requests\UpdateCategoria_productoRequest;
use App\Repositories\Categoria_productoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Categoria_productoController extends AppBaseController
{
    /** @var Categoria_productoRepository $categoriaProductoRepository*/
    private $categoriaProductoRepository;

    public function __construct(Categoria_productoRepository $categoriaProductoRepo)
    {
        $this->categoriaProductoRepository = $categoriaProductoRepo;
    }

    /**
     * Display a listing of the Categoria_producto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categoriaProductos = $this->categoriaProductoRepository->all();

        return view('categoria_productos.index')
            ->with('categoriaProductos', $categoriaProductos);
    }

    /**
     * Show the form for creating a new Categoria_producto.
     *
     * @return Response
     */
    public function create()
    {
        return view('categoria_productos.create');
    }

    /**
     * Store a newly created Categoria_producto in storage.
     *
     * @param CreateCategoria_productoRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoria_productoRequest $request)
    {
        $input = $request->all();

        $categoriaProducto = $this->categoriaProductoRepository->create($input);

        Flash::success('Categoria Producto saved successfully.');

        return redirect(route('categoriaProductos.index'));
    }

    /**
     * Display the specified Categoria_producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoriaProducto = $this->categoriaProductoRepository->find($id);

        if (empty($categoriaProducto)) {
            Flash::error('Categoria Producto not found');

            return redirect(route('categoriaProductos.index'));
        }

        return view('categoria_productos.show')->with('categoriaProducto', $categoriaProducto);
    }

    /**
     * Show the form for editing the specified Categoria_producto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoriaProducto = $this->categoriaProductoRepository->find($id);

        if (empty($categoriaProducto)) {
            Flash::error('Categoria Producto not found');

            return redirect(route('categoriaProductos.index'));
        }

        return view('categoria_productos.edit')->with('categoriaProducto', $categoriaProducto);
    }

    /**
     * Update the specified Categoria_producto in storage.
     *
     * @param int $id
     * @param UpdateCategoria_productoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoria_productoRequest $request)
    {
        $categoriaProducto = $this->categoriaProductoRepository->find($id);

        if (empty($categoriaProducto)) {
            Flash::error('Categoria Producto not found');

            return redirect(route('categoriaProductos.index'));
        }

        $categoriaProducto = $this->categoriaProductoRepository->update($request->all(), $id);

        Flash::success('Categoria Producto updated successfully.');

        return redirect(route('categoriaProductos.index'));
    }

    /**
     * Remove the specified Categoria_producto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoriaProducto = $this->categoriaProductoRepository->find($id);

        if (empty($categoriaProducto)) {
            Flash::error('Categoria Producto not found');

            return redirect(route('categoriaProductos.index'));
        }

        $this->categoriaProductoRepository->delete($id);

        Flash::success('Categoria Producto deleted successfully.');

        return redirect(route('categoriaProductos.index'));
    }
}
