<?php
/*
namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 *
 * Principio de responsabilidad unica
 * Una clase o metodo solo debe tener una responsabilidad
 */
/*
class UsersStoreController
{
    /**
     * @throws Exception
     */
    /*public function store(Request $request) : void
    {
        (new UsersValidateAuthController())->validate();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = (new UsersPasswordHelpers())->generatePassword($request->password);
        $user->save();
    }
}

class UsersValidateAuthController
{
    /**
     * @throws Exception
     */
    /*public function validate() : void
    {
        if (Auth::check() && Auth::id() === 1) {
            throw new Exception('No puedes hacer esto');
        }
    }
}

class UsersPasswordHelpers
{
    public function generatePassword($password) : string
    {
        return bcrypt($password);
    }
}
/**
 *
 * Principio de abierto/cerrado
 * Una clase debe estar abierta para su implementacion, pero cerrada para su modificación
 *
 * Siempre que se necesite agregar una nueva funcionalidad, se debe hacer mediante una nueva clase
 */

/*class Users
{
    //EJEMPLO MAL
    public function identifyUser($user)
    {
        switch ($user) {
            case 'natural':
                return $this->sayHello('natural');
                break;
            case 'business':
                return $this->sayHello('business');
                break;
            case 'admin':
                return $this->sayHello('admin');
                break;
            default:
        }
    }

    public function sayHello($user) : string
    {
        return 'Hola desde '. $user;
    }
}*/
/*
interface Users
{
    public function sayHello() : string;
}

class NaturalUser implements Users
{
    public function sayHello() : string
    {
        return 'Hola desde natural';
    }
}

class BusinessUser implements Users
{
    public function sayHello() : string
    {
        return 'Hola desde business';
    }
}

class AdminUser implements Users
{
    public function sayHello() : string
    {
        return 'Hola desde admin';
    }
}

class UsersImplementation
{
    public function identifyUser(Users $user) : string
    {
        return $user->sayHello();
    }
}


/**
 *
 * Principio de sustitucion de Liskov
 * Las clases hijas deben poder sustituir a las clases padres sin afectar el comportamiento
 * se puede implementar una interfaz o clase abstracta
 * es importante empezar a tipas las clases y metodos
 *
 * final class se utiliza para que una clase no pueda ser extendida por otra clase
 */
/*
abstract class ParentClass
{
    abstract public function getSayHello(string $param) : array;
}

interface ParentInterface
{
    public function getSayBye(string $param) : bool;
}

final class ChildClass extends ParentClass implements ParentInterface
{
    public function getSayHello(string $param) : array
    {
        return ['saludo' => 'Hola desde ' . $param];
    }

    public function getSayBye(string $param) : bool
    {
        return true;
    }
}


/**
 *
 * Principio de segregacion de interfaces
 * Una clase no debe depender de metodos que no utiliza
 * se debe dividir las interfaces en interfaces mas pequeñas
 */
/*
interface ResponseInterface
{
    public function JSONResponse() : string;

    public function HTMLResponse() : string;

    //public function BinaryResponse(); Este metodo se pasaria a otra interfaz
}

interface FileResponseInterface
{
    public function BinaryResponse();
}

final class apiResponse implements ResponseInterface
{
    public function JSONResponse() : string
    {
        return json_encode('hello world' , true);
    }

    public function HTMLResponse() : string
    {
        return '<h1>Hello world</h1>';
    }

}

final class fileResponse implements FileResponseInterface
{
    public function BinaryResponse(): string
    {
        return 'file';
    }
}

/** Concepto inyecion de dependencias
 * Es la manera  por medio del constructor podemos intectar clases los cuales utilizaremos en nuevo scope o en nuestra clase
 */
/*
class claseA
{
    public function getInformationItems()
    {
        return [
            'item1',
            'item2',
            'item3',
        ];
    }
}


class claseB
{
    private $clase;

    public function __construct(ClaseA $clase)
    {
        $this->clase = $clase;
    }

    public function getInformation()
    {
        //Esto es una manera convencional pero es un acoplamiento fuerte
        /*
        $claseA = new claseA();
        $claseA->getInformationItems();
        */
/*
        //Inyeccion de dependencias
        return $this->clase->getInformationItems();
    }

    /**
     * GEtter y setter
     */
/*
    public function getClase()
    {
        return $this->clase;
    }


    public function setClase($clase)
    {
        $this->clase = $clase;
    }
}


/**
 * Principio de inversion de dependencias
 * Las clases de alto nivel no deben depender de las clases de bajo nivel
 * Ambas deben depender de abstracciones es decir una claseC no debe depender de las clasesA y claseB
 * sino de una interfaz que ambas clases implementen
 */
/*
interface connectionAdapter
{
    public function getAllUsers() : ?array;
}

class EloquentAdapter implements connectionAdapter
{
    public function getAllUsers() : ?array
    {
        return [
            'users' => User::all()
        ];
    }
}

class StoreProcedureAdapter implements connectionAdapter
{
    public function getAllUsers() : ?array
    {
        return [
            'users' => DB::select('CALL getAllUsers()')
        ];
    }
}
class IndexController
{
    private $adapter;

    /*
     *
     * Esto todavia tendria un acoplamiento fuerte tendriamos que modificar IndexController si cambiamos de adaptador
     public function __construct(EloquentAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function __construct(StoreProcedureAdapter $adapter)
    {
        $this->adapter = $adapter;
    }*/

    /**
     * Esto ya es la inversion de dependencias
     * ya que no sabe que adaptador se esta utilizando
     *//*
    public function __construct(connectionAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function __invoke() : ?array
    {
        //con laravel hariamos esto pero nos acomplamos a eloquent
        /*$users = User::all();
        return [
            'users' => $users
        ];*/
/*
        //Inyeccion de dependencias
        return $this->adapter->getAllUsers();
    }

}
*/
