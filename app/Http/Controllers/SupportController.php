<?php

namespace App\Http\Controllers;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
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
        $supports = $this->service->getAll($request->filter);


        return view('admin.supports.index', compact('supports'));
    }

    public function indexApi(Support $support) {
        $supports = $support->all();

        return response()->json($supports, 200);
    }

    public function create() {
        return view('admin.supports.create');
    }

    public function createApi() {
        // dd($val);
        // return response()->json(['Criado' => 'Sim'], 200);
        return view('admin.supports.create');
        
    }

    public function store(StoreUpdateSupport $request) {
        
        $this->service->new(new CreateSupportDTO($request->subject, 'a', $request->body));

        return redirect()->route('supports.index');

    }

    public function storeApi(StoreUpdateSupport $request, Support $support) {
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);
        return response()->json($data, 201);
    }

    public function show(string $id) {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function showApi(string|int $id) {
        if (!$support = Support::find($id)) {
            return response()->json(['Erro' => 'id não encontrado!'], 404);
        }
        return response()->json($support, 200);
    }

    public function edit(string $id) {
        if (!$support =  $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, $id) {
        
        $support = $this->service->update(new UpdateSupportDTO($id, $request->subject, 'a', $request->body));
        
        if (!$support) {
            return back();
        }
        
        return redirect()->route('supports.index');
    }

    public function updateApi(Request $request, $id, Support $support) {
        if (!$support = $support->find($id)) {
            return response()->json(['Erro' => 'id não encontrado!'], 404);
        }
        $support->update($request->only(['subject', 'body']));

        return response()->json($support, 200);
    }

    public function destroy(string $id) {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }

    public function destroyApi(string | int $id) {
        if (!$support = Support::find($id)) {
            return response()->json(['Erro' => 'id não encontrado!'], 404);
        }
        $support->destroy($id);

        return response()->json(['Ação' => 'Deu certo!'], 200);
    }
}
