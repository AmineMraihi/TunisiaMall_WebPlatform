<?php

namespace TunisiaMallBundle\Controller;

use TunisiaMallBundle\Entity\ReservationPP;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reservationpp controller.
 *
 */
class ReservationPPController extends Controller
{
    /**
     * Lists all reservationPP entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('TunisiaMallBundle:User')->find($user->getId());
        $reservationPPs = $em->getRepository('TunisiaMallBundle:ReservationPP')->findBy(['iduser'=>$user->getId()]);

        return $this->render('reservationpp/index.html.twig', array(
            'reservationPPs' => $reservationPPs,
        ));
    }

    /**
     * Creates a new reservationPP entity.
     *
     */
    public function newAction(Request $request)
    {
        $reservationPP = new Reservationpp();
        $form = $this->createForm('TunisiaMallBundle\Form\ReservationPPType', $reservationPP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationPP->setJourHeure(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservationPP);
            $em->flush();

            return $this->redirectToRoute('reservationPlaceParking_show', array('idReservation' => $reservationPP->getIdreservation()));
        }

        return $this->render('reservationpp/new.html.twig', array(
            'reservationPP' => $reservationPP,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservationPP entity.
     *
     */
    public function showAction(ReservationPP $reservationPP)
    {
        $deleteForm = $this->createDeleteForm($reservationPP);

        return $this->render('reservationpp/show.html.twig', array(
            'reservationPP' => $reservationPP,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservationPP entity.
     *
     */
    public function editAction(Request $request, ReservationPP $reservationPP)
    {
        $deleteForm = $this->createDeleteForm($reservationPP);
        $editForm = $this->createForm('TunisiaMallBundle\Form\ReservationPPType', $reservationPP);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservationPlaceParking_edit', array('idReservation' => $reservationPP->getIdreservation()));
        }

        return $this->render('reservationpp/edit.html.twig', array(
            'reservationPP' => $reservationPP,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservationPP entity.
     *
     */
    public function deleteAction(Request $request, ReservationPP $reservationPP)
    {
        $form = $this->createDeleteForm($reservationPP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservationPP);
            $em->flush();
        }

        return $this->redirectToRoute('reservationPlaceParking_index');
    }

    /**
     * Creates a form to delete a reservationPP entity.
     *
     * @param ReservationPP $reservationPP The reservationPP entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ReservationPP $reservationPP)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservationPlaceParking_delete', array('idReservation' => $reservationPP->getIdreservation())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
