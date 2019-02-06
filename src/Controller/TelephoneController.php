<?php

// le namespace des controllers sera toujours le même
namespace App\Controller;

// La classe Response nous sert pour renvoyer la réponse (voir après)
use Symfony\Component\HttpFoundation\Response;
// la classe Controller est la classe mère de tous les controllers
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Telephone;


// notre controller doit forcément hériter de la classe Controller ("use" ci-dessus)
// Le nom de la classe doit être exactement le même que celui du fichier
class TelephoneController extends Controller
{
    public function add($marque, $type, $taille){
        $tel = new Telephone();
        $tel->setMarque($marque);
        $tel->setType($type);
        $tel->setTaille($taille);
        $em = $this->getDoctrine()->getManager();
        $em->persist($tel);
        $em->flush();

        return $this->render('telephoneadd.html.twig', array(
         "marque" => $marque,
         "type" => $type,
         "taille" => $taille,
       ));
    }

    public function remove($id){
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()
                     ->getRepository(Telephone::class);
        $tel=  $repo->find($id);
        $em->remove($tel);
        $em->flush();
        $tel->getId();

      return $this->render('telephoneremove.html.twig', array(
        "id" => $id,
      ));
  }

    public function modify($id, $marque, $type, $taille){
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()
                     ->getRepository(Telephone::class);
        $tel=  $repo->find($id);
        $tel->setMarque($marque);
        $tel->setType($type);
        $tel->setTaille($taille);
        $em->flush();
        $tel->getId();

      return $this->render('telephonemodify.html.twig', array(
         "id" => $id,
         "marque" => $marque,
         "type" => $type,
         "taille" => $taille,
      ));
  }
 
    public function index(){
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()
                     ->getRepository(Telephone::class);
        $tels = $repo->findAll();
    
      return $this->render('telephone.html.twig', array(
          "tels" => $tels,
      ));
  }

}

?>