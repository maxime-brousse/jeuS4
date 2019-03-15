<?php
// src/Controller/DefaultController.php
namespace App\Controller;
use App\Entity\User ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Captcha\Bundle\CaptchaBundle\Form\Type\CaptchaType;

class InscriptionController extends  AbstractController
{
    /**
     * @route("/inscription", name="app_inscription")
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createFormBuilder()
            ->add('pseudo', TextType::class)
            ->add('Motdepasse', PasswordType::class )
            ->add('Motdepasse', RepeatedType::class, array(
                'type' => PasswordType::class,
                'required' => true,
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Répétez le mot de passe'),
            ))
            ->add('email', EmailType::class)
            ->add('captchaCode', CaptchaType::class, array('captchaConfig' => 'Captcha'))
            ->add('s\'inscrire', SubmitType::class, array('label' => 's\'inscrire'))
            ->getForm();

        /**
         * @CaptchaAssert\ValidCaptcha(
         *      message = "CAPTCHA validation failed, try again."
         * )
         */
        $form->handleRequest($request); // hydratation du form
        if($form->isSubmitted() && $form->isValid()) {
            // création de l'utilisateur
            $task = $form->getData();
            $user = new User();
            $encoded = $encoder->encodePassword($user, $task['Motdepasse']);
            $user->setUserSpeudo($task['pseudo']);
            $user->setPassword($encoded);
            $user->setRoles(["ROLE_USER"]);
            $user->setUserEmail($task['email']);
            $date = new \DateTime("now");
            $user->setUserDate($date);
            $user->setUserDerniere($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user); // on effectue les mise à jours internes
            $em->flush(); // on effectue la mise à jour vers la base de données
            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('hopi/incription.html.twig', ['form' => $form->createView()]);
    }
}