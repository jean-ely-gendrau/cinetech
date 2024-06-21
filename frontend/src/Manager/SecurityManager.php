<?php

namespace App\Cinetech\Manager;

use App\Cinetech\Models\Users;
use App\Cinetech\Components\Redirect;
use App\Cinetech\Manager\CrudManager;
use App\Cinetech\Manager\SessionManager;
use App\Cinetech\Manager\PasswordHashManager;


class SecurityManager extends CrudManager
{
  private $userModel;
  private $passwordHashManager;
  private $sessionManager;
  private $redirect;

  public function __construct()
  {
    parent::__construct('users', Users::class);
    $this->passwordHashManager = new PasswordHashManager();
    $this->sessionManager = new SessionManager();
    $this->redirect = new Redirect();
  }

  public function isConnectUser()
  {
    $this->userModel = new Users();
  }

  public function isUserExist()
  {
  }

  public function isHashValid()
  {
  }

  public function connectUser(array $paramsConnect)
  {
    try {

      $resultSql = $this->getByEmail($paramsConnect['email']);

      // Si on à un résultat et que le hash du password correspond  
      if (
        $resultSql
        && $this->passwordHashManager->verify($resultSql['password'], $paramsConnect['password'])
      ) {
        unset($resultSql['password']); // Retire le password des résultats

        // Ajoute les variable de sesions
        $this->sessionManager->add([
          'isConnect' => true,
          'pseudo'    => $resultSql['pseudo'],
          'email'  => $resultSql['email'],
        ]);

        $this->redirect::redirect('/profile');
      }
    } catch (\Exception $error) {
      return  $error->getMessage();    // Return CACTH ERREUR
    }
  }

  public function createUser(...$parameters)
  {
    if (property_exists($parameters, 'email')) {
      $isUserExist = $this->getByEmail($parameters->email);

      if ($isUserExist) throw new \Exception('Vous avez déjà un compte');

      /*
     *
     * Notre Manager de données instancier nous pouvons maintenant utiliser les méthodes étendues de la class   CrudManager
     *
     * create    (INSERT)
     * update    (UPDATE)
     * getAll    (SELECT)
     * getByMail (SELECT  WHERE email = :email)
     * getById   (SELECT  WHERE id = :id)
     *
     * La méthode create est utilisée pour ajouter un nouvel utilisateur dans la table users.
     * Method: "create($modèle, ['login','email', "password", "firstname", "lastname", "birthday'])" 
     * 1 er argument de la méthode une class du modèle de données 
     * 2e argument, il est nécessaire d'avoir un tableau répertoriant les champs des colonnes à enregistrer.
     * 
     */
      $this->create($parameters, (array)array_keys($parameters));
    }
  }
}
