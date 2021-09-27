<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;

class DashboardController extends Controller
{
  private $repository;
  private $validator;

  public function __construct(UserRepository $repository, UserValidator $validator)
  {
      $this->repository = $repository;
      $this->validator  = $validator;
  }

  public function index()
  {
      //return "Estamos na index(dashboard)";
      return view('user.dashboard');
  }

  //trazer a request para dentro do metodo "auth"
  public function auth(Request $request)
  {
    //var_dump(); / dump and die();
    //dd($request->all());

    $data = [
        'email'    => $request->get('username'),
        'password' => $request->get('password')
    ];

    try
    {
      //se vamos trabalhar com autenticação, sim ou não
      if(env('PASSWORD_HASH'))
      {
          //parametro false/true: me mantenha conectado ou não (em cache - para não precisar fazer login todo momento),
          //caso o login seja efetuado com sucesso
          //barra invertida: a aplicação vai entender que tem que buscar a classe desde da raiz do projeto
          \Auth::attempt($data, false);
      }
      else
      {
          $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
          if(!$user){
              //throw new Exception("O email informado é inválido!");
              session()->flash('falha', [
                  'falha' =>  true,
                  'messages' => 'O email informado é inválido!',
              ]);
              return redirect()->route('user.login');
          }
              
          if($user->password != $request->get('password')){
              //throw new Exception("A senha informada é inválida!");
              session()->flash('falha', [
                  'falha' =>  true,
                  'messages' => 'A senha informada é inválida!',
              ]);
              return redirect()->route('user.login');
          }

          \Auth::login($user);
      }
      //caso autentique, redireciona a rota para o dashboard
      return redirect()->route('user.dashboard');
    }
    catch (Exception $e)
    {
        //senao retornará um erro
        return $e->getMessage();
    }
  }

  public function logout()
  {
      \Auth::logout();
      return view('user.login');
  }
}
