<?php

namespace App\Http\Controllers;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ) {

    }

    public function index(Request $request) {
        $supports = $this->service->paginate(
            pag: $request->get('page', 1), 
            totPerPag: $request->get('per_page', 10), 
            filter: $request->filter);
        
        $filters = ['filter' => $request->get('filter', '')];
        return view('admin.supports.index', compact('supports', 'filters'));
    }

    public function create() {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request) {
        
        $this->service->new(new CreateSupportDTO($request->subject, SupportStatus::A, $request->body));

        return redirect()->route('supports.index')
        ->with('message', 'Cadastrado com sucesso!');

    }

    public function show(string $id) {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function edit(string $id) {
        if (!$support =  $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, $id) {
        
        $support = $this->service->update(new UpdateSupportDTO($id, $request->subject, SupportStatus::A, $request->body));
        
        if (!$support) {
            return back();
        }
        
        return redirect()->route('supports.index')
        ->with('message', 'Atualizado com sucesso!');
        ;
    }

    public function destroy(string $id) {
        $this->service->delete($id);

        return redirect()->route('supports.index')
        ->with('message', 'Deletado com sucesso!');
    }
}
