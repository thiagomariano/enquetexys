<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;


abstract class CrudController extends AbstractActionController
{

    protected $em;
    protected $service;
    protected $entity;
    protected $form;
    protected $route;
    protected $controller;
    protected $title;
    protected $subTitle;

    public function indexAction()
    {
        $list = $this->getEm()->getRepository($this->entity)->queryCustom();
        $page = $this->params()->fromRoute('page');
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(10);

        $paginator = (object) $paginator;
        return new ViewModel(array('data' => $paginator, 'titulo' => $this->title, 'subTitulo' => $this->subTitle, 'qtdRegistros' => count($list), 'ultimaPagina' => $this->paginaOrigem));
    }

    public function cadastrarAction()
    {
        $form = new $this->form();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                #var_dump($this->entity);
                #echo '<pre>'; print_r($request->getPost()); exit;
                $service = $this->getServiceLocator()->get($this->service);
                #var_dump($request->getPost()->toArray()); exit;
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'titulo' => $this->title));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function editarAction()
    {
        $form = new $this->form();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray());

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function excluirAction()
    {
        $service = $this->getServiceLocator()->get($this->service);
        if ($service->delete($this->params()->fromRoute('id', 0)))
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
    }

    /**
     *
     * @return EntityManager
     */
    protected function getEm()
    {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        return $this->em;
    }
}
