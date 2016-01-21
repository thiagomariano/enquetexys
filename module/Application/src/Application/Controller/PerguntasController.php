<?php

namespace Application\Controller;

use     Zend\View\Model\ViewModel;

class PerguntasController extends CrudController
{

    public function __construct()
    {
        $this->entity = "Application\Entity\Pergunta";
        $this->form = "Application\Form\Pergunta";
        $this->service = "Application\Service\Pergunta";
        $this->controller = "perguntas";
        $this->route = "perguntas";
        $this->paginaOrigem = $this->route;
    }

    public function responderAction()
    {
        $this->form = "Application\Form\Resposta";
        $form = new $this->form();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray());

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {


                $service = $this->getServiceLocator()->get("Application\Service\Resposta");
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }
}
