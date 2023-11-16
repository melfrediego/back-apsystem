<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('admin.marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descrição' => 'nullable|string',
            'logo' => 'nullable|string',
            'seo_url' => 'nullable|string',
            'ativo' => 'required|in:S,N',
            'destaque' => 'required|in:S,N',
        ]);

        Marca::create([
            'nome' => $request->nome,
            'descrição' => $request->descrição,
            'logo' => $request->logo,
            'seo_url' => $request->seo_url,
            'ativo' => $request->ativo,
            'destaque' => $request->destaque,
        ]);

        return redirect()->route('marcas.index');
    }

    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descrição' => 'nullable|string',
            'logo' => 'nullable|string',
            'seo_url' => 'nullable|string',
            'ativo' => 'required|in:S,N',
            'destaque' => 'required|in:S,N',
        ]);

        $marca->update($request->all());

        return redirect()->route('marcas.index');
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}

