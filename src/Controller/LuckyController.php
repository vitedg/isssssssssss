<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class LuckyController extends AbstractController
{
        /**
      * @Route("/lucky/number")
      */
    public function number()
   {
      $number = random_int(0, 100);

       return $this->render('lucky/number.html.twig', [
           'number' => $number,
        ]);
    }
    /**
     * @Route("/postes") 
     */
    public function postes()
    {
        $postes = [
            ['id'=>0,
            'title'=>'title 1',
            'body'=>'body 1'
            ],
            ['id'=>1,
            'title'=>'title 2',
            'body'=>'body 2'
            ],
            ['id'=>2,
            'title'=>'title 3',
            'body'=>'body 3']
        ];
        return $this->render('lucky/number.html.twig',['postes'=>$postes]
    
    );
    }
        /**
     * @Route("/postes1") 
     */
    public function postes1()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $postes = $repository -> findAll();
        return $this->render('lucky/number.html.twig',['postes'=>$postes]
    
    );
    }
    /**
     * @Route("/postes2") 
     */
    public function postes2()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $post1 = $repository -> find(21,null,null);

        $post2 = $repository -> find(22,null,null);
        

        $postes = [
            $post1,
            $post2
        ];
        return $this->render('lucky/number.html.twig',['postes'=>$postes]
    
    );
    }
     /**
     * @Route("/postes3") 
     */
    public function postes3()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $post1 = $repository->findOneBy(array('title' => 'title n 1'));
        $post2 = $repository->findOneBy(array('title' => 'title n 2'));
        $postes = [
            $post1,
            $post2
        ];
        return $this->render('lucky/number.html.twig',['postes'=>$postes]
    );
    }
         /**
     * @Route("/postes4") 
     */
    public function postes4()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $postes = $repository->findBy(array('title' => 'title n 5'));
        return $this->render('lucky/number.html.twig',['post'=>$post]
    );
    }
     /**
     * @Route("/post/{id}",name="test") 
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $post = $repository->find($id);
        return $this->render('lucky/show.html.twig',['post'=>$post]
    );
    }
    /**
     * @Route("/add")
     * 
     */
    public function add()
    {
        return new Response('<h1>add post</h1>');
    }
    /**
     * @Route("hello")
     */
    public function hello()
    {
        return new Response('hello world!!');
    }
}