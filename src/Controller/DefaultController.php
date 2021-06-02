<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactForm;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController{
    /**
     * @Route("/", name="contact_url")
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(ContactForm::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $contact = new Contacts();
            $contact->setContactName($data['Your_Name']);
            $contact->setContactEmail($data['Your_Email']);
            $contact->setContactMessage($data['The_Message']);
            $contact->setContactDate(new DateTime());

            $this->addFlash(
                'success',
                'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.'
            );

            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contact_url');
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash(
                'error',
                'Hiba! Kérjük töltsd ki az összes mezőt!'
            );

            return $this->redirectToRoute('contact_url');
        }

        return $this->render('contact.html.twig',[
            'contactForm' => $form->createView(),
        ]);
    }
}