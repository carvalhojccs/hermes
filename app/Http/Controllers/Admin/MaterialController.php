<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMaterialFormRequest;
use App\Repositories\Contracts\MaterialRepositoryInterface;
use App\Repositories\Contracts\EmbalagemRepositoryInterface;
use App\Repositories\Contracts\OrigemRepositoryInterface;
use App\Repositories\Contracts\RemetenteRepositoryInterface;
use App\Repositories\Contracts\DestinoRepositoryInterface;
use App\Repositories\Contracts\StatusRepositoryInterface;
use App\Repositories\Contracts\ModalRepositoryInterface;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    protected $repository;
    protected $embalagemRepository;
    protected $origemRepository;
    protected $remetenteRepository;
    protected $destinoRepository;
    protected $statusRepository;
    protected $modalRepository;
    protected $model;
    
    public function __construct(
            MaterialRepositoryInterface $repository, 
            EmbalagemRepositoryInterface $embalagemRepository, 
            OrigemRepositoryInterface $origemRepository, 
            RemetenteRepositoryInterface $remetenteRepository, 
            DestinoRepositoryInterface $destinoRepository, 
            StatusRepositoryInterface $statusRepository, 
            ModalRepositoryInterface $modalRepository, 
            Request $request) 
    {
        $this->repository = $repository;
        $this->embalagemRepository = $embalagemRepository;
        $this->origemRepository = $origemRepository;
        $this->remetenteRepository = $remetenteRepository;
        $this->destinoRepository = $destinoRepository;
        $this->statusRepository = $statusRepository;
        $this->modalRepository = $modalRepository;
        $this->model = $request->segment(2);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recupera todos as embalagens
        $embalagens = $this->embalagemRepository->selectEmbalagens();
        
        //recupera todos as origens
        $origens = $this->origemRepository->selectOrigens();
        
        //recupera todos os remetentes
        $remetentes = $this->remetenteRepository->selectRemetentes();
        
        //recupera todos os destinos
        $destinos = $this->destinoRepository->selectDestinos();
        
        //recupera todos os status
        $status = $this->statusRepository->selectStatus();
        
        //recupera todos os modais
        $modais = $this->modalRepository->selectModais();
        
        //recupera todos os dados da tabela
        $data = $this->repository->paginate();
        
        //chama a view admin/materiais/index.blade.php para listagem dos dados
        return view('admin.'.$this->model.'.index', compact('data','embalagens','origens','remetentes','destinos','status','modais')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //recupera todos as embalagens
        $embalagens = $this->embalagemRepository->selectEmbalagens();
        
        //recupera todos as origens
        $origens = $this->origemRepository->selectOrigens();
        
        //recupera todos os remetentes
        $remetentes = $this->remetenteRepository->selectRemetentes();
        
        //recupera todos os destinos
        $destinos = $this->destinoRepository->selectDestinos();
        
        //recupera todos os status
        $status = $this->statusRepository->selectStatus();
        
         //recupera todos os modais
        $modais = $this->modalRepository->selectModais();
        dd($modais);
        //chama a view admin/materiais/create.blade.php com o formulário para cadastro
        return view('admin.'.$this->model.'.create', compact('embalagens','origens','remetentes','destinos','status','modais')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMaterialFormRequest $request)
    {
        dd($request->all());
        
        if($this->repository->store($request->all())):
            return redirect()->route($this->model.'.index')->withSuccess('Cadasro realizado com sucesso!');
        else:
            return redirect()->back()->withErrors('Falha ao cadastrar!');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //recupera os dados pelo seu id
        $data = $this->repository->findById($id);
        
        //chama a view admin/materiais/show.blade.php e passa os dados na variável $data
        return view('admin.'.$this->model.'.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$data = $this->repository->findById($id)):
            return redirect()->back();
        else:
            return view('admin.'.$this->model.'.edit', compact('data'));
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMaterialFormRequest $request, $id)
    {
        //atualia os dados de um registro específico
        $this->repository->update($id, $request->all());
        
        //redireciona para a view admin/materiais/index.blade.php
        return redirect()->route($this->model.'.index')->withSuccess('Atualização realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //verifica se a conta foi deletada com sucesso e redireciona para a view admin/materiais/index.blade.php,
        //caso contrário mostra uma mensagem de erro
        if($this->repository->delete($id)):
            return redirect()->route($this->model.'.index')->withSuccess('Cadastro deletado co sucesso!');
        else:
            return redirect()->back()->withErrors("Falha ao deletar");
        endif;
    }
    
    /**
     * Mostra o resultado da pesquisa
     * 
     * @param Request $request
     * @return type
     */
    public function search(Request $request) 
    {
        //filtro com os parametros da pesquisa
        $filters = $request->except('_token');
        
        //realiza a pesquisa com os filtros passados e armazena em $data
        $data = $this->repository->search($filters);
        
        //chama a view admin/materiais/index.blade.php retornado os filtros e os dados encontrados
        return view('admin.'.$this->model.'.index', compact('data','filters'));
    }
}
