<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use AppBundle\Entity\Song;
use AppBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    /**
     * @Route(path="/test", name="test_action")
     */
    public function testAction()
    {
        $dbManager = $this->getDoctrine()->getManager();
        $songRepository = $this->getDoctrine()->getRepository(Song::class);
        $tagRepository = $this->getDoctrine()->getRepository(Tag::class);
        $reviewRepository = $this->getDoctrine()->getRepository(Review::class);

      /*  $song = new Song();
        $song->setName("name1");
        $song->setAlbum("album1");
        $song->setAuthor("author1");

        $tag = new Tag();
        $tag->setName("TestGenre1");

        $tag->addSongs([$song]);

        $dbManager->persist($song);
        $dbManager->persist($tag);

        $dbManager->flush();*/

/*
        $findedSong = $songRepository->find(2);
        $findedTag = $tagRepository->find(5);

        $findedSong->addTags([$findedTag]);

        $dbManager->persist($findedSong);
        $dbManager->persist($findedTag);
        $dbManager->flush();*/

        $findedSong2 = $songRepository->find(1);

/*
        $review = new Review();
        $review->setDescription("Nice");
        $review->setScore(10);
        $review->setSong($findedSong2);*/

        /*$dbManager->persist($review);
        $dbManager->persist($findedSong2);
        $dbManager->flush();*/

        $findedSong3 = $songRepository->find(1);

        $songsArrayCollection = $findedSong3->getReviews();
        $songsArray = $songsArrayCollection->toArray();


        return new Response(\implode($songsArray));
    }
}