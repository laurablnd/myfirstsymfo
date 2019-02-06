<?php

// le namespace des controllers sera toujours le même
namespace App\Controller;

// La classe Response nous sert pour renvoyer la réponse (voir après)
use Symfony\Component\HttpFoundation\Response;
// la classe Controller est la classe mère de tous les controllers
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// notre controller doit forcément hériter de la classe Controller ("use" ci-dessus)
// Le nom de la classe doit être exactement le même que celui du fichier
class HelloController extends Controller
{
    public function index_perso($prenom, $age){
    	$prenom1 = "Laura";
    	$prenom2 = "Benjamin";

    	/*$prenom = array("Camille","Thomas");*/

        // on renvoie ici un texte simple. Une instance de Response doit toujours être renvoyée.

        return $this->render('hello.html.twig', array(
         "prenom1" => $prenom1,
         "prenom2" => $prenom2,
         "prenom" => $prenom,
         "age" => $age,
        ));

    }

    public function index_error($prenom){
    	$erreurage = "Vous n'avez pas précisé l'âge";

    	return $this->render('error.html.twig', array(
         "erreurage" => $erreurage,
        ));
    }

}

?>