<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer, EntityManagerInterface $entityManager): Response
    {
        $contactMessage = new ContactMessage();
        $form = $this->createForm(ContactMessageType::class, $contactMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($contactMessage);
            $entityManager->flush();

            $request->getSession()->set('recently_contacted_id', $contactMessage->getId());
            // Traitez ici l'envoi du formulaire par email
            $email = (new TemplatedEmail())
                ->from($contactMessage->getEmail())
                ->to('alexandrecano@hotmail.fr')
                ->subject('Nouveau message de CV (Contact)')
                ->htmlTemplate('email/contact.html.twig')
                ->context([
                    'message' => $contactMessage,
                ]);

                try {
                    $mailer->send($email);
                    $this->addFlash('success', 'Votre message a été envoyé avec succès.');
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Une erreur s\'est produite lors de l\'envoi de l\'email : ' . $e->getMessage());
                }
                

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}