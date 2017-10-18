<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 18/10/2017
 * Time: 11:39
 */

namespace BlogBundle\Controller;


use BlogBundle\Entity\Contact;
use BlogBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Post controller.
 *
 * @Route("contact")
 */
class ContactController extends Controller
{
    /**
     * Creates a contact message and sends an email
     *
     * @route("/contact")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return RedirectResponse|Response
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function ContactBlogAction(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

//      send confirmation email
            $name = $form['name']->getData();
            $email = $form['email']->getData();
            $message = (new \Swift_Message('Techsquids - Message bien reçu ! '))
                ->setFrom('bouvet.bruno@gmail.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        '@Blog/email/contact_form_receipt.html.twig',
                        array('name' => $name)
                    ),
                    'text/html'
                );
            $mailer->send($message);
//      end send confirmation email

            $flashbag = $this->get('session')->getFlashBag();
            $this->addFlash('success', "Votre message a bien été envoyé");

            return $this->redirectToRoute('blog_contact_contactblog',
                array(
                    'id' => $contact->getId(),
                    'flashbag' => $flashbag,
                )
            );
        }

        return $this->render('@Blog/Default/contact.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));

    }

}