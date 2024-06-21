<?php

namespace App\Cinetech\Templates;

use App\Cinetech\Models\Users;
use App\Cinetech\Components\StdOut;
use App\Cinetech\Components\Redirect;
use App\Cinetech\Manager\CrudManager;
use App\Cinetech\Manager\DataValidatorManager;
use App\Cinetech\Manager\SecurityManager;

class UsersTemplate extends CrudManager
{
  /**
   * securityManager
   *
   * @var SecurityManager
   */
  private $securityManager;

  public function __construct()
  {
    $this->securityManager = new SecurityManager();
    //parent::__construct('users', Users::class);
  }

  public function SignIn(...$parameters)
  {
    //var_dump($arguments);
    $paramsConnect = [];
    if (isset($parameters['email']) && filter_var($parameters['email'], FILTER_VALIDATE_EMAIL)) {
      $paramsConnect['email'] = $parameters['email'];
    }

    if (isset($parameters['password']) && preg_match('/^(?(?=.*[A-Z])(?=.*[0-9])(?=.*[\%\$\,\;\!\-_])[a-zA-Z0-9\%\$\,\;\!\-_])$/', $parameters['password'])) {
      $paramsConnect['password'] = $parameters['password'];
    }

    if (!in_array("", $paramsConnect)) {
      $resultSQL = $this->securityManager->connectUser($paramsConnect);

      StdOut::dump($resultSQL);
    }


    $html = '<script type="module">cineTech.sys.getById("content-main").delClass("md:min-w-2xl").delClass("md:mx-auto").delClass("mx-2").addClass("md:min-w-full");</script>';
    $html .= "<section class='flex bg-gray-50 dark:bg-gray-900 flex-col justify-center text-white items-center min-w-full py-4 min-h-dvh pb-96'>
    <div class='flex flex-col items-center justify-center px-6 py-8 w-full lg:py-0'>
        <div class='w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700'>
            <div class='p-6 space-y-4 md:space-y-6 sm:p-8'>
                <h1 class='text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white'>
                   Connection sur CineTech
                </h1>
                <form class='space-y-4 md:space-y-6' method='post'>
                    <div>
                        <label for='email' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre email</label>
                        <input type='email' name='email' id='email' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='name@company.com' required=''>
                    </div>
                    <div>
                        <label for='password' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre mot de passe</label>
                        <input type='password' name='password' id='password' placeholder='••••••••' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' required=''>
                    </div>
                    
                    <button type='submit' class='w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800'>Connect</button>

                </form>
            </div>
        </div>
    </div>
  </section>";

    return $html;
  }


  /* Affichage du formulaire avec la method $this->render("inscription"); */
  public function SignUp(...$arguments)
  {
    StdOut::dump($arguments);
    if (is_array($arguments) && in_array('data', array_keys($arguments))) :
      $model = new Users($arguments['data']);
    else :
      $model = new Users($arguments);
    endif;

    $html  = '<script type="module">cineTech.sys.getById("content-main").delClass("md:min-w-2xl").delClass("md:mx-auto").delClass("mx-2").addClass("md:min-w-full");</script>';
    $html .= "<section class='flex bg-gray-50 dark:bg-gray-900 flex-col justify-center text-white items-center min-w-full h-auto py-4'>
    <div class='flex flex-col items-center justify-center px-6 py-8 w-full lg:py-0'>
        <div class='w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700'>
            <div class='p-6 space-y-4 md:space-y-6 sm:p-8'>
                <h1 class='text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white'>
                   Créer votre compte sur CineTech
                </h1>
                <form class='space-y-4 md:space-y-6' method='post'>
                    <div class='relative'>
                  
                        <label for='login' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre pseudo</label>
                        <input value='{$model->login}' type='text' name='login' id='login' placeholder='Votre pseudo' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='name@company.com' required=''>

                        <div class='absolute top-0 end-0 flex items-center ps-3 pointer-events-auto group'>
                          <span  class='sr-only'>Les informations essentielles pour choisir son pseudo sur cinetech</span>
                          <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                            <path stroke-linecap='round' stroke-linejoin='round' d='m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z' />
                          </svg>
                          <div class='text-xs lg:text-sm  group-hover:opacity-100 transition-opacity dark:bg-gray-50 border dark:border-gray-300 dark:text-gray-900 bg-gray-700 border-gray-600 text-white w-40 md:w-96 px-1 rounded-md absolute -translate-x-full translate-y-20 opacity-0 m-4 mx-auto'>
                            <p>Votre pseudo doit avoir un minimum de 3 caractères et ne peut contenir que des lettres et des chiffres. Les caractères - et _ sont acceptés. </p>
                          </div>
                        </div>

                    </div>
                    <div>
                        <label for='email' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre email</label>
                        <input value='{$model->email}' type='email' name='email' id='email' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='name@company.com' required=''>
                    </div>
                    <div class='relative'>
                        <label for='password' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre mot de passe</label>
                        <input type='password' name='password' id='password' placeholder='••••••••' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' required=''>
                        <p id='message-password' class='mb-1 p-2 text-sm'></p>

                        <div class='absolute top-0 end-0 flex items-center ps-3 pointer-events-auto group'>
                        <span  class='sr-only'>Les informations essentielles pour choisir son mots de passe sur cinetech</span>
                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                          <path stroke-linecap='round' stroke-linejoin='round' d='m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z' />
                        </svg>
                        <div class='text-xs lg:text-sm  group-hover:opacity-100 transition-opacity w-40 md:w-96 px-1 dark:bg-gray-50 border dark:border-gray-300 dark:text-gray-900 bg-gray-700 border-gray-600 text-white rounded-md absolute -translate-x-full translate-y-20 opacity-0 m-4 mx-auto'>
                          <p>La longueur de votre mot de passe doit être d'au moins 6 caractères, comprenant au moins une lettre majuscule et un chiffre, ainsi qu'un caractère spécial (_ - ! $ ; % ,)</p>
                        </div>
                      </div>

                    </div>
                    <div>
                        <label for='confirm-password' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Confirmation mot de passe</label>
                        <input type='password' name='confirm-password' id='confirm-password' placeholder='••••••••' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' required=''>
                    </div>
                    <div>
                         <label for='birthday' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Date de naissance</label>
                         <input value='{$model->getBirthday()}' type='date' name='birthday' id='birthday' placeholder='Votre date de naissance' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' required=''>
                    </div>                    
                    <div class='flex items-start'>
                        <div class='flex items-center h-5'>
                          <input id='terms' aria-describedby='terms' type='checkbox' class='w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800' required=''>
                        </div>
                        <div class='ml-3 text-sm'>
                          <label for='terms' class='font-light text-gray-500 dark:text-gray-300'>I accept the <a class='font-medium text-primary-600 hover:underline dark:text-primary-500' href='#'>Accepter les conditions</a></label>
                        </div>
                    </div>
                    <button type='submit' class='w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800'>Créer mon compte</button>

                </form>
            </div>
        </div>
    </div>
  </section>";

    return $html;
  }

  /**
   * Method Registration
   *
   * Vérifier et enregistrer le nouvel utilisateur en BDD table users
   * 
   * @param $login [pseudo de l'utilisateur]
   * @param $email [email de l'utilisateur]
   * @param $password [password de l'utilisateur]
   * @param $firstname [firstname de l'utilisateur]
   * @param $lastname [lastname de l'utilisateur]
   *
   * @return void
   */
  public function Registration(...$parameters)
  {
    /*
    $arrayParameters = [
      $parameters['login'] ?? "",
      $parameters['email']??"",
      $parameters['password']??"",
      $parameters['firstname']??"",
      $parameters['lastname']??"",
      //   $parameters['id_session_tmdb'],
      $birthday->format("Y-m-d H:i:s")
    ]
    var_dump($parameters);
    $id_session_tmdb = "secret";
    $birthday = $parameters['birthday'] != "" ? new \DateTime($parameters['birthday']) : "";
*/
    /* Nouvelle instance des users class dans le dossier Models
     *  On traite les données transmises par notre formulaire
     *  ou tous autres donnés avant de les transmettre à
     *  notre manager qui va faire l'insertion en base de données.
     */
    /*
    $model = new Users([
      'login' => $parameters['login'],
      'email' => $parameters['email'],
      'password' => $parameters['password'],
      'firstname' => $parameters['firstname'],
      'lastname' => $parameters['lastname'],
      //  'id_session_tmdb' => $parameters['id_session_tmdb'],
      'birthday' => $birthday
    ]);
*/



    $model = new Users($parameters);

    $errors = DataValidatorManager::validate($model);

    if (empty($errors)) {
      StdOut::dump("Les données sont valides !");
    } else {
      return call_user_func_array(array(__NAMESPACE__ . '\UsersTemplate', 'SignUp'), ['data' => $parameters, 'errors' => $errors]);
    }
    /*
    StdOut::dump(
      $model
      //   $parameters['id_session_tmdb'],
      // $birthday->format("Y-m-d H:i:s")
    );

*/
    //  Redirect::redirect("connect");
  }


  /* Affichage du formulaire avec la method $this->render("inscription"); */
  public function UpdateProfile(...$arguments)
  {
    StdOut::dump($arguments);
    if (is_array($arguments) && in_array('data', array_keys($arguments))) :
      $model = new Users($arguments['data']);
    else :
      $model = new Users($arguments);
    endif;

    $html  = '<script type="module">cineTech.sys.getById("content-main").delClass("md:min-w-2xl").delClass("md:mx-auto").delClass("mx-2").addClass("md:min-w-full");</script>';
    $html .= "<section class='flex bg-gray-50 dark:bg-gray-900 flex-col justify-center text-white items-center min-w-full h-auto py-4'>
    <div class='flex flex-col items-center justify-center px-6 py-8 w-full lg:py-0'>
        <div class='w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700'>
            <div class='p-6 space-y-4 md:space-y-6 sm:p-8'>
                <h1 class='text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white'>
                   Créer votre compte sur CineTech
                </h1>
                <form class='space-y-4 md:space-y-6' method='post'>
                    <div class='relative'>
                  
                        <label for='login' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre pseudo</label>
                        <input value='{$model->login}' type='text' name='login' id='login' placeholder='Votre pseudo' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='name@company.com' required=''>

                        <div class='absolute top-0 end-0 flex items-center ps-3 pointer-events-auto group'>
                          <span  class='sr-only'>Les informations essentielles pour choisir son pseudo sur cinetech</span>
                          <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                            <path stroke-linecap='round' stroke-linejoin='round' d='m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z' />
                          </svg>
                          <div class='text-xs lg:text-sm  group-hover:opacity-100 transition-opacity dark:bg-gray-50 border dark:border-gray-300 dark:text-gray-900 bg-gray-700 border-gray-600 text-white w-40 md:w-96 px-1 rounded-md absolute -translate-x-full translate-y-20 opacity-0 m-4 mx-auto'>
                            <p>Votre pseudo doit avoir un minimum de 3 caractères et ne peut contenir que des lettres et des chiffres. Les caractères - et _ sont acceptés. </p>
                          </div>
                        </div>

                    </div>
                    <div>
                        <label for='lastname' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre prénom</label>
                        <input value='{$model->lastname}' type='text' name='lastname' id='lastname' placeholder='Votre prénom' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='name@company.com' required=''>
                    </div>
                    <div>
                        <label for='firstname' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre nom</label>
                        <input value='{$model->firstname}' type='text' name='firstname' id='firstname' placeholder='Votre nom' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='name@company.com' required=''>
                    </div>
                    <div>
                        <label for='email' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre email</label>
                        <input value='{$model->email}' type='email' name='email' id='email' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='name@company.com' required=''>
                    </div>
                    <div class='relative'>
                        <label for='password' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Votre mot de passe</label>
                        <input type='password' name='password' id='password' placeholder='••••••••' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' required=''>
                        <p id='message-password' class='mb-1 p-2 text-sm'></p>

                        <div class='absolute top-0 end-0 flex items-center ps-3 pointer-events-auto group'>
                        <span  class='sr-only'>Les informations essentielles pour choisir son mots de passe sur cinetech</span>
                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                          <path stroke-linecap='round' stroke-linejoin='round' d='m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z' />
                        </svg>
                        <div class='text-xs lg:text-sm  group-hover:opacity-100 transition-opacity w-40 md:w-96 px-1 dark:bg-gray-50 border dark:border-gray-300 dark:text-gray-900 bg-gray-700 border-gray-600 text-white rounded-md absolute -translate-x-full translate-y-20 opacity-0 m-4 mx-auto'>
                          <p>La longueur de votre mot de passe doit être d'au moins 6 caractères, comprenant au moins une lettre majuscule et un chiffre, ainsi qu'un caractère spécial (_ - ! $ ; % ,)</p>
                        </div>
                      </div>

                    </div>
                    <div>
                        <label for='confirm-password' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Confirmation mot de passe</label>
                        <input type='password' name='confirm-password' id='confirm-password' placeholder='••••••••' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' required=''>
                    </div>
                    <div>
                         <label for='birthday' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>Date de naissance</label>
                         <input value='{$model->getBirthday()}' type='date' name='birthday' id='birthday' placeholder='Votre date de naissance' class='bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' required=''>
                    </div>                    
                    <div class='flex items-start'>
                        <div class='flex items-center h-5'>
                          <input id='terms' aria-describedby='terms' type='checkbox' class='w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800' required=''>
                        </div>
                        <div class='ml-3 text-sm'>
                          <label for='terms' class='font-light text-gray-500 dark:text-gray-300'>I accept the <a class='font-medium text-primary-600 hover:underline dark:text-primary-500' href='#'>Accepter les conditions</a></label>
                        </div>
                    </div>
                    <button type='submit' class='w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800'>Créer mon compte</button>

                </form>
            </div>
        </div>
    </div>
  </section>";

    return $html;
  }
}
